<?php 

$db= mysqli_connect("localhost","root","","appseminar");
$query= "DELETE FROM ss_mahasiswa WHERE id_mahasiswa=".$_GET["xyz"];
mysqli_query($db,$query);

if(mysqli_affected_rows($db)>0) {
	echo "<script> alert(\"Query berhasil dijalankan, ",mysqli_affected_rows($db)," baris dengan id = ",$_GET["xyz"]," terhapus\");
			document.location.href='Latihan8 - Update, Search & Delete sql database.php';
		</script>";
}else{
	echo "<script> alert(\"Query gagal, error: ",mysqli_error($db),"\")</script>";
}
 ?>