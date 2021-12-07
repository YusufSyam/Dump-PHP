<?php 
//Koneksi ke database
$conn= mysqli_connect("localhost", "root", "", "appseminar");


// PAGINATION
// Adalah membuat tabel terbatas hanya untuk beberapa baris, dan membagi menjadi beberapa sesi/halaman

// 1. Memanggil semua isi tabel,  lalu menghitung jumlah baris
$database0= mysqli_query($conn, "SELECT * FROM ss_mahasiswa");
$hitungBaris= [];
while($simpanData= mysqli_fetch_assoc($database0)) $hitungBaris[]= $simpanData;
$jumlahBaris= count($hitungBaris);

// 2. Menghitung jumlah data per halaman
$jumlahDataPerPage= 10;

// 3. Menghitung jumlah halaman = > jumlahBaris / jumlahDataPerPage lalu dibulatkan ke atas (ceil())
$jumlahHalaman= ceil($jumlahBaris/$jumlahDataPerPage);

// Menyetel halaman berapa sekarang
$halamanAktif;
if(isset($_GET["page"])){
	if($_GET["page"]<=1) $halamanAktif= 1;
	else if($_GET["page"]>$jumlahHalaman) $halamanAktif= $jumlahHalaman;
	else $halamanAktif= $_GET["page"];
}else $halamanAktif= 1;
$_GET["page"]= $halamanAktif;

// Menyetel index berapa yang ditampilkan pertama
$dataAwal= ($jumlahDataPerPage*$halamanAktif)-$jumlahDataPerPage;

//Menyetel Limit = > LIMIT mulai dari index berapa , berapa data yang ditampilkan
$database= mysqli_query($conn, "SELECT * FROM ss_mahasiswa LIMIT $dataAwal,$jumlahDataPerPage");

$arrDatabase= [];
while($simpanData= mysqli_fetch_assoc($database)) $arrDatabase[]= $simpanData;

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
	<title>Pagination</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style>
		body{
			font-family: arial, helvetica;
			font-size: 14px;
			max-width: 100%;
		}
		
		*{
			text-align: center;
		}

		.page{
			display: flex;
			justify-content: center;
			margin: 10px;
		}

		.numPage{
			margin: 8px;
			text-decoration: none;
			color: #4a6bff;
			transition: 400ms ease;
		}

		.numPage:hover, a.arrow:hover{
			color: blue;
		}

		.activePage{
			margin: 8px;
			text-decoration: none;
			cursor: context-menu;
			color: #001885;
		}

		.arrow{
			margin: 4px;
			font-size: 17px;
			transform: translateY(4px);
			text-decoration: none;
			color: #666;
			transition: 400ms ease;
		}

		.edit{
			display: flex;
			flex-direction: row-reverse;
			margin: 30px 8px 20px;
			font-size: 16px;
			justify-content: space-between;
			align-items: baseline;
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

	</style>
</head>
<body>
	<h1 style="text-align: center; margin: 40px 0 50px;">Database Tabel ss_mahasiswa</h1>
	<div class="edit">
		<form action="" method="post">
			<input type="text" name="kunci" id="kunci" size="25" placeholder="Cari . . . .">
			<button type="submit" name="search">Cari</button>
		</form>
	</div>
	<table border="1" cellpadding="12" cellspacing="0" style="width: 100%;">
		<tr style="background-color: #fffa9a;">
				<th width="21px" style="background-color: yellow;">ID</th>
				<th width="21px" >NO</th>
				<th width="167,383px" >Nama</th>
				<th width="71.4833px" >Nim</th>
				<th width="16px" >JK</th>
				<th width="106px" >No. Hp</th>
				<th width="221.317px" >Alamat</th>
				<th width="68.5833px" >Tahun Masuk</th>
				<th width="67.1333px" >Tahun Lulus</th>
				<th width="39px" >Status</th>
				<th width="38.1px" >ID Prodi</th>
				<th width="208px" >Email</th>
		</tr>
		<?php  for($i=0; $i<count($arrDatabase); $i++): ?>
		<tr>
			<td><?= $arrDatabase[$i]["id_mahasiswa"] ?></td>
			<td><?= ($i+1+(($halamanAktif-1)*10)) ?></td>
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
	<div class="page">
		<?php if($halamanAktif>1){?>
		<a href="?page=<?= ($halamanAktif-1) ?>" class="fas fa-caret-left arrow"></a>
		<?php }else{ ?>
		<span class="fas fa-caret-left arrow"></span>

		<?php }for($i=1; $i<=$jumlahHalaman; $i++){
			if($i==$halamanAktif){?>
			<span href=" ?page=<?= $i ?> " class="activePage"><?= $i ?> </span>
		<?php }else{ ?>
			<a href=" ?page=<?= $i ?> " class="numPage"><?= $i ?> </a>
		<?php } } ?>

		<?php if($halamanAktif<$jumlahHalaman){?>
		<a href="?page=<?= ($halamanAktif+1) ?>" class="fas fa-caret-right arrow"></a>
		<?php }else{ ?>
		<span class="fas fa-caret-right arrow"></span>	
		<?php } ?>
	</div>
</body>
</html>