<?php 

$db= mysqli_connect("localhost","root","","appseminar");
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

	//$query= "INSERT INTO ss_mahasiswa VALUES('$_POST[\" \""]')";
	$query= "INSERT INTO ss_mahasiswa VALUES('','$nama','$nim','$jeniskelamin','$nohp','$alamat','$tahunmasuk','$tahunlulus','$status','$idprodi','$email')";
	mysqli_query($db,$query);

	if(mysqli_affected_rows($db)>0) {
		echo "<script> alert(\"Query berhasil dijalankan, ",mysqli_affected_rows($db)," baris ditambahkan\");
				document.location.href='Latihan8 - Update, Search & Delete sql database.php';
			</script>";

	}else{
		echo "<script> alert(\"Query gagal, error: ",mysqli_error($db),"\")</script>";
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
			border: 5px solid #0af04b;
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
			background-color: #0af04b;
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
			<button type="back" name="back" onclick="location.href='Latihan8 - Update, Search & Delete sql database.php';" style="background-color: salmon;">Kembali</button>
			<button type="submit" name="submit">Submit</button>
		</div>
	</form>
</body>
</html>