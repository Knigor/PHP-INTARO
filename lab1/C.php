<?php

$fileOpen = __DIR__ . '/C/001.dat';


$arrayFile = file($fileOpen);


print_r($arrayFile);


$PhoneArray = [];
$mailArray = [];


foreach ($arrayFile as $key => $value) {

    if (preg_match("/P/",$value) == 1){
     array_push($PhoneArray,preg_replace("/[<>P]/","",$value)); 
    }

    if (preg_match("/E/",$value) == 1){
     array_push($mailArray,preg_replace("/[<>E]/","",$value));
    }

    
}


## Собираем номера телефонов 

print_r($PhoneArray);


foreach ($PhoneArray as $key => $value) {
if (preg_match("/\+[7-8] \([0-9]{3}\) [0-9]{3}-[0-9]{2}-[0-9]{2}/", $value) == 1) {
    echo "OK\n";
} else {
    echo "FAIL\n";
}

 
}

## Собираем почты


print_r($mailArray);


foreach ($mailArray as $key => $value) {
    if (preg_match("/^(?!_)[a-zA-Z0-9_]{3,29}@[a-zA-Z]{1,29}.(com|ru|su)/", $value) == 1){
        echo "OK\n";
    } else {
        echo "FAIL\n";
    }
}




?>