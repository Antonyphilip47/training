<?php

$arr = array(0,2,1,2,0);

$x = sortMyArray($arr);

function sortMyArray($arr){
    sort($arr);
    return $arr;
}

foreach($x as $val){
    echo $val;
}

?>