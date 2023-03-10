<?php

/*
*
* Están los archivos metidos así, manual. Me gustaría que me enseñaras a usar el composer porque nomás no lo he hecho, sino que manualmente voy metiendo las cosas. Pero sirve bien este
* 
*
*/

//require_once('phpmailer/PHPMailerAutoload.php');
//la version con vulnerabilidades es la linea justo debajo
//require_once('PHPMailerAutoload.php');
//nueva version 6.1.1
namespace PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('PHPMailer.php');
require_once('SMTP.php');
require_once('Exception.php');


$mail = new PHPMailer;

//$mail->SMTPDebug    = 3;

$mail->IsSMTP();
$mail->Host = "castelancarpinteyro.com";#'classicandsacrum.com';   /*Servidor SMTP no pongas la ip, pon el nombre de la dns inversa*/																		
$mail->SMTPSecure = 'TLS';   /*Protocolo SSL o TLS*/
$mail->Port = 587;   /*Puerto de conexión al servidor SMTP*/
$mail->SMTPAuth = true;   /*Para habilitar o deshabilitar la autenticación*/
$mail->Username = "dante@castelancarpinteyro.com";#'academia@classicandsacrum.com';   /*Usuario, normalmente el correo electrónico*/
$mail->Password = 'DarkseidPower22!!';   /*Tu contraseña*/
$mail->From = "dante@castelancarpinteyro.com";#'academia@classicandsacrum.com';   /*Correo electrónico que estamos autenticando*/
$mail->FromName = 'Dante Castelán Carpinteyro';   /*Puedes poner tu nombre, el de tu empresa, nombre de tu web, etc.*/
$mail->CharSet = 'UTF-8';   /*Codificación del mensaje*/

?>