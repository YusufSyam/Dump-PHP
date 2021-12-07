<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Penerapan Get</title>
	<style>
		a{
			margin: 10px;
		}

		div{
			margin: 14px;
			display: flex;
			flex-direction: column;
		}

		.header{
			margin: 60px 0 55px;
			display: flex;
			text-align: center;
		}

		.header span{
			font-family: arial;
			font-size: 32px;
		}

		img{
			margin: 30px;
			cursor: pointer;
			width: 215px;
			border-radius: 215px;
			transition: 300ms ease;
		}

		img:hover{
			transform: scale(1.1);
		}

		.gambar{
			display: flex;
			justify-content: center;
			flex-direction: row;
		}

	</style>
</head>
<body>
	<?php 
		$warna=[
			["nama"=>"merah","umur"=> 19, "terang"=> true],
			["nama"=>"hijau","umur"=> 19, "terang"=> true],
			["nama"=>"hitam","umur"=> 19, "terang"=> false],
			["nama"=>"ungu","umur"=> 19, "terang"=> false]
		];
		for($i=1; $i<=count($warna); $i++){
			$warna[$i-1]["img"]= "img/warna".$i.".png";
		}
	 ?>
	 <div class= header>
	 	<?php  
	 		// for($i=0; $i<count($warna); $i++){
	 		// 	//Pake dan kalau lebih dari 1 elemen get
	 		// 	echo "<a href=\"Latihan5.3 - Penerapan Get.php?img=",$warna[$i]["img"],"&nama=",$warna[$i]["nama"],"&umur=",$warna[$i]["umur"],"&terang=",$warna[$i]["terang"],"\">Tampilkan warna ",$warna[$i]["nama"],"</a>";
	 		// }
		?>
		<span>Pilih warna yang ingin ditampilkan biodatanya</span>
		 </div>
	<div class= "gambar">
	 <?php 
	 	for($i=0; $i<count($warna); $i++){
			echo "<img class=\"classGambar\" src=\"",$warna[$i]["img"],"\" alt=\"warna\">";
	 	}
	  ?>
	</div>
	  <script>
	  	let gambar= document.querySelector("div.gambar");
	  	let arrayGambar= Array.prototype.slice.call(document.querySelectorAll("img"));
		let arrayPHP= <?php echo json_encode($warna); ?>

	  	gambar.addEventListener("click",function(e){
	  		if(e.target.className=="classGambar"){
	  			let indeks= arrayGambar.indexOf(e.target);
	  			window.open("Latihan5.3 - Penerapan Get.php?img=img/warna"+(indeks+1)+".png&nama="+arrayPHP[indeks]["nama"]+"&umur="+arrayPHP[indeks]["umur"]+"&terang="+arrayPHP[indeks]["terang"],<?= "\"_self\"" ?>);
	  		}
	  	});
	  </script>
</body>
</html>