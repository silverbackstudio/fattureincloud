<?php

namespace Svbk\FattureInCloud\Struct;

use Svbk\FattureInCloud\Date;
use Svbk\FattureInCloud\DateTime;

/**
 * Rappresenta la richiesta per la creazione di un nuovo articolo fattura 
 *
 * @package fattureincloud
 * @subpackage InfoListaRequest
 * @author Brando Meniconi <b.meniconi@silverbackstudio.it>
 * @since 1.0
 */
class InfoListaRequest extends Request {

    /**
     * Lista delle informazioni desiderate.
     *
     * @access public
     * @var array
     */
	public $campi;

}
