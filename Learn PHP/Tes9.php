<?php 

$db= mysqli_connect("localhost","root","","appSeminar");
$query= mysqli_query($db,"SELECT * FROM ss_mahasiswa");

var_dump(mysqli_fetch_array($query));
echo "<br><br>";
var_dump(mysqli_fetch_array($query));

 ?>