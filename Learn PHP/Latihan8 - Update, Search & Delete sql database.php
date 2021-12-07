<?php 
//Koneksi ke database
$conn= mysqli_connect("localhost", "root", "", "appseminar");
$database= mysqli_query($conn, "SELECT * FROM ss_mahasiswa");

$arrDatabase= [];
while($simpanData= mysqli_fetch_assoc($database)) $arrDatabase[]= $simpanData;

for($i=0; $i<count($arrDatabase); $i++){
	if($arrDatabase[$i]["jk"]=="") $arrDatabase[$i]["jk"]= "-";
	if($arrDatabase[$i]["no_hp"]=="") $arrDatabase[$i]["no_hp"]= "-";
	if($arrDatabase[$i]["alamat"]=="") $arrDatabase[$i]["alamat"]= "-";
	if($arrDatabase[$i]["tahun_masuk"]=="") $arrDatabase[$i]["tahun_masuk"]= "-";
	if($arrDatabase[$i]["tahun_lulus"]=="") $arrDatabase[$i]["tahun_lulus"]= "-";
	if($arrDatabase[$i]["status"]=="") $arrDatabase[$i]["status"]= "-";
	if($arrDatabase[$i]["email"]=="") $arrDatabase[$i]["email"]= "-";
}

if(isset($_POST["search"])){
	$kataKunci= $_POST["kunci"];
	$database2= mysqli_query($conn,"SELECT * FROM ss_mahasiswa WHERE
									id_mahasiswa LIKE '%$kataKunci%' OR
									nama LIKE '%$kataKunci%' OR
									nim LIKE '%$kataKunci%' OR
									jk LIKE '%$kataKunci%' OR
									no_hp LIKE '%$kataKunci%' OR
									alamat LIKE '%$kataKunci%' OR
									tahun_masuk LIKE '%$kataKunci%' OR
									tahun_lulus LIKE '%$kataKunci%' OR
									status LIKE '%$kataKunci%' OR
									email LIKE '%$kataKunci%'");

$arrDatabase= [];
while($simpanData= mysqli_fetch_assoc($database2)) $arrDatabase[]= $simpanData;
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menghubungkan ke database</title>
	<style>
		body{
			font-family: arial, helvetica;
			font-size: 13px;
		}
		
		*{
			text-align: center;
		}

		.container{
			display: flex;
			flex-direction: column;
		}

		.edit{
			display: flex;
			flex-direction: row;
			margin: 30px 8px 20px;
			font-size: 16px;
			justify-content: space-between;
			align-items: baseline;
		}

		.edit a{
			display: inline-block;
			padding: 7px;
			text-decoration: none;
			background-color: yellow;
			color: black;
			width: 120px;
			border-radius: 70px;
			border: 1px solid transparent;
			transition: 300ms ease;
		}

		.edit a:hover{
			border: 1px solid rgb(230,230,230);
		}

		.edit form input{
			border: none;
			margin-right: -4px;
			padding: 5px;
			padding-left: 12px;
			font-size: 14px;
			border: 2px solid #0af04b;
			text-align: left;
			border-top-left-radius: 100px;
			border-bottom-left-radius: 100px;
		}

		.edit form button{
			border: none;
			height: 22px;
			padding: 4px 20px 5px 10px;
			box-sizing: content-box;
			background-color: #0af04b;
			cursor: pointer;
			border-top-right-radius: 100px;
			border-bottom-right-radius: 100px;
			transform: translateY(-1px);
		}

		.edit form:hover{
			opacity: 0.85;
		}

		tr td a{
			color: blue;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 style="margin: 30px;">Database Appseminar tabel ss_mahasiswa<br></h1>
		<div class="edit">
			<a href="Latihan8.1 - Tambah Data.php" style="background-color: #0af04b;">Tambah Data</a>
			<form action="" method="post">
				<input type="text" name="kunci" id="kunci" size="25" placeholder="Cari . . . ." autocomplete="off">
				<button type="submit" name="search">Cari</button>
			</form>
		</div>
		<?php 
			if($arrDatabase==null):
		?>		
			<div style=" margin: 25px; font-size: 18px; color: red;">Tidak menemukan data yang cocok dengan keyword yang anda masukkan<br>Klik tombol di bawah untuk reset keyword</div>
			<form action="" method="post">
					<input type="text" name="kunci" id="kunci" size="25" placeholder="Cari . . . ." autocomplete="off" hidden>
					<button type="submit" name="search" style=" border: none; border-radius:100px; padding: 8px 22px; font-size: 18px; background-color: #ff343c; color: white; cursor: pointer;">Reset</button>
			</form>
		<?php
				exit();
			endif;
		 ?>
		<table border="1" cellpadding="10" cellspacing="0" >
			<tr style="background-color: #fffa9a;">
				<th style="background-color: yellow;">ID</th>
				<th>NO</th>
				<th>Nama</th>
				<th>Nim</th>
				<th>JK</th>
				<th>No. Hp</th>
				<th>Alamat</th>
				<th>Tahun Masuk</th>
				<th>Tahun Lulus</th>
				<th>Status</th>
				<th>ID Prodi</th>
				<th>Email</th>
				<th style="background-color: white;">Ubah Data</th>
			</tr>
			<?php  for($i=0; $i<count($arrDatabase); $i++): ?>
			<tr>
				<td><?= $arrDatabase[$i]["id_mahasiswa"] ?></td>
				<td><?= ($i+1) ?></td>
				<td style="text-align: left;"><?= $arrDatabase[$i]["nama"] ?></td>
				<td><?= $arrDatabase[$i]["nim"] ?></td>
				<td><?= $arrDatabase[$i]["jk"] ?></td>
				<td><?= $arrDatabase[$i]["no_hp"] ?></td>
				<td><?= $arrDatabase[$i]["alamat"] ?></td>
				<td><?= $arrDatabase[$i]["tahun_masuk"] ?></td>
				<td><?= $arrDatabase[$i]["tahun_lulus"] ?></td>
				<td><?= $arrDatabase[$i]["status"] ?></td>
				<td><?= $arrDatabase[$i]["id_prodi"] ?></td>
				<td><?= $arrDatabase[$i]["email"] ?></td>
				<td><a href="Latihan8.3 - Delete sql database.php?xyz=<?= $arrDatabase[$i]["id_mahasiswa"] ?>">Hapus</a> | <a href="Latihan8.2 - Update sql database.php?xyz=<?= $arrDatabase[$i]["id_mahasiswa"] ?>">Sunting</a></td>
			</tr>
			<?php endfor; ?>
		</table>
	</div>
</body>
</html>