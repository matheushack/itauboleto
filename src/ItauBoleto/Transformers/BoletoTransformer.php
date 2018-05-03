<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 14:39
 */

namespace MatheusHack\ItauBoleto\Transformers;

use League\Fractal;
use MatheusHack\ItauBoleto\Constants\Status;
use MatheusHack\ItauBoleto\Response\BoletoResponse;

class BoletoTransformer extends Fractal\TransformerAbstract
{
    public function transform(BoletoResponse $boleto)
    {
        return [
            'id' => $boleto->getNossoNumero(),
            'beneficiario' => $boleto->getBeneficiario(),
            'pagador' => $boleto->getPagador(),
            'sacadorAvalista' => $boleto->getSacadorAvalista(),
            'moeda' => $boleto->getMoeda(),
            'vencimento' => $boleto->getVencimento(),
            'tipoCarteira' => $boleto->getTipoCarteira(),
            'nossoNumero' => $boleto->getNossoNumero(),
            'seuNumero' => $boleto->getSeuNumero(),
            'especie' => $boleto->getEspecie(),
            'codigoBarras' => $boleto->getCodigoBarras(),
            'linhaDigitavel' => $boleto->getLinhaDigitavel(),
            'localPagamento' => $boleto->getLocalPagamento(),
            'dataProcessamento' => $boleto->getDataProcessamento(),
            'dataEmissao' => $boleto->getDataEmissao(),
            'usoBanco' => $boleto->getUsoBanco(),
            'valor' => $boleto->getValor(),
            'desconto' => $boleto->getDesconto(),
            'outraDeducao' => $boleto->getOutraDeducao(),
            'juroMulta' => $boleto->getJuroMulta(),
            'outroAcrescimo' => $boleto->getOutroAcrescimo(),
            'totalCobrado' => $boleto->getTotalCobrado(),
            'textoInformacaoClienteBeneficiario' => $boleto->getTextoInformacaoClienteBeneficiario(),
            'registrado' => ($boleto->getStatus() == Status::REGISTRADO ? true : false),
            'erros' => $boleto->getErros()
        ];
    }
}