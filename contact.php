<?php
$errors = '';
/* your email here */
$myemail = 'edwin.barrionuevo@gmail.com';
if(empty($_POST['name']) ||
   empty($_POST['email']) ||
   empty($_POST['phone']) ||
   empty($_POST['message']))
{
	$errors .= "\n Error: all fields are required";
}

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email_address)) {
	$errors .= "\n Error: This is invalid email address";
}

if( empty($errors) ) {
	$to = $myemail;
	$email_subject = "ESTUDIO CREATIVO CONSULTA: $name";
	$email_body = "Tu mensaje a sido recibido ".
	" Aqui estan los datos Personales:\n Nombre: $name \n Email: $email_address \n Celular: $phone \n Mensaje: $message";

	$headers = "From: $myemail\n";
	$headers .= "Reply-To: $email_address";

	mail($to,$email_subject,$email_body,$headers);
	// redirect to the 'thank you' page
	header('Location: thank-you.html');
}
?>
<!Doctype html>
<html lang="en">
<head>

	<title>Thank you!</title>

	<link rel="icon" href="img/favicon.png">

<!-- define some style elements-->

<style>
h1 {
	font-family : 'Oxygen', Helvetica, sans-serif;
	font-size: 26px;
    letter-spacing: 2px;
    line-height: 42px;
    margin-bottom: 20px;
    font-weight: bold;	
}

label,a,body {
	font-family : 'Oxygen', Helvetica, sans-serif;
	font-size : 14px;
}
.respond {
	padding: 100px 0;
	text-align: center;
}
</style>	

<!-- a helper script for vaidating the form-->
</head>	
<body>

<div class="respond">
	<h1>Muchas Gracias!</h1>
	<p>Nos pondremos en contacto con usted lo mas pronto posible!</p>
</div>

</body>
</html>






