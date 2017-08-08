<?php

namespace Svbk\FattureInCloud\Struct;

use Svbk\FattureInCloud\Date;
use Svbk\FattureInCloud\DateTime;

/**
 * Rappresenta i dettagli di una fattura 
 *
 * @package fattureincloud
 * @subpackage DocDetailed
 * @author Brando Meniconi <b.meniconi@silverbackstudio.it>
 * @since 1.0
 */
class DocDetailed extends Response {

    /**
     * Identificativo univoco del documento.
     *
     * @access public
     * @var string
     */
	public $id;

    /**
     * Identificativo permanente del documento (rimane lo stesso anche a seguito di modiifche).
     *
     * @access public
     * @var string
     */
	public $token;

    /**
     * Tipologia del documento = ['fatture' o 'proforma' o 'ordini' o 'preventivi' o 'ndc'].
     *
     * @access public
     * @var string
     */
	public $tipo;

    /**
     * Opzionale. Identificativo univoco del cliente (se nullo, il cliente non è presente nell'anagrafica) [solo con tipo!="ordforn"].
     *
     * @access public
     * @var string
     */
	public $id_cliente;

    /**
     * Opzionale. Identificativo univoco del fornitore (se nullo, il fornitore non è presente nell'anagrafica) [solo con tipo="ordforn"].
     *
     * @access public
     * @var string
     */
	public $id_fornitore;

    /**
     * Nome o ragione sociale del cliente/fornitore.
     *
     * @access public
     * @var string
     */
	public $nome;

    /**
     * Indirizzo del cliente.
     *
     * @access public
     * @var string
     */
	public $indirizzo_via;

    /**
     * CAP del cliente/fornitore.
     *
     * @access public
     * @var string
     */
	public $indirizzo_cap;

    /**
     * Città (comune) del cliente/fornitore.
     *
     * @access public
     * @var string
     */
	public $indirizzo_citta;

    /**
     * Provincia del cliente/fornitore.
     *
     * @access public
     * @var string
     */
	public $indirizzo_provincia;

    /**
     * Opzionale. Note extra sull'indirizzo.
     *
     * @access public
     * @var string
     */
	public $indirizzo_extra;

    /**
     * Paese (nazionalità) del cliente/fornitore.
     *
     * @access public
     * @var string
     */
	public $paese;

    /**
     * Opzionale. Lingua del documento (sigla) = ['it' o 'en' o 'de'].
     *
     * @access public
     * @var string
     */
	public $lingua;

    /**
     * Partita IVA cliente/fornitore.
     *
     * @access public
     * @var string
     */
	public $piva;

    /**
     * Codice fiscale cliente/fornitore.
     *
     * @access public
     * @var string
     */
	public $cf;

    /**
     * Numero (e serie) del documento.
     *
     * @access public
     * @var string
     */
	public $numero;

    /**
     * Data di emissione del documento.
     *
     * @access public
     * @var date
     */
	public $data;

    /**
     * Opzionale. [Non presente in preventivi e ddt] Indica la scadenza del prossimo pagamento (vale 00/00/0000 nel caso in cui tutti i pagamenti siano saldati).
     *
     * @access public
     * @var date
     */
	public $prossima_scadenza;

    /**
     * Valuta del documento e degli importi indicati.
     *
     * @access public
     * @var string
     */
	public $valuta;

    /**
     * Tasso di cambio EUR/{valuta}.
     *
     * @access public
     * @var double
     */
	public $valuta_cambio;

    /**
     * Specifica se i prezzi da utilizzare per il calcolo del totale sono quelli netti, oppure quello lordi, comprensivi di iva.
     *
     * @access public
     * @var boolean
     */
	public $prezzi_ivati;

    /**
     * Importo netto del documento (competenze).
     *
     * @access public
     * @var double
     */
	public $importo_netto;

    /**
     * Importo dell'IVA del documento.
     *
     * @access public
     * @var double
     */
	public $importo_iva;

    /**
     * Importo lordo del documento (totale da pagare).
     *
     * @access public
     * @var double
     */
	public $importo_totale;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Percentuale rivalsa INPS.
     *
     * @access public
     * @var double
     */
	public $rivalsa;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Importo rivalsa INPS.
     *
     * @access public
     * @var double
     */
	public $importo_rivalsa;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Percentuale cassa previdenziale.
     *
     * @access public
     * @var double
     */
	public $cassa;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Importo cassa previdenziale.
     *
     * @access public
     * @var double
     */
	public $importo_cassa;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Percentuale ritenuta d'acconto.
     *
     * @access public
     * @var double
     */
	public $rit_acconto;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Imponibile della ritenuta d'acconto (percentuale sul totale).
     *
     * @access public
     * @var double
     */
	public $imponibile_ritenuta;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Importo ritenuta d'acconto.
     *
     * @access public
     * @var double
     */
	public $importo_rit_acconto;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Percentuale altra ritenuta (ritenuta previdenziale, Enasarco etc.).
     *
     * @access public
     * @var double
     */
	public $rit_altra;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Importo altra ritenuta (ritenuta previdenziale, Enasarco etc.).
     *
     * @access public
     * @var double
     */
	public $importo_rit_altra;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Valore della marca da bollo (0 se non presente).
     *
     * @access public
     * @var double
     */
	public $marca_bollo;

