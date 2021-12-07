<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<title>Penerapan Get</title>
</head>
<style>
	body{
		margin: auto;
		width: 600px;
		font-family: arial;
	}

	.container{
		display: flex;
		flex-direction: column;
		text-align: center;
		margin: 20px;
		border: 3px solid transparent;
		border-image: url(<?php echo $_GET["img"]?>) 1;
		height: 410px;
		border-radius: 8px;
	}

	img{
		width: 200px;
		margin: 20px auto 40px;
	}

	span{
		margin: 4px;
		display: block;
		font-size: 20px;
	}

	a{
		width: 100%;
		text-align: center;
		text-decoration: none; 
		margin-top: 100px;
		padding: 8px 20px;
		border-radius: 8px;
		font-size: 18px;
		color: white;
		box-sizing: border-box;
		background-image: url(<?php echo $_GET["img"]?>);
		background-size: cover;
	}

</style>
<body>
	<?php 
		if(!isset($_GET["img"]) || !isset($_GET["nama"]) || !isset($_GET["umur"]) || !isset($_GET["terang"])){
			?> 
			<script>
				let body= document.body;
				body.style.width= "1000px";
			</script>
			<div style="text-align: center; margin: 200px 0 10px; font-size: 40px; color: red"><i class="fas fa-ban" style="font-size: 200px; margin-bottom: 30px;"></i><br><b>Maaf, hak akses masuk anda diblokir</b><br></div><div style="text-align: center;">Anda akan dialihkan ke halaman awal</div>
			<?php
			header('Refresh: 4; URL=Latihan5.2 - Penerapan Get.php');
			exit;
		}
	 ?>
	<div class= "container">
		<img src="<?php echo $_GET["img"] ?>" alt="">
		<div>
			<span>Warna = <?php echo $_GET["nama"] ?></span>
			<span>Umur = <?php echo  $_GET["umur"] ?> </span>
			<span>Jenis warna? <?php 
				if($_GET["terang"]) echo "terang";
				else echo "gelap";
			 ?> </span>
			 <br>
			<a href="Latihan5.2 - Penerapan Get.php">Kembali ke halaman utama :)</a>
		</div>
	</div>
</body>
</html>