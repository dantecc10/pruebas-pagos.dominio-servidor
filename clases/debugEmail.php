<?php

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

#require '../phpmailer/src/PHPMailer.php';
#require '../phpmailer/src/SMTP.php';
#require '../phpmailer/src/Exception.php';

//Create an instance; passing `true` enables exceptions

try {
    $mail = new PHPMailer(true);
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  //SMTP::DEBUG_OFF;                   //Enable verbose debug output
    $mail->isSMTP();                                                             //Send using SMTP
    $mail->Host = "smtp.ionos.mx"; // GMail
    $mail->SMTPAuth   = true;                                                    //Enable SMTP authentication
    $mail->Username   = 'script_test@prueba-pagos.castelancarpinteyro.club';                     //SMTP username
    $mail->Password   = 'script_test';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //'ssl';
    #$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    #$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 465;  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    #    #$mail->Host       = 'prueba-pagos.castelancarpinteyro.club';  //Set the SMTP server to send through
    #    #$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  //Enable implicit TLS encryption
    #$phpmailer->Port = 465;

    #    //Recipients
    #    $mail->setFrom('script_test@prueba-pagos.castelancarpinteyro.club', 'Tienda');
    #    $mail->addAddress('dantecc10@gmail.com', 'Dante');     //Add a recipient
    #    $mail->addAddress('jeremy.hdez9@gmail.com', 'Jeremías');     //Add a recipient
    #    $mail->addReplyTo('script_test@prueba-pagos.castelancarpinteyro.club', 'Tienda');

    #    /*     $mail->addReplyTo('info@example.com', 'Information');
    #    $mail->setFrom('no-reply@prueba-pagos.castelancarpinteyro.club', 'Tienda online');
    #    $mail->addCC('cc@example.com');
    #    $mail->addBCC('bcc@example.com'); */

    /*    //Envio de archivos
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */    //Optional name

    /*    
    //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Detalles de compra';
        $cuerpo = '<h4>Gracias por su compra</h4>';
        $cuerpo .= ('<p>El ID de su compra es <b>exitosa</b></p>');
        $mail->Body    = imap_utf8($cuerpo);
        $mail->AltBody = 'Le enviamos los detalles de su compra.';
    
        $mail->setLanguage('es', '../phpmailer/language/phpmailer.lang-es.php');
    */

    #    $mail->send();
}catch (Exception $e) {
    echo "Error al enviar el correo electrónico de la compra: {$mail->ErrorInfo}";
    exit;
}
