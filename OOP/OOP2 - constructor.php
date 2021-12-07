<?php 

class tes2{
	public $id, $nim;

	// Constructor
	public function __construct(){
		$this->id= 9;
		echo "Konstruktor dengan parameter kosong, id= ",$this->id;
	}

	// public function __construct($nim){
	// 	$this->nim= $nim;
	// 	echo "Konstruktor dengan 1 parameter, id= ",$this->$id,", nim= ",$this->nim;
	// }
}

$property1= new tes2();

 ?>