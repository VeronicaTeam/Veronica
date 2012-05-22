<?php
//	include 'Livio/RichiestaLettura.php';

	/* 1) Rimozione vecchio file audio */
	shell_exec( 'rm daTesto.wav' );

	/* 2) Caricamento messaggio codificato dal client */
	$text = $_POST['testo'];

	/* 3) Decodifica del file audio client */
//	$plaintext = decodifica_lettura($ciphertext);

	/* 4) Creazione del nuovo file audio */
	shell_exec( 'espeak -a 100 -p 56 -s 200 -g 2 -v it+f2 "'.$text.'" -w daTesto.wav' );
?>
