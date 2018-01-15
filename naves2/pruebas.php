<?php
function arrayrand($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}




$valores=arrayrand(0,64,20);

foreach ($valores as $key => $value) {
  echo $key.">".$value."--" ;
}
?>
