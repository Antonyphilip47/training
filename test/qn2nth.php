<?php

$arr = array(0,2,1,2,0);

$n = 3;

$x = nthsmall($arr,$n);



function nthsmall($arr,$n){
    sort($arr);
    return $arr[$n-1];
}

echo $x;

?>