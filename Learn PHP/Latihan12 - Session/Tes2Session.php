<?php 

//Kalau ingin file ini berjalan dengan baik, makan file Tes1Session harus dijalankan terlebih dahulu
session_start();

echo "File ini memprint variabel dari session file 1<br>";
echo $_SESSION["varglob"];

 ?>

 <br><a href="Tes1Session.php">File tes 1</a>
 <br><a href="Tes3Session.php">File tes 3</a>