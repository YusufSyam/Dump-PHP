<?php 

/* Variable super globals
	$_GET
	$_POST
	$_REQUEST
	$_SESSION
	$_COOKIE
	$_SERVER
*/
	// Akan error karena akan mengeprint sebuah array, di mana saat 
	// Ingin print array harus menggunakan var_dump atau print_r
	// echo $_SERVER;

	//Benar
	echo $_SERVER["SERVER_NAME"];



 ?>