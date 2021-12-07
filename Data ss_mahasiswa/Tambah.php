<?php 

require("assets/function/functions.php");

if(isset($_POST["submit"])){
	$nama= htmlspecialchars($_POST["nama"]);
	$nim= htmlspecialchars($_POST["nim"]);
	$jeniskelamin= htmlspecialchars($_POST["jeniskelamin"]);
	$nohp= htmlspecialchars($_POST["nohp"]);
	$alamat= htmlspecialchars($_POST["alamat"]);
	$tahunmasuk= htmlspecialchars($_POST["tahunmasuk"]);
	$tahunlulus= htmlspecialchars($_POST["tahunlulus"]);
	$status= htmlspecialchars($_POST["status"]);
	$idprodi= htmlspecialchars($_POST["idprodi"]);
	$email= htmlspecialchars($_POST["email"]);

	if($status=="")$status="aktif";

	mysqli_query($database,"INSERT INTO ss_mahasiswa VALUES('','$nama','$nim','$jeniskelamin','$nohp','$alamat','$tahunmasuk','$tahunlulus','$status','$idprodi','$email')");

	errorCheck($database, "ditambahkan");
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah data</title>
	<link rel="stylesheet" href="assets/style/styleTambah.css">
</head>
<body>
	<h1 style="margin-top: 40px;">
		Tambah Data
	</h1>
	<form action="" method="post" class="form">
		<div class="isi">
			<label for="nama">Nama</label>:
			<input type="text" name="nama" id="nama" required>
		</div>
		<div class="isi">
			<label for="nim">Nim</label>:
			<input type="text" name="nim" id="nim" required>
		</div>
		<div class="isi">
			<label for="jeniskelamin">Jenis Kelamin</label>:
			<input type="text" name="jeniskelamin" id="jeniskelamin" >
		</div>
		<div class="isi">
			<label for="nohp">No Hp</label>:
			<input type="text" name="nohp" id="nohp" >
		</div>
		<div class="isi">
			<label for="alamat">Alamat</label>:
			<input type="text" name="alamat" id="alamat" >
		</div>
		<div class="isi">
			<label for="tahunmasuk">Tahun Masuk</label>:
			<input type="text" name="tahunmasuk" id="tahunmasuk" >
		</div>
		<div class="isi">
			<label for="tahunlulus">Tahun Lulus</label>:
			<input type="text" name="tahunlulus" id="tahunlulus" >
		</div>
		<div class="isi">
			<label for="status">Status</label>:
			<input type="text" name="status" id="status" >
		</div>
		<div class="isi">
			<label for="id rodi">Id Prodi</label>:
			<input type="text" name="idprodi" id="idprodi" required>
		</div>
		<div class="isi">
			<label for="email">Email</label>:
			<input type="text" name="email" id="email" >
		</div>
		<div class="tombol">
			<button type="back" name="back" onclick="location.href='index.php';" style="background-color: salmon;">Kembali</button>
			<button type="submit" name="submit">Submit</button>
		</div>
	</form>
</body>
</html>