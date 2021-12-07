<?php 

$db= mysqli_connect("localhost","root","","databaselatihanphp");
	
	$passwordSalah= false; $sudahAdaUsername= false;
	
	if(isset($_POST["submit"]) && $_POST["password"]!=$_POST["password2"]) $passwordSalah= true;
	else if(isset($_POST["submit"]) && !$passwordSalah){
		$username= htmlspecialchars($_POST["username"]);
		$password= password_hash(htmlspecialchars($_POST["password2"]), PASSWORD_DEFAULT);

		$query= "SELECT * FROM users WHERE username = '$username'";
		$result= mysqli_query($db,$query);

		if(mysqli_fetch_array($result)) $sudahAdaUsername= true;
		else{
			mysqli_query($db,"INSERT INTO users VALUES('','$username','$password')");
			if(mysqli_affected_rows($db)>0){
				echo "<script> alert(\"Query berhasil dijalankan, user ditambahkan!\");
					document.location.href='Latihan11 - Login.php';
				</script>";

			}else{
				echo "<script> alert(\"Query gagal, error: ",mysqli_error($db),"\")</script>";
			}
		}
	}	
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrasi Akun</title>
	<style>
		body{
			font-family: arial, helvetica;
			font-size: 14px;
			max-width: 600px;
			margin: 15px auto;
			border: 5px solid #0af04b;
			border-radius: 100px;
			display: flex;
			flex-direction: column;
		}

		*{
			text-align: center;
		}

		.container{
			margin-top: 10px;
		}

		.form{
			display: flex;
			flex-direction: column;
			margin-top: 30px;
		}

		.isi{
			display: flex;
			flex-direction: column;
			margin: 14px;
		}

		.isi label{
			display: inline-block;
			font-size: 18px;
			text-align: center;
			margin: 15px;
		}

		.isi input{
			padding: 8px ;
			font-size: 16px;
			text-align: left;
			margin: auto;
			margin-bottom: 10px;
			width: 260px;
			border:none;
			border-left: 3px solid #0af04b;
			border-bottom: 1px solid black;
		}

		form .tombol{
			display: flex;
			justify-content: center;
			margin: 40px;
			margin-bottom: 15px;
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

		.footer{
			margin-bottom: 30px
		}

		.footer a{
			color: blue;
			text-decoration: none;
		}

	</style>
</head>
<body>
	<div class="container">
		<h1 style="margin-top: 30px;">
			Registrasi
		</h1>
		<form action="" method="post" class="form">
			<div class="isi">
				<label for="username">Username</label>
				<div>
					<input type="text" name="username" id="username" required autocomplete="off">
					<div id="userNameTidakAda" style="color: red; position: absolute; margin: auto; left:40%; cursor: context-menu;"></div>
				</div>
			</div>
			<div class="isi">
				<label for="password">Password</label>
				<input type="password" name="password" id="password1" required>
			</div>
			<div class="isi">
				<label for="password2">Konfirmasi Password</label>
				<div>
					<input type="password" name="password2" id="password2" required>
					<div id="passwordSama" style="color: red; position: absolute; margin: auto; left:45%; cursor: context-menu;"></div>
				</div>
			</div>
			<div class="tombol">
				<button type="submit" name="submit">Sign Up</button>
			</div>
		</form>
		<div class="footer">Telah mempunyai akun? Log in <a href="Latihan11 - Login.php">di sini</a></div>
	</div>
	<?php 

	if(isset($_POST["submit"])){
		//Mengecek apakah password yang diinput sama
		if($passwordSalah){
			echo "
			<script>
				let passwordSama= document.getElementById(\"passwordSama\");
				passwordSama.innerHTML= \"Password tidak cocok!\";
			</script>
			";
		}

		//Mengecek apakah ada username yang sama dengan yang diinput sebelumnya
		if($sudahAdaUsername){
			echo "<script>
					let warnUserName= document.getElementById(\"userNameTidakAda\");
					warnUserName.innerHTML= \"Username telah ada! Bikin username baru\";
				</script>";
		}
	}
	?>
</body>
</html>