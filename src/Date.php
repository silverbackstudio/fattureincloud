<?php

namespace Svbk\FattureInCloud;

use DateTimeImmutable;

class Date extends DateTimeImmutable { 

    const FORMAT = 'd/m/Y';

    static public function createFromFormat($format, $time, $timezone = null) {
        return new static();
    }
    
    static public function createFromMutable( $datetime ) {
        return new static();
    }    

    public function format( $format = null ) {
        return parent::format( self::FORMAT );
    }
    
}