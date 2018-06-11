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
use MatheusHack\ItauBoleto\Constants\Status;
use MatheusHack\ItauBoleto\Constants\TipoAmbiente;
use MatheusHack\ItauBoleto\Exceptions\BoletoException;


/**
 * Class ItauClient
 * @package MatheusHack\ItauBoleto
 */
class ItauClient
{
    /**
     *
     */
    const BOLETO_TESTE = 'https://gerador-boletos.itau.com.br/router-gateway-app/public/codigo_barras/registro';

    /**
     *
     */
    const BOLETO_PRODUCAO = 'https://gerador-boletos.itau.com.br/router-gateway-app/public/codigo_barras/registro';

    /**
     *
     */
    const OAUTH_TESTE = 'https://oauth.itau.com.br/identity/connect/token';

    /**
     *
     */
    const OAUTH_PRODUCAO = 'https://oauth.itau.com.br/identity/connect/token';

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var
     */
    private $accessToken;

    /**
     * @var mixed
     */
    private $clientId;

    /**
     * @var mixed
     */
    private $clientSecret;

    /**
     * @var mixed
     */
    private $itauKey;

    /**
     * @var mixed
     */
    private $cnpj;

    /**
     * @var string
     */
    private $oAuthUrl;

    /**
     * @var string
     */
    private $boletoUrl;

    /**
     * @var int
     */
    private $ambiente;

    /**
     * ItauClient constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->httpClient = new Client();

        $this->clientId = $config['clientId'];
        $this->clientSecret = $config['clientSecret'];
        $this->itauKey = $config['itauKey'];
        $this->cnpj = $config['cnpj'];
        $this->oAuthUrl = (data_get($config,'production', false) === true ? self::OAUTH_PRODUCAO : self::OAUTH_TESTE);
        $this->boletoUrl = (data_get($config,'production', false) === true ? self::BOLETO_PRODUCAO : self::BOLETO_TESTE);
        $this->ambiente = (data_get($config,'production', false) === true ? TipoAmbiente::PRODUCAO : TipoAmbiente::TESTE);
    }

    /**
     * @param $parameters
     * @return mixed
     * @throws BoletoException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function __callItau($parameters)
    {
        $this->__authorize();

        if(empty($this->accessToken))
            throw new BoletoException('AccessToken - Não autorizado pelo banco');

        try {
            $parameters->tipo_ambiente = $this->ambiente;

            $response = $this->httpClient->request('post', $this->boletoUrl, [
                'headers' => [
                    'Accept' => 'application/vnd.itau',
                    'access_token' => $this->accessToken,
                    'itau-chave' => $this->itauKey,
                    'identificador' => $this->cnpj
                ],
                'body' => json_encode($parameters)
            ]);

            $bodyResponse = json_decode($response->getBody());

        } catch (RequestException $e) {
            $response = $e->getResponse();
            $bodyResponse = json_decode($response->getBody());
        }

        if(array_key_exists('codigo',$bodyResponse)) {
            $jsonResponse = $bodyResponse;
            $bodyResponse = $parameters;

            if(data_get($jsonResponse, 'mensagem')){
                if(data_get($jsonResponse, 'campos')) {
                    $bodyResponse->status = Status::ERRO_VALIDACAO;
                    $mensagens = [];

                    foreach($jsonResponse->campos as $campo){
                        $mensagens[$campo->campo] = $campo->mensagem;
                    }

                    $bodyResponse->erros = $mensagens;
                }else{
                    $bodyResponse->status = Status::ERRO;
                    $bodyResponse->erros = ['erro' => data_get($jsonResponse, 'mensagem')];
                }
            }

        }else{
            $bodyResponse->status = Status::REGISTRADO;
        }

        return $bodyResponse;
    }

    /**
     * @return bool
     */
    private function __authorize()
    {
        if(empty($this->accessToken)){
            try {
                $responseOauth = $this->httpClient->post($this->oAuthUrl, [
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Basic '.base64_encode($this->clientId . ':' . $this->clientSecret)
                    ],
                    'form_params' => [
                        'scope' => 'readonly',
                        'grant_type' => 'client_credentials'
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

    /**
     * @param $parameters
     * @return mixed
     * @throws BoletoException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function registrar($parameters)
    {
        return $this->__callItau($parameters);
    }
}