<?php

namespace CardMaestro;

require_once dirname(__DIR__) . '/CardType.php';

use CardType\CardType;



class CardMaestro extends CardType {

    protected $regex = '/^(5018|5020|5038|5893|6304|6759|6761|6762|6763)\d{8,15}$/';
    protected $card_type = 'Maestro';
}

