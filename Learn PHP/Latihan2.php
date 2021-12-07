<?php
	echo "Hari ini adalah hari ",date("l");
	// l-hari d-tanggal M-bulan dalam kata m-bulan dalam angka Y-tahun
	echo "<br>Tanggal hari ini: ",date("l, d-M-Y");

	//Perbandingan String
	$a= "a";
	echo "<br>",$a=="a";
	echo "<br>",$a=="a"? "true":"false";
	echo "<br>",($a=="Aasdasd")==null? "false":"true";

	//Jadi output true adalah 1
	//Output false adalah kosong atau kita bisa tulis null

	//Penambahan String (.)
	$a= "bababa";
	$b= "uwau";
	$a.= $b;
	echo "<br>",$a;
	echo "<br>",$b.$a;
	$angka= 5;
	$angka2= 6;
	$a.= $angka.$b.$angka2."ahaha";
	//$a.= $angka.$angka2;
	echo "<br>",$a;
	//Kesimpulan: saat mau append string dan number, kayaknya
	//number harus disimpan di variabel dulu

	//Perulangan dan pengondisian pada php persis dengan java tapi harus pakai $
?>