<?php
namespace Mail;

require __DIR__.'/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

abstract class Mail {   

    private $mail;
    private $name;
    private $config;
    
    function __construct($name,$config)
    {
        $this->name = $name;
        $this->config=$config;
        $this->mail = new PHPMailer(true); 
        $this->mailConfig();
    }

    public function mailConfig()
    {
        try {
            $this->mail->isSMTP();
            $this->mail->Host = $this->config['mail']['host'];
            $this->mail->SMTPAuth = true;
            $this->mail->Username =  $this->config['mail']['username'];
            $this->mail->Password = $this->config['mail']['password'];
            $this->mail->SMTPSecure = $this->config['mail']['secure'];
            $this->mail->Port = $this->config['mail']['port'];
            $this->mail->setFrom($this->config['mail']['username'],$this->name);
        }
        catch (Exception $e) {
            return 'Exception: ' . $e->getMessage();
        }
    }

    public function addFile($path)
    {
        if (!empty($path) && file_exists($path))
        {
            $this->mail->addAttachment($path);
        }
        else {
            return 'Нет такого файла!';
        }
    }

    public function sendMail($email, $text, $subject)
    {
        $this->mail->addAddress($email);
        $this->mail->Subject = $subject;
        $this->mail->Body = $text;
        if($this->mail->send()){
            return 'Сообщение отправлено';
        }
        else {
            return 'Попробуйте снова!';
        }
    }
}