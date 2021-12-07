<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
	//$_GET adalah array kosong yang isinya bisa kita lempar dan dioper ke
	//Halaman lain (variabel superglobal) tapi detailnya ditampilkan dalam url
	// $_GET["nama"]= "Yusuf Syam";
	// $_GET["nim"]= "H071191044";
	// var_dump($_GET);

	//Penerapan $_GET pergi ke Latihan5.2 - Penerapan Get.php
 ?>
 	<form action="" method="get">
 		<!--Value default action= "halaman itu sendiri", sedangkan method adalah "get" -->

 		Masukkan nama yang akan ditulis di bawah : 
 		<input type="text" name="namaMahasiswa">
 		<button type="submit" name="submit">Submit</button>
 	</form>

 	<div class="nama">Assalamualaikum <?php echo !isset($_GET["namaMahasiswa"])? "Orang yang belum menuliskan namanya ^.^": $_GET["namaMahasiswa"]; 
 	?></div>

</body>
</html>