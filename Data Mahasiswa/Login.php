<?php 
session_start();

require("assets/function/functions.php");
if(isset($_SESSION["login"]) || isset($_COOKIE["login"])) header("location: index.php");

$passwordSalah= false; $userNameTidakAda= false;

if(isset($_POST["submit"])){
	$username= $_POST["username"];
	$password= $_POST["password"];

	$cariUsername= mysqli_query($database, "SELECT * FROM user WHERE username = '$username'");
	if(mysqli_num_rows($cariUsername)==1){
		if(password_verify($password, mysqli_fetch_assoc($cariUsername)["password"])){
			$_SESSION["login"]= true;
			setcookie("login", true, (time()+3600));
			echo "<script> alert(\"Login berhasil, anda akan diarahkan ke halaman\");
					document.location.href='index.php';
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
	<link rel="stylesheet" href="assets/style/styleLogin.css">
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
					<input type="text" name="username" id="username" required <?php if(isset($_POST["username"])) echo "value=",$_POST["username"] ?> >
					<div id="userNameTidakAda" style="color: red; position: absolute; margin: auto; left:28%; cursor: context-menu;"></div>
				</div>
			</div>
			<div class="isi">
				<label for="password">Password</label>
				<div>
					<input type="password" name="password" id="password" required>
					<div id="passwordSalah" style="color: red; position: absolute; margin: auto; left:41%; cursor: context-menu;"></div>
				</div>
			</div>
			<div class="tombol">
				<button type="submit" name="submit">Sign in</button>
			</div>
		</form>
		<div class="footer">Belum mempunyai akun? Registrasi <a href="Registrasi.php">di sini</a></div>
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