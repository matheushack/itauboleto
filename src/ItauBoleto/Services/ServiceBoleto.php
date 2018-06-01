<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 14:09
 */

namespace MatheusHack\ItauBoleto\Services;

use Carbon\Carbon;
use MatheusHack\ItauBoleto\Requests\DadosComplementaresRequest;
use mikehaertl\tmp\File;
use NovoBoletoPHP\BoletoFactory;
use MatheusHack\ItauBoleto\ItauClient;
use MatheusHack\ItauBoleto\Helpers\Boleto;
use MatheusHack\ItauBoleto\Exceptions\BoletoException;
use MatheusHack\ItauBoleto\Factories\BoletoRequestFactory;
use MatheusHack\ItauBoleto\Factories\BoletoResponseFactory;

/**
 * Class ServiceBoleto
 * @package MatheusHack\ItauBoleto\Services
 */
class ServiceBoleto
{
    /**
     * @var ItauClient
     */
    private $itauClient;

    /**
     * ServiceBoleto constructor.
     * @param array $config
     */
    function __construct(array $config)
    {
        $this->itauClient = new ItauClient($config);
    }

    /**
     * @param array $boletos
     * @param DadosComplementaresRequest $dadosComplementares
     * @return array
     * @throws BoletoException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function registrar(array $boletos, DadosComplementaresRequest $dadosComplementares)
    {
        $boletRequestFactory = new BoletoRequestFactory();

        foreach($boletos as $boleto) {
            $request = $boletRequestFactory->make($boleto);
            $response[] = $this->itauClient->registrar($request);
        }

        if(!empty($response)) {
            $boletoResponseFactory = new BoletoResponseFactory($response, $dadosComplementares);
            $boletoResponse = $boletoResponseFactory->make();

            return $boletoResponse->getBoletos();
        }

        throw new BoletoException('Não foi possível registrar os boletos');
    }

    /**
     * @param array $boleto
     * @param $logoEmpresa
     * @param $cachePath
     * @return null|string
     */
    public function printHtml(array $boleto, $logoEmpresa, $cachePath)
    {
        try {
            $factory = new BoletoFactory([
                'cachePath' => $cachePath,
                'imageUrl' => realpath(dirname(__FILE__)."/../../resources/images")
            ]);

            $dados = [
                'nosso_numero' => substr($boleto['nossoNumero'], 0,8),
                'numero_documento' => substr($boleto['id'], 0,8),
                'data_vencimento' => Carbon::parse($boleto['dataVencimento'])->format('d/m/Y'),
                'data_documento' => Carbon::parse($boleto['dataEmissao'])->format('d/m/Y'),
                'data_processamento' => Carbon::parse($boleto['dataProcessamento'])->format('d/m/Y'),
                'valor_boleto' => number_format($boleto['valor'], 2, ',', ''),
                'carteira' => $boleto['tipoCarteira'],
                'especie_doc' => $boleto['especie'],
                'sacado' => $boleto['pagador']->nome_razao_social_pagador,
                'sacado_tipo_documento' => 'CNPJ',
                'sacado_documento' => $boleto['pagador']->cpf_cnpj_pagador,
                'endereco1' => $boleto['pagador']->logradouro_pagador.','.$boleto['pagador']->complemento_pagador.','.$boleto['pagador']->bairro_pagador,
                'endereco2' => $boleto['pagador']->cidade_pagador.' - '.$boleto['pagador']->uf_pagador.' - CEP '.$boleto['pagador']->cep_pagador,
                'demonstrativo1' => $boleto['demonstrativo'],
                'instrucoes1' => array_shift($boleto['textoInformacaoClienteBeneficiario']),
                'instrucoes2' => array_shift($boleto['textoInformacaoClienteBeneficiario']),
                'instrucoes3' => array_shift($boleto['textoInformacaoClienteBeneficiario']),
                'instrucoes4' => implode(', ', $boleto['textoInformacaoClienteBeneficiario']),
                'aceite' => 'N',
                'especie' => 'R$',
                'agencia' => $boleto['beneficiario']->agencia_beneficiario,
                'conta' => $boleto['beneficiario']->conta_beneficiario,
                'conta_dv' => $boleto['beneficiario']->digito_verificador_conta_beneficiario,
                'identificacao' => $boleto['beneficiario']->nome_razao_social_beneficiario,
                'cpf_cnpj' => Boleto::formatCnpj($boleto['beneficiario']->cpf_cnpj_beneficiario),
                'endereco' => $boleto['beneficiario']->logradouro_beneficiario.','.$boleto['beneficiario']->complemento_beneficiario.','.$boleto['beneficiario']->bairro_beneficiario,
                'cidade_uf' => $boleto['beneficiario']->cidade_beneficiario.'-'.$boleto['beneficiario']->uf_beneficiario,
                'cedente' => $boleto['beneficiario']->nome_razao_social_beneficiario,
                'logo_empresa' => $logoEmpresa,
            ];

            $html = $factory->makeBoletoAsHTML(BoletoFactory::ITAU, $dados);
            $file = new File($html, '.html');
            $file->delete = false;

            return $file->getFileName();
        }catch(\Exception $e){
            return null;
        }
    }

