function riproduci(event) {

	var testo = document.getElementById('paginaAttuale');	
	var array = new Array();
	
	for (var i = 0; i < testo.childNodes.length; i++) {
		
		array[i] = document.getElementById( 'a'+i.toString() ).innerHTML;
		
	}
		
	var first = event.target.id.slice( 1 );
	var length = array.length;
	var text = '';
		
	for (var i = first; i < length; i++) {
		
		text = text+document.getElementById( 'a'+i.toString() ).innerHTML;
		
	}

	/* 1) Codifica dell'informazione prima dell'invio */
//	ciphertext = codifica_lettura(text);

	/* 2) Invio dell'informazione codificata al server per la generazione del file audio */
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","daTesto.php",true);
	xmlhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("testo="+text);

	/* Ricezione risposta codificata dal server */
	/* Decodifica del file audio ricevuto dal server */
	/* Esecuzione del file audio */
	var frame = document.getElementById('iframe');
	frame.src = 'audioDaTesto.html';
	
}

function splitText() {
	
	var testo = document.getElementById('paginaAttuale');
	var array = testo.innerHTML.split(" ");
	
	testo.innerHTML = "";
	
	array.reverse();
	var arrayLength = array.length;
			
	for (var i = 0; i < arrayLength; i++) {
		
		testo.innerHTML = testo.innerHTML+"<a class='libro' id='a"+i.toString()+"' onClick='riproduci(event)' >"+array.pop()+" </a>";
		
	}	
}

function avanti () {
	
	if ( pagina != maxPagine ) {
		
		pagina++;
		mostraPagina( pagina, frasiPerPagina );
		updatePageNumber();
		
	}
	
}

function indietro () {
	
	if ( pagina != 1 ) {
		
		pagina--;
		mostraPagina( pagina, frasiPerPagina );
		updatePageNumber();
		
	}
	
}

function mostraPagina ( pag, frasiPerPagina ) {
	
	paginaAttuale.innerHTML = '';
	
	for (var i = (pag-1)*frasiPerPagina; i < pag*frasiPerPagina && i < numFrasi; i++) {
		
		paginaAttuale.innerHTML = paginaAttuale.innerHTML + arrayFrasi[i] + '.';
		
	}
	
	pagina = pag;
	
}

function tastoPremuto(evento) {

	if (evento.keyCode == 37) {
	
		indietro();
		updatePageNumber();
		
	} else if (evento.keyCode == 39) {
		
		avanti();
		updatePageNumber();
		
	}

}

function updatePageNumber() {
	
	splitText(); 
	document.getElementById('infoPagAttuale').innerHTML = 'Pagina: '+pagina;
	
}

var testo = document.getElementById('testoLibro').innerHTML;
var paginaAttuale = document.getElementById('paginaAttuale');
var arrayFrasi = testo.split('.');
var numFrasi = arrayFrasi.length;
var frasiPerPagina = 15;
var pagina = 1;
var maxPagine = Math.floor(numFrasi/frasiPerPagina)+1;
