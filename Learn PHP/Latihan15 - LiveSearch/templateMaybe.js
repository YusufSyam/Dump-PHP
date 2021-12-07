let ajax= new XMLHttpRequest();

ajax.onreadystatechange = function(){
	if(ajax.readyState==4 && ajax.status==200){
		console.log("yayaya");
	}
}

ajax.open("GET","NAMAFILE.txt",true);
ajax.send();