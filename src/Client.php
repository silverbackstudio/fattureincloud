<?php

namespace Svbk\FattureInCloud;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Psr\Log\LogLevel;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;

class Client {

	protected $logger;
    protected $api_uid;
    protected $api_key;

	public static $api_endpoint = 'https://api.fattureincloud.it/v1/';
	
	public $http_client;

    const TYPE_FATTURA = 'fatture';
    const TYPE_PROFORMA = 'proforma';
    const TYPE_ORDINE = 'ordini';
    const TYPE_PREVENTIVO = 'preventivi';
    const TYPE_NOTE_DI_CREDITO = 'ndc';
    const TYPE_RICEVUTA = 'ricevute';
    const TYPE_DDT = 'ddt';
    const TYPE_RAPPORTO = 'rapporti';
    const TYPE_ORDINE_FORNITORE = 'ordform';

	public function __construct( $uid, $apikey ) {
	    $this->api_uid = $uid;
	    $this->api_key = $apikey;
	    
		$this->logger = new NullLogger;
		$this->http_client = new HttpClient( [
            'base_uri' => self::$api_endpoint,
            'timeout'  => 5,
        ]);
	}

	public function setLogger( LoggerInterface $logger ) {
		$this->logger = $logger;
	}

    public function get( $type, $id ) {
        return $this->call( $type . '/dettagli', $args );
    }

    public function createDoc( $type, Struct\DocNuovoRequest $doc ) {
        
        $response = $this->call( $type . '/nuovo', $doc );
        
        if ( $response !== false ) {
            return new Struct\DocNuovoResponse( json_decode($response->getBody(), true) );
        }
        
        return false;
    }
    
    public function getDettagliDoc( $type, Struct\DocDettagliRequest $request ) {
        
        $response = $this->call( $type . '/dettagli', $request );
        
        if ( $response !== false ) {
            $dettagliResponse = new Struct\DocDettagliResponse( json_decode($response->getBody(), true) );
            $dettagliResponse->dettagli_documento = new Struct\DocDetailed( $dettagliResponse->dettagli_documento );
            return $dettagliResponse;
        }
        
        return false;
    }    
    
    public function getInfoList( array $campi ) {
        
        $request = new Struct\InfoListaRequest( array(
            'campi' => $campi,
        ) );
        
        $response = $this->call( 'info/account', $request );
        
        if ( $response !== false ) {
            return new Struct\InfoListaResponse( json_decode($response->getBody(), true) );
        }
        
        return false;
    }    

    protected function call( $uri, Struct\Request $request, $method = 'POST' ) {

        $request->setCredentials( $this->api_uid, $this->api_key );

        $final_request = array(
            'json' => $request->toArray( true ),
        );
        
        try {
            
            $response = $this->http_client->request( $method, $uri, $final_request );
            
            $this->logger->info( 'SUCCESSFUL REQUEST ( ' . $uri . ' )  ', array( 'response' => $response->getBody() ) );            
            
        } catch ( RequestException $e ) {

            $this->logger->critical( 'FATTUREINCLOUD REQUEST ERROR ( ' . $uri . ' ): ' . $e->getMessage(), 
                array( 
                    'exception' => $e,
                ) 
            );
            
            return false;
        }
        
        return $response;
    }

}
