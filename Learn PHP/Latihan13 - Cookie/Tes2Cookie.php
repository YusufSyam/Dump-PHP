<?php 

if(isset($_COOKIE["name"])) echo $_COOKIE["name"];
else echo "Cookie belum diset";

echo "<br><br>";

if(isset($_COOKIE["Cookie2"])) echo $_COOKIE["Cookie2"];
else echo "Cookie 2 belum diset atau sudah expire";

echo "<br>";

 ?>
 <a href="Tes1Cookie.php">Menyetel Cookie</a>
<br><a href="Tes3Cookie.php">Menghapus cookie</a>