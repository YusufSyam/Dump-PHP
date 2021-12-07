let keyword= document.getElementById("kunci");
let containerKecil= document.getElementById("containerKecil");

keyword.addEventListener("keyup", function(){
	// Buat objek ajax
	let xhr= new XMLHttpRequest();

	// Cek kesiapan Ajax
	xhr.onreadystatechange= function(){
		if(xhr.readyState==4 && xhr.status==200 /* Kalau 404 = not found */) {
			// .responseText mengembalkan semua yang ada di dalam file di xhr.open
			// console.log(xhr.responseText);
			// console.log("uwau");
			containerKecil.innerHTML= xhr.responseText;
		}
	}
	// Eksekusi ajax
	// Parameter kedua = file
	// xhr.open("GET","tes1.txt",true);
	xhr.open("GET","ss_mahasiswa.php?kunci="+keyword.value, true);
	xhr.send();
});