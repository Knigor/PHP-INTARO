<?php

$file = __DIR__ . '/B/001.dat';

$array = file($file);

$ansFile = __DIR__ . '/B/001.ans';

$ansArray = file($ansFile);

$objArray = [];


for ($k = 0; $k < 8; $k++) {

    $firstString = $array[$k];

    echo $firstString;
    "\n";

    $arr = explode(":", $firstString);

    print_r($arr);

     

    for ($i = count($arr); $i < 8; $i++) {
        array_push($arr, "");
    }
    

    $arr = array_map('trim', $arr);


    $resultArray = array(
        "0" => " ",
        "1" => " ",
        "2" => " ",
        "3" => " ",
        "4" => " ",
        "5" => " ",
        "6" => " ",
        "7" => " ",
    );



    foreach ($arr as $key => $value) {
        if (strlen($value) == 4) {
            $resultArray[$key] = $value;
        }

        if (strlen($value) < 4) {

            $tmp = explode(" ", $value);

            if (strlen($value) == 3) {
                $resultArray[$key] = preg_replace("/^/", "0", $tmp[0]);
            } elseif (strlen($value) == 2) {
                $resultArray[$key] = preg_replace("/^/", "00", $tmp[0]);
            } elseif (strlen($value) == 1) {
                $resultArray[$key] = preg_replace("/^/", "000", $tmp[0]);
            } elseif (strlen($value) == 0) {
                $resultArray[$key] = preg_replace("/^/", "0000", $tmp[0]);
            }
        }
    }



    $resultString = implode(':', $resultArray);




    array_push($objArray, $resultString);
}


# проверка


# print_r($objArray);


$fixAns = array_map("trim", $ansArray);
print_r($fixAns);


for ($i = 0; $i < 8; $i++) {
    if (strcmp($objArray[$i], $fixAns[$i]) == 0){
        echo "Элемент с индексом $i совпал\n";
    } else {
        echo "Элемент с индексом $i не совпал\n";
    }
    
}
