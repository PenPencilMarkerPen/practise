<?php

namespace Card;

abstract class Card {
    
    protected $regex;
    protected $cardType;
    protected $cardNumber;

    function __construct($regex, $cardType, $cardNumber)
    {
        $this->regex = $regex;
        $this->cardType = $cardType;
        $this->cardNumber = $cardNumber; 
    }

    public function getCardType():string
    {
        return $this->cardType;
    }
    
    public function getCardNumber():string
    {
        return $this->cardNumber;
    }


    public function typeCard($isValidCard): bool {
        if (!$isValidCard)
        {
            return false;
        }

        if (preg_match($this->regex, $this->cardNumber)){
            return true;
        }
        else {
            return false;
        }
    }

}