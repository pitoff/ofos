<?php
// namespace app\libraries;
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

class Mail
{
    public $mail;

    public function __construct()
    {
        //Instantiation and passing `true` enables exceptions
        $this->mail = new PHPMailer(true);
    }

    public function send($subject, $message, $to)
    {
        try {
            //Server settings
            $this->mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $this->mail->isSMTP();                                            //Send using SMTP
            $this->mail->Host       = '';                     //Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mail->Username   = '';                     //SMTP username
            $this->mail->Password   = '';                               //SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $this->mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $this->mail->setFrom('pit@seagullshipmentbd.com', 'Ofos');
            $this->mail->addAddress($to);               //Name is optional

            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $message;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
