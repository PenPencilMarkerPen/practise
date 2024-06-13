<?php

require_once('EmailSender.php');

use EmailSender\EmailSender;

function testEmailSender($email, $name, $text, $subject)
{
    $config = parse_ini_file(__DIR__.'/../config.ini', true);
    if (!$config) {
        return 'Ошибка чтения конфигурационного файла.';
    }

    $mailSender = new EmailSender($config);
    if ($mailSender->validateInputs($email, $name, $text, $subject)) {
        return $mailSender->sendMail($email, $name, $text, $subject)."\n";
    } else {
        return 'Проверьте правильность ввода данных!'."\n";
    }
}

echo testEmailSender('andreidemianov2016@yandex.ru', 'Test name', 'Test text', 'Test subject');