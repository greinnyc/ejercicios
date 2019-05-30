<?php

$M = array(5, 2, 8, 14, 0);
$N =10;

foreach ($M as $key => $value) {
 	$a = $N - $value;
 	unset($M[$key]);
 	$c= in_array($a,$M);
 	if($c){
 		$d = array($value,$a);
 		var_dump($d);
 		break;	
 	}
 } 