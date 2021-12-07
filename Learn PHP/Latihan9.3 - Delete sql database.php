<?php 

$db= mysqli_connect("localhost","root","","aktorKorea");
$query= "DELETE FROM tabel1 WHERE id=".$_GET["xyz"];
mysqli_query($db,$query);

if(mysqli_affected_rows($db)>0) {
	echo "<script> alert(\"Query berhasil dijalankan, ",mysqli_affected_rows($db)," baris dengan id = ",$_GET["xyz"]," terhapus\");
			document.location.href='Latihan9 - Upload file image.php';
		</script>";
}else{
	echo "<script> alert(\"Query gagal, error: ",mysqli_error($db),"\");document.location.href='Latihan9 - Upload file image.php';</script>";
}
 ?>