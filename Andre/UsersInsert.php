<?php
	/* Script per la registrazione di un nuovo utente da parte dell'amministratore. */
	$host = 'localhost';		// Host sul quale e' situato il database
	$user = 'root';			
	$pass = 'salal2012';


	/* 1) Connessione, oppure chiusura in caso di errore. */
	echo '<P>Connecting...</P>';
	$link = mysql_connect($host, $user, $pass) or die(mysql_error());
	
	if ($link){

		/* 2) Inizializzazione. */
		echo '<P>Connection OK!</P>';
		$nomedb = 'VeronicaBeta';						// Nome del database da selezionare
		$db=mysql_select_db($nomedb,$link);
		echo '<P>Ok!</P>';
		
		/* 3) Recupero dati inseriti nel form HTML. */
		$nome = $_POST["name"];							// Campo Nome
		$cognome = $_POST["surname"];					// Campo Cognome
		$email = $_POST["email"];						// Campo E-mail
		$data = $_POST["date"];							// Campo Data
		$sesso = $_POST["sex"];							// Campo Sesso
		$username = strtolower( substr($nome,0,1) ).".".strtolower ($cognome);	// Campo Username
		
		/* 4) Hash della password. */
		$password = "dagenerarecasualmente";					// Si utilizzerà un generatore casuale.
		$chiave = "ProtocolloNegoziazioneChiavi";				// Si utilizzerà un protocollo di negoziazione chiavi.
		$password_hash = hash_hmac('sha256', $password, $chiave);		// Nessuna password in chiaro nel DB.

		/* 5) Esecuzione della query per il recupero dei dati presenti e la computazione dei nuovi dati. */
		$query = "SELECT MAX(Username) FROM Utente WHERE Username LIKE '".$username."%'";
		echo $query;
		echo "<br>";
		$queryRes = mysql_query($query);

		$row = mysql_fetch_array($queryRes);
		$numberResult = $row[0];
		
		if ( is_null($numberResult) ){	// L'utente con la tipologia ricercata non esiste.
			$lastNumber = 0;		// sara' il primo (0) con la tipologia inserita.		
		}else{
			echo $numberResult;
			echo "ciao mondo";
			$temp = is_null($row);
			echo "<br>";
			echo $temp;
			$usernameQuery = $numberResult;				// Recupero dello username richiesto dalla query
			$lastNumber = substr($usernameQuery, -1);	// Recupera l'ultimo carattere dello username reso dalla query
			$lastNumberInt = (int)$lastNumber;			// Conversione ad intero per l'incremento
			$lastNumberInt++;							// Incremento del numero
			echo $lastNumberInt;
			echo "<br>";
			$lastNumber = (string)$lastNumberInt;		// Riconversione a stringa
			$usernameQuery = substr($usernameQuery,0,-1);	// Rimozione dell'ultimo carattere
		}
		
		$username = $username.$lastNumber;			// Creazione del nuovo username 
		echo $username; 
		
		/* 6) Query per l'inserimento dei dati. NB: l'SQL richiede che le stringhe recuperate dai form siano comprensive di apici. */
		$insert = "INSERT INTO Utente (Nome, Cognome, Username, Password, Mail, DataNascita, Sesso, AdminIscrizione) VALUES ('".$nome."', '".$cognome."', '".$username."', '".$password_hash."', '".$email."', '".$data."', '".$sesso."', 'root')";
		$result = mysql_query($insert);
		mysql_close($link);

	}else{
		echo '<P>Connection failed.</P>';
	}
?>

