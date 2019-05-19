<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard</title>
</head>

<body>
	<?php
		$current_file_path = dirname(__FILE__);
		$fullpath = $current_file_path . DIRECTORY_SEPARATOR . 'uploads/';
		$marquepath = $fullpath . $_POST['marque']. DIRECTORY_SEPARATOR;
		// Fait le dossier de la marque
		if (is_dir($marquepath) == FALSE){ 
			mkdir($fullpath.$_POST['marque'] , 0777);
		}
		// Rajoute les fichiers


		if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0){
			$infosfichier = pathinfo($_FILES['monfichier']['name']);
			$extension_upload = $infosfichier['extension'];
			$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
			if (in_array($extension_upload, $extensions_autorisees))
			{
				move_uploaded_file($_FILES['monfichier']['tmp_name'], $marquepath . basename($_FILES['monfichier']['name']));
				echo nl2br("L'envoi a bien été effectué !\n");
			}
		}
		else
			echo nl2br("Vous avez oublié d'envoyer la première image\n");


		if (isset($_FILES['monfichier2']) AND $_FILES['monfichier2']['error'] == 0){
			$infosfichier = pathinfo($_FILES['monfichier2']['name']);
			$extension_upload = $infosfichier['extension'];
			$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
			if (in_array($extension_upload, $extensions_autorisees))
			{
				move_uploaded_file($_FILES['monfichier2']['tmp_name'], $marquepath . basename($_FILES['monfichier2']['name']));
			}
		}
		else
			echo nl2br("Vous avez oublié d'envoyer la seconde image \n");


		if (isset($_FILES['monfichier3']) AND $_FILES['monfichier3']['error'] == 0){
			$infosfichier = pathinfo($_FILES['monfichier3']['name']);
			$extension_upload = $infosfichier['extension'];
			$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
			if (in_array($extension_upload, $extensions_autorisees))
			{
				move_uploaded_file($_FILES['monfichier3']['tmp_name'], $marquepath . basename($_FILES['monfichier3']['name']));
			}
		}
		else
			echo nl2br("Vous avez oublié d'envoyer la troisième image\n");
	?>
	<a href="index.html">Acceder au streaming</a>
</body>

</html>