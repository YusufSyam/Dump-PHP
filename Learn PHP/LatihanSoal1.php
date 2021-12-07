<?php 
	//Soal: menampilkan kotak angka yang mempunyai kolom dan Baris
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kotak warni warni</title>
	<style>
		body{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		.container{
			display: flex;
			flex-wrap: wrap;
			justify-content: flex-start;
		}

		.kotak{
			padding: 20px 15px 10px;
			margin: 10px;
			height: 30px;
			width: 30px;
			//background-color: lightblue;
			text-align: center;
			overflow: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<script type="text/javascript">
			function isInt(value) { return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value)); }
			while(true){
				let banyakKotak= prompt("Masukkan banyak kotak : ");
				if(isInt(banyakKotak)){
					parseInt(banyakKotak);
					break;
				}else alert("Masukkan hanya integer");
			}
		</script>
		<?php
			for($i=1; $i<=2000; $i++){
				echo "<div class=\"kotak\">",$i,"</div>";
			}
		 ?>
	</div>
	<script>
		let ambilElemen= document.getElementsByClassName("kotak");
		let nilaiB= 0;
		let tambah= true;
		for(let i=0; i<ambilElemen.length; i++){
			ambilElemen[i].style.backgroundColor= "rgb(255,240,"+nilaiB+")";
			if(nilaiB+3 >= 255 || nilaiB-3 <= 0 && !tambah){
				if(tambah){
					tambah= false;
					nilaiB= 255;
				}else{
					tambah= true;
					nilaiB= 0;
				}
				
				if((i-1)<ambilElemen.length && tambah? tambah : !tambah){							
					if(tambah) nilaiB+=3;
					else nilaiB-=3;
					ambilElemen[i+1].style.backgroundColor= "rgb(255,240,"+nilaiB+")";
					i++;
				}
			}
			if(tambah) nilaiB+=3;
			else nilaiB-=3;
		}
	</script>
</body>
</html>