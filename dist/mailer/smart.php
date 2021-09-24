<?php 

$recipient = ''; 		// <-- Your emeil
$mail->Username = ''; 	// <-- Your gmeil for sending     
$mail->Password = ''; 	// <-- Your gmail pass     

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$text = $_POST['text'];

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->CharSet = 'utf-8';
                             
$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true;                                               
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 587;                                   
 
$mail->setFrom('test.m2jftk3s51@gmail.com', 'Web_Booster');   
$mail->addAddress('const.trofimov@gmail.com');     
$mail->isHTML(true);                                
$mail->Subject = 'Данные';
$mail->Body    = '
Пользователь оставил данные <br> 
Имя: ' . $name . ' <br>
Телефон: ' . $phone . ' <br>
E-mail: ' . $email . '<br>
Сообщение: ' . $title . '';

if(!$mail->send()) {
	return false;
} else {
	return true;
}

?>