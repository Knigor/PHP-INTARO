<?php

    $string = "2aaa'3'bbb'4'";

    $arr = str_split($string);


    $numbers = array();

    $flag = false;

    $count = 1;

    foreach ($arr as $k=>$v){

        if ($count < count($arr)){
            if ($v == "'" && isset($arr[$k + 2]) && $arr[$k + 2] == "'"){
                $flag = true;
            } else if ($flag == true){

                array_push($numbers, pow($v,2));

                $result = str_replace($v,pow($v,2), $string);
                $string = $result;
                $flag = false;
            }
        }

        $count++;
        
    }




   echo $string,"\n";


?>