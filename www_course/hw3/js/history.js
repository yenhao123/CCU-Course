
function logout(){		
	location.href = "http://wwweb.csie.io:2028/hw3/logout.php";
}

function goHistory(){
	location.href="http://wwweb.csie.io:2028/hw3/history.php";
}

function search(){

	var cityName = document.getElementById("cityName").value;
	var id = document.getElementById("id").innerHTML;
	id = id.split(',')[1];
	var url="http://wwweb.csie.io:2028/hw3/historysearch.php?page=1&cityName=" + cityName + "&id=" + id;
	var xmlhttp = new XMLHttpRequest();
	var resText;
	var success = 0;
	xmlhttp.onreadystatechange = function() {
  		if (this.readyState == 4 && this.status == 200) {
			//document.getElementById('test').innerHTML = this.responseText;
			success = 1;
		}
	}

	xmlhttp.open("GET",url,false);
	xmlhttp.send();

	//change table
	if(success == 1){
		xmlhttp.open('GET',"http://wwweb.csie.io:2028/hw3/json/history.json",false);
		xmlhttp.send();

		resetTable();
		var myObj = JSON.parse(xmlhttp.responseText);
		for(i=1;i<myObj.city.length+1;i++){
			document.getElementById("table-search").rows[i].cells[1].innerHTML = myObj.city[i-1];
			document.getElementById("table-search").rows[i].cells[2].innerHTML = myObj.date[i-1];
			document.getElementById("table-search").rows[i].cells[3].innerHTML = myObj.temp[i-1];
			document.getElementById("table-search").rows[i].cells[4].innerHTML = myObj.feelslike[i-1];
			document.getElementById("table-search").rows[i].cells[5].innerHTML = myObj.humidity[i-1];
			document.getElementById("table-search").rows[i].cells[6].innerHTML = myObj.wind[i-1];
		}
	}
}

function resetTable(){
	for(i=1;i<=7;i++){
			document.getElementById("table-search").rows[i].cells[1].innerHTML = "";
			document.getElementById("table-search").rows[i].cells[2].innerHTML = "";
			document.getElementById("table-search").rows[i].cells[3].innerHTML = "";
			document.getElementById("table-search").rows[i].cells[4].innerHTML = "";
			document.getElementById("table-search").rows[i].cells[5].innerHTML = "";
			document.getElementById("table-search").rows[i].cells[6].innerHTML = "";
	
	}
}

function changePage(item){
	
	var xmlhttp = new XMLHttpRequest();
	var success  = 0;
	xmlhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('test').innerHTML = this.responseText;
			success = 1;
		}
	}
	page = item.value;
	xmlhttp.open("GET","http://wwweb.csie.io:2028/hw3/his.php?page="+page,false);
	xmlhttp.send();

	//change table
	if(success == 1){
		xmlhttp.open('GET',"http://wwweb.csie.io:2028/hw3/json/history.json",false);
		xmlhttp.send();

		resetTable();
		var myObj = JSON.parse(xmlhttp.responseText);
		for(i=1;i<myObj.city.length+1;i++){
			document.getElementById("table-search").rows[i].cells[1].innerHTML = myObj.city[i-1];
			document.getElementById("table-search").rows[i].cells[2].innerHTML = myObj.date[i-1];
			document.getElementById("table-search").rows[i].cells[3].innerHTML = myObj.temp[i-1];
			document.getElementById("table-search").rows[i].cells[4].innerHTML = myObj.feelslike[i-1];
			document.getElementById("table-search").rows[i].cells[5].innerHTML = myObj.humidity[i-1];
			document.getElementById("table-search").rows[i].cells[6].innerHTML = myObj.wind[i-1];
		}
	}

}

window.onload = function(){
	var xmlhttp = new XMLHttpRequest();
	var success  = 0;
	var id = document.getElementById("id").innerHTML;
	id = id.split(',')[1];
	xmlhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('test').innerHTML = this.responseText;
			success = 1;
		}
	}
	xmlhttp.open("GET","http://wwweb.csie.io:2028/hw3/his.php?page=1&id="+id,false);
	xmlhttp.send();

	if(success==1){
		xmlhttp.open('GET',"http://wwweb.csie.io:2028/hw3/json/history.json",false);
		xmlhttp.send();

		var myObj = JSON.parse(xmlhttp.responseText);
		for(i=1;i<myObj.city.length+1;i++){
			document.getElementById("table-search").rows[i].cells[1].innerHTML = myObj.city[i-1];
			document.getElementById("table-search").rows[i].cells[2].innerHTML = myObj.date[i-1];
			document.getElementById("table-search").rows[i].cells[3].innerHTML = myObj.temp[i-1];
			document.getElementById("table-search").rows[i].cells[4].innerHTML = myObj.feelslike[i-1];
			document.getElementById("table-search").rows[i].cells[5].innerHTML = myObj.humidity[i-1];
			document.getElementById("table-search").rows[i].cells[6].innerHTML = myObj.wind[i-1];
		}
	}
}
