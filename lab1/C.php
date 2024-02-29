<?php

$fileOpen = __DIR__ . '/C/001.dat';


$arrayFile = file($fileOpen);


print_r($arrayFile);


$PhoneArray = [];
$mailArray = [];
$dateArray = [];
$stringArray = [];
$numberArray = [];




foreach ($arrayFile as $key => $value) {

    if (preg_match("/P/",$value) == 1){
     array_push($PhoneArray,preg_replace("/[<>P]/","",$value)); 
    }

    if (preg_match("/E/",$value) == 1){
     array_push($mailArray,preg_replace("/[<>E]/","",$value));
    }

    if (preg_match("/D/",$value) == 1){
        array_push($dateArray,preg_replace("/[<>D]/","",$value));
    }

    if (preg_match("/S/",$value) == 1){
        array_push($stringArray,preg_replace("/[S]/","",$value));
    }


    
}

## Собираем строки



# print_r($stringArray);


foreach ($stringArray as $key => $value) {
    if (preg_match_all("/\b(\d+)\b/", $value, $matches)) {
        $numberOne = $matches[0][0];
        $numberTwo = $matches[0][1];

    } 

   $checkString = preg_replace("/\d+/","",$stringArray[0]);


   preg_match('/<([^>]*)>/', $checkString, $matches); 
   if (isset($matches[1])) {
       $str = $matches[1];
       echo $str,"\n";
       
       /** @var string $symbols */
       $symbols = str_split((string) $str); 
       
       print_r($symbols);
   }

    if (count($symbols) >= $numberOne && count($symbols) <= $numberTwo){
        echo "OK\n";
    } else {
        echo "FAIL\n";
    }


} 






## Собираем номера телефонов 

# print_r($PhoneArray);


foreach ($PhoneArray as $key => $value) {
if (preg_match("/\+[7-8] \([0-9]{3}\) [0-9]{3}-[0-9]{2}-[0-9]{2}/", $value) == 1) {
    echo "OK\n";
} else {
    echo "FAIL\n";
}

 
}



## Собираем даты


# print_r($dateArray);


foreach ($dateArray as $key => $value) {
    if (preg_match("/(0[1-9]|[12][0-9]|3[01])[- \.](0[1-9]|1[012])[- \.](19|20)\d\d\s(0\d|1\d|2[0-3]|1|2|3|4|5|6|7|8|9|0):[0-5]\d/",$value) == 1){
        echo "OK\n";
    } else {
        echo "FAIL\n";
    }
}




## Собираем почты


# print_r($mailArray);


foreach ($mailArray as $key => $value) {
    if (preg_match("/^(?!_)[a-zA-Z0-9_]{3,29}@[a-zA-Z]{1,29}.(com|ru|su)/", $value) == 1){
        echo "OK\n";
    } else {
        echo "FAIL\n";
    }
}








?>