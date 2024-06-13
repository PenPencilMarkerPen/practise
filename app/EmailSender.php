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
        return $this->validateMail($email) && !empty($name) && !empty($text) && !empty($subject);
    }

}




