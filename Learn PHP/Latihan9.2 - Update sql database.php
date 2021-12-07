<?php 

$db= mysqli_connect("localhost","root","","appseminar");
$dbMahasiswa= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM ss_mahasiswa WHERE id_mahasiswa=".$_GET["xyz"]));

if(isset($_POST["submit"])){
	//Bisa begini
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

	mysqli_query($db,"UPDATE ss_mahasiswa SET nama='$nama', nim='$nim', jk='$jeniskelamin',
									 no_hp='$nohp', alamat='$alamat', tahun_masuk='$tahunmasuk',
									 tahun_lulus='$tahunlulus', status='$status', id_prodi='$idprodi', email='$email'
			 WHERE id_mahasiswa=".$_GET["xyz"]);

	if(mysqli_affected_rows($db)>0) {
		echo "<script> alert(\"Query berhasil dijalankan, ",mysqli_affected_rows($db)," baris diubah\");
				document.location.href='Latihan9 - Upload file image.php';
			</script>";

	}else{
		echo "<script> alert(\"Query gagal, error: ",mysqli_error($db),"\");document.location.href='Latihan9 - Upload file image.php';</script>";
	}
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah data</title>
	<style>
		body{
			font-family: arial, helvetica;
			font-size: 14px;
			max-width: 600px;
			margin: 20px auto;
			border: 5px solid #fff537;
			border-radius: 100px
		}

		*{
			text-align: center;
		}

		.form{
			display: block;
			margin-top: 30px;
		}

		.isi{
			margin: 10px 20px;
		}

		label{
			display: inline-block;
			width: 150px;
			font-size: 16px;
			text-align: left;
		}

		.isi input{
			margin-left: 10px;
			padding: 5px;
			font-size: 14px;
			text-align: left;
		}

		form .tombol{
			display: flex;
			justify-content: center;
			margin: 40px;
		}

		form .tombol button{
			cursor: pointer;
			background-color: #fff537;
			font-size: 16px;
			padding: 6px 16px;
			border: none;
			border: 1px solid transparent;
			border-radius: 40px;
			margin: 0 40px;
			transition: 300ms ease;
		}

		form button:hover{
			border: 1px solid rgb(230,230,230);
		}

	</style>
</head>
<body>
	<h1 style="margin-top: 40px;">
		Ubah Data
	</h1>
	<form action="" method="post" class="form">
		<div class="isi">
			<label for="nama">Nama</label>:
			<input type="text" name="nama" id="nama" value="<?= $dbMahasiswa["nama"] ?>" required>
		</div>
		<div class="isi">
			<label for="nim">Nim</label>:
			<input type="text" name="nim" id="nim" required value="<?= $dbMahasiswa["nim"] ?>">
		</div>
		<div class="isi">
			<label for="jeniskelamin">Jenis Kelamin</label>:
			<input type="text" name="jeniskelamin" id="jeniskelamin"  value="<?= $dbMahasiswa["jk"] ?>">
		</div>
		<div class="isi">
			<label for="nohp">No Hp</label>:
			<input type="text" name="nohp" id="nohp"  value="<?= $dbMahasiswa["no_hp"] ?>">
		</div>
		<div class="isi">
			<label for="alamat">Alamat</label>:
			<input type="text" name="alamat" id="alamat"  value="<?= $dbMahasiswa["alamat"] ?>">
		</div>
		<div class="isi">
			<label for="tahunmasuk">Tahun Masuk</label>:
			<input type="text" name="tahunmasuk" id="tahunmasuk"  value="<?= $dbMahasiswa["tahun_masuk"] ?>">
		</div>
		<div class="isi">
			<label for="tahunlulus">Tahun Lulus</label>:
			<input type="text" name="tahunlulus" id="tahunlulus"  value="<?= $dbMahasiswa["tahun_lulus"] ?>">
		</div>
		<div class="isi">
			<label for="status">Status</label>:
			<input type="text" name="status" id="status"  value="<?= $dbMahasiswa["status"] ?>">
		</div>
		<div class="isi">
			<label for="idprodi">Id Prodi</label>:
			<input type="text" name="idprodi" id="idprodi" required value="<?= $dbMahasiswa["id_prodi"] ?>">
		</div>
		<div class="isi">
			<label for="email">Email</label>:
			<input type="text" name="email" id="email"  value="<?= $dbMahasiswa["email"] ?>">
		</div>
		<div class="tombol">
			<button type="reset" name="back" onclick="location.href='Latihan9 - Upload file image.php';" style="background-color: salmon;">Kembali</button>
			<button type="submit" name="submit">Ubah</button>
		</div>
	</form>
</body>
</html>