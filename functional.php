<?php


function alghLyna($numberCard):bool {
    $sum = 0;
    for ($x=strlen($numberCard)-1; $x>=0; $x--)
    {
        if ($x % 2 == 0) 
        {
            $sum+= (int)$numberCard[$x]*2 <= 9 ? (int)$numberCard[$x]*2 : (int)$numberCard[$x]*2-9;
        }
        else {
            $sum+= (int)$numberCard[$x];
        }
    };
    return $sum % 10 == 0 ? true : false;
}

function typeCard($numberCard) {
    $checksum = alghLyna($numberCard);
    if ($checksum) {
        $regex_patterns = [
            '/^4[0-9]{12}([0-9]{3})?$/' => "Visa",
            '/^5[1-5][0-9]{14}$/' => "MasterCard",
            '/^(5018|5020|5038|5893|6304|6759|6761|6762|6763)\d{8,15}$/' => "Maestro",
            '/^(14|81|99)\d{12}$/' => "Даронь Кредит"
        ];
        
        foreach ($regex_patterns as $pattern => $card_type) {
            if (preg_match($pattern, $numberCard)) {
                return "Карта соответствует платежной системе $card_type";
            }
        }
        
        return "Карты данной платежной системы не поддерживаются!";
    }
    return "Проверьте правильность ввода данных $numberCard";
}


print typeCard('4062821234567')."\n";
