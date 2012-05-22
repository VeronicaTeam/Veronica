<?php
	$testo = 'Ciao mondo';
	$chiave = 'Password';
	$messaggio = hash_hmac('sha256', $testo, $chiave);

	echo $messaggio;
?>
