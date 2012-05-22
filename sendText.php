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
			$array=explode('.',$_FILES['file']['name']);
			$dimensione=sizeof($array);
			$formato=$array[($dimensione - 1)];
			echo 'Il formato è: '.$formato. '<br>';
			if($formato=='txt'){
				//sposto il file caricato dalla cartella temporanea alla destinazione finale
				$n=substr(shell_exec('ls -l documenti/ | wc -l'),0,-1);
				shell_exec('mkdir documenti/' .$n);
				move_uploaded_file($_FILES['file']['tmp_name'], 'documenti/'.$n.'/' . $_FILES['file']['name']);
				echo 'File caricato in documenti/'.$n.'/' . $_FILES['file']['name'] . "<br>";
				$host = 'localhost';
				$user = 'root';
				$pass = 'salal';
				$link = mysql_connect($host, $user, $pass) or die(mysql_error());
				$nomedb = 'OURveronicaDB';
				$db=mysql_select_db($nomedb,$link);	
				$query='insert into Testo values ('.$n.',"'.$_POST['tipologia'].'", "'.$_POST['materia'].'", "'.$_POST['argomento'].'")';
				mysql_query($query);
				$query='insert into Doc values ("'.$_POST['titolo'].'", "'.$_POST['autore'].'", '.$n.', "/home/tesi-fegi/Dropbox/Server/drupal/documenti/'.$n.'/'.$_FILES['file']['name'].'", "NO", "IO")';
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
