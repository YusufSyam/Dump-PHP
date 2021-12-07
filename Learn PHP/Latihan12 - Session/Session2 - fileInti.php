<?php 
session_start();

// Mengecek jika session belum berjalan / belum melakukan login
if(!isset($_SESSION["login"])){
	echo "<script> alert(\"Anda belum melakukan login, anda akan diarahkan ke halaman login\"); </script>";
	header("Refresh:0.0001 ;URL= Session1.php");
	exit();
}

if(isset($_POST["submit"])){
	$_SESSION= [];
	session_unset();
	session_destroy();

	echo "<script> alert(\"Anda telah Logout, sesi telah berakhir dan anda akan diarahkan ke halaman login\"); </script>";
	header("Refresh:0.0001 ;URL= Session1.php");
	exit();
}

echo "Ini file inti";
 ?>

 <form action="" method="post">
 	<button type="submit" name="submit">Tekan tombol ini untuk log out</button>
 </form>