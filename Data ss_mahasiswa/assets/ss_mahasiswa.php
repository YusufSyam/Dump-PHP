<?php  

$conn= mysqli_connect("localhost","root","","appseminar");

$kataKunci= $_GET["kunci"];
if(strpos($kataKunci,"=")){
	$kataKunci2= explode("=", $kataKunci);
	if($kataKunci2[0]=="id" && count($kataKunci2)==2) $database2= mysqli_query($conn,"SELECT * FROM ss_mahasiswa WHERE id_mahasiswa = '$kataKunci2[1]'");
	else {
		$database2= mysqli_query($conn,"SELECT * FROM ss_mahasiswa WHERE
									id_mahasiswa LIKE '%$kataKunci%' OR
									nama LIKE '%$kataKunci%' OR
									nim LIKE '%$kataKunci%' OR
									jk LIKE '%$kataKunci%' OR
									no_hp LIKE '%$kataKunci%' OR
									alamat LIKE '%$kataKunci%' OR
									tahun_masuk LIKE '%$kataKunci%' OR
									tahun_lulus LIKE '%$kataKunci%' OR
									status LIKE '%$kataKunci%' OR
									email LIKE '%$kataKunci%'");
	}
}else{
	$database2= mysqli_query($conn,"SELECT * FROM ss_mahasiswa WHERE
									id_mahasiswa LIKE '%$kataKunci%' OR
									nama LIKE '%$kataKunci%' OR
									nim LIKE '%$kataKunci%' OR
									jk LIKE '%$kataKunci%' OR
									no_hp LIKE '%$kataKunci%' OR
									alamat LIKE '%$kataKunci%' OR
									tahun_masuk LIKE '%$kataKunci%' OR
									tahun_lulus LIKE '%$kataKunci%' OR
									status LIKE '%$kataKunci%' OR
									email LIKE '%$kataKunci%'");
}

$arrDatabase= [];
while($simpanData= mysqli_fetch_assoc($database2)) $arrDatabase[]= $simpanData;

for($i=0; $i<count($arrDatabase); $i++){
	if($arrDatabase[$i]["jk"]=="") $arrDatabase[$i]["jk"]= "-";
	if($arrDatabase[$i]["no_hp"]=="") $arrDatabase[$i]["no_hp"]= "-";
	if($arrDatabase[$i]["alamat"]=="") $arrDatabase[$i]["alamat"]= "-";
	if($arrDatabase[$i]["tahun_masuk"]=="") $arrDatabase[$i]["tahun_masuk"]= "-";
	if($arrDatabase[$i]["tahun_lulus"]=="") $arrDatabase[$i]["tahun_lulus"]= "-";
	if($arrDatabase[$i]["status"]=="") $arrDatabase[$i]["status"]= "-";
	if($arrDatabase[$i]["email"]=="") $arrDatabase[$i]["email"]= "-";
}

?>
<?php 
	if($arrDatabase==null):
?>		
	<div style=" margin: 25px; font-size: 18px; color: red;">Tidak menemukan data yang cocok dengan keyword yang anda masukkan<br>Klik tombol di bawah untuk reset keyword</div>
	<form action="" method="post">
			<input type="text" name="kunci" id="kunci" size="25" placeholder="Cari . . . ." autocomplete="off" hidden>
			<button type="submit" name="search" style=" border: none; border-radius:100px; padding: 8px 22px; font-size: 18px; background-color: #ff343c; color: white; cursor: pointer;">Reset</button>
	</form>
<?php
		exit();
	endif;
 ?>
<table border="1" cellpadding="10" cellspacing="0" id="tabel">
			<tr style="background-color: #fffa9a;">
				<th width="21px" style="background-color: yellow;">ID</th>
				<th width="21px" >NO</th>
				<th width="111.783px" >Nama</th>
				<th width="71.4833px" >Nim</th>
				<th width="16px" >JK</th>
				<th width="106px" >No. Hp</th>
				<th width="221.317px" >Alamat</th>
				<th width="68.5833px" >Tahun Masuk</th>
				<th width="67.1333px" >Tahun Lulus</th>
				<th width="39px" >Status</th>
				<th width="38.1px" >ID Prodi</th>
				<th width="208px" >Email</th>
				<th width="55.6px" style="background-color: white;"></th>
			</tr>
			<?php  for($i=0; $i<count($arrDatabase); $i++): ?>
			<tr>
				<td><?= $arrDatabase[$i]["id_mahasiswa"] ?></td>
				<td><?= ($i+1) ?></td>
				<td style="text-align: left;"><?= $arrDatabase[$i]["nama"] ?></td>
				<td><?= $arrDatabase[$i]["nim"] ?></td>
				<td><?= $arrDatabase[$i]["jk"] ?></td>
				<td><?= $arrDatabase[$i]["no_hp"] ?></td>
				<td><?= $arrDatabase[$i]["alamat"] ?></td>
				<td><?= $arrDatabase[$i]["tahun_masuk"] ?></td>
				<td><?= $arrDatabase[$i]["tahun_lulus"] ?></td>
				<td><?= $arrDatabase[$i]["status"] ?></td>
				<td><?= $arrDatabase[$i]["id_prodi"] ?></td>
				<td><?= $arrDatabase[$i]["email"] ?></td>
				<td><a href="Latihan8.3 - Delete sql database.php?xyz=<?= $arrDatabase[$i]["id_mahasiswa"] ?>">Hapus</a><br><a href="Latihan8.2 - Update sql database.php?xyz=<?= $arrDatabase[$i]["id_mahasiswa"] ?>">Sunting</a><br><a href="">Cetak</a></td>
			</tr>
			<?php endfor; ?>
		</table>