function manualhome(){
	username = $('#username').text();
	window.location.href="home.php?username="+username+"&author="+username;
}
function dirToHome(username,author){
	window.location.href="home.php?username="+username+"&author="+author;
}
function createTable(srtext){
	$.get("json/article.json",function(response){
		myobj = response;
		username = $('#username').text();
		//empty
		$("#table-search").empty();
		//input
		var div = document.getElementById("table-search");
		var table = document.createElement("table");
		table.setAttribute('class','table');
		//head
		var thead = document.createElement('thead');
		var tr = document.createElement('tr');
		var th = document.createElement('th');
		th.innerHTML = 'Author';
		var th2 = document.createElement('th');
		th2.innerHTML = 'Title';
		var th3 = document.createElement('th');
		th3.innerHTML = 'Time';
		tr.appendChild(th);tr.appendChild(th2);tr.appendChild(th3);
		thead.appendChild(tr);
		table.appendChild(thead);
		//body
		var tbody = document.createElement('tbody');
		for(i=0;i<myobj.author.length;i++){
			if(srtext == ""){}
			else{
				if(myobj.title[i].indexOf(srtext) == -1){
					continue;
				}
			}
			var tr = document.createElement('tr');
			click = 'dirToHome("'+username+'","'+myobj.author[i]+'")';
			tr.setAttribute('onclick',click);
			var th = document.createElement('th');
			th.innerHTML = myobj.author[i];
			var td = document.createElement('td');
			td.innerHTML = myobj.title[i];
			var td2 = document.createElement('td');
			//time processing
			time = parseInt(myobj.time[i]);
			dt = time * 1000;
			dtobj = new Date(dt);
			dtobj = dtobj.toLocaleString();
			td2.innerHTML = dtobj;
			tr.appendChild(th);tr.appendChild(td);tr.appendChild(td2);
			tbody.appendChild(tr);
		}
		table.appendChild(tbody);
		div.appendChild(table);
	});	
}


$.ajaxSetup({
	async:false
});

$(document).ready(function(){
	$("#search").on('input propertychange',function(){
		srtext = $('#search').val();
		createTable(srtext)
	})
})

$(document).ready(function(){
		var jqxhr = $.get("articleOnload.php",
			function(response){
				createTable("");
			}
		)
	return false;
})
