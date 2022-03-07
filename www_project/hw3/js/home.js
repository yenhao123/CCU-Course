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
	var url="http://wwweb.csie.io:2028/hw3/search.php?cityName=" + cityName + "&id=" + id;
	var xmlhttp = new XMLHttpRequest();
	var resText;
	var success = 0;
	xmlhttp.onreadystatechange = function() {
  		if (this.readyState == 4 && this.status == 200) {
    			resText = this.responseText;
			//document.getElementById("test").innerHTML = resText;
			success = 1;
  		}
	};
	xmlhttp.open('GET',url,false);
	xmlhttp.send();
	
	if(success==1){
		xmlhttp.open('GET',"http://wwweb.csie.io:2028/hw3/json/weatherCur.json",false);
		xmlhttp.send();

		var myObj = JSON.parse(resText);
		document.getElementById("cur1").innerHTML = "The weather in " + myObj.city + " is currently " + myObj.descrip;
		document.getElementById("cur2").innerHTML = "The temperature is" + myObj.temp;
		document.getElementById("cur3").innerHTML = "Himidity is " + myObj.humidity;
		document.getElementById("cur4").innerHTML = "Wind Speed is " + myObj.speed;

		xmlhttp.open('GET',"http://wwweb.csie.io:2028/hw3/json/weather5days.json",false);
		xmlhttp.send();

		var myObj = JSON.parse(resText);
		for(i=1;i<6;i++){
			document.getElementById("table-search").rows[i].cells[1].innerHTML = myObj.city;
			document.getElementById("table-search").rows[i].cells[2].innerHTML = myObj.date[i-1];
			document.getElementById("table-search").rows[i].cells[3].innerHTML = myObj.temp[i-1];
			document.getElementById("table-search").rows[i].cells[4].innerHTML = myObj.feelsLike[i-1];
			document.getElementById("table-search").rows[i].cells[5].innerHTML = myObj.humidity[i-1];
			document.getElementById("table-search").rows[i].cells[6].innerHTML = myObj.descrip[i-1];
			document.getElementById("table-search").rows[i].cells[7].innerHTML = myObj.speed[i-1];
		}
	
	}
}
