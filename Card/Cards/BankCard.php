<?php

namespace BankCard;

require_once 'Card.php';
require_once 'CardLogic.php';

use Card\Card;
use CardLogic\CardLogic;

class  BankCard extends Card implements CardLogic {

    public function alghLyna():bool
    {
        $sum = 0;
        $cardLength = strlen($this->cardNumber)-1;
        for ($x=$cardLength; $x>=0; $x--)
        {
            if ($x % 2 == 0) 
            {
                $sum+= (int)$this->cardNumber[$x]*2 <= 9 ? (int)$this->cardNumber[$x]*2 : (int)$this->cardNumber[$x]*2-9;
            }
            else {
                $sum+= (int)$this->cardNumber[$x];
            }
        };
        return $sum % 10 == 0 ? true : false;
    }
}
