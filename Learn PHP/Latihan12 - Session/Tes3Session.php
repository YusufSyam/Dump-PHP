<?php 
session_start();

echo "File ini menghancurkan session yang telah berjalan";

//Menghancurkan session
$_SESSION= [];
session_unset();
session_destroy();


 ?>

 <br><a href="Tes1Session.php">File tes 1</a>
 <br><a href="Tes2Session.php">File tes 2</a>