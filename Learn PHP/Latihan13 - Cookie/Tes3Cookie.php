<?php 

if (isset($_COOKIE["name"])){
	echo "Menghapus Cookie..";
	setcookie("name","", time()-3600);
	setcookie("Cookie2","", time()-3600);
}else echo "Tidak ada cookie untuk dihapus";
echo "<br>";

 ?>
 <a href="Tes1Cookie.php">Menyetel Cookie</a><br>
 <a href="Tes2Cookie.php">Menampilkan Cookie</a>