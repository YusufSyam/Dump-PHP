<?php 

require("assets/function/functions.php");

$arrDatabase= fetchEdit("SELECT * FROM ss_mahasiswa WHERE id_mahasiswa=".$_GET["xyz"])[0];

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

	mysqli_query($database,"UPDATE ss_mahasiswa SET nama='$nama', nim='$nim', jk='$jeniskelamin', no_hp='$nohp', alamat='$alamat', tahun_masuk='$tahunmasuk', tahun_lulus='$tahunlulus', status='$status', id_prodi='$idprodi', email='$email' WHERE id_mahasiswa=".$_GET["xyz"]);

	errorCheck($database,"diubah");
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah Data</title>
	<link rel="stylesheet" href="assets/style/styleUbah.css">
</head>
<body>
	<h1 style="margin-top: 40px;">
		Ubah Data
	</h1>
	<form action="" method="post" class="form">
		<div class="isi">
			<label for="nama">Nama</label>:
			<input type="text" name="nama" id="nama" value="<?= $arrDatabase["nama"] ?>" required>
		</div>
		<div class="isi">
			<label for="nim">Nim</label>:
			<input type="text" name="nim" id="nim" required value="<?= $arrDatabase["nim"] ?>">
		</div>
		<div class="isi">
			<label for="jeniskelamin">Jenis Kelamin</label>:
			<input type="text" name="jeniskelamin" id="jeniskelamin"  value="<?= $arrDatabase["jk"] ?>">
		</div>
		<div class="isi">
			<label for="nohp">No Hp</label>:
			<input type="text" name="nohp" id="nohp"  value="<?= $arrDatabase["no_hp"] ?>">
		</div>
		<div class="isi">
			<label for="alamat">Alamat</label>:
			<input type="text" name="alamat" id="alamat"  value="<?= $arrDatabase["alamat"] ?>">
		</div>
		<div class="isi">
			<label for="tahunmasuk">Tahun Masuk</label>:
			<input type="text" name="tahunmasuk" id="tahunmasuk"  value="<?= $arrDatabase["tahun_masuk"] ?>">
		</div>
		<div class="isi">
			<label for="tahunlulus">Tahun Lulus</label>:
			<input type="text" name="tahunlulus" id="tahunlulus"  value="<?= $arrDatabase["tahun_lulus"] ?>">
		</div>
		<div class="isi">
			<label for="status">Status</label>:
			<input type="text" name="status" id="status"  value="<?= $arrDatabase["status"] ?>">
		</div>
		<div class="isi">
			<label for="idprodi">Id Prodi</label>:
			<input type="text" name="idprodi" id="idprodi" required value="<?= $arrDatabase["id_prodi"] ?>">
		</div>
		<div class="isi">
			<label for="email">Email</label>:
			<input type="text" name="email" id="email"  value="<?= $arrDatabase["email"] ?>">
		</div>
		<div class="tombol">
			<button type="reset" name="back" onclick="location.href='index.php';" style="background-color: salmon;">Kembali</button>
			<button type="submit" name="submit">Ubah</button>
		</div>
	</form>
</body>
</html>