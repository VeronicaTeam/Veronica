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
			
			<!-- Qui inserire il codice della pagina da realizzare -->
			<div id="contenuto" class="centroPagina">
			
				<center class="search" id="search">
				
					<fieldset class="searchBorder">
					
						<legend>Cerca un libro: </legend>
				
						<form method="post" action="search.php">
						
							<input id="barraRicerca" type="search" name="ricerca" results="5" placeholder="Libro da cercare" />
						
						</form>
					
					</fieldset>
				
				</center>
			
				<h2>Risultati ricerca: </h2>
				
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
					
						$host = 'localhost';
						$user = 'root';
						$pass = 'salal2012';
						$link = mysql_connect($host, $user, $pass) or die(mysql_error());
					
						if ($link){
							
							$db = mysql_select_db( 'VeronicaBeta', $link );
							$ris = mysql_query( "SELECT Libro.id, titolo, autore, link, linkoriginale, MATCH ( titolo ) AGAINST ( '".$_POST["ricerca"]."' ) AS attinenza FROM Doc join Libro ON Doc.Id = Libro.id WHERE MATCH ( titolo ) AGAINST ( '".$_POST["ricerca"]."' ) ORDER BY attinenza DESC" );
														
							while( $riga = mysql_fetch_array($ris) ) {
							
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
														
						} else {
						
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