    /**
     * Opzionale. [Non presente in ddt] Oggetto mostrato sul documento (precedentemente "oggetto_fattura").
     *
     * @access public
     * @var string
     */
	public $oggetto_visibile;

    /**
     * Opzionale. [Non presente in ddt] Oggetto (per organizzazione interna).
     *
     * @access public
     * @var string
     */
	public $oggetto_interno;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Centro ricavo.
     *
     * @access public
     * @var string
     */
	public $centro_ricavo;

    /**
     * Opzionale. [Solo in ordforn] Centro di costo.
     *
     * @access public
     * @var string
     */
	public $centro_costo;

    /**
     * Opzionale. [Non presente in ddt] Note (in formato HTML).
     *
     * @access public
     * @var string
     */
	public $note;

    /**
     * Opzionale. [Non presente in ddt] Nasconde o mostra la scadenza sul documento.
     *
     * @access public
     * @var boolean
     */
	public $nascondi_scadenza;

    /**
     * Opzionale. [Non presente in ndc e ordforn] Indica la presenza di un DDT incluso nel documento (per i ddt è sempre true).
     *
     * @access public
     * @var boolean
     */
	public $ddt;

    /**
     * Opzionale. [Solo se tipo=fatture] Indica la presenza di una fattura accompagnatoria inclusa nel documento.
     *
     * @access public
     * @var boolean
     */
	public $ftacc;

    /**
     * Opzionale. [Solo se tipo!=ddt] Identificativo del template del documento.
     *
     * @access public
     * @var string
     */
	public $id_template;

    /**
     * Opzionale. [Solo se ddt=true] Identificativo del template del ddt.
     *
     * @access public
     * @var string
     */
	public $ddt_id_template;

    /**
     * Opzionale. [Solo se ftacc=true] Identificativo del template della fattura accompagnatoria.
     *
     * @access public
     * @var string
     */
	public $ftacc_id_template;

    /**
     * Opzionale. [Non presente in ddt e ndc] Mostra o meno le informazioni sul metodo di pagamento sul documento.
     *
     * @access public
     * @var boolean
     */
	public $mostra_info_pagamento;

    /**
     * Opzionale. [Solo se mostra_info_pagamento=true] Nome del metodo di pagamento.
     *
     * @access public
     * @var string
     */
	public $metodo_pagamento;

    /**
     * Opzionale. [Solo se mostra_info_pagamento=true] Titolo della riga N del metodo di pagamento (N da 1 a 5).
     *
     * @access public
     * @var string
     */
	public $metodo_titoloN;

    /**
     * Opzionale. [Solo se mostra_info_pagamento=true] Descrizione della riga N del metodo di pagamento (N da 1 a 5).
     *
     * @access public
     * @var string
     */
	public $metodo_descN;

    /**
     * Opzionale. [Solo per preventivi, rapporti e ordforn] Nasconde o mostra la scadenza sul documento = ['tutti' o 'netto' o 'nessuno'].
     *
     * @access public
     * @var string
     */
	public $mostra_totali;

    /**
     * Opzionale. [Solo per ricevute, fatture, proforma, ordini] Mostra il bottone "Paga con Paypal".
     *
     * @access public
     * @var boolean
     */
	public $mostra_bottone_paypal;

    /**
     * Opzionale. [Solo per ricevute, fatture, proforma, ordini] Mostra il bottone "Paga con Bonifico Immediato".
     *
     * @access public
     * @var boolean
     */
	public $mostra_bottone_bonifico;

    /**
     * Opzionale. [Solo per ricevute, fatture, proforma, ordini] Mostra il bottone "Notifica pagamento effettuato".
     *
     * @access public
     * @var boolean
     */
	public $mostra_bottone_notifica;

    /**
     * Lista degli articoli/righe del documento.
     *
     * @access public
     * @var Array[DocArticolo]
     */
	public $lista_articoli;

    /**
     * Opzionale. [Non presente in preventivi, ddt e ordforn] Lista delle tranches di pagamento.
     *
     * @access public
     * @var Array[DocPagamento]
     */
	public $lista_pagamenti;

    /**
     * Opzionale. [Se ddt=true] Numero del ddt (se tipo="ddt" corrisponde al campo "numero").
     *
     * @access public
     * @var string
     */
	public $ddt_numero;

    /**
     * Opzionale. [Se ddt=true] Data del ddt Numero del ddt (se tipo="ddt" corrisponde al campo "data").
     *
     * @access public
     * @var date
     */
	public $ddt_data;

    /**
     * Opzionale. [Se ddt/ftacc=true] Numero di colli specificato nel ddt.
     *
     * @access public
     * @var string
     */
	public $ddt_colli;

