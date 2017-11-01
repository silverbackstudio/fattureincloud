# PHP API for FattureInCloud.it 

Classes are keep updated with the Documentation at https://api.fattureincloud.it/v1/documentation/dist/ 

You can find your KEYS at https://secure.fattureincloud.it/api

## Available API Objects

Each API Method found in the API doc has its Class, here is a list of the currently available ones:

* [Svbk\FattureInCloud\Struct\DocDettagliRequest](https://github.com/silverbackstudio/fattureincloud/blob/master/src/Struct/DocDettagliRequest.php)
* [Svbk\FattureInCloud\Struct\DocDettagliResponse](https://github.com/silverbackstudio/fattureincloud/blob/master/src/Struct/DocDettagliResponse.php)
* [Svbk\FattureInCloud\Struct\DocNuovoArticolo](https://github.com/silverbackstudio/fattureincloud/blob/master/src/Struct/DocNuovoArticolo.php)
* [Svbk\FattureInCloud\Struct\DocNuovoPagamento](https://github.com/silverbackstudio/fattureincloud/blob/master/src/Struct/DocNuovoPagamento.php)
* [Svbk\FattureInCloud\Struct\DocNuovoRequest](https://github.com/silverbackstudio/fattureincloud/blob/master/src/Struct/DocNuovoRequest.php)
* [Svbk\FattureInCloud\Struct\DocNuovoResponse](https://github.com/silverbackstudio/fattureincloud/blob/master/src/Struct/DocNuovoResponse.php)
* [Svbk\FattureInCloud\Struct\InfoListaRequest](https://github.com/silverbackstudio/fattureincloud/blob/master/src/Struct/InfoListaRequest.php)
* [Svbk\FattureInCloud\Struct\InfoListaResponse](https://github.com/silverbackstudio/fattureincloud/blob/master/src/Struct/InfoListaResponse.php)

more will be available as soon as we have time to map it. Make a PR if you need a missing one. 

## Usage

### Create a simple invoice

```php
use Svbk\FattureInCloud;
use Svbk\FattureInCloud\Struct\DocNuovoArticolo as Product;
use Svbk\FattureInCloud\Struct\DocNuovoRequest as Invoice;
use Svbk\FattureInCloud\Struct\DocNuovoPagamento as Payment;

$client = new FattureInCloud\Client( 'API_UID', 'API_KEY' );

$invoiceProduct = new Product(
  array(
    'nome' => 'Product Name',
    'prezzo_lordo' => 10,
    'cod_iva' => 0,
  )
);

$payment_date = FattureInCloud\Date::createFromFormat( 'Y-m-d H:i:s', date('Y-m-d H:i:s') ); //now
$expire_date = $payment_date;

$invoicePayment = new Payment(
  array(
    'data_scadenza' => $expire_date,
    'importo' => 'auto', //calculate invoice total automatically
    'metodo' => '{{wallet_id}}', //place here your wallet identifier
    'data_saldo' => $payment_date,
  )
);

$newInvoice = new Invoice( 
  array(
    // New Customer will be created by passing details directly.
    'nome' => 'Customer Name',
    'indirizzo_via' => 'Customer Address',
    'indirizzo_cap' => '50000',  //Postal Code
    'indirizzo_citta' => 'Customer City',
    'indirizzo_provincia' => 'Customer State/Province',
    'piva' => 'VATID000000', //vat ID
    'cf' => 'FISCALCODEXXXXX',
    'paese' => 'Customer Country', //must be obtained via $client->getInfoList( array( 'lista_paesi' ) );
    'lista_articoli' => array( $invoiceProduct ),
    'lista_pagamenti' => array( $invoicePayment ),
    'prezzi_ivati' => true, // VAT included
  )
);

$result = $client->createDoc( FattureInCloud\Client::TYPE_FATTURA, $newInvoice );

if ( $result && ! $result->error ) {
  $invoice_id = $result->new_id;
} else {
  die( sprintf( '[FattureInCloud] Can\'t create invoice. Error: %s', isset($result->error) ? $result->error : '' ) );	
}

```

