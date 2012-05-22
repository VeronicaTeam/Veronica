<?php
	//funzione per l'esecuzione delle query 
	
	
	$host = 'localhost';	// host sul quale e' situato il database
	$user = 'root';			
	$pass = 'salal';
	
	echo '<P>Connecting...</P>';
	
	$link = mysql_connect($host, $user, $pass) or die(mysql_error());	// connessione, oppure chiusura in caso di errore
	
	if ($link){
		echo '<P>Connection OK!</P>';
		
		
		$nomedb = 'OURveronicaDB';		// nome del database da selezionare
		$db=mysql_select_db($nomedb,$link);
		echo '<P>Ok!</P>';
		
		// recupero dati inseriti nel form HTML
		$nome = $_POST["name"];							// Campo Nome
		$cognome = $_POST["surname"];					// Campo Cognome
		$email = $_POST["email"];						// Campo E-mail
		$data = $_POST["date"];							// Campo Data
		$sesso = $_POST["sex"];							// Campo Sesso
		$username = strtolower( substr($nome,0,1) ).".".strtolower ($cognome);	// Campo Username
		$password = "dagenerarecasualmente";

		$query = "SELECT MAX(Username) FROM Utente WHERE Username LIKE '".$username."%'";
		echo $query;
		echo "<br>";
		$queryRes = mysql_query($query);
		
		while( $row = mysql_fetch_array($queryRes) ){		// finché ci sono righe, prodotte dalla query, da computare
			$usernameQuery = $row[0];						// recupero dello username richiesto dalla query
			$lastNumber = substr($usernameQuery, -1);		// recupera l'ultimo carattere dello username reso dalla query
			$lastNumberInt = (int)$lastNumber;				// conversione ad intero per l'incremento
			$lastNumberInt++;								// incremento del numero
			echo $lastNumberInt;
			echo "<br>";
			$lastNumber = (string)$lastNumberInt;			// riconversione a stringa
			$usernameQuery = substr($usernameQuery,0,-1);	// rimozione dell'ultimo carattere
			$username = $username.$lastNumber;				// creazione del nuovo username 
			echo $username; 
		}
		
		// query per l'inserimento dei dati. NB: l'SQL richiede che le stringhe recuperate dai form siano comprensive di apici.
		
		$insert = "INSERT INTO Utente (Nome, Cognome, Username, Password, Mail, DataNascita, Sesso, AdminIscrizione) VALUES ('".$nome."', '".$cognome."', '".$username."', '".$password."', '".$email."', '".$data."', '".$sesso."', 'root')";
		$result = mysql_query($insert);
		mysql_close($link);
		
		/*
		
		$query='select link from Doc, Libro where Doc.Id=Libro.id';
		$ris=mysql_query($query);
		while($riga=mysql_fetch_array($ris)){
			echo $riga['link']."<br>";
		}
		mysql_close($link);*/
	}else{
		echo '<P>Connection failed.</P>';
	}
?>