    /**
     * @param array $boleto
     * @param $logoEmpresa
     * @param $cachePath
     * @return null|string
     */
    public function printPdf(array $boleto, $logoEmpresa, $cachePath)
    {
        try {
            $factory = new BoletoFactory([
                'cachePath' => $cachePath,
                'imageUrl' => realpath(dirname(__FILE__)."/../../resources/images")
            ]);

            $dados = [
                'nosso_numero' => substr($boleto['nossoNumero'], 0,8),
                'numero_documento' => substr($boleto['id'], 0,8),
                'data_vencimento' => Carbon::parse($boleto['dataVencimento'])->format('d/m/Y'),
                'data_documento' => Carbon::parse($boleto['dataEmissao'])->format('d/m/Y'),
                'data_processamento' => Carbon::parse($boleto['dataProcessamento'])->format('d/m/Y'),
                'valor_boleto' => number_format($boleto['valor'], 2, ',', ''),
                'carteira' => $boleto['tipoCarteira'],
                'especie_doc' => $boleto['especie'],
                'sacado' => $boleto['pagador']->nome_razao_social_pagador,
                'sacado_tipo_documento' => 'CNPJ',
                'sacado_documento' => $boleto['pagador']->cpf_cnpj_pagador,
                'endereco1' => $boleto['pagador']->logradouro_pagador.','.$boleto['pagador']->complemento_pagador.','.$boleto['pagador']->bairro_pagador,
                'endereco2' => $boleto['pagador']->cidade_pagador.' - '.$boleto['pagador']->uf_pagador.' - CEP '.$boleto['pagador']->cep_pagador,
                'demonstrativo1' => $boleto['demonstrativo'],
                'instrucoes1' => array_shift($boleto['textoInformacaoClienteBeneficiario']),
                'instrucoes2' => array_shift($boleto['textoInformacaoClienteBeneficiario']),
                'instrucoes3' => array_shift($boleto['textoInformacaoClienteBeneficiario']),
                'instrucoes4' => implode(', ', $boleto['textoInformacaoClienteBeneficiario']),
                'aceite' => 'N',
                'especie' => 'R$',
                'agencia' => $boleto['beneficiario']->agencia_beneficiario,
                'conta' => $boleto['beneficiario']->conta_beneficiario,
                'conta_dv' => $boleto['beneficiario']->digito_verificador_conta_beneficiario,
                'identificacao' => $boleto['beneficiario']->nome_razao_social_beneficiario,
                'cpf_cnpj' => Boleto::formatCnpj($boleto['beneficiario']->cpf_cnpj_beneficiario),
                'endereco' => $boleto['beneficiario']->logradouro_beneficiario.','.$boleto['beneficiario']->complemento_beneficiario.','.$boleto['beneficiario']->bairro_beneficiario,
                'cidade_uf' => $boleto['beneficiario']->cidade_beneficiario.'-'.$boleto['beneficiario']->uf_beneficiario,
                'cedente' => $boleto['beneficiario']->nome_razao_social_beneficiario,
                'codigo_barras' => $boleto['codigoBarras'],
                'linha_digitavel' => $boleto['linhaDigitavel'],
                'logo_empresa' => $logoEmpresa,
            ];

            $pdf = $factory->makeBoletoAsPDF(BoletoFactory::ITAU, $dados);
            $file = new File($pdf, '.pdf');
            $file->delete = false;

            return $file->getFileName();
        }catch(\Exception $e){
            return null;
        }
    }
}