<?php 

// Cookie adalah variabel superglobals yang disimpan di sisi client / web browser

// Jika parameternya hanya 2, maka parameter ke-1 adalah key, dan parameter ke-2 adalah value
// Key tidak boleh mengandung spasi
setcookie("name", true);

//Jika parameternya ada 3, parameter ke-3 adalah waktu cookie tersebut akan terhapus (persatuan detik)
setcookie("Cookie2", "blablabla", (time()+60)); // Ini mengartikan cookie akan expire pada waktu 60 detik ke depan
echo "Menyetel cookie...<br>";


 ?>
 <a href="Tes2Cookie.php">Menampilkan Cookie</a>
 <br><a href="Tes3Cookie.php">Menghapus cookie</a>