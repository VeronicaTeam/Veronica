<?php
	/* Rimuovi commenti e test iniziali */


	include 'AesCtr.php';

	function decodifica_lettura(ciphertext){
		/* 1) Inizializzazione */
		$chiave = "Chiave_fissa_provvisoria";
		$lunghezza = 256;

		/* 2) Decodifica del messaggio client */
		$codifica = new AesCtr();
		$plaintext = codifica::decrypt($ciphertext, $chiave, $lunghezza);

		/* 3) Restituzione del messaggio decodificato */
		return $plaintext; 
	}

	function codifica_lettura(new_plaintext){
		/* 1) Inizializzazione */
		$chiave = "Chiave_fissa_provvisoria";
		$lunghezza = 256;

		/* 2) Codifica del nuovo messaggio per il client */
		$codifica = new AesCtr();
		$new_ciphertext = codifica::encrypt($new_plaintext, $chiave, $lunghezza);

		/* 3) Restituzione del messaggio decodificato */
		return $new_ciphertext; 
	}
?>
