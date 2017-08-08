<?php

namespace Svbk\FattureInCloud\Struct;

use ArrayAccess;
use Svbk\FattureInCloud\Date;

/**
 * Raccoglie una lista di piú oggetti 
 *
 * @package fattureincloud
 * @subpackage Collection
 * @author Brando Meniconi <b.meniconi@silverbackstudio.it>
 * @since 1.0
 */
class Collection implements ArrayAccess {

   private $elements = array();

    public function __construct( $elements ) {
        if ( is_array( $elements ) ) {
            $this->elements = $elements;
        } else {
            $this->elements = array( $elements );
        }
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->elements[] = $value;
        } else {
            $this->elements[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->elements[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->elements[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->elements[$offset]) ? $this->elements[$offset] : null;
    }
	
   /**
     * Cast object as array
     *
     * @param bool $format Format values for API
     * 
     * @return array
     */
	public function format() {
        foreach( $this->elements as &$element ) {
            $element->format();
        }
	}    	
	
}