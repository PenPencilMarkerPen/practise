<?php

require_once('Card/Cards/CardCredit.php');
require_once('Card/Cards/CardMaestro.php');
require_once('Card/Cards/CardMasterCard.php');
require_once('Card/Cards/CardVisa.php');

use CardCredit\CardCredit;
use CardMasterCard\CardMasterCard;
use CardVisa\CardVisa;
use CardMaestro\CardMaestro;



function TestCard($number_card){
    $cards = [
        new CardCredit($number_card),
        new CardMasterCard($number_card),
        new CardVisa($number_card),
        new CardMaestro($number_card)
    ];
    foreach($cards as $card) {
        if ($card->typeCard())
        {
            return "Карта соответствует платежной системе ".$card->setCardType();
        }
    }
    return "Проверьте правильность ввода данных $number_card";
}

print TestCard('1234567891324567')."\n";