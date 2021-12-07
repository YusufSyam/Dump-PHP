let keyword= document.getElementById("kunci");
let containerKecil= document.getElementById("containerKecil");

keyword.addEventListener("keyup", function(){
	let ajax= new XMLHttpRequest();

	ajax.onreadystatechange= function(){
		if(ajax.readyState==4 && ajax.status==200) containerKecil.innerHTML= ajax.responseText;
	}
	
	ajax.open("GET","assets/ss_mahasiswa.php?kunci="+keyword.value, true);
	ajax.send();
});