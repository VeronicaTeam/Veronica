<style type="text/css">
#barraTitolo {
	background-color: #09F;
	font-weight: bolder;
	text-transform: uppercase;
	color: #000;
	line-height: 25px;
}
</style>

<?php
// informazioni sull'utente: username e password.
$user 		= $_POST['user'];	
$password 	= $_POST['password'];

// stablisce una connessione in locale al database 'veronica' con utente e password recuperate prima.	
$conn = new mysqli('localhost', $user, $password , 'OURveronicaDB' );

// Rende il codice d'errore dell'ultima chiamata alla funziona mysqli_connect(), se fallita. Se non ci sono errori, rende zero.
if (mysqli_connect_errno() != 0){
	$errno = mysqli_connect_errno();
	$errmsg = mysqli_connect_errno();
	echo "Username e/o password errati! /n Connessione fallita mysqli_connect_errno con: ($errno) $errmsg<br/>\n";	
	exit;
}

$conn->query("SET NAMES 'utf8'");

$query_str = "SELECT * FROM Utente";
$result = @$conn->query($query_str);

if($result === FALSE){
	$errno = $conn->$errno;
	$errmsg = $conn->$error;
	echo "Connessione fallita query con: ($errno) $errmsg<br/>\n";	
	$conn->close();
	exit;
}else{
	echo <<<EOM
<table border='1' >
<tr id='barraTitolo'>
<td>Username</td>
<td>Nome</td>
<td>Cognome</td>
</tr>	

EOM;

while(($row_data = @$result->fetch_assoc()) !== NULL)
{
	echo <<<EOM

<tr>
<td>{$row_data['Username']}</td>
<td>{$row_data['Nome']}</td>
<td>{$row_data['Cognome']}</td>
</tr>	

EOM;
}

echo <<<EOTABLE
</table>
EOTABLE;

$result->close();
}

$conn->close();

?>