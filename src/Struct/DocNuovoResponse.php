<?php

namespace Svbk\FattureInCloud\Struct;

use Svbk\FattureInCloud\Date;
use Svbk\FattureInCloud\DateTime;

/**
 * Rappresenta la risposta alla creazione di un nuovo documento 
 *
 * @package fattureincloud
 * @subpackage DocNuovoResponse
 * @author Brando Meniconi <b.meniconi@silverbackstudio.it>
 * @since 1.0
 */
class DocNuovoResponse extends Response {

    /**
     * Request Success.
     *
     * @access public
     * @var boolean
     */
	public $success;

    /**
     * Identificativo del documento creato.
     *
     * @access public
     * @var number
     */
	public $new_id;

    /**
     * Identificativo permanente del documento (rimane lo stesso anche a seguito di modifiche).
     *
     * @access public
     * @var string
     */
	public $token;	
}