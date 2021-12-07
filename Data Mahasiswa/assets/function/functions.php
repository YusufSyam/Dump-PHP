<?php 

$database= mysqli_connect("localhost", "root", "", "appseminar");


function fetchTable($table){
	global $database;

	$arrDatabase= [];
	$queryAll= mysqli_query($database, "SELECT * FROM ".$table);
	while($simpanData= mysqli_fetch_assoc($queryAll)) $arrDatabase[]= $simpanData;
	return $arrDatabase;
}

function fetchQuery($string){
	global $database;

	$arrDatabase= [];
	$query= mysqli_query($database,$string);
	while($simpanData= mysqli_fetch_assoc($query)) $arrDatabase[]= $simpanData;
	return $arrDatabase;
}

function delete($id){
	global $database;
	mysqli_query($database,"DELETE FROM ss_mahasiswa WHERE id_mahasiswa=".$id);
}

function fillEmpty($arrDatabase){
	for($i=0; $i<count($arrDatabase); $i++){
		if($arrDatabase[$i]["jk"]=="") $arrDatabase[$i]["jk"]= "-";
		if($arrDatabase[$i]["no_hp"]=="") $arrDatabase[$i]["no_hp"]= "-";
		if($arrDatabase[$i]["alamat"]=="") $arrDatabase[$i]["alamat"]= "-";
		if($arrDatabase[$i]["tahun_masuk"]=="") $arrDatabase[$i]["tahun_masuk"]= "-";
		if($arrDatabase[$i]["tahun_lulus"]=="") $arrDatabase[$i]["tahun_lulus"]= "-";
		if($arrDatabase[$i]["status"]=="") $arrDatabase[$i]["status"]= "-";
		if($arrDatabase[$i]["email"]=="") $arrDatabase[$i]["email"]= "-";
	}
	return $arrDatabase;
}

function errorCheck($database, $type){
	if(mysqli_affected_rows($database)>0) {
		echo "<script> alert(\"Query berhasil dijalankan, ",mysqli_affected_rows($database)," ",$type,"\");
				document.location.href='index.php';
			</script>";

	}else echo "<script> alert(\"Query gagal, error: ",mysqli_error($database),"\")</script>";
}

function sessionStartedRedirect($message, $redirectPage){
	echo "<script> alert('$message');
					document.location.href='$redirectPage';
				</script>";
}

 ?>