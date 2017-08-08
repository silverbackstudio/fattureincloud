<?php

namespace Svbk\FattureInCloud\Struct;

use Svbk\FattureInCloud\Date;
use Svbk\FattureInCloud\DateTime;

/**
 * Rappresenta la richiesta per la creazione di un nuovo documento di tipo 
 * fattura, proforma, ordini, preventivi, ndc, ricevute, ddt, rapporti, ordform
 *
 * @package fattureincloud
 * @subpackage DocNuovoRequest
 * @author Brando Meniconi <b.meniconi@silverbackstudio.it>
 * @since 1.0
 */
class DocNuovoRequest extends Request {

    /**
     * Opzionale. Identificativo univoco del cliente (serve per creare un 
     * collegamento tra il documento e un cliente in anagrafica; se nullo, il 
     * documento non viene collegato a nessun cliente già esistente in 
     * anagrafica; se mancante, viene fatto il collegamento con piva o cf) 
     * [solo con tipo!="ordforn"].
     *
     * @access public
     * @var string
     */
	public $id_cliente;

    /**
     * Opzionale. Identificativo univoco del fornitore (serve per creare un 
     * collegamento tra il documento e un fornitore in anagrafica; se nullo, il 
     * documento non viene collegato a nessun fornitore già esistente in 
     * anagrafica; se mancante, viene fatto il collegamento con piva o cf) 
     * [solo con tipo="ordforn"].
     *
     * @access public
     * @var string
     */
	public $id_fornitore;

    /**
     * Nome o ragione sociale del cliente/fornitore
     *
     * @access public
     * @var string
     */
	public $nome;

    /**
     * Opzionale. Indirizzo del cliente.
     *
     * @access public
     * @var string 
     */
    public $indirizzo_via;

    /**
     * Opzionale. CAP del cliente/fornitore.
     *
     * @access public
     * @var string
     */
	public $indirizzo_cap;

    /**
     * Opzionale. Città (comune) del cliente/fornitore.
     *
     * @access public
     * @var string
     */
	public $indirizzo_citta;
	
    /**
     * Opzionale. Provincia del cliente/fornitore.
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
     * Opzionale. Paese (nazionalità) del cliente/fornitore.
     *
     * @access public
     * @var string
     */
	public $paese;
	
    /**
     * Opzionale. [Solo se "paese" non è valorizzato] Codice ISO del paese 
     * (nazionalità) del cliente/fornitore (formato ISO alpha-2) in alternativa
     * al parametro "paese".
     *
     * @access public
     * @var string
     */	
    public $paese_iso; 

    /**
     * Opzionale. Lingua del documento (sigla) = ['it' o 'en' o 'de'].
     *
     * @access public
     * @var string
     */
	public $lingua;
	
    /**
     * Opzionale. Partita IVA cliente/fornitore; viene utilizzata per ricercare 
     * e collegare il cliente/fornitore in anagrafica se non specificato il 
     * parametro id_cliente/id_fornitore (in caso di doppioni viene collegato 
     * solo un soggetto).
     *
     * @access public
     * @var string
     */	
    public $piva;

    /**
     * Opzionale. Codice fiscale cliente/fornitore; viene utilizzato per 
     * ricercare e collegare il cliente/fornitore in anagrafica se non 
     * specificati i parametri id_cliente/id_fornitore e piva (in caso di 
     * doppioni viene collegato solo un soggetto).
     *
     * @access public
     * @var string
     */
	public $cf;
	
    /**
     * Opzionale. Se "true", completa i dati anagrafici della fattura con 
     * quelli presenti nell'anagrafica cliente/fornitore (sovrascrivendo quelli
     * presenti), effettuando la ricerca tramite i campi id_cliente/id_fornitore,
     * piva e cf (in quest'ordine).
     *
     * @access public
     * @var boolean
     */	
    public $autocompila_anagrafica = true;

    /**
     * Opzionale. Se "true", aggiorna l'anagrafica clienti/fornitori con i dati 
     * anagrafici della fattura: se il cliente/fornitore non esiste viene 
     * creato, mentre se il cliente/fornitore esiste già i dati vengono 
     * aggiornati; il cliente/fornitore viene ricercato tramite i campi 
     * id_cliente/id_fornitore, piva e cf (in quest'ordine).
     *
     * @access public
     * @var boolean
     */
	public $salva_anagrafica = true;
	
    /**
     * Opzionale.  Numero (e serie) del documento; se mancante viene utilizzato
     * il successivo proposto per la serie principale; se viene specificata 
     * solo la serie (stringa che inizia con un carattere non numerico) viene 
     * utilizzato il successivo per quella serie; per i ddt agisce anche sul 
     * campo "ddt_numero" e non accetta una serie.
     *
     * @access public
     * @var string
     */	
    public $numero;
    
