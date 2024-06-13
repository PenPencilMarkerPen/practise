<?php

namespace EmailSender;

require_once('Mail.php');
require_once('MailValidationInterface.php');

use Mail\Mail;
use MailValidationInterface\MailValidationInterface;


class EmailSender extends Mail implements MailValidationInterface {

    public function validateMail($email_a):bool
    {
        return (filter_var($email_a, FILTER_VALIDATE_EMAIL))? true:false;
    }


    public function validateInputs($email, $name, $text, $subject):bool
    {
        return validateMail($email) && !empty($name) && !empty($text) && !empty($subject);
    }

}

$config = parse_ini_file(__DIR__.'/../config.ini', true);

$mailSender = new EmailSender('Test', $config);
$mailSender->sendMail('example@mail.com', 'Text message', 'Test subject');