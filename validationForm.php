<?php 
	header("Cache-Control: max-age=1");
	if($_SERVER['REQUEST_METHOD']=='POST'){
	$nom = $_POST['nom'];
	$message = $_POST['msg'];
	$email = $_POST['email'];


	if($nom!='' && $message!='' && $email !='' && $nom!=' ' && $message!=' ' && $email !=' ' && filter_var( $email, FILTER_VALIDATE_EMAIL )){
		//couper les lignes comprenant plus de 70 caractères
		$message = wordwrap($message, 70);
		$messageEnvoyer = "Vous avez reçu un message de la part de ".$nom." (".$email.") - Voici le message : ".$message;

		//envoyer l'email
		mail('jawsgueders@yahoo.fr', 'Envoyé par'.$email, $messageEnvoyer);
		header('Location: email.html');
	}
	else{
		header('Location: /');
	}
}
