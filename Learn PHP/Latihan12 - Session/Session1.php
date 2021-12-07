<?php 

// $_SESSION adalah variabel superglobals yang tersimpan di dalam server
session_start();

//Mengecek jika suatu session sudah berjalan, kalau sudah, arahkan ke file utama
if(isset($_SESSION["login"])) {
	echo "<script> alert(\"Sesi telah berjalan sebelumnya, anda akan diarahkan ke halaman utama\"); </script>";
	header("Refresh:0.0001 ;URL= Session2 - fileInti.php");
	exit();

}

echo "Ini file yang harus dijalankan pertama";
if(isset($_POST["submit"])){
	$_SESSION["login"]= true;
	header("Location: Session2 - fileInti.php");
}

?>
<form action="" method="post">
	<button type="submit" name="submit">Tekan tombol ini untuk login</button>
</form>