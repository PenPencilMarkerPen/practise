<?php

namespace Card;

abstract class Card {
    
    protected $regex;
    protected $cardType;
    private $cardNumber;

    function __construct($regex, $cardType, $cardNumber)
    {
        $this->regex = $regex;
        $this->cardType = $cardType;
        $this->cardNumber = $cardNumber; 
    }

    public function setCardType()
    {
        return $this->cardType;
    }
    
    public function setCardNumber()
    {
        return $this->cardNumber;
    }

    private function alghLyna():bool {
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

    public function typeCard(): bool {
        $isValidCard = $this-> alghLyna();
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