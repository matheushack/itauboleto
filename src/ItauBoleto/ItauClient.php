<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 10:37
 */

namespace MatheusHack\ItauBoleto;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use MatheusHack\ItauBoleto\Exceptions\BoletoException;


class ItauClient
{
    const BOLETO_TEST = 'https://gerador-boletos.itau.com.br/router-gateway-app/public/codigo_barras/registro';

    const BOLETO_PRODUCTION = 'https://gerador-boletos.itau.com.br/router-gateway-app/public/codigo_barras/registro';

    const OAUTH_TEST = 'https://oauth.itau.com.br/identity/connect/token';

    const OAUTH_PRODUCTION = 'https://autorizador-boletos.itau.com.br/';

    private $httpClient;

    private $accessToken;

    private $clientId;

    private $clientSecret;

    private $itauKey;

    private $cnpj;

    private $oAuthUrl;

    private $boletoUrl;

    public function __construct(array $config)
    {
        $this->httpClient = new Client();

        $this->clientId = $config['clientId'];
        $this->clientSecret = $config['clientSecret'];
        $this->itauKey = $config['itauKey'];
        $this->cnpj = $config['cnpj'];
        $this->oAuthUrl = (data_get($config,'production', false) === true ? self::OAUTH_PRODUCTION : self::OAUTH_TEST);
        $this->boletoUrl = (data_get($config,'production', false) === true ? self::BOLETO_PRODUCTION : self::BOLETO_TEST);
    }

    public function execute($parameters)
    {
        $this->authorize();

        if(empty($this->accessToken))
            throw new BoletoException('AccessToken - Não autorizado pelo banco');

        try {
            $response = $this->httpClient->request('post', $this->boletoUrl, [
                'headers' => [
                    'Accept' => 'application/vnd.itau',
                    'access_token' => $this->accessToken,
                    'itau-chave' => $this->itauKey,
                    'identificador' => $this->cnpj
                ],
                'json' => $parameters
            ]);

        } catch (RequestException $e) {
            $response = $e->getResponse();
        }

        $jsonResponse = json_decode($response->getBody());

        if(data_get($jsonResponse, 'codigo', null) == 400)
            throw new BoletoException(data_get($jsonResponse, 'mensagem', null));

        return $jsonResponse;
    }

    private function authorize()
    {
        if(empty($this->accessToken)){
            try {
                $responseOauth = $this->httpClient->post($this->oAuthUrl, [
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded'
                    ],
                    'json' => [
                        'scope' => 'readonly',
                        'grant_type' => base64_encode($this->clientId . ':' . $this->clientSecret),
                        'client_id' => $this->clientId,
                        'client_secret' => $this->clientSecret
                    ]
                ]);

                $ouath = json_decode($responseOauth->getBody());

                if ($ouath && !empty($ouath->access_token)) {
                    $this->accessToken = $ouath->access_token;

                    return true;
                }

                throw new BoletoException();

            }catch(RequestException $e){
                $this->accessToken = null;
            }catch(BoletoException $e){
                $this->accessToken = null;
            }
        }

        return false;
    }
}