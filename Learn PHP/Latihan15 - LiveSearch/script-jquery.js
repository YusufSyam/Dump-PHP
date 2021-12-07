$(document).ready(function(){

// JQuery
// Dalam JQuery bisa dimasukkan javascript karena

// Event ketika keyword ditulis
// Query selector dengan JQuery => $("#id") , $(".class") , $("tag")
// .on = addEventListener

// $("#kunci").on("keyup",function(){
// 	// .load = ajax.open tanpa JQuery
// 	// .val = elemen.value di javascript
// 	$("#containerKecil").load("ss_mahasiswa.php?kunci="+$("#kunci").val()); 
// });

// Cara lain (luarnya sama dalamnya beda)
$("#kunci").on("keyup",function(){
	$.get("ss_mahasiswa.php?kunci="+$("#kunci").val(), function(e){
		$("#containerKecil").html(e);
	});	
});

});