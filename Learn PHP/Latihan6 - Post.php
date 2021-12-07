<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<!-- program ini hampir sama dengan latihan5 - get.php hanya keyword 'get' nya yang diganti menjadi 'post' -->

 	<form action="" method="post">
 		<!--Value default action= "halaman itu sendiri", sedangkan method adalah "get" -->

 		Masukkan nama yang akan ditulis di bawah : 
 		<input type="text" name="namaMahasiswa">
 		<button type="submit" name="submit">Submit</button>
 	</form>

 	<div class="nama">Assalamualaikum <?php echo !isset($_POST["namaMahasiswa"])? "Orang yang belum menuliskan namanya ^.^": $_POST["namaMahasiswa"]; 
 	?></div>

</body>
</html>