    /**
     * Opzionale. [Se ddt/ftacc=true] Peso specificato nel ddt.
     *
     * @access public
     * @var string
     */
	public $ddt_peso;

    /**
     * Opzionale. [Se ddt/ftacc=true] Causale specificata nel ddt.
     *
     * @access public
     * @var string
     */
	public $ddt_causale;

    /**
     * Opzionale. [Se ddt/ftacc=true] Luogo di spedizione specificato nel ddt.
     *
     * @access public
     * @var string
     */
	public $ddt_luogo;

    /**
     * Opzionale. [Se ddt/ftacc=true] Dati trasportatore specificati nel ddt.
     *
     * @access public
     * @var string
     */
	public $ddt_trasportatore;

    /**
     * Opzionale. [Se ddt/ftacc=true] Annotazioni specificate nel ddt.
     *
     * @access public
     * @var string
     */
	public $ddt_annotazioni;

    /**
     * Opzionale. [Solo se tipo!=ddt] Link al documento in formato PDF.
     *
     * @access public
     * @var string
     */
	public $link_doc;

    /**
     * Opzionale. [Solo se ddt=true] Link al ddt in formato PDF.
     *
     * @access public
     * @var string
     */
	public $link_ddt;

    /**
     * Opzionale. [Solo se ftacc=true] Link alla fattura accompagnatoria in formato PDF.
     *
     * @access public
     * @var string
     */
	public $link_ftacc;

    /**
     * Opzionale. [Solo se è presente un allegato] Link al file allegato.
     *
     * @access public
     * @var string
     */
	public $link_allegato;

    /**
     * Opzionale. Indica se il documento è bloccato (e di conseguenza non può essere modificato o eliminato).
     *
     * @access public
     * @var boolean
     */
	public $bloccato;

    /**
     * Opzionale. [Solo per fatture e ndc elettroniche, vale sempre "true"] Indica che il documento è nel formato FatturaPA.
     *
     * @access public
     * @var boolean
     */
	public $PA;

    /**
     * Opzionale. [Solo se PA=true] Indica la tipologia del cliente: Pubblica Amministrazione ("PA") oppure privato ("B2B") = ['PA' o 'B2B'].
     *
     * @access public
     * @var string
     */
	public $PA_tipo_cliente;

    /**
     * Opzionale. [Solo se PA=true] Tipo di documento a cui fa seguito la fattura/ndc in questione = ['ordine' o 'convenzione' o 'contratto' o 'nessuno'].
     *
     * @access public
     * @var string
     */
	public $PA_tipo;

    /**
     * Opzionale. [Solo se PA=true] Numero del documento a cui fa seguito la fattura/ndc in questione.
     *
     * @access public
     * @var string
     */
	public $PA_numero;

    /**
     * Opzionale. [Solo se PA=true] Data del documento a cui fa seguito la fattura/ndc in questione.
     *
     * @access public
     * @var date
     */
	public $PA_data;

    /**
     * Opzionale. [Solo se PA=true] Codice Unitario Progetto.
     *
     * @access public
     * @var string
     */
	public $PA_cup;

    /**
     * Opzionale. [Solo se PA=true] Codice Identificativo della Gara.
     *
     * @access public
     * @var string
     */
	public $PA_cig;

    /**
     * Opzionale. [Solo se PA=true] Codice Ufficio della Pubblica Amministrazione.
     *
     * @access public
     * @var string
     */
	public $PA_codice;

    /**
     * Opzionale. [Solo se PA=true] Esigibilità IVA e modalità di versamento (I=immediata, D=differita, S=split payment, N=non specificata) = ['I' o 'D' o 'S' o 'N'].
     *
     * @access public
     * @var string
     */
	public $PA_esigibilita;

    /**
     * Opzionale. [Solo se PA=true] Modalità di pagamento (vedi tabella codifiche sulla documentazione ufficiale).
     *
     * @access public
     * @var string
     */
	public $PA_modalita_pagamento;

    /**
     * Opzionale. [Solo se PA=true] Nome dell'istituto di credito.
     *
     * @access public
     * @var string
     */
	public $PA_istituto_credito;

    /**
     * Opzionale. [Solo se PA=true] Codice IBAN del conto corrente del beneficiario.
     *
     * @access public
     * @var string
     */
	public $PA_iban;

    /**
     * Opzionale. [Solo se PA=true] Beneficiario del pagamento.
     *
     * @access public
     * @var string
     */
	public $PA_beneficiario;

    /**
     * Opzionale. [Solo se PA=true] Indica che la fattura/ndc elettronica è stata inviata tramite il servizio FEPA TeamSystem.
     *
     * @access public
     * @var boolean
     */
	public $PA_ts;

    /**
     * Opzionale. [Solo se PA_ts=true] Stato di invio della fattura/ndc.
     *
     * @access public
     * @var string
     */
	public $PA_ts_stato;
	


    /**
     * Opzionale. [Solo per fatture, ndc e proforma NON elettroniche, vale sempre "true"] Indica che il documento applica lo split payment.
     *
     * @access public
     * @var boolean
     */
	public $split_payment;

}