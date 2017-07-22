<?php
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$subject = htmlspecialchars($_POST['subject']);
	$message = htmlspecialchars($_POST['message']);
	if($name == "" || $email == "" || $subject == "" || $message == ""){
		echo "Заполните все поля";
		exit;
	} 
	// отправка
	//$subject = "=?utf-8?B?".base64_encode($subject)."?=";
	$headers = "From: $email\r\nReply-To: $email\r\nContent-type: text/html; charset = utf-8\r\n";
	if(mail("test.mail@gmail.com", $subject, $message, $headers)){
		echo "Ваше сообщение было отправлено!";
	}else{
		echo "Неизвестная ошибка!";
	}
?>