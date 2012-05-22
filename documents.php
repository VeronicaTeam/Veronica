<!------------------------------
-	Manca la grafica, permette la visualizzazione solo dei libri pubblici. Nessuna interazione con l'utente loggato.
-	Da aggiungere funzionalità per:
-		- Scaricare libro in formato ePub
-		- Scaricare libro in formato originale (se non era ePub)
-		- Leggere il libro
-		- Rendere il libro pubblico (solo se privato).
------------------------------->

<html>
	
	<head>
		
		<title>V.E.R.O.N.I.C.A.</title>
		<link rel="stylesheet" type="text/css" href="css/stile.css">
		<link rel="shortcut icon" href="images/icon_V.png">
				
	</head>
	
	<body>
	
		<div id="pagina">
		
			<header>
				
				<img src="images/logo.png" id="logo"/>
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
			
			</div>
			
			<div id="menuDestra" class="barraLaterale">
				
				<div>
			
					<h2 class="blockTitle">Navigazione</h2>
					
					<iframe src="menu.html" frameborder="no" width="100%"></iframe>
					
				</div>
			
			</div>

			<div id="contenuto" class="centroPagina">
			
				<center class="search" id="search">
				
					<fieldset class="searchBorder">
					
						<legend>Cerca un libro: </legend>
				
						<form method="post" action="search.php">
						
							<input id="barraRicerca" type="search" name="ricerca" results="5" placeholder="Libro da cercare" />
						
						</form>
					
					</fieldset>
				
				</center>
				<br>
				<center>
					<strong> <!-- ogni lettera avrà un link alla pagina php, con lettera passata come parametro -->
						<a href="documents.php?par=A">A</a>
						<a href="documents.php?par=B">B</a>
						<a href="documents.php?par=C">C</a>
						<a href="documents.php?par=D">D</a>
						<a href="documents.php?par=E">E</a>
						<a href="documents.php?par=F">F</a>
						<a href="documents.php?par=G">G</a>
						<a href="documents.php?par=H">H</a>
						<a href="documents.php?par=I">I</a>
						<a href="documents.php?par=J">J</a>
						<a href="documents.php?par=K">K</a>
						<a href="documents.php?par=L">L</a>
						<a href="documents.php?par=M">M</a>
						<a href="documents.php?par=N">N</a>
						<a href="documents.php?par=O">O</a>
						<a href="documents.php?par=P">P</a>
						<a href="documents.php?par=Q">Q</a>
						<a href="documents.php?par=R">R</a>
						<a href="documents.php?par=S">S</a>
						<a href="documents.php?par=T">T</a>
						<a href="documents.php?par=U">U</a>
						<a href="documents.php?par=V">V</a>
						<a href="documents.php?par=W">W</a>
						<a href="documents.php?par=X">X</a>
						<a href="documents.php?par=Y">Y</a>
						<a href="documents.php?par=Z">Z</a>
						<a href="documents.php?par=0">0-9</a>
						<a href="documents.php">TUTTI</a>
					</strong>
				</center>
			
				<h2>Elenco dei documenti Pubblici:</h2>
				
				<table border="1" width="100%">
				
					<tr>
						<td align="center">Titolo</td>
						<td align="center" width="20%">Autore</td>
						<td align="center" width="8%">Dettagli Libro</td>
						<td align="center" width="8%">Downlaod ePub</td>
						<td align="center" width="8%">Downlaod Originale</td>
						<td align="center" width="5%">Leggi</td>
						
					</tr>
					
					<?php
						//funzione per l'esecuzione delle query 
					
					
						$host = 'localhost';
						$user = 'root';
						$pass = 'salal2012';
						$link = mysql_connect($host, $user, $pass) or die(mysql_error());
					
						if ($link){
							// nome del database da selezionare
							$nomedb = 'VeronicaBeta';
							$db=mysql_select_db($nomedb,$link);
							$query='select Libro.id,titolo,autore,link,linkoriginale from Doc, Libro where Doc.Id=Libro.id and Doc.pubblico="1" order by titolo';
							if ($_GET['par']=='0') $query='select Libro.id,titolo,autore,link,linkoriginale from Doc, Libro where Doc.Id=Libro.id and Doc.pubblico="1" and titolo regexp "^[0-9]" order by titolo';
							else if ($_GET['par']!='') $query='select Libro.id,titolo,autore,link,linkoriginale from Doc, Libro where Doc.Id=Libro.id and Doc.pubblico="1" and titolo regexp "^'.$_GET['par'].'" order by titolo';
							$ris=mysql_query($query);
							while($riga=mysql_fetch_array($ris)){
								echo '<tr>';
					  			echo '<td>'.$riga['titolo'].'</td>';
					  			if ($riga['autore']=='') echo '<td>Sconosciuto</td>';
					  			else echo '<td>'.$riga['autore'].'</td>';
					  			echo '<td><a href="details.php?id='.$riga['id'].'">Dettagli</a></td>'; //variabile contenente $riga['id'], da mandare a script "details.php"
					  			echo '<td align="center"><img src="images/Ebook.png" width="40" height="40"></td>';
					  			if ($riga['linkoriginale']!='') echo '<td align="center"><img src="images/Download.png" width="40" height="40"></td>';
					  			else echo '<td align="center"><img src="images/x.png" width="40" height="40"></td>';
					  			echo '<td align="center"><img src="images/Read.png" width="40" height="40"></td>';
					  			echo '</tr>';
							}
							mysql_close($link);
						}
						else{
							echo '<P>Connection failed.</P>';
						}
					?>
					
				</table>
			
			</div>
						
			<footer>
				
				<h2 class="blockTitle">V.E.R.O.N.I.C.A.</h2>
				<p>Realizzato dal Veronica Team</p>
				
			</footer>
			
		</div>
		
	</body>
	
</html>
