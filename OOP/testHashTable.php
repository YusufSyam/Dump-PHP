<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hash Table</title>
    <style type="text/css">
        *{
            font-family: consolas;
        }

        .header{
            text-align: center;
        }

        h1{
            margin-top: 30px;
        }

        table{
            margin: auto;
        }

        table th{
            background-color: yellow;
        }

        .bodyContainer{
            margin: 50px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .headerInsert{
            border-left: 5px solid lime;
            padding-left: 20px;
        }

        .headerDelete{
            border-left: 5px solid red;
            padding-left: 20px;
        }

        .headerSearch{
            border-left: 5px solid yellow;
            padding-left: 20px;
        }

        .headerGenerate{
            border-right: 5px solid blue;
            padding-right: 20px;
        }

        .body2{
            margin-left: 25px;
        }

        .body3{
            margin-right: 25px;
            width: 333px;
        }

        .body2 .form *, .body3 .form *{
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <h1 class="header">Hash Table</h1>
    <h3 class="header">Dengan Metode Modulo</h3>
	<table id= "idTable" border="1" cellpadding="10" cellspacing="0" >
	</table>

    <div class="bodyContainer">
        <div class="column2">
            <div>
                <h3 class= "headerInsert">Insert Data</h3>
                <div class= "body2">
                    <div class="form">
                        <input type="number" class="insertInput" id="insertInput" >
                        <input id="button" type="submit" name="insertButton" onclick="insertHash()" value="Insert"/><br>
                    </div>
                    <div id="idInsertLog">Log: -</div>
                </div>
            </div>
            <div>
                <h3 class= "headerDelete">Delete Data</h3>
                <div class= "body2">
                    <div class="form">
                        <input type="number" class="deleteInput" id="deleteInput" >
                        <input id="button" type="submit" name="deleteButton" onclick="deleteHash()" value="Delete"/><br>
                    </div>
                    <div id="idDeleteLog">Log: -</div>
                </div>
            </div>
            <div>
                <h3 class= "headerSearch">Search Data</h3>
                <div class= "body2">
                    <div class="form">
                        <input type="number" class="searchInput" id="searchInput" >
                        <input id="button" type="submit" name="searchButton" onclick="searchHash()" value="Search"/><br>
                    </div>
                    <div id="idSearchLog">Log: -</div>
                </div>
            </div>
        </div>
        <div class="column2">
            <div>
                <h3 class= "headerGenerate">Generate n Random (0-100) Data</h3>
                <div class= "body3">
                    <div class="form">
                        <input type="number" class="generateInput" id="generateInput" placeholder="n">
                        <input id="button" type="submit" name="generateButton" onclick="generateHash()" value="Generate"/><br>
                    </div>
                    <div id="idGenerateLog">Log: -</div>
                    </div>
                </div>
            </div>
        </div>
        
	
	<script>
		class Node{
            constructor(data){
                this.data= data;
                this.nextNode= null;
            }
        }

        class LinkedList{
        	constructor(){
        		this.head= null;
        		this.tail= null;
        	}

        	insert(data){
        		if(this.search(data)){
                    return;
                }

                let newNode= new Node(data);

                if(this.head==null){
                    this.head= newNode;
                    this.tail= newNode;
                }else{
                    this.tail.nextNode= newNode;
                    this.tail= newNode;
                }
        	}

        	search(data){
                if(this.head==null) return false;
                if(this.head.data==data) return true;
                else if(this.head.nextNode!=null && this.head.nextNode.data==data) return true;

        		let currNode= this.head;

        		while(this.head!=null && currNode.nextNode!=null){
                    if(currNode.data==data || currNode.nextNode.data==data){
                        return true;
                    }
                    currNode= currNode.nextNode;
                }

                return false;
        	}

        	delete(data){
                if(this.head==null || this.head.nextNode==null && this.head.data!=data) return false;
                if(this.head.data==data) {
                    this.head= this.head.nextNode;
                    return true;
                }
                else if(this.head.nextNode.data==data){
                    this.head.nextNode= null;
                    this.tail= this.head;

                    return true;
                }

                let currNode= this.head;

                while(this.head!=null && currNode.nextNode.nextNode!=null){
                    if(currNode.nextNode.data==data || currNode.nextNode.nextNode.data==data) {
                        if(currNode.nextNode.nextNode==this.tail) {
                            currNode.nextNode.nextNode= null;
                            this.tail= currNode.nextNode;
                        }
                        else currNode.nextNode= currNode.nextNode.nextNode;
                        return true;
                    }
                    currNode= currNode.nextNode;
                }
                
                return false;
            }

            displayLinkedList(){
                return (this.head==null)? "null" : (this.executeDisplayLinkedList(this.head));
            }
        
            executeDisplayLinkedList(node){
                return (node.nextNode==null)? node.data+"" : node.data+" -> "+this.executeDisplayLinkedList(node.nextNode);
            }
        }

        class Rows{

	        constructor(index, hashValue){
	            this.index= index;
	            this.hashValue= hashValue;
	            this.keyList= new LinkedList();
	        }

	        insertKey(data){
	            this.keyList.insert(data);
	        }

	        searchKey(data){
	            console.log("Angka "+data+ ((this.keyList.search(data))? (" berada pada indeks "+this.index) : (" tidak berada pada indeks manapun")));
	        }

	        deleteKey(data){
	            console.log("Angka "+data+ ((this.keyList.delete(data))? (" terhapus") : (" tidak berada pada indeks manapun")));
	        }
        }

        class Hash{

		    constructor(maxIndex= 5){
		        this.maxIndex= maxIndex;
		        this.rows= [];
		        this.addingRow();
		    }

		    hashFunctionValue(index){
		        return index%this.maxIndex;
		    }

		    addingRow(){
		        for(let i=0; i<this.maxIndex; i++) this.rows[i]= new Rows(i, this.hashFunctionValue(i));
		    }

		    insert(data){
		        this.rows[this.hashFunctionValue(data)].insertKey(data);
		    }

		    search(data){
		        this.rows[this.hashFunctionValue(data)].searchKey(data);
		    }

		    delete(data){
		        this.rows[this.hashFunctionValue(data)].deleteKey(data);
		    }

		    display(){
		        console.log("\nIndex\t\t\tHash Function\t\tKey List");
		        console.log("\t\t\th(k)= k mod "+this.maxIndex);

		        for(let i=0; i<this.maxIndex; i++) console.log(this.rows[i].index+"\t\t\t"+this.rows[i].hashValue+"\t\t\t"+this.rows[i].keyList.displayLinkedList()+"\n");
		        console.log("\n");
		    }
        }

        // let maxIndex= Number(prompt('Masukkan Max Data dari Hash Table'));
        let maxIndex= 5;
        let hash1= new Hash(maxIndex);

        let table= document.getElementById("idTable");

        let isitable= `
            <tr id= "idHeadRows">
                <th id="idThIndex">Index</th>
                <th id="idThFungsiHash">Fungsi Hash<br>h= k mod `+hash1.maxIndex+`</th>
                <th id="idThKeyList">Key</th>
            </tr>
        `;

        for(let j=0; j<hash1.maxIndex; j++){
            isitable+= `
            <tr id="idTd`+j+`">
                <td class= "classTdIndex" id= "idTdIndex`+j+`" style= "text-align: center;">`+hash1.rows[j].index+`</td>
                <td class= "classTdFungsiHash" id= "idTdFungsiHash`+j+`">h= k mod `+hash1.maxIndex+`= `+hash1.rows[j].hashValue+`</td>
                <td class= "classTdKeyList" id= "idTdkeyList`+j+`">`+hash1.rows[j].keyList.displayLinkedList()+`</td>
            <tr>`;
        }

        table.innerHTML= isitable;

        let prevCell= document.getElementById("idThIndex");
        let logInsert= document.getElementById("idInsertLog");
        let logDelete= document.getElementById("idDeleteLog");
        let logSearch= document.getElementById("idSearchLog");
        let logGenerate= document.getElementById("idGenerateLog");

        function insertHash(){
            let dataInsert= document.getElementById("insertInput").value;

            if(dataInsert==null) {
                logInsert.innerHTML= "Log: <span style='color: red'>Masukkan integer untuk insert!</span>";
                logDelete.innerHTML= "Log: -";
                logSearch.innerHTML= "Log: -";
            }
            else{
                if(prevCell!=document.getElementById("idThIndex")) {
                    let spanPrevCell= prevCell.querySelectorAll("span");
                    for(let i=0; i<spanPrevCell.length; i++){
                        spanPrevCell[i].style.backgroundColor= "white";
                        spanPrevCell[i].style.color= "black";
                        spanPrevCell[i].style.padding= "0 0";
                    }
                }

                
                let currentRow= hash1.rows[Number(hash1.hashFunctionValue(dataInsert))];

                if(!hash1.rows[currentRow.index].keyList.search(Number(dataInsert))){
                    hash1.insert(Number(dataInsert))
                    logInsert.innerHTML= "Log: <span style='color: green'>Data "+dataInsert+" berhasil dimasukkan ke hash table</span>";
                    logDelete.innerHTML= "Log: -";
                    logSearch.innerHTML= "Log: -";

                    prevCell= document.getElementById("idTdkeyList"+currentRow.index);

                    let stringIsiKeyList= "<span style='background-color:lime; padding: 0 5px;'>"+dataInsert+"</span>";
                    if(prevCell.innerText=="null") prevCell.innerHTML= stringIsiKeyList;
                    else prevCell.innerHTML= prevCell.innerHTML+" -> "+"<span style='background-color:lime; padding: 0 5px;'>"+dataInsert+"</span>";
                }
                else {
                    logInsert.innerHTML= "Log: <span style='color: red'>Data "+dataInsert+" telah ada pada hash table</span>";
                    logDelete.innerHTML= "Log: -";
                    logSearch.innerHTML= "Log: -";
                }
            }
        }

        function deleteHash(){
            let dataDelete= document.getElementById("deleteInput").value;

            if(dataDelete==null) {
                logDelete.innerHTML= "Log: <span style='color: red'>Masukkan integer untuk delete!</span>";
                logInsert.innerHTML= "Log: -";
                logSearch.innerHTML= "Log: -";
            }
            else{
                if(prevCell!=document.getElementById("idThIndex")) {
                    let spanPrevCell= prevCell.querySelectorAll("span");
                    for(let i=0; i<spanPrevCell.length; i++){
                        spanPrevCell[i].style.backgroundColor= "white";
                        spanPrevCell[i].style.color= "black";
                        spanPrevCell[i].style.padding= "0 0";
                    }
                }

                let currentRow= hash1.rows[Number(hash1.hashFunctionValue(dataDelete))];

                if(hash1.rows[currentRow.index].keyList.search(Number(dataDelete))){
                    hash1.delete(Number(dataDelete))
                    logDelete.innerHTML= "Log: <span style='color: green'>Data "+dataDelete+" berhasil dihapus dalam hash table</span>";
                    logInsert.innerHTML= "Log: -";
                    logSearch.innerHTML= "Log: -";

                    prevCell= document.getElementById("idTdkeyList"+currentRow.index);
                    prevCell.innerHTML= `<span style='color:red;'>`+currentRow.keyList.displayLinkedList()+`</span>`;
                }else {
                    logDelete.innerHTML= "Log: <span style='color: red'>Data "+dataDelete+" tidak ada di hash table</span>";
                    logInsert.innerHTML= "Log: -";
                    logSearch.innerHTML= "Log: -";
                }
            }

        }

        function searchHash(){
            let dataSearch= document.getElementById("searchInput").value;

            if(dataSearch==null) {
                logSearch.innerHTML= "Log: <span style='color: red'>Masukkan integer untuk disearch!</span>";
                logInsert.innerHTML= "Log: -";
                logDelete.innerHTML= "Log: -";
            }else{
                if(prevCell!=document.getElementById("idThIndex")) {
                    let spanPrevCell= prevCell.querySelectorAll("span");
                    for(let i=0; i<spanPrevCell.length; i++){
                        spanPrevCell[i].style.backgroundColor= "white";
                        spanPrevCell[i].style.color= "black";
                        spanPrevCell[i].style.padding= "0 0";
                    }
                }

                let currentRow= hash1.rows[Number(hash1.hashFunctionValue(dataSearch))];

                if(hash1.rows[currentRow.index].keyList.search(Number(dataSearch))){
                    logSearch.innerHTML= "Log: <span style='color: green'>Data "+dataSearch+" berhasil ditemukan pada indeks "+currentRow.index+"!</span>";
                    logInsert.innerHTML= "Log: -";
                    logDelete.innerHTML= "Log: -";

                    prevCell= document.getElementById("idTdkeyList"+currentRow.index);
                    let splitPrevCell= prevCell.innerText.split(" -> ");

                    let stringIsiKeyList= "";

                    for(let i=0; i<splitPrevCell.length; i++){
                        if(splitPrevCell[i]==Number(dataSearch)){
                            stringIsiKeyList+= "<span style='background-color:yellow;  padding: 0 5px;''>"+splitPrevCell[i]+"</span>"
                        }else stringIsiKeyList+= splitPrevCell[i];

                        if(i!=splitPrevCell.length-1) stringIsiKeyList+= " -> ";
                    }

                    prevCell.innerHTML= stringIsiKeyList;
                }
                else {
                    logSearch.innerHTML= "Log: <span style='color: red'>Data "+dataSearch+" tidak ditemukan di indeks manapun</span>";
                    logInsert.innerHTML= "Log: -";
                    logDelete.innerHTML= "Log: -";
                }
            }
        }

        function generateHash(){
            let n= Number(document.getElementById("generateInput").value);
            let arr= []

            let stringLogGenerate= "Log: <span style='color: blue'>Menggenerate "+n+" data (data yang overlap / sama dengan data yang telah ada akan dibuang): ";

            for(let i=0; i<n; i++){
                arr[i]= Math.floor(Math.random() * 101)
                hash1.insert(arr[i]);
                stringLogGenerate+= arr[i]+"";
                if(n>2 && i==n-2) stringLogGenerate+= " dan ";
                else if(i!=n-1) stringLogGenerate+= ", ";
            }

            let isitable= `
                <tr id= "idHeadRows">
                    <th id="idThIndex">Index</th>
                    <th id="idThFungsiHash">Fungsi Hash<br>h= k mod `+hash1.maxIndex+`</th>
                    <th id="idThKeyList">Key</th>
                </tr>
            `;

            for(let j=0; j<hash1.maxIndex; j++){
                isitable+= `
                <tr id="idTd`+j+`">
                    <td class= "classTdIndex" id= "idTdIndex`+j+`" style= "text-align: center;">`+hash1.rows[j].index+`</td>
                    <td class= "classTdFungsiHash" id= "idTdFungsiHash`+j+`">h= k mod `+hash1.maxIndex+`= `+hash1.rows[j].hashValue+`</td>
                    <td class= "classTdKeyList" id= "idTdkeyList`+j+`">`+hash1.rows[j].keyList.displayLinkedList()+`</td>
                <tr>`;
            }

            table.innerHTML= isitable;
            logGenerate.innerHTML= stringLogGenerate+"</span>";
            
        }


	</script>
</body>
</html>