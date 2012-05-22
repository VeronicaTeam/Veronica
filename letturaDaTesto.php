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
								
<!--				<?php
				
					$host = 'localhost';
					$user = 'root';
					$pass = 'salal2012';
					
					$link = mysql_connect( $host, $user, $pass ) or die( mysql_error() );
					
					$db = mysql_select_db( 'VeronicaBeta', $link );
					$ris = mysql_query( 'select titolo from Doc where Id=1' );
					$titolo = mysql_fetch_array( $ris );
					
					echo('<h2>'.$titolo['titolo'].'</h2>');
					
					echo('<p id="testoLibro" style="display: none;">');
					
					$ris = mysql_query( 'select link from Doc where Id=1' );
					
					while ( $riga = mysql_fetch_array( $ris ) ) {
						
						echo( $riga['link']."" );
						
					}
					
					echo('</p>');
					
					mysql_close( $link );
					
				?>-->
				
				<h2>Titolo</h2>
				
				<p id="testoLibro" style="display: none;">
					E' il primo Novembre 1981, a Little Whinging in Inghilterra, giorno in cui un signore di nome Albus Silente lascia un bambino di solo un anno, Harry Potter, sulla porta di casa degli zii Vernon e Petunia Dursley. Silente lascia anche una lettera in cui spiega che i genitori del bambino sono morti e in cui chiede di prendersi cura del piccolo.
					Harry cresce infelice in casa Dursley, tormentato dalle angherie del cugino Dudley e degli zii, che non perdono occasione per punirlo e mortificarlo: lo fanno dormire nello stanzino sotto le scale, lo vestono solo con gli enormi vestiti smessi di Dudley, lo privano dei giochi e non gli permettono mai di divertirsi o di essere felice in qualsiasi modo.
					Harry inoltre e' talvolta protagonista di alcuni strani episodi di cui afferma non essere responsabile, come il fatto di essere saltato fin sul tetto della scuola per sfuggire a Dudley e ai suoi amici bulli, il fatto di aver fatto sparire il vetro di una teca contenente un serpente allo zoo, permettendo al serpente stesso di spaventare a morte il cugino, o il fatto di essersi fatto ricrescere i capelli in una notte, dopo che la zia Petunia li aveva tagliati in malo modo per coprire la cicatrice a forma di saetta presente sulla fronte di Harry, ricordo dell'incidente d'auto in cui morirono i suoi genitori.
					Tutto questo continua fino agli 11 anni di Harry, quando il ragazzo riceve per la prima volta in vita sua una lettera, che viene sequestrata dagli zii prima che possa leggerla. Nei giorni seguenti giungono numerosissime lettere, tutte identiche alla prima, e tutte prontamente intercettate prima della lettura, finche' il giorno del compleanno di Harry vengono raggiunti da un omone enorme di nome Rubeus Hagrid. Questi si presenta come guardiacaccia di una scuola chiamata Hogwarts, e racconta a Harry delle incredibili verita': lui e' in realta' un mago (cosa che spiega tutti gli incredibili episodi accaduti intorno al ragazzo), figlio di Lily (sorella di Petunia) e James Potter, due maghi molto noti nella comunita' magica, che vive in segreto fianco a fianco alla comunita' dei Babbani (ossia le persone non dotate di poteri magici). Lily e James Potter sono stati uccisi dieci anni prima da un mago di nome Voldemort. Questi era un mago potentissimo ed estremamente malvagio, al punto che i maghi non osano pronunciarne il nome, preferendo chiamarlo Tu-sai-chi, Colui-che-non-deve-essere-nominato o Signore Oscuro. Voldemort anni prima aveva instaurato un regno di terrore, di cui erano rimasti vittime moltissimi maghi e Babbani, regno terminato solo il giorno in cui uccise i Potter e tento' di uccidere Harry. Quella notte qualcosa protesse il bambino dal terribile mago che fino ad allora aveva mietuto innumerevoli vittime: l'incantesimo di Voldemort non lo uccise, ma rimbalzo' inspiegabilmente indietro contro Voldemort stesso. Secondo Hagrid il mago non mori', nessuno sa dove sia e in che forma, l'unica cosa certa e' che quella notte perse tutti i suoi poteri e spari'. Questa vicenda rese Harry incredibilmente famoso, riconosciuto da tutti i maghi grazie alla cicatrice a forma di saetta sulla fronte (lasciata dall'incantesimo di Voldemort) e noto ormai in tutta la comunita' magica come il Ragazzo che e' Sopravvissuto.
					Harry scopre cosi' la verita' sul suo passato, e apprende di poter frequantare la scuola di magia di Hogwarts, di cui e' preside Albus Silente. Hagrid lo accompagna a Diagon Alley, una strada di Londra accessibile solo ai maghi, dove il ragazzo puo' ritirare il denaro lasciatogli dai genitori alla Gringott (la Banca dei Maghi) e procurarsi tutto il materiale necessario per il nuovo anno scolastico: bacchetta magica, divisa, calderone, ingredienti per le pozioni, libri di scuola e una civetta delle nevi di nome Edvige, regalo di Hagrid per il suo compleanno, che Harry potra' usare per spedire e ricevere la sua posta, alla maniera dei maghi.
					Il giorno della partenza per Hogwarts, Harry si reca alla stazione King's Cross di Londra e tramite un passaggio magico raggiunge il binario dell'Espresso per Hogwarts, dove conosce alcuni nuovi compagni: Hermione Granger, una ragazza molto intelligente ma so-tutto-io; Neville Paciock, un ragazzo pasticcione; Fred e George Weasley, due gemelli vivaci e ribelli; quello che diventera' il suo migliore amico, Ron Weasley, rosso di capelli, proveniente da una famiglia povera e numerosa (tutti con i capelli rossi); e infine quello che diventera' il suo peggior nemico, Draco Malfoy, un ragazzo pallido e biondo, di buona famiglia, convinto che il suo denaro lo ponga al di sopra di tutti.
					Una volta arrivati a Hogwarts, un castello antico e imponente, situato nel Nord della Gran Bretagna, Harry e i suoi compagni del primo anno vengono sottoposti al giudizio di un cappello magico, il Cappello Parlante, che ha il compito di smistare i nuovi studenti nelle quattro diverse case della scuola: Grifondoro (dove finiscono gli studenti coraggiosi), Corvonero (che predilige gli studenti intelligenti), Tassorosso (che accoglie gli studenti leali e gran lavoratori) e Serpeverde (casa degli studenti ambiziosi e spesso culla di maghi malvagi). Harry, Ron, Hermione e Neville sono tra gli studenti assegnati a Grifondoro, di cui ha fatto parte tutta la famiglia di Ron, tra cui i gemelli e il fratello Percy, tuttora a scuola; Malfoy invece e' assegnato a Serpeverde, insieme ai suoi sgherri Tiger e Goyle, robustissimi ma assai poco intelligenti.
					Cosi' inizia la carriera scolastica di Harry, che a Hogwarts impara come la magia sia ben piu' complicata del previsto, articolata in numerose materie: Incantesimi, Trasfigurazione, Pozioni, Erbologia, Astronomia, Storia della Magia, Difesa contro le Arti Oscure e Volo sui manici di scopa (per cui Harry e' particolarmente dotato). Insieme alle nuove materie Harry conosce anche il personale di Hogwarts, tra cui la Prof.ssa McGranitt, insegnante di Trasfigurazione e severa direttrice della casa di Grifondoro; il prof. Raptor, balbuziente e costantemente impaurito insegnante di Difesa contro le Arti Oscure, con la testa sempre coperta da un turbante; il prof. Vitious, minuscolo insegnante di Incantesimi; Argus Gazza, scontroso custode del castello; e il prof. Piton, insegnante di Pozioni, che dimostra fin dall'inizio un'incredibile antipatia nei confronti di Harry. Conosce inoltre Albus Silente, un mago molto anziano, ma energico ed estremamente intelligente. Sono infine da ricordare i numerosi fantasmi che popolano la scuola, come Nick quasi-senza-testa, il prof. Rüf (noioso insegnante di Storia della Magia), il Barone Sanguinario, il Frate Grasso e Pix, un poltergeist dispettosissimo.
					Harry stringe subito una grande amicizia con Ron, e in seguito alla collaborazione che li porta a riuscire ad abbattere un enorme troll di montagna, anche con Hermione. Diventa anche grande amico dell'enorme guardiacaccia Hagrid, ingenuo e di buon cuore, ma con una terribile passione per le bestie pericolose (nel corso del libro riesce addirittura a procurarsi illegalmente un uovo di drago, da cui nascera' un cucciolo che dara' non pochi problemi a Harry, Ron e Hermione). Inoltre nel corso dell'anno Harry si guadagna un posto nella squadra di Quidditch (lo sport dei maghi, giocato a cavallo di manici di scopa) della casa di Grifondoro, nel ruolo di Cercatore, e apprende numerosi segreti del castello di Hogwarts grazie ai suoi numerosi giri notturni (assolutamente contro le regole della scuola e permessi da un Mantello dell'Invisibilita' ricevuto in eredita' dal padre James). e' proprio durante uno di questi giri notturni che Harry e i suoi amici si ritrovano in una sezione del castello chiusa agli studenti, dove scoprono un enorme e feroce cane a tre teste a guardia di una botola. Col passare dei mesi i tre scoprono che il cane appartiene ad Hagrid(che lo ha chiamato Fuffi...) e che sorveglia una Pietra Filosofale appartenente a Nicholas Flamel, un alchimista amico di Silente. Alla protezione della pietra hanno inoltre collaborato altri professori, con numerosi incantesimi e prove da superare. La pietra sembra al sicuro, ma Harry Ron e Hermione scoprono che qualcuno sta cercando di rubarla. Quel qualcuno sembra essere Piton, sorpreso dai tre a tentare di superare Fuffi e a intimorire il prof. Raptor, probabilmente per scoprire quale fosse il suo contributo nella protezione della Pietra. Un'esperienza nella Foresta Proibita che circonda la scuola porta pero' Harry ad incontrare una figura incappucciata che si nutre del sangue di un unicorno, gesto che serve per mantenersi in vita anche se si e' ad un passo dalla morte. Questo incontro gli scatena un forte dolore alla cicatrice sulla fronte, cosa che permette a Harry a capire che sotto quel cappuccio si trova Voldemort. Sfuggitogli per un soffio grazie all'aiuto del centauro Fiorenzo, Harry capisce che Piton sta cercando di rubare la Pietra Filosofale non per se stesso, ma per Voldemort, che grazie all'Elisir di Lunga Vita prodotto dalla Pietra potrebbe tornare in vita.
					Verso la fine dell'anno scolastico Harry, Ron e Hermione scoprono che Piton ha finalmente trovato il modo per superare Fuffi. Silente purtroppo non si trova a scuola in quel momento, per cui i tre ragazzi decidono di tentare di salvare da soli la Pietra Filosofale. Si trovano cosi' ad affrontare una serie di prove dopo Fuffi: il Tranello del Diavolo (una pianta che strangola gli sfortunati avventori), la ricerca di una chiava magica, una partita a scacchi con pezzi giganteschi, un troll di montagna e una sciarada con una serie di pozioni. Solo Harry riesce ad arrivare in fondo a queste prove ed entrare nella stanza finale. Qui si trova di fronte non Piton, ma Raptor, che gli racconta la verita' (senza piu' balbettare): e' lui che ha tentato per tutto l'anno di rubare la Pietra, mentre Piton cercava di impedirglielo, per donarla al suo padrone Voldemort. Questi e' ormai senza forma corporea propria, e ha preso possesso del corpo di Raptor in attesa dell'Elisir di Lunga Vita. Quando il professore si toglie il turbante mostra infatti il viso di Voldemort sbucargli dalla nuca che gli ordina di uccidere Harry. prof. Raptor si avventa sul ragazzo, ma non riesce a toccarlo senza ritrovarsi le mani incenerite. Harry sfrutta questa possibilita' inaspettata e riesce a difendersi dal professore, che rimane ucciso nel tentativo e lascia nuovamente Voldemort senza un corpo.
					Harry si risveglia in infermeria con il Professor Silente. Questi gli spiega che Voldemort non puo' toccarlo perche' e' protetto da una potente magia lasciatagli sulla pelle da sua madre Lily, quando si e' sacrificata per cercare di salvarlo da Voldemort. Si rifiuta inoltre di spiegargli perche' questi tento' di ucciderlo quando era solo un bambino, e lo informa infine del fatto che il suo amico Nicholas Flamel ha deciso di distruggere la pietra per evitare che corra nuovamente il rischio di cadere nelle mani sbagliate.
					A Harry e ai suoi amici, durante il banchetto di fine anno, vengono assegnati numerosi punti per le loro imprese eroiche, punti che permettono alla casa di Grifondoro di vincere la Coppa delle Case, lasciandoli piu' felici che mai. Harry torna infine a casa degli zii Babbani, ma con la gioia di sapere che all'inizio del nuovo anno scolastico tornera' a Hogwarts, quella che sente come la sua vera casa.
				</p>
					
				<div>
					
					<div id="imgIndietro"><img src="images/Indietro.png" alt="Torna Indietro" onclick="indietro();"/></div>
					<div id="imgAvanti"><img src="images/Avanti.png" alt="Vai Avanti" onclick="avanti();"/></div>
					<div id="paginaAttualeDiv"><p id="paginaAttuale"></p></div>
					
				</div>
				
				<script src="scripts/daTesto.js" type="text/javascript"></script>
				
				<table width="100%">
					
					<tr>
						
						<td style="text-align: center; width: 25%;"><a onclick="mostraPagina( 1, frasiPerPagina ); updatePageNumber();" style="cursor: pointer;">Pagina 1</a></td>
						<td style="text-align: center; width: 25%;"><a id="infoPagAttuale" ></a></td>
						<td style="text-align: center; width: 25%;"><a id="finalPage" onclick="mostraPagina( maxPagine, frasiPerPagina ); updatePageNumber();" style="cursor: pointer;"></a></td>
						<td style="text-align: center; width: 25%;">
							
							<a>Vai a pagina: </a>
							<input type="number" id="pagSel" style="width: 50px;"/>
							<button onclick="if ( document.getElementById(\'pagSel').value >= 1 && document.getElementById(\'pagSel').value <= maxPagine ) { mostraPagina( document.getElementById('pagSel').value, frasiPerPagina ); updatePageNumber(); } else { alert ('Pagina non valida')}">Vai</button>
							
						</td>
						
					</tr>
					
				</table>
				
				<script type="text/javascript">
					
					document.addEventListener('keyup', tastoPremuto, true);
					document.getElementById('finalPage').innerHTML = "Ultima Pagina: "+maxPagine;
					mostraPagina( pagina, frasiPerPagina );
					updatePageNumber();
				
				</script>
						
				<iframe id="iframe" name="audio" src="audioDaTesto.html" width="100%" frameborder="no"></iframe>
			
			</div>
						
			<footer>
				
				<h2 class="blockTitle">V.E.R.O.N.I.C.A.</h2>
				<p>Realizzato dal Veronica Team</p>
				
			</footer>
			
		</div>
		
	</body>
	
</html>