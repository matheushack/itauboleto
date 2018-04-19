<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 10:37
 */

namespace MatheusHack\ItauBoleto;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class ItauClient
{
    const ACCESS_TOKEN_KEY = 'ItauBoleto_access_token';

    private $httpClient;

    private $accessToken;

    private $expireToken;

    private $clientId;

    private $clientSecret;

    private $itauKey;

    private $cnpj;

    public function __construct(array $config)
    {
        $this->clientId = $config['clientId'];
        $this->clientSecret = $config['clientSecret'];
        $this->itauKey = $config['itauKey'];
        $this->cnpj = $config['cnpj'];

        $this->httpClient = new Client([
            'base_uri' => 'https://gerador-boletos.itau.com.br/router-gateway-app/public/codigo_barras/registro',
            'defaults' => [
                'headers' => [],
            ],
        ]);
    }

    protected function getHeaders()
    {
        $headers = [
            'Accept'     => 'application/vnd.itau',
        ];

        $accessToken = $this->getAccessToken();

        if($accessToken)
            $headers['access_token'] = $accessToken;

        $headers['itau-chave'] = $this->itauKey;
        $headers['identificador'] = $this->cnpj;

        return $headers;
    }

    public function getAccessToken()
    {
        if (empty($this->accessToken) || Carbon::now()->timestamp > $this->expireToken)
            $this->authorize();

        return $this->accessToken;
    }

    public function authorize()
    {
         try {
            $result = $this->doAuthRequest([
                'scope' => 'readonly',
                'grant_type' => base64_encode($this->clientId.':'.$this->clientSecret),
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret
            ]);

            if ($result && !empty($result->access_token)) {
                $this->accessToken = $result->access_token;
                $this->expireToken = Carbon::now()->addSeconds($result->expires_in)->timestamp;
            }

            return true;
        } catch (RequestException $e) {
             $this->accessToken = null;
             $this->expireToken = Carbon::now()->subMinute()->timestamp;

             return false;
        }
    }

    public function doAuthRequest($parameters)
    {
        $response = $this->httpClient->post("https://oauth.itau.com.br/identity/connect/token", [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'json' => $parameters
        ]);

        return json_decode($response->getBody());
    }

    public function doRequest($method, $parameters, $headers)
    {
        $method = strtolower($method);

        $doRequest = function () use ($method, $parameters, $headers) {
            $options = [
                'headers' => array_merge($this->getHeaders(), $headers),
                'json' => json_encode($parameters)
            ];

            try {
                $response = $this->httpClient->request($method, '', $options);
            } catch (RequestException $e) {
                $response = $e->getResponse();
            }

            return $response;
        };

        $rawResponse = $doRequest();

        if ($rawResponse->getStatusCode() == 400) {
            if ($this->authorize())
                $rawResponse = $doRequest();
        }

        if (in_array($rawResponse->getStatusCode(), [0]))
            throw new \Exception('Houve um problema de comunicação com o serviço');

        $jsonResponse = json_decode($rawResponse->getBody());

        if(data_get($jsonResponse, 'codigo', null) == 400)
            throw new \Exception(data_get($jsonResponse, 'mensagem', null));

        return $jsonResponse;
    }

    public function post($parameters, $headers = [])
    {
        return $this->doRequest('POST', $parameters, $headers);
    }
}