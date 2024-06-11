<?php

require_once('Card/Cards/BankCard.php');

use BankCard\BankCard;



function TestCard($cardNumber){
    $cards = [
        new BankCard('/^(14|81|99)\d{12}$/', 'Даронь Кредит', $cardNumber),
        new BankCard('/^(5018|5020|5038|5893|6304|6759|6761|6762|6763)\d{8,15}$/', 'Maestro', $cardNumber),
        new BankCard('/^5[1-5][0-9]{14}$/', 'MasterCard', $cardNumber),
        new BankCard('/^4[0-9]{12}([0-9]{3})?$/', 'Visa', $cardNumber)
    ];
    foreach($cards as $card) {
        if ($card->typeCard())
        {
            return "Карта соответствует платежной системе ".$card->setCardType();
        }
    }
    return "Проверьте правильность ввода данных $cardNumber";
}

print TestCard('1213124242255')."\n";