/** Funzione per la codifica del testo che si intende leggere */
function codifica_lettura(text){

	/* 1) Inizializzazione */
	var chiave = "Chiave_fissa_provvisoria";			// In una seconda fase si utilizzerà un protocollo per chiavi.
	var lunghezza = 256;						// Secondo i requisiti di sistema.

	/* 2) Autenticazione */

	/* 3) Codifica AesCtr 256 Mode */
	var cipher_text = Aes.Ctr.encrypt(text, chiave, lunghezza);	// Testo codificato.

	/* Test... */
	alert(text);
	alert(cipher_text);

	/* 4) Restituzione del testo codificato per l'invio */
	return cipher_text;
}
