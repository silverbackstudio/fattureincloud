<?php

namespace Svbk\FattureInCloud\Struct;

use Svbk\FattureInCloud\Date;
use Svbk\FattureInCloud\DateTime;

/**
 * Rappresenta la richiesta per la creazione di un nuovo articolo fattura 
 *
 * @package fattureincloud
 * @subpackage InfoListaResponse
 * @author Brando Meniconi <b.meniconi@silverbackstudio.it>
 * @since 1.0
 */
class InfoListaResponse extends Response {

    /**
     * Request Success.
     *
     * @access public
     * @var boolean
     */
	public $success;

    /**
     * opzionale. Nome o ragione sociale dell'azienda.
     *
     * @access public
     * @var string
     */
	public $nome;

    /**
     * opzionale. Numero di giorni rimanenti per la licenza attiva.
     *
     * @access public
     * @var integer
     */
	public $durata_licenza;

    /**
     * opzionale. Tipo di licenza attiva = ['prova' o 'standard' o 'premium'].
     *
     * @access public
     * @var string
     */
	public $tipo_licenza;

    /**
     * opzionale. Lista delle valute supportate.
     *
     * @access public
     * @var InfoValuta[]
     */
	public $lista_valute;

    /**
     * opzionale. Lista delle aliquote iva.
     *
     * @access public
     * @var InfoIva[]
     */
	public $lista_iva;

    /**
     * opzionale. (Array) Lista delle nazioni supportate per la fatturazione.
     *
     * @access public
     * @var string
     */
	public $lista_paesi;

    /**
     * opzionale. Lista dei template dei documenti (fatture, ordini, preventivi, ricevute, ndc, proforma).
     *
     * @access public
     * @var InfoTemplate[]
     */
	public $lista_template;

    /**
     * opzionale. Lista dei template dei DDT.
     *
     * @access public
     * @var InfoTemplate[]
     */
	public $lista_template_ddt;

    /**
     * opzionale. Lista dei template delle fatture accompagnatorie.
     *
     * @access public
     * @var InfoTemplate[]
     */
	public $lista_template_ddt_ftacc;

    /**
     * opzionale. Lista dei conti.
     *
     * @access public
     * @var InfoConto[]
     */
	public $lista_conti;
	
    /**
     * opzionale. Lista dei metodi di pagamento.
     *
     * @access public
     * @var InfoMetodo[]
     */
	public $lista_metodi_pagamento;

}
