<?php

namespace CardVisa;

require_once dirname(__DIR__) . '/CardType.php';


use CardType\CardType;

class CardVisa extends CardType {

    protected $regex = '/^4[0-9]{12}([0-9]{3})?$/';
    protected $card_type = 'Visa';
}

