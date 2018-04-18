<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:07
 */

require '../vendor/autoload.php';

use MatheusHack\ItauBoleto\Boleto;

$boletos[] = [
    'tipo_ambiente' => \MatheusHack\ItauBoleto\Constants\TipoAmbiente::TESTE,
    'tipo_carteira_titulo' => 109,
    'nosso_numero' => 1,
    'digito_verificador_nosso_numero' => 2,
    'data_vencimento' => \Carbon\Carbon::now()->addDays(15)->format('Y-m-d'),
    'valor_cobrado' => 100,
    'especie' => \MatheusHack\ItauBoleto\Constants\Especie::DUPLICATA_MERCANTIL,
    'data_emissao' => \Carbon\Carbon::now()->format('Y-m-d'),
    'beneficiario' => [
        'documento_identificacao' => '',
        'agencia' => '1',
        'conta' => '2',
        'digito_conta' => '0'
    ],
    'pagador' => [
        'documento_identificacao' => '',
        'nome'=> 'Matheus',
        'logradouro' => 'Rua teste',
        'cidade' => 'São Paulo',
        'uf' => 'SP',
        'cep' => '07080120'
    ],
    'moeda' => [
        'quantidade' => 100
    ]
];

$boleto = new Boleto();

try {
    $boletosRegistrados = $boleto->registrar($boletos);
    dd($boletosRegistrados);
}catch(\Exception $e){
    dd($e->getMessage());
}