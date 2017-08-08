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
class Response {

    /**
     * Error Description
     *
     * @access public
     * @var string
     */
	public $error;

    /**
     * Error code
     * 
     * @access public
     * @var int
     */
	public $error_code;    

    public function __construct( array $properties = array() ) {
        foreach ($properties as $name => $value) {
            $this->$name = $value;
        }
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
	    
        foreach( $values as &$value ){
            
            if( ( $value instanceof Date )  ) {
                $value = $value->format();
            }
            
        }
	    
	    return $values;
	    
	}
}