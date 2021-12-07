<?php 
session_start();

require("assets/function/functions.php");
if(isset($_SESSION["login"])) sessionStartedRedirect("Anda telah log in sebelumnya", "index.php");
	
$passwordSalah= false; $sudahAdaUsername= false;
	
if(isset($_POST["submit"]) && $_POST["password"]!=$_POST["password2"]) $passwordSalah= true;
else if(isset($_POST["submit"]) && !$passwordSalah){
	$username= htmlspecialchars($_POST["username"]);
	$password= password_hash(htmlspecialchars($_POST["password2"]), PASSWORD_DEFAULT);
	$query= "SELECT * FROM user WHERE username = '$username'";
	if(mysqli_fetch_array(mysqli_query($database,$query))) $sudahAdaUsername= true;
	else{
		mysqli_query($database,"INSERT INTO user VALUES('','$username','$password')");
		errorCheck($database,"user ditambahkan");
	}
}	
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrasi Akun</title>
	<link rel="stylesheet" href="assets/style/styleRegistrasi.css">
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
					<input type="text" name="username" id="username" required autocomplete="off" <?php if(isset($_POST["username"])) echo "value=",$_POST["username"] ?>>
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
		<div class="footer">Sudah mempunyai akun? Log in <a href="Login.php">di sini</a></div>
	</div>
	<?php 

	echo '<script>let isiUsername= document.getElementById("username").value;</script>';
	if(isset($_POST["submit"])){
		//Mengecek apakah password yang diinput sama
		if($passwordSalah){
			echo "<script>let passwordSama= document.getElementById(\"passwordSama\");passwordSama.innerHTML= \"Password tidak cocok!\";</script>";
		}
		

		//Mengecek apakah ada username yang sama dengan yang diinput sebelumnya
		if($sudahAdaUsername){
			echo "<script>let warnUserName= document.getElementById(\"userNameTidakAda\");warnUserName.innerHTML= \"Username telah ada! Bikin username baru\";</script>";
		}
	}
	?>
	
</body>
</html>