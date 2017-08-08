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
class DocDettagliRequest extends Request {

    /**
     * Identificativo univoco del documento
     *
     * @access public
     * @var string
     */
	public $id;

    /**
     * Identificativo permanente del documento (utilizzato per identificare il
     * documento solo se manca il parametro "id")
     *
     * @access public
     * @var string
     */
	public $token;

}