<?php

namespace Svbk\FattureInCloud\Struct;

use Svbk\FattureInCloud\Date;
use Svbk\FattureInCloud\DateTime;

/**
 * Rappresenta la richiesta per i detagli di una fattura
 *
 * @package fattureincloud
 * @subpackage DocDettagliRequest
 * @author Brando Meniconi <b.meniconi@silverbackstudio.it>
 * @since 1.0
 */
class DocDettagliResponse extends Response {

    /**
     * Risultato
     *
     * @access public
     * @var bool
     */
	public $success;

    /**
     * Dettagli del documento
     *
     * @access public
     * @var DocDetailed
     */
	public $dettagli_documento;

    /**
     * Class constructor
     * 
     * @return void
     */
    public function __construct( array $properties = array() ) {
        foreach ($properties as $name => $value) {
            $this->$name = $value;
        }
        
        $this->dettagli_documento = new DocDetailed( $this->dettagli_documento );
    }

}