<?php

namespace CardMasterCard;

require_once dirname(__DIR__) . '/CardType.php';


use CardType\CardType;



class CardMasterCard extends CardType {

    protected $regex = '/^5[1-5][0-9]{14}$/';
    protected $card_type = 'MasterCard';

}

