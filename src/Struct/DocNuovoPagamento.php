<?php

namespace Svbk\FattureInCloud\Struct;

use Svbk\FattureInCloud\Date;
use Svbk\FattureInCloud\DateTime;

/**
 * Rappresenta la risposta alla creazione di un nuovo documento 
 *
 * @package fattureincloud
 * @subpackage DocNuovoPagamento
 * @author Brando Meniconi <b.meniconi@silverbackstudio.it>
 * @since 1.0
 */
class DocNuovoPagamento extends Request {

    /**
     * Data di scadenza del pagamento.
     *
     * @access public
     * @var date
     */
	public $data_scadenza;

    /**
     * Importo del pagamento (se vale 0 la tranche di pagamento non viene inserita; se vale "auto" e la tranche è una sola viene completato automaticamente).
     *
     * @access public
     * @var string
     */
	public $importo;

    /**
     * Medodo di pagamento = ['not' o 'rev' o il nome del conto] ('not' indica che non è stato saldato, 'rev' che è stato stornato; se non esiste un conto con il nome specificato viene creato un nuovo conto in FIC).
     *
     * @access public
     * @var string
     */
	public $metodo = 'not';

    /**
     * opzionale. Data del saldo dell'importo indicato [Obbligatorio se metodo!="not"].
     *
     * @access public
     * @var date
     */
	public $data_saldo;
    
}