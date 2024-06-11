<?php

namespace CardCredit;


require_once dirname(__DIR__) . '/CardType.php';

use CardType\CardType;


class CardCredit extends CardType {

    protected $regex = '/^(14|81|99)\d{12}$/';
    protected $card_type = 'Даронь Кредит';
}


