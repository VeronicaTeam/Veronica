<!---
- Visualizza i dati di caricamento, e basta. Non visualizza errori in caso di errore
---->

<html>
	
	<head>
		
		<title>V.E.R.O.N.I.C.A.</title>
		<link rel="stylesheet" type="text/css" href="css/stile.css">
		<link rel="shortcut icon" href="images/icon_V.png">
				
	</head>
	
	<body>
	
		<div id="pagina">
		
			<header>
				
				<img src="images/logo.png" id="logo" />
				<a class="title" href="index.html"><h1>V.E.R.O.N.I.C.A.</h1></a>
				<h2>Visual Engine for Reading On Network In Comprehensive Acceptation</h2>
			
			</header>
			
			<div id="menuSinistra" class="barraLaterale">
			
				<div>
				
					<h2 class="blockTitle">User Menu</h2>
				
					<p>Benvenuto %Username%</p>
					
					<ul>
					
						<li>Profilo</li>
						<li>Log Out</li>
					
					</ul>
					
				</div>
				
				<br />
				
				<div class="search">
				
					<h2 class="blockTitle">Ricerca libro</h2>
				
					<form method="post" action="search.php">
					
						<input id="barraRicerca" type="search" name="ricerca" placeholder="Libro da cercare" />
						<input id="inviaRicerca" type="submit" value="Cerca" />
					
					</form>
				
				</div>
			
			</div>
			
			<div id="menuDestra" class="barraLaterale">
				
				<div>
			
					<h2 class="blockTitle">Navigazione</h2>
					
					<iframe src="menu.html" frameborder="no" width="100%"></iframe>
					
				</div>
			
			</div>
			
			<!-- Qui inserire il codice della pagina da realizzare -->
			<div id="contenuto" class="centroPagina">
			
				<h2>Caricamento Libro</h2>
<?php
	//coontrolliamo che il file rispetti le dimensioni impostate
	if ($_FILES['file']['size'] < 4096000){
		//controlliamo se ci sono stati errori durante l'upload
		if ($_FILES['file']['error'] > 0){
			echo "Codice Errore: " . $_FILES['file']['error'];
		}
		else{
			//stampo alcune informazioni sul file
			//il nome originale
			echo 'Nome File: ' . $_FILES['file']['name'] . "<br>";
			//il mime-type
			echo 'Tipo File: ' . $_FILES['file']['type'] . "<br>";
			//la dimensione in byte
			echo 'Dimensione [byte]: ' . $_FILES['file']['size'] . "<br>";
			//il nome del file temporaneo
			echo 'Nome Temporaneo: ' . $_FILES['file']['tmp_name'] . "<br>";
			$permesso=$_POST['uploadPermission'];
			if ($permesso=='public') $pubblico='TRUE';
			else $pubblico='FALSE';
			$array=explode('.',$_FILES['file']['name']);
			$dimensione=sizeof($array);
			$formato=$array[($dimensione - 1)];
			echo 'Il formato è: '.$formato. '<br>';
			if($formato=='pdf' || $formato=='epub' || $formato=='doc' || $formato=='rtf'){
				//sposto il file caricato dalla cartella temporanea alla destinazione finale
				$n=substr(shell_exec('ls -l documents/ | wc -l'),0,-1);
				shell_exec('mkdir documents/' .$n);
				move_uploaded_file($_FILES['file']['tmp_name'], 'documents/'.$n.'/' . $_FILES['file']['name']);
				echo 'File caricato in documents/'.$n.'/' . $_FILES['file']['name'] . "<br>";
				$host = 'localhost';
				$user = 'root';
				$pass = 'salal2012';
				$link = mysql_connect($host, $user, $pass) or die(mysql_error());
				$nomedb = 'VeronicaBeta';
				$db=mysql_select_db($nomedb,$link);	
				$query='insert into Libro values ('.$n.', 0, "'.$_POST['anno'].'", "'.$_POST['editore'].'", "'.$_POST['descrizione'].'", "'.$_POST['genere'].'")';
				mysql_query($query);
				$query='insert into Doc values ("'.$_POST['titolo'].'", "'.$_POST['autore'].'", '.$n.', "documents/'.$n.'/'.$_FILES['file']['name'].'", "FALSE", "IO","'.$pubblico.'")';
				mysql_query($query);
				echo $query."<br>";
				mysql_close($link);
			}
			else {
				echo "Formato file non supportato. <br>";
			}
		}
	}	
	else{
		echo "File troppo grande!!";
	}

?>
			
			</div>
						
			<footer>
				
				<h2 class="blockTitle">V.E.R.O.N.I.C.A.</h2>
				<p>Realizzato dal Veronica Team</p>
				
			</footer>
			
		</div>
		
	</body>
	
</html>
