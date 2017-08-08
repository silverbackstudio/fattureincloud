<?php

namespace Svbk\FattureInCloud\Struct;

use Svbk\FattureInCloud\Date;

/**
 * Rappresenta la base per le richieste 
 *
 * @package fattureincloud
 * @subpackage Request
 * @author Brando Meniconi <b.meniconi@silverbackstudio.it>
 * @since 1.0
 */
class Request  {

    /**
     * UID connessione API
     *
     * @access public
     * @var int
     */
	public $api_uid;

    /**
     * API KEY
     * 
     * @access public
     * @var string
     */
	public $api_key;  


    public function __construct( array $properties = array() ) {
        foreach ($properties as $name => $value) {
            $this->$name = $value;
        }
    }

    public function setCredentials( $api_uid, $api_key ){
        $this->api_uid = $api_uid;
        $this->api_key = $api_key;
    }

    public function format( $values ){
        
        foreach( $values as &$value ) {
            
            if( $value instanceof Date ) {
                $value = $value->format();
                continue;
            }

            if ( $value instanceof Request ) {
                $value = $value->toArray( true );
                continue;
            }

            if ( is_array( $value ) ) {
                $value = $this->format( $value );
                continue;
            }
            
        }
        
        return $values;
    }

   /**
     * Cast object as array
     *
     * @param bool $format Format values for API
     * 
     * @return array
     */
	public function toArray( $format = true ) {
	    
	    $values = get_object_vars( $this );
	    
	    if( !$format ) {
	        return $values;
	    }
	    
	    $values = $this->format( $values );
	   
	    return $values;
	}    
	
}