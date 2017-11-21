<?php

$a = ['a','ab','c','cd','ef','cde','efg','cdef'];
$b = ['a','b','c','d','f','e','c','h','c'];

$a_key_postion_list = [];
foreach($b as $k=>$v){
	if( strstr($v,'c')){
		array_push($a_key_postion_list,$k);
	}
}

$b_key_postion_list = [];
foreach($b as $k=>$v){
	if($v=='c'){
		array_push($b_key_postion_list,$k);
	}
}

?>