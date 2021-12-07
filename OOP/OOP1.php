<?php 

// Class, object, property, method

class tes1{
	public $nama;
	private $namaFull;

	function setNamaFull($nama){
		echo $this->nama.$nama;
	}
}

$instance1= new tes1();
$instance1->nama= "nama depan , ";
$instance1->setNamaFull("nama belakang");

 ?>