<?php 

$db= mysqli_connect("localhost","root","","databaselatihanphp");

$passwordSalah= false; $userNameTidakAda= false;

if(isset($_POST["submit"])){
	$username= $_POST["username"];
	$password= $_POST["password"];

	$cariUsername= mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
	if(mysqli_num_rows($cariUsername)==1){
		if(password_verify($password, mysqli_fetch_assoc($cariUsername)["password"])){
			echo "<script> alert(\"Login berhasil, anda akan diarahkan ke halaman\");
					document.location.href='Latihan8 - Update, Search & Delete sql database.php';
				</script>";
		}else $passwordSalah= true;
	}else $userNameTidakAda= true;
}
		
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Log in</title>
	<style>
		body{
			font-family: arial, helvetica;
			font-size: 14px;
			max-width: 550px;
			margin: 20px auto;
			border: 5px solid #4ccdc9;
			border-radius: 100px;
			display: flex;
			flex-direction: column;
			transform: translateY(40px);
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
			margin: 16px;
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
			border-left: 3px solid #4ccdc9;
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
			background-color: #4ccdc9;
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
			Login
		</h1>
		<form action="" method="post" class="form">
			<div class="isi" style="margin-bottom: 26px;">
				<label for="username">Username</label>
				<div>
					<input type="text" name="username" id="username" required autocomplete="off">
					<div id="userNameTidakAda" style="color: red; position: absolute; margin: auto; left:28%; cursor: context-menu;"></div>
				</div>
			</div>
			<div class="isi">
				<label for="password">Password</label>
				<div>
					<input type="password" name="password" id="password" required>
					<div id="passwordSalah" style="color: red; position: absolute; margin: auto; left:45%; cursor: context-menu;"></div>
				</div>
			</div>
			<div class="tombol">
				<button type="submit" name="submit">Sign in</button>
			</div>
		</form>
		<div class="footer">Belum mempunyai akun? Registrasi <a href="Latihan10 - Registrasi.php">di sini</a></div>
	</div>

<?php 

	if(isset($_POST["submit"])){
		if($passwordSalah){
			echo "
				<script>
					let passwordSalah= document.getElementById(\"passwordSalah\");
					passwordSalah.innerHTML= \"Password salah!\";
				</script>
				";
		}
		if($userNameTidakAda){
			echo "<script>
					let warnUserName= document.getElementById(\"userNameTidakAda\");
					warnUserName.innerHTML= \"Username yang anda masukkan salah\";
				</script>";
		}
	}

 ?>

</body>
</html>