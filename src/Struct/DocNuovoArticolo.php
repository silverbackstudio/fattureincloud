<?php

namespace Svbk\FattureInCloud\Struct;

use Svbk\FattureInCloud\Date;
use Svbk\FattureInCloud\DateTime;

/**
 * Rappresenta la richiesta per la creazione di un nuovo articolo fattura 
 *
 * @package fattureincloud
 * @subpackage DocNuovoArticolo
 * @author Brando Meniconi <b.meniconi@silverbackstudio.it>
 * @since 1.0
 */
class DocNuovoArticolo extends Request {

    /**
     * opzionale. Identificativo del prodotto (se nullo o mancante, la 
     * registrazione non viene collegata a nessun prodotto presente nell'elenco
     * prodotti).
     *
     * @access public
     * @var string
     */
	public $id;

    /**
     * opzionale. Codice prodotto.
     *
     * @access public
     * @var string
     */
	public $codice;

    /**
     * opzionale. Nome articolo.
     *
     * @access public
     * @var string
     */
	public $nome;

    /**
     * opzionale. Unità di misura per il prodotto.
     *
     * @access public
     * @var string
     */
	public $um;

    /**
     * opzionale. Quantità di prodotto.
     *
     * @access public
     * @var double
     */
	public $quantita;

    /**
     * opzionale. Descrizione del prodotto.
     *
     * @access public
     * @var string
     */
	public $descrizione;

    /**
     * opzionale. Categoria del prodotto (utilizzata per il piano dei conti).
     *
     * @access public
     * @var string
     */
	public $categoria;

    /**
     * opzionale. Prezzo unitario netto (IVA esclusa) [Obbligatorio se 
     * prezzi_netti!=true].
     *
     * @access public
     * @var double
     */
	public $prezzo_netto;

    /**
     * opzionale. Prezzo unitario lordo (comprensivo di IVA) [Obbligatorio se 
     * prezzi_ivati=true].
     *
     * @access public
     * @var double
     */
	public $prezzo_lordo;

    /**
     * . Codice aliquota IVA (ottenibili con il parametro "lista_iva" della 
     * funzione "/info/account").
     *
     * @access public
     * @var number
     */
	public $cod_iva;

    /**
     * opzionale. Indica se l'articolo è imponibile.
     *
     * @access public
     * @var boolean
     */
	public $tassabile;

    /**
     * opzionale. Sconto (percentuale).
     *
     * @access public
     * @var double
     */
	public $sconto;

    /**
     * opzionale. Indica se a questo articolo vengono applicate ritenute e
     * contributi.
     *
     * @access public
     * @var boolean
     */
	public $applica_ra_contributi;

    /**
     * opzionale. Ordine dell'articolo nel documento (ordinamento ascendente da
     * 0 in poi).
     *
     * @access public
     * @var integer
     */
	public $ordine;

    /**
     * opzionale. Se vale 1, evidenzia in rosso l'eventuale sconto in fattura = 
     * ['0' o '1'].
     *
     * @access public
     * @var integer
     */
	public $sconto_rosso;

    /**
     * opzionale. Indica se l'articolo è incluso nel ddt (se presente un ddt 
     * allegato, altrimenti non è significativo).
     *
     * @access public
     * @var boolean
     */
	public $in_ddt;

    /**
     * opzionale. Indica se viene movimentato il magazzino (true: viene 
     * movimentato; false: non viene movimentato) [Non influente se il prodotto 
     * non è collegato all'elenco prodotti, oppure la funzionalità magazzino 
     * è disattivata].
     *
     * @access public
     * @var boolean
     */
	public $magazzino;

}