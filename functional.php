<?php


function alghLyna($numberCard):bool {
    $sum = 0;
    $cardLength = strlen($numberCard)-1;
    for ($x=$cardLength; $x>=0; $x--)
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

function typeCard($numberCard):string {
    $isValidCard = alghLyna($numberCard);
    if ($isValidCard) {
        $regexPatterns = [
            '/^4[0-9]{12}([0-9]{3})?$/' => 'Visa',
            '/^5[1-5][0-9]{14}$/' => 'MasterCard',
            '/^(5018|5020|5038|5893|6304|6759|6761|6762|6763)\d{8,15}$/' => 'Maestro',
            '/^(14|81|99)\d{12}$/' => 'Даронь Кредит'
        ];
        
        foreach ($regexPatterns as $pattern => $cardType) {
            if (preg_match($pattern, $numberCard)) {
                return 'Карта соответствует платежной системе '. $cardType;
            }
        }
        
        return 'Карты данной платежной системы не поддерживаются!';
    }
    return 'Проверьте правильность ввода данных '. $numberCard;
}


print typeCard('12325225252')."\n";
