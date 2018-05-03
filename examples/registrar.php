<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 18/04/18
 * Time: 11:07
 */

require '../vendor/autoload.php';

use MatheusHack\ItauBoleto\Itau;

$boletos[] = [
    'tipo_ambiente' => \MatheusHack\ItauBoleto\Constants\TipoAmbiente::TESTE,
    'tipo_carteira_titulo' => 109,
    'nosso_numero' => '50622137',
    'data_vencimento' => \Carbon\Carbon::now()->addDays(15)->format('Y-m-d'),
    'valor_cobrado' => '100,00',
    'especie' => \MatheusHack\ItauBoleto\Constants\Especie::DUPLICATA_MERCANTIL,
    'data_emissao' => \Carbon\Carbon::now()->format('Y-m-d'),
    'beneficiario' => [
        'documento_identificacao' => '09127271000187',
        'agencia' => '0189',
        'conta' => '00926',
        'digito_conta' => '9'
    ],
    'pagador' => [
        'documento_identificacao' => '09127271000187',
        'nome'=> 'Teste',
        'logradouro' => 'Rua teste',
        'cidade' => 'São Paulo',
        'uf' => 'SP',
        'cep' => '07080120'
    ],
    'titulo_aceite' => 'S',
    'tipo_pagamento' => 1,
    'juros' => [
        'tipo' => \MatheusHack\ItauBoleto\Constants\TipoJuros::ISENTO
    ],
    'multa' => [
        'tipo' => \MatheusHack\ItauBoleto\Constants\TipoMulta::ISENTO
    ],
    'grupo_desconto' => [
        'tipo' => \MatheusHack\ItauBoleto\Constants\TipoDesconto::SEM_DESCONTO
    ],
    'recebimento_divergente' => [
        'tipo_autorizacao' => '3'
    ]
];


try {
    $itau = new Itau([
        'clientId' => 'XXXXXXXXXXXX',
        'clientSecret' => 'XXXXXXXXXXXX',
        'itauKey' => 'XXXXXXXXXXXX',
        'cnpj' => 'XXXXXXXXXXXX',
        'production' => false
    ]);

    $boletosRegistrados = $itau->registrar($boletos);
    echo $boletosRegistrados;

}catch(\Exception $e){
    dd($e->getMessage());
}