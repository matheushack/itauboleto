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
use MatheusHack\ItauBoleto\Constants\Layout;
use MatheusHack\ItauBoleto\Services\ServiceBoleto;
use MatheusHack\ItauBoleto\Response\BoletoResponse;

/**
 * Class BoletoTransformer
 * @package MatheusHack\ItauBoleto\Transformers
 */
class BoletoTransformer extends Fractal\TransformerAbstract
{
    /**
     * @var mixed
     */
    private $logo;

    /**
     * @var mixed
     */
    private $cachePath;

    /**
     * @var ServiceBoleto
     */
    private $serviceBoleto;

    /**
     * BoletoTransformer constructor.
     * @param array $config
     */
    function __construct(array $config)
    {
        $this->print = data_get($config, 'print', 'none');
        $this->logo = data_get($config,'logo', 'http://placehold.it/200&text=logo');
        $this->cachePath = data_get($config,'cachePath', false);
        $this->imagesPath = data_get($config, 'images', '/');
        $this->serviceBoleto = new ServiceBoleto($config);

    }

    /**
     * @param BoletoResponse $boleto
     * @return array
     */
    public function transform(BoletoResponse $boleto)
    {
        $print = null;

        $transform = [
            'id' => $boleto->getNossoNumero(),
            'beneficiario' => $boleto->getBeneficiario(),
            'pagador' => $boleto->getPagador(),
            'sacadorAvalista' => $boleto->getSacadorAvalista(),
            'moeda' => $boleto->getMoeda(),
            'tipoCarteira' => $boleto->getTipoCarteira(),
            'nossoNumero' => $boleto->getNossoNumero(),
            'seuNumero' => $boleto->getSeuNumero(),
            'especie' => $boleto->getEspecie(),
            'codigoBarras' => $boleto->getCodigoBarras(),
            'linhaDigitavel' => $boleto->getLinhaDigitavel(),
            'localPagamento' => $boleto->getLocalPagamento(),
            'dataVencimento' => $boleto->getVencimento(),
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
            'demonstrativo' => $boleto->getDesmonstrativo(),
            'registrado' => ($boleto->getStatus() == Status::REGISTRADO ? true : false),
            'erros' => $boleto->getErros()
        ];

        if($boleto->getStatus() == Status::REGISTRADO && $this->print != Layout::NONE) {
            if ($this->print == 'pdf')
                $print = $this->serviceBoleto->printPdf($transform, $this->logo, $this->cachePath, $this->imagesPath);
            else
                $print = $this->serviceBoleto->printHtml($transform, $this->logo, $this->cachePath, $this->imagesPath);
        }

        return $transform + [
            'file' => $print
        ];
    }
}