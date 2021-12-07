<?php 
	//Array
	$arr1= ["a","b","c"];
	$arr2= [123, true, "awawawa"];

	echo $arr2[2];
	echo "<br><br> menampilkan array <br>";

	//Tampilkan array: var_dump($arr1) atau print_r($arr1);
	//print_r akan menampilkan nilai true sebagai 1
	var_dump($arr1);
	echo "<br>";
	print_r($arr1);

	//Menambah Elemen
	echo "<br><br> menambah elemen <br>";
	$arr1[]= "d";
	var_dump($arr1);

	//Mengambil panjang Array
	echo "<br><br> menampilkan panjang array<br>";
	echo "Panjang arr1 : ",count($arr1);

	//Array asosiatif -> Array yang key/indeksnya bisa kita atur sebagai string
	//Simpelnya hashmap pada bahasa pemrograman kita tercinta java

	//Untuk mengisi key dan value nya = "key" => "value"
	$arrAsos= ["satu"=>1, "dua"=>"Tiga", 3=>true];
	echo "<br><br>";
	var_dump($arrAsos);
	//Menampilkan value dari sebuah key= $array["key"];
	echo "<br>Nilai dengan key \"dua\" dari array di atas adalah ",$arrAsos["dua"];

	//Tes array asosiatif dalam array
	$daftarGame= [
		["nama"=>"Minecraft",
		 "genre"=>"Adventure",
		 "kebagusan"=> true,
		 "harga"=> 30	
		],
		["nama"=>"Fortnite",
		 "genre"=>"Trash",
		 "kebagusan"=> false,
		 "harga"=> "free"	
		]
	];

	//Menampilkan harga dari game minecraft di daftar game
	echo "<br><br>",$daftarGame[0]["harga"],"<br><br>";
	for($i=0; $i<count($daftarGame); $i++){
		echo "Nama game   ke-",$i+1," : ",$daftarGame[$i]["nama"],"<br>";
		echo "Genre game  ke-",$i+1," : ",$daftarGame[$i]["genre"],"<br>";
		echo "Apakah game ke-",$i+1," ini bagus? : ";
		if($daftarGame[$i]["kebagusan"]) echo "Ya! :D<br>";
		else echo "Tidak x(<br>";
		echo "Harga game  ke-",$i+1," : ",$daftarGame[$i]["harga"],"<br>";
		echo "<br>	-------------	<br><br>";
	}

	//Mengecek apakah suatu atribut telah dibuat
	echo "mengecek apakah suatu atribut telah dibuat<br>Apakah telah dibuat atribut id pada array minecraft? : ";
	echo !isset($daftarGame[0]["ID"])?"false":"true";


	//Menambah atribut baru pada minecraft
	echo "<br><br>menambahkan atribut id pada array asosiatif<br>";
	$angka= 5;
	$daftarGame[0]["ID"]= "3q7et".$angka."uw4u";
	var_dump($daftarGame[0],"<br><br>");

	//Tes ternary
	echo "Apakah harga minecraft = 30$?", $daftarGame[0]["harga"]==30? " iya betul" : " tidak";

?>