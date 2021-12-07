<?php 

$db= mysqli_connect("localhost","root","","aktorKorea");
$tabel= mysqli_query($db,"SELECT * FROM tabel1");

$arrDatabase= [];
while($temp=mysqli_fetch_assoc($tabel)) $arrDatabase[]= $temp;

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Database Latihan 9</title>
	<style>
		body{
			margin: 20px;
			font-family: calibri, arial, helvetica;
			font-size: 17px;
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
			text-decoration: none;
		}

	</style>
</head>
<body>
	<div class="container">
		<h1 style="margin: 30px;">Database Aktor Korea<br></h1>
		<div class="edit">
			<a href="Latihan9.1 - Tambah Data.php?xyz=<?php echo $arrDatabase[count($arrDatabase)-1]["id"]+1 ?>" style="background-color: #0af04b;">Tambah Data</a>
			<form action="" method="post">
				<input type="text" name="kunci" id="kunci" size="25" placeholder="Cari . . . ." autocomplete="off">
				<button type="submit" name="search">Cari</button>
			</form>
		</div>
		<table border="1" cellpadding="10" cellspacing="0" width="100%">
				<tr style="background-color: #fffa9a;">
					<th style="background-color: yellow;">ID</th>
					<th>No</th>
					<th>Nama</th>
					<th>Prodi</th>
					<th>Umur</th>
					<th>Alamat</th>
					<th>JK</th>
					<th>Gambar</th>
					<th style="background-color: white;">Ubah Data</th>
				</tr>
				<?php for($i=0; $i<count($arrDatabase); $i++): ?>
				<tr>
					<td><?= $arrDatabase[$i]["id"] ?></td>
					<td><?= $i+1 ?></td>
					<td><?= $arrDatabase[$i]["nama"] ?></td>
					<td><?= $arrDatabase[$i]["prodi"] ?></td>
					<td><?= $arrDatabase[$i]["umur"] ?></td>
					<td><?= $arrDatabase[$i]["alamat"] ?></td>
					<td><?= $arrDatabase[$i]["jk"] ?></td>
					<td style="width:120px;"><img src="imgKor/<?= $arrDatabase[$i]["gambar"] ?>" style="width:120px;"></td>
					<td style="cursor: context-menu;"><a href="Latihan9.3 - Delete sql database.php?xyz=<?= $arrDatabase[$i]["id"] ?>">Hapus</a> | <a href="Latihan9.2 - Update sql database.php?xyz=<?= $arrDatabase[$i]["id"] ?>">Sunting</a></td>
				</tr>
			<?php endfor; ?>
		</table>
	</div>
</body>
</html>