    /**
     * Opzionale. Data di emissione del documento (per i ddt agisce anche sul 
     * campo "ddt_data").
     *
     * @access public
     * @var Date
     */
	public $data;
	
    /**
     * Opzionale. Valuta del documento e degli importi indicati.
     *
     * @access public
     * @var string
     */	
    public $valuta;

    /**
     * Opzionale. Tasso di cambio EUR/{valuta} [Se non specificato viene 
     * utilizzato il tasso di cambio odierno].
     *
     * @access public
     * @var double
     */
	public $valuta_cambio;

    /**
     * Opzionale. Specifica se i prezzi da utilizzare per il calcolo del totale
     * documento sono quelli netti, oppure quello lordi (comprensivi di iva).
     *
     * @access public
     * @var boolean
     */
	public $prezzi_ivati;
	
    /**
     * Opzionale. [Non presente in ddt e ordforn] Percentuale rivalsa INPS.
     *
     * @access public
     * @var double
     */	
	public $rivalsa;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Percentuale cassa 
     * previdenziale.
     *
     * @access public
     * @var double
     */
	public $cassa;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Percentuale ritenuta d'acconto.
     *
     * @access public
     * @var double
     */
	public $rit_acconto;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Imponibile della ritenuta 
     * d'acconto (percentuale sul totale).
     *
     * @access public
     * @var double
     */
	public $imponibile_ritenuta;
	
    /**
     * Opzionale. [Non presente in ddt e ordforn] Percentuale altra ritenuta 
     * (ritenuta previdenziale, Enasarco etc.).
     *
     * @access public
     * @var double
     */	
    public $rit_altra;

    /**
     * Opzionale. [Non presente in ddt e ordforn] Valore della marca da bollo 
     * (0 se non presente).
     *
     * @access public
     * @var double
     */
	public $marca_bollo;
	
    /**
     * Opzionale. [Non presente in ddt] Oggetto mostrato sul documento 
     * (precedentemente "oggetto_fattura").
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
     * Opzionale. [Non presente in ddt] Nasconde o mostra la scadenza sul
     * documento.
     *
     * @access public
     * @var boolean
     */	
	public $nascondi_scadenza;

    /**
     * Opzionale. [Non presente in ndc e ordforn] Indica la presenza di un DDT 
     * incluso nel documento (per i ddt è sempre true).
     *
     * @access public
     * @var boolean
     */
	public $ddt;
	
    /**
     * Opzionale. [Solo se tipo=fatture] Indica la presenza di una fattura 
     * accompagnatoria inclusa nel documento.
     *
     * @access public
     * @var boolean
     */	
    public $ftacc;

    /**
     * Opzionale. [Solo se tipo!=ddt] Identificativo del template del documento
     * [Se non specificato o inesistente, viene utilizzato quello di default].
     *
     * @access public
     * @var string
     */
	public $id_template;

    /**
     * Opzionale. [Solo se ddt=true] Identificativo del template del ddt [Se 
     * non specificato o inesistente, viene utilizzato quello di default].
     *
     * @access public
     * @var string
     */
	public $ddt_id_template;

    /**
     * Opzionale. [Solo se ftacc=true] Identificativo del template della fattura
     * accompagnatoria [Se non specificato o inesistente, viene utilizzato 
     * quello di default].
     *
     * @access public
     * @var string
     */
	public $ftacc_id_template;

    /**
     * Opzionale. [Non presente in ddt e ndc] Mostra o meno le informazioni sul 
     * metodo di pagamento sul documento.
     *
     * @access public
     * @var boolean
     */
	public $mostra_info_pagamento;

    /**
     * Opzionale. [Solo se mostra_info_pagamento=true] Nome del metodo di 
     * pagamento.
     *
     * @access public
     * @var string
     */
	public $metodo_pagamento;

    /**
     * Opzionale. [Solo se mostra_info_pagamento=true] Titolo della riga N del 
     * metodo di pagamento (N da 1 a 5).
     *
     * @access public
     * @var string
     */
	public $metodo_titoloN;
	
    /**
     * Opzionale. [Solo se mostra_info_pagamento=true] Descrizione della riga N
     * del metodo di pagamento (N da 1 a 5).
     *
     * @access public
     * @var string
     */	
    public $metodo_descN;

    /**
     * Opzionale. [Solo per preventivi, rapporti e ordforn] Nasconde o mostra 
     * la scadenza sul documento = ['tutti' o 'netto' o 'nessuno'].
     *
     * @access public
     * @var string
     */
	public $mostra_totali;

    /**
     * Opzionale. [Solo per ricevute, fatture, proforma, ordini] Mostra il 
     * bottone "Paga con Paypal".
     *
     * @access public
     * @var boolean
     */
	public $mostra_bottone_paypal;

    /**
     * Opzionale. [Solo per ricevute, fatture, proforma, ordini] Mostra il 
     * bottone "Paga con Bonifico Immediato".
     *
     * @access public
     * @var boolean
     */
	public $mostra_bottone_bonifico;

    /**
     * Opzionale. [Solo per ricevute, fatture, proforma, ordini] Mostra il 
     * bottone "Notifica pagamento effettuato".
     *
     * @access public
     * @var boolean
     */
	public $mostra_bottone_notifica;

    /**
     * Lista degli articoli/righe del documento,
     *
     * @access public
     * @var Doc\Articolo\Nuovo[] Lista degli articoli/righe del documento
     */
	public $lista_articoli;
	
    /**
     * [Non presente in preventivi, ddt e ordforn] Lista delle tranches di 
     * pagamento
     *
     * @access public
     * @var Doc\Articolo\Nuovo[] Lista degli articoli/righe del documento
     */
	public $lista_pagamenti;	

    /**
     * Opzionale. [Se ddt=true] Numero del ddt (se tipo="ddt" corrisponde al 
     * campo "numero") [Se non specificato viene autocompletato].
     *
     * @access public
     * @var string
     */
	public $ddt_numero;
	
    /**
     * Opzionale. [Se ddt=true] Data del ddt Numero del ddt [Obbligatoria solo 
     * se e solo se il documento non è un ddt ma ddt=true].
     *
     * @access public
     * @var Date
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
     * Opzionale. [Solo per fatture e ndc elettroniche] Indica se il documento 
     * è nel formato FatturaPA; se "true", vengono presi in considerazione tutti 
     * i successivi campi con prefisso "PA_", con eventuali eccezioni 
     * (se non valorizzati, vengono utilizzati i valori di default).
     *
     * @access public
     * @var boolean
     */
	public $PA;

    /**
     * Opzionale. [Solo se PA=true] Indica la tipologia del cliente: Pubblica 
     * Amministrazione ("PA") oppure privato ("B2B") = ['PA' o 'B2B'].
     *
     * @access public
     * @var string
     */
	public $PA_tipo_cliente;
	
    /**
     * Opzionale. [Solo se PA=true] Tipo di documento a cui fa seguito la 
     * fattura/ndc in questione = ['ordine' o 'convenzione' o 'contratto' o 
     * 'nessuno'].
     *
     * @access public
     * @var string
     */	
    public $PA_tipo;

    /**
     * Opzionale. [Solo se PA=true] Numero del documento a cui fa seguito la 
     * fattura/ndc in questione.
     *
     * @access public
     * @var string
     */
	public $PA_numero;

    /**
     * Opzionale. [Solo se PA=true] Data del documento a cui fa seguito la 
     * fattura/ndc in questione.
     *
     * @access public
     * @var Date
     */
	public $PA_data;

    /**
     * Opzionale. [Solo se PA_tipo_cliente=PA] Codice Unitario Progetto.
     *
     * @access public
     * @var string
     */
	public $PA_cup;

    /**
     * Opzionale. [Solo se PA_tipo_cliente=PA] Codice Identificativo della Gara.
     *
     * @access public
     * @var string
     */
	public $PA_cig;

    /**
     * Opzionale. [Solo se PA=true] Codice Ufficio della Pubblica 
     * Amministrazione o Codice Destinatario.
     *
     * @access public
     * @var string
     */
	public $PA_codice;

    /**
     * Opzionale. [Solo se PA_tipo_cliente=B2B] Indirizzo PEC del destinatario,
     * utilizzato in assenza di Codice Destinatario.
     *
     * @access public
     * @var string
     */
	public $PA_pec;

    /**
     * Opzionale. [Solo se PA=true] Esigibilità IVA e modalità di versamento 
     * (I=immediata, D=differita, S=split payment, N=non specificata) 
     * = ['I' o 'D' o 'S' o 'N'].
     *
     * @access public
     * @var string
     */
	public $PA_esigibilita;

    /**
     * Opzionale. [Solo se PA=true] Modalità di pagamento (vedi tabella 
     * codifiche sulla documentazione ufficiale).
     *
     * @access public
     * @var string
     */
	public $PA_modalita_pagamento;
	
	/**
     * Opzionale. [Solo se PA=true] Nome dell istituto di credito.
     *
     * @access public
     * @var string
     */
     public $PA_istituto_credito;
     
    /**
     * Opzionale. [Solo se PA=true] Codice IBAN del conto corrente del 
     * beneficiario.
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
     * Opzionale. Informazioni anagrafiche aggiuntive da associare al 
     * cliente/fornitore [solo se salva_anagrafica=true].
     *
     * @access public
     * @var Doc\Nuovo\ExtraAnagrafica
     */
	public $extra_anagrafica;

    /**
     * Opzionale. [Solo per fatture. ndc e proforma NON elettroniche] Specifica
     * se il documento applica lo split payment.
     *
     * @access public
     * @var boolean
     */
	public $split_payment; 
}