<?php 

function uploadGambar(){
	$namaGambar= $_FILES["gambar"]["name"];
	//$ekstensi= $_FILES["gambar"]["type"];
	$error= $_FILES["gambar"]["error"];
	$besarGambar= $_FILES["gambar"]["size"];
	$namaTemp= $_FILES["gambar"]["tmp_name"];

	// Cek apakah tidak ada gambar yang siupload
	if($error==4){
		echo "<script> alert(\"Pilih gambar terlebih dahulu\"); </script>";
		return false;
	}
	// Opsional: mengecek apakah yang diupload adalah gambar
	// // Sebenarnya kita bisa menggunakan perintah html <input type="file" accept="image/x-png,image/gif,image/jpeg" /> atau accept="image/*"
	// $ekstensiValid= ["jpg","png","jpeg"];
	// $ekstensi= strtolower(end(explode('.',$namaGambar)));
	// // explode untuk memisahkan string, berdasarkan argumen pertama, end untuk mengembalikan indeks terakhir, strtolower untuk membuat string lower case
	// // in_array, mengembalikan nilai true, jika terdapat value argumen pertama di array argumen ke-dua
	// if(!in_array($ekstensi,$ekstensiValid)){
	// 	echo "<script> alert(\"Upload hanya file gambar\"); </script>";	
	// 	return false;
	// }

	// jika besar gambar > 2juta byte atau 2mb
	if($besarGambar>2000000){
		echo "<script> alert(\"File gambar anda melebihi 2mb!\"); </script>";	
		return false;
	}

	// Kalau lolos semua pengecekan, maka barulah gambar diupload
	$ekstensi1= explode('.',$namaGambar);
	$ekstensi2= ".".strtolower(end($ekstensi1));
	$namaGambar= md5("img_From_"."Id=".$_GET["xyz"]."_Nama=".$_POST["nama"])."".$ekstensi2;

	move_uploaded_file($namaTemp, "imgKor/".$namaGambar);
	return $namaGambar;
}


$db= mysqli_connect("localhost","root","","aktorKorea");

if(isset($_POST["submit"])){

	$nama= htmlspecialchars($_POST["nama"]);
	$prodi= htmlspecialchars($_POST["prodi"]);
	$umur= htmlspecialchars($_POST["umur"]);
	$alamat= htmlspecialchars($_POST["alamat"]);
	$jk= htmlspecialchars($_POST["jk"]);
	$gambar= uploadGambar();

	$query= "INSERT INTO tabel1 VALUES('','$nama','$prodi','$umur','$alamat','$jk','$gambar')";
	mysqli_query($db,$query);	

	if(mysqli_affected_rows($db)>0) {
		echo "<script> alert(\"Query berhasil dijalankan, ",mysqli_affected_rows($db)," baris ditambahkan\");
				document.location.href='Latihan9 - Upload file image.php';
			</script>";

	}else{
		echo "<script> alert(\"Query gagal, error: ",mysqli_error($db),"\");document.location.href='Latihan9 - Upload file image.php';

		</script>";
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

		.isi label{
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

		.isiGambar{
			margin: auto;
			padding: 10px;
			font-size: 16px;		
		}

		.isiGambar label{
			display: inline-block;
			text-align: left;
			margin-right: 75px;
			transform: translateX(35px);
		}

		.isiGambar input[type='file']{
			font-size: 14px;
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
	<form action="" method="post" class="form" enctype="multipart/form-data">
		<div class="isi">
			<label for="id">ID </label>
			<input type="text" name="id" id="id" placeholder="<?= $_GET["xyz"] ?>" readonly style="text-align: center;">
		</div>
		<div class="isi">
			<label for="nama">Nama </label>
			<input type="text" name="nama" id="nama">
		</div>
		<div class="isi">
			<label for="prodi">Prodi </label>
			<input type="text" name="prodi" id="prodi">
		</div>
		<div class="isi">
			<label for="umur">Umur </label>
			<input type="text" name="umur" id="umur">
		</div>
		<div class="isi">
			<label for="alamat">Alamat </label>
			<input type="text" name="alamat" id="alamat">
		</div>
		<div class="isi">
			<label for="jk">Jenis Kelamin </label>
			<input type="text" name="jk" id="jk">
		</div>
		<div class="isiGambar">
			<label for="gambar" style="width:100px;">Gambar </label>
			<input type="file" name="gambar" id="gambar" accept="image/*" > <!--style="color: transparent;"-->
		</div>
		<div class="tombol">
			<button type="back" name="back" onclick="location.href='Latihan9 - Upload file image.php';" style="background-color: salmon;">Kembali</button>
			<button type="submit" name="submit">Submit</button>
		</div>
	</form>
</body>
</html>