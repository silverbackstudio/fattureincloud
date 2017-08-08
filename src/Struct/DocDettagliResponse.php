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

}