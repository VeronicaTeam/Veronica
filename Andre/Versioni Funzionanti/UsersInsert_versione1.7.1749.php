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
		$nome = $_POST["name"];				// Campo Nome
		$cognome = $_POST["surname"];		// Campo Cognome
		$username = $_POST["username"];		// Campo Username
		$password = $_POST["password1"];	// Campo Password
		$email = $_POST["email"];			// Campo E-mail
		$data = $_POST["date"];				// Campo Data
		$sesso = $_POST["sex"];				// Campo Sesso	
	
		// query per l'inserimento dei dati. NB: l'SQL richiede che le
		// stringhe recuperate dai form siano comprensive di apici.
		
		$insert = "INSERT INTO Utente (Nome, Cognome, Username, Password, Mail, DataNascita, Sesso, AdminIscrizione) VALUES ('".$nome."', '".$cognome."', '".$username."', '".$password."', '".$email."', '".$data."', '".$sesso."', 'root')";
		$result = mysql_query($insert);
		echo $insert;
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

