<?php 
session_start();

require("assets/function/functions.php");
if(isset($_SESSION["login"]) || isset($_COOKIE["login"])){}
else sessionStartedRedirect("Silahkan Login terlebih dahulu", "Login.php");

delete($_GET["xyz"]);
errorCheck($database, "baris dihapus");

 ?>