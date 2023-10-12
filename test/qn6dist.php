<?php
$arr = array(1,2,3,5);
$n = 5;

for($i=1;$i<=$n;$i++){
    if(in_array($i,$arr)){
        continue;
    }
    else{
        echo $i;
    }

}

function sum($n,$arr){
    $sum = ($n * ($n + 1))/2;
    $sumarr = array_sum($arr);

    $elem = $sum - $sumarr;
    return $elem;
}

?>