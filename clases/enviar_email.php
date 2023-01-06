<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  //SMTP::DEBUG_OFF;                   //Enable verbose debug output
    $mail->isSMTP();                                                             //Send using SMTP
    #$mail->Host       = 'prueba-pagos.castelancarpinteyro.club';                 //Set the SMTP server to send through

    $phpmailer->SMTPSecure = 'ssl';
    $phpmailer->Host = "smtp.gmail.com"; // GMail
    $phpmailer->Port = 465;



    $mail->SMTPAuth   = true;                                                    //Enable SMTP authentication
    #$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    #$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->Username   = 'pruebaphpmailer2005@gmail.com';                     //SMTP username
    $mail->Password   = 'weakPassword';                               //SMTP password

    //Recipients
    $mail->setFrom('pruebaphpmailer2005@gmail.com', 'PHP Mailer');
    $mail->addAddress('dantecc10@gmail.com', 'Dante');     //Add a recipient
    /*     $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com'); */

    //Envio de archivos
    /*     $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Detalles de compra';

    $cuerpo = '<h4>Gracias por su compra</h4>';
    $cuerpo .= '<p>El ID de su compra es <b>' . $id_trasacción . '</b></p>';

    $mail->Body    = imap_utf8($cuerpo);
    $mail->AltBody = 'Detalles de compra';

    $mail->setLanguage('../phpmailer/language/phpmailer.lang-es.php');

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    exit;
}
