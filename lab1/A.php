<?php


# Достаем и распредялем по массивам

$filename = __DIR__ . "/A/003.dat";

$array = file($filename);


$countArr = [];


print_r($array);

foreach ($array as $key => $value) {
   if (strlen($value) <= 5){
        array_push($countArr, $value);
   }
   
}

print_r($countArr);

// Кол-во ставок

$n = $countArr[0];

// Кол-во игр

$k = $countArr[1];


array_shift($array);

$arrBet = [];


for ($i = 0; $i < $n; $i++)
{
  #  array_push($arrayBet, $array[$i]);
  array_push($arrBet, $array[$i]);
}

for ($i = 0; $i < $n; $i++)
{
    array_shift($array);
}

array_shift($array);


$arrGame = [];

for ($i = 0; $i < $k; $i++)
{
    array_push($arrGame, $array[$i]);
}

print_r($arrBet);
print_r($arrGame);


# Ниже остальная логика


$totalWinner = 0;
$freeWinnerL = 0;
$freeWinnerR = 0;
$freeWinnerD = 0;
$summBet = 0;
$loserBet = 0;
$numberL = 0;
$numberR = 0;
$numberD = 0; 

foreach ($arrGame as $key => $value) {
    

    for ($i = 0; $i < $n; $i++)
    {
        $firstSymbolBet = substr($arrBet[$i], 0, 1);
        $lastSymbolBet = substr($arrBet[$i], -1);


            
     

        if (substr($value, 0, 1) == $firstSymbolBet){
            if (substr($arrBet[$i],-2) == substr($value,-2)){

                
                echo $arrBet[$i];
                echo $value;

                if (strcmp(substr($arrBet[$i],-2), "L") === 1){
                    echo substr($value,-2);
                    $valueL = explode(" ",$value);
                    $betL = explode(" ",$arrBet[$i]);
                    echo $betL[1],"\n";
                    echo $valueL[1],"\n";
                    
                    $winnerL = $betL[1] * $valueL[1];

                    $freeWinnerL = $winnerL - $betL[1];
                     
                }

                if (strcmp(substr($arrBet[$i],-2), "R") === 1){
                    echo substr($value,-2);  
                    $valueR = explode(" ",$value);
                    $betR = explode(" ",$arrBet[$i]);
                    echo $betR[1],"\n";
                    echo $valueR[2],"\n"; 

                    $winnerR = $betR[1] * $valueR[2];

                    $freeWinnerR = $winnerR - $betR[1];

                }

                if (strcmp(substr($arrBet[$i],-2), "D") === 1){
                    echo substr($value,-2);  
                    $valueD = explode(" ",$value);
                    $betD = explode(" ",$arrBet[$i]);
                    echo $betD[1],"\n";
                    echo $valueD[3],"\n"; 

                    $winnerD = $betD[1] * $valueD[3];

                    $freeWinnerD = $winnerD - $betD[1];

                }
               

                $totalWinner += $freeWinnerL;    
                $totalWinner += $freeWinnerR;    
                $totalWinner += $freeWinnerD;    

              
                

            } else {
                $loserBet += intval(substr($arrBet[$i], 2, -3));
            }
        }
        
    }
    
}

echo $totalWinner,"\n";
echo $loserBet,"\n";

echo "Результат выиграша: ",$totalWinner - $loserBet,"\n";

$result = $totalWinner - $loserBet;


$filePut = __DIR__ . '/result.txt';


file_put_contents($filePut,$result);


## проверка

$testAns = __DIR__ . "/A/003.ans";

$testArrAns = file($testAns);



$testresult = __DIR__ . '/result.txt';

$testArrResult = file($testresult);



if ($testArrAns[0] == $testArrResult[0]){
    echo "Ответы сходятся";
} else {
    echo "Ответы не сходятся";
}
echo "\n";

?>
