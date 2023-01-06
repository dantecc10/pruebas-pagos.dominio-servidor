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
    $mail->Host       = 'prueba-pagos.castelancarpinteyro.club';                 //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                                    //Enable SMTP authentication
    $mail->Username   = 'no-reply@prueba-pagos.castelancarpinteyro.club';                     //SMTP username
    $mail->Password   = 'serverReply1!';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('no-reply@prueba-pagos.castelancarpinteyro.club', 'Tienda online');
    $mail->addAddress('jeremy.hdez9@gmail.com', 'User');     //Add a recipient
    /*$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com'); */

    //Envio de archivos
    /*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Detalles de compra';

    $cuerpo = '<h4>Gracias por su compra</h4>';
    $cuerpo .= '<p>El ID de su compra es <b>' . $$id_trasaccion . '</b></p>';

    $mail->Body    = imap_utf8($cuerpo);
    $mail->AltBody = 'Detalles de compra';

    //$mail->setLanguaje('../phpmailer/language/phpmailer.lang-es.php');

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    exit;
}
