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

use Carbon\Carbon;
use MatheusHack\ItauBoleto\Itau;
use MatheusHack\ItauBoleto\Constants\Especie;

$boletos[] = [
    'tipo_carteira_titulo' => 109,
    'nosso_numero' => 'XXXXXXX',
    'data_vencimento' => Carbon::now()->addDays(15)->format('Y-m-d'),
    'valor_cobrado' => '100,00',
    'especie' => Especie::DUPLICATA_MERCANTIL,
    'data_emissao' => Carbon::now()->format('Y-m-d'),
    'beneficiario' => [
        'documento_identificacao' => 'XXXXXXXXXXXXXX',
        'agencia' => 'XXXX',
        'conta' => 'XXXXXXX',
        'digito_conta' => 'X'
    ],
    'pagador' => [
        'documento_identificacao' => 'XXXXXXXXXXXXXX',
        'nome'=> 'Teste',
        'logradouro' => 'Rua teste',
        'cidade' => 'São Paulo',
        'uf' => 'SP',
        'cep' => 'XXXXXXXX'
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

```
##Exemplos
https://github.com/matheushack/itauboleto/tree/master/examples