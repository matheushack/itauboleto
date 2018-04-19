# Boleto Itaú
 
Projeto para integração com módulo de cobrança do banco Itaú.

## Instalação
### Composer
```
"matheushack/itauboleto": "^1.0"
```

## Como usar
```php
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
        'nome'=> 'Teste',
        'logradouro' => 'Rua teste',
        'cidade' => 'São Paulo',
        'uf' => 'SP',
        'cep' => '99999999'
    ],
    'moeda' => [
        'quantidade' => 100
    ]
];


try {
    $boleto = new Boleto([
        'clientId' => 'XXXXXXXX',
        'clientSecret' => 'XXXXXXXX',
        'itauKey' => 'XXXXXXXX',
        'cnpj' => 'XXXXXXXX'
    ]);

    $boletosRegistrados = $boleto->registrar($boletos);
    echo $boletosRegistrados;

}catch(\Exception $e){
    dd($e->getMessage());
}

```
##Exemples
https://github.com/matheushack/itauboleto/blob/master/examples/