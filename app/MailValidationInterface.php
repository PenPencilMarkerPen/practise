<?php

namespace MailValidationInterface;

interface MailValidationInterface {

    public function validateMail($email_a):bool;
    public function validateInputs($email, $name, $text, $subject):bool;
}

