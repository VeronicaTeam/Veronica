<?php
	/* Script per la verifica del login lato server. */
	include 'security/AesCtr.php';
//	include 'security/HmacSha256.php';

	$host = 'localhost';		// Host sul quale e' situato il database
	$user = 'root';			
	$pass = 'salal2012';

	/* 1) Connessione, oppure chiusura in caso di errore. */
	$link = mysql_connect($host, $user, $pass) or die(mysql_error());



	/* 2) Inizializzazione. */
	if ($link){
/*		echo "Introduzione al ciao mondo";
		echo "</br>";
*/
		$nomedb = 'VeronicaBeta';						// Nome del database da selezionare
		$db = mysql_select_db($nomedb,$link);

		

		/* 3) Recupero dati inseriti nel form HTML. */
		$user_cif = $_POST["user_cif"];						// Campo Nome
		$pass_cif = $_POST["password_cif"];					// Campo Chiave cifrata

/*		echo $user_cif;
		echo "</br>";
		echo $pass_cif;
		echo "</br>";
*/


		/* 4) Decofica dei dati ricevuti dal client. */
		$codifica = new AesCtr();
		$chiave_AES = "Chiave_fissa_provvisoria";					// Si utilizzerà protocollo negoziazione chiavi.
		$lunghezza = 256;
		
		$user = $codifica->decrypt($user_cif, $chiave_AES, $lunghezza);
		$pass = $codifica->decrypt($pass_cif, $chiave_AES, $lunghezza);

/*		echo $user;
		echo "</br>";
		echo $pass;
		echo "</br>";
		echo "Sono state eseguite tutte le istruzioni";
		echo "</br>";*/



		/* 5) Hash della password. */
		$chiave_SHA = "ProtocolloNegoziazioneChiavi";			// Si utilizzerà un protocollo di negoziazione chiavi.
		$pass_hash = hash_hmac('sha256', $pass, $chiave_SHA);		// Prepara il confronto con la password hash del DB.
		echo $pass_hash;
		echo "</br>";


		/* 6) Esecuzione della query per il recupero dei dati sull'utente. */
		$query_1 = "SELECT Username FROM Utente WHERE Username = '".$user."'";
		echo $query_1;
		echo "<br>";
		$queryRes_1 = mysql_query($query_1);

		/* 7) Verifica risultati utente. */
		$controllo = true;
		$i = 0;
		$row = mysql_fetch_array($queryRes_1);
		
/** ----------------------------------------------------------------------------------------------------------------------------------
-------------------------------RICORDATI DI RIPARTIRE DA CONTROLLO=TRUE E VERIFICA IL DO WHILE-------------------------------------- 
----------------------------------------------------------------------------------------------------------------------------------*/	

		do{
			$usernameQuery = $row[$i];			// Carica il nome utente trovato.
			echo "provastampa";
			echo $usernameQuery;
			echo "<br>";

			if(($usernameQuery == '') and ($i == 0)){
				$controllo = false;			
				echo "Non sei un utente registrato! Nome utente sconosciuto. Informazioni..";
			}
			else if(($usernameQuery != $user) and ($i == 0)){		// se l'utente reso dalla query e' diverso dall'utente inserito in input, ed e' il primo trovato
				$controllo = false;
				echo "Errore fatale nel Database. Codice di errore..";
			}
			else if(($usernameQuery == $user) and ($i != 0)){		// Esistono più utenti con stesso username, errore o attacco
				$controllo = false;
				echo "Errore fatale nel Database. Codice di errore..";
			}
			else if(($usernameQuery == $user) and ($i == 0)){
				$controllo = true;
				echo "Username verificato correttattamente ma verifichiamo il caso 3, per eventuali duplicati.";
			}
			$i++;
		}while(($row = mysql_fetch_array($queryRes_1)) && ($controllo == true));

		if($controllo == true){
			// Apposto, guardiamoci la passaword.

			// 8) Esecuzione della query per il recupero dei dati sulla password. */
			$query_2 = "SELECT Password FROM Utente WHERE Password = '".$pass_hash."'"; /* da aggiungere controllo utente, altrimenti tantu ballidi. */
			echo $query_2;
			echo "<br>";
			$queryRes_2 = mysql_query($query_2);


			echo "Prima di entrare nel while";
			echo "<br>";
			
			/* 9) Verifica risultati password. */
			do{
				$passwordQuery = $row[0];
				echo $passwordQuery;
				if($passwordQuery == ''){
					$controllo = false;		
					echo "Non hai inserito la password.";
				}
				else if($passwordQuery != $pass_hash){
					$controllo = false;		
					echo "Hai sbagliato la password. L'hai persa?";
				}
				else if($passwordQuery == $pass_hash){
					echo "Apposto loggati."; 
				}
				else{ 
					echo "Caso vuoto";
				}
			}while(($row = mysql_fetch_array($queryRes_2)) and ($controllo == true));
			
			echo "sono uscito dal while";
		}

		mysql_close($link);
	}else{
		echo '<P>Connection failed.</P>';
	}
?>
