<?php
function enviarCorreo(){
	require_once "swift_required.php";
	$contenido="<marquee>CONTENIDO DEL MENSAJE</marquee>";
	$message = Swift_Message::newInstance();
	$message->setSubject("MAIL DE PRUEBA");
	$message->setFrom(array("recursoshumanos.rangerbourg@gmail.com" => "Recursos Humanos"));
	$message->setTo(array("wilpe88@gmail.com"=>"wilmer prueba"));
	$message->addPart($contenido, "text/html");
	$transport = Swift_SmtpTransport::newInstance("smtp.gmail.com", 465, "ssl");
	$transport->setUsername("recursoshumanos.rangerbourg@gmail.com");
	$transport->setPassword("vmj7901234");
	$mailer = Swift_Mailer::newInstance($transport);
	$result = $mailer->send($message);
}

enviarCorreo();
echo "Enviado...";
?>