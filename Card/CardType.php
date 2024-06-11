<?php

namespace CardType;

class CardType {
    
    protected $regex;
    protected $card_type;
    private $card_number;

    function __construct($card_number )
    {
        $this->card_number = $card_number; 
    }

    public function setCardType()
    {
        return $this->card_type;
    }
    
    public function setCardNumber()
    {
        return $this->card_number;
    }

    private function alghLyna():bool {
        $sum = 0;
        for ($x=strlen($this->card_number)-1; $x>=0; $x--)
        {
            if ($x % 2 == 0) 
            {
                $sum+= (int)$this->card_number[$x]*2 <= 9 ? (int)$this->card_number[$x]*2 : (int)$this->card_number[$x]*2-9;
            }
            else {
                $sum+= (int)$this->card_number[$x];
            }
        };
        return $sum % 10 == 0 ? true : false;
    }

    public function typeCard() {

        $checksum = $this-> alghLyna();
        if (!$checksum)
        {
            return false;
        }

        if (preg_match($this->regex, $this->card_number)){
            return true;
        }
        else {
            return false;
        }
    }

}