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
			font-size: 14px;
			max-width: 100%;
		}
		
		*{
			text-align: center;
		}
	</style>
</head>
<body>
	<table border="1" cellpadding="12" cellspacing="0">
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
		</tr>
		<?php endfor; ?>
	</table>
</body>
</html>