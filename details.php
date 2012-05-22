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
			
				<h2>Dettagli libro</h2>
				
				<?php>
					//funzione per l'esecuzione delle query 
					
					
						$host = 'localhost';
						$user = 'root';
						$pass = 'salal2012';
						$link = mysql_connect($host, $user, $pass) or die(mysql_error());
					
						if ($link){
							// nome del database da selezionare
							$nomedb = 'VeronicaBeta';
							$db=mysql_select_db($nomedb,$link);
							$query='';
							///CONTINUARE
							mysql_close($link);
						}
				
				<?>
				
				<!-- Qui inserire il codice della pagina da realizzare -->
			
			</div>
						
			<footer>
				
				<h2 class="blockTitle">V.E.R.O.N.I.C.A.</h2>
				<p>Realizzato dal Veronica Team</p>
				
			</footer>
			
		</div>
		
	</body>
	
</html>
