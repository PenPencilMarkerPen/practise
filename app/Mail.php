<?php

require __DIR__.'/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function validateMail($email_a):bool
{
    return (filter_var($email_a, FILTER_VALIDATE_EMAIL))? true:false;
}

function validateInputs($email, $name, $text, $subject):bool
{
    return validateMail($email) && !empty($name) && !empty($text) && !empty($subject);
}


function sendMail($email, $name, $text, $subject, $path=NULL):string{
    $config = parse_ini_file(__DIR__.'/../config.ini', true);

    $isValidateInputs =  validateInputs($email, $name, $text, $subject);

    if (!$isValidateInputs)
    {
        return 'Проверьте корректность ввода данных';
    }

    $mail = new PHPMailer(true); 

    try {

        $mail->isSMTP();
        $mail->Host = $config['mail']['host'];
        $mail->SMTPAuth = true;
        $mail->Username =  $config['mail']['username'];
        $mail->Password = $config['mail']['password'];
        $mail->SMTPSecure = $config['mail']['secure'];
        $mail->Port = $config['mail']['port'];
        $mail->setFrom($config['mail']['username'],$name);
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $text;

        if (!empty($path) && file_exists($path))
        {
            $mail->addAttachment($path);
        }

        if($mail->send()){
            return 'Сообщение отправлено';
        }
        else {
            return 'Попробуйте снова!';
        }

    } catch (Exception $e) {
        return 'Exception: ' . $e->getMessage();
    }
}


