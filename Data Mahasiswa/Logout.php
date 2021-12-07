<?php 

session_start();

session_unset();
session_destroy();
setcookie("login", true, (time()-3600));

header("location: Login.php");

 ?>