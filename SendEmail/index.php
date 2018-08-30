<html>
<head>
<title>Modelo de envio de email</title>
</head>
<body>
<form method="post" action="/Projects/SendEmail/index.php">
	<table>
		<tbody>
			<tr>
				<td>Email:</td>
				<td>
					<input type="text" name="email"/>
				</td>
			</tr>
			<tr>
				<td>Título:</td>
				<td>
					<input type="text" name="title"/>
				</td>
			</tr>
			<tr>
				<td>Mensagem:</td>
				<td>
					<input type="text" name="mensagem"/>
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit">Enviar</button>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<?php
//https://stackoverflow.com/questions/5335273/how-to-send-an-email-using-php
if($_SERVER["REQUEST_METHOD"] === "POST"){
	echo "set</br>";
	$email = $_POST["email"];
	
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';
	require 'phpmailer/src/Exception.php';

	$mail = new PHPMailer\PHPMailer\PHPMailer();

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'user@example.com';                 // SMTP username
	$mail->Password = 'secret';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

	$mail->From = 'from@example.com';
	$mail->FromName = 'Mailer';
	$mail->addAddress($_POST["email"]);               // Name is optional

	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $_POST["title"];
	$mail->Body    = $_POST["mensagem"];
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent';
	}
}else{
	echo "not set</br>";
}
?>
</body>
</html>
