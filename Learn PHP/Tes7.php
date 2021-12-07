<?php

function ubah($a){
	$a["nama"]= "nama";
	return $a;
}

$bau= ["nama"=>"ulal"];
var_dump($bau);

echo "<br>";

ubah($bau)
var_dump($bau);



?>