function manualar(){	
	username = $("#username").text();
	author = $("#author").text();
	location.href = "article.php?username="+username+"&author=" + author;
}

function manualhome(){
	username = $("#username").text();
	location.href = "home.php?username="+username+"&author=" + username;
}

function cancel(){
	username = $("#username").text();
	author = $("#author").text();
	location.href = "home.php?username="+username+"&author=" + author;
}
function getarticleid(obj){
	
	var name = obj.name;
	id = name.split('_')[1];
	/*first not changed;but second change!!!*/
	//$('#articleid').val() = id; 
	document.getElementById('articleid').value = id;
}
function createHomeArticle(myobj){
	for(i=0;i<myobj["title"].length;i++){
		/*data store to article*/
		var a1 = document.createElement('a');	
		a1.setAttribute('href',"#myPopup2");
		a1.setAttribute('data-rel',"popup");
		a1.setAttribute('class',"ui-btn ui-btn-inline ui-corner-all"); 
		a1.setAttribute('data-position-to','window');
		a1.setAttribute('onclick','getarticleid(this)');
		a1.setAttribute('name','article_'+i);
		a1.innerHTML = "Edit";
		var a2 = document.createElement('a');	
		a2.setAttribute('href',"#myPopup3");
		a2.setAttribute('data-rel',"popup");
		a2.setAttribute('class',"ui-btn ui-btn-inline ui-corner-all"); 
		a2.setAttribute('data-position-to','window');
		a2.setAttribute('onclick','getarticleid(this)');
		a2.setAttribute('name','article_'+i);
		a2.innerHTML = "Delete";
		var div2 = document.createElement('div');
		div2.setAttribute('style','display:flex;justify-content:flex-end');
		div2.appendChild(a1);
		div2.appendChild(a2);
		
		time = parseInt(myobj["time"][i]) 
		dt = time * 1000;
		dtobject = new Date(dt);
		dtobject = dtobject.toLocaleString();
		var txt1 = document.createElement('h4');
		txt1.innerHTML = "Title : "+myobj["title"][i];
		var txt2 = document.createElement('p');
		txt2.setAttribute('id','time_'+i);
		txt2.innerHTML = dtobject;
		var txt5 = document.createElement('h4');
		txt5.innerHTML = "Content : ";
		var txt3 = document.createElement('h5');
		txt3.innerHTML = myobj["content"][i];
		var txt6 = document.createElement('br');
		var txt4 = document.createElement('p');
		txt4.innerHTML = myobj["good"][i]+" likes "+myobj["com_num"][i]+" comments";
		var div = document.createElement('div');
		div.setAttribute("class","border");
		div.setAttribute("style","text-align:left;margin:10px 0px;border-style:solid");

		div.appendChild(txt1);
		div.appendChild(txt2);
		div.appendChild(txt5);
		div.appendChild(txt3);
		div.appendChild(txt6);
		div.appendChild(txt4);
		var ha = document.getElementById("homeArticle");
		ha.appendChild(div2);
		ha.appendChild(div);
	}
}

$.ajaxSetup({
	async:false
});
//loading
$(document).ready(
	function(){
		//article page
		data = {"author":$('#author').text()};
		//alert(data["author"]);
		var article = 1;
		var jqxhr = $.post(
			"homeArticle.php",
			data,
			function(response){
				if(response == "no any articles"){
					article = 0;	
				}
			}
			
		);
		if(article == 1){
			var url = "json/"+data["author"]+".json";
			var jqxhr = $.get(
				url,
				function(response){
					createHomeArticle(response);
				}
			
			)
		}
		//lottery page
		data = {'author':$('#author').text()};
		//alert(data['author']);
		$.post(
			"homeLottery.php",
			data,
			function(response){
				t_num = response.split(' ')[0];
				$('#ticket_num').text(t_num);
				a_num = response.split(' ')[1];
				$('#account_num').text(a_num);
			})
		return false;
		
	}
)

//poll
$(document).ready(
	function(){
		$("#sub").click(
			function(){

				//author or viewer
				username = $('#username').text();
				author = $('#author').text();
				if(username!=author){
					alert('Sorry,you are not the author!!!');
					return false;
				}
				//transport data
				username = $("#username").text();
				author = $("#author").text();
				title = $("#title").val();
				content = $("#content").val();
				data = {"username":username,"title":title,"content":content};
				//alert(username);		
				$.post("homePoll.php",data,
					function(response){
						location.href = "home.php?username="+username+"&author="+author;
					}
				)
				return false;
			}
		)
	}
)

//edit

$(document).ready(function(){
	$('#editsub').click(function(){
		
		//author or viewer
		username = $('#username').text();
		author = $('#author').text();
		if(username!=author){
			alert('Sorry,you are not the author!!!');
			return false;
		}
		/*local time to unix time*/
		id = $('#articleid').val();
		time = $('#time_'+id).text();
		unixstamp = new Date(time).getTime()/1000;
		//alert(unixstamp);
		username = $('#username').text();
		author = $("#author").text();
		title = $('#edittitle').val();
		content = $('#editcontent').val();
		//alert(author+title+content);
		data = {"username":username,"title":title,"content":content,"time":unixstamp};
		$.post("homeedit.php",data,
			function(response){
				location.href = "home.php?username="+username+"&author="+author;
			})
		return false;
	})
})

//delete
$(document).ready(function(){
	$('#deletesub').click(function(){
		
		//author or viewer
		username = $('#username').text();
		author = $('#author').text();
		if(username!=author){
			alert('Sorry,you are not the author!!!');
			return false;
		}
		id = $('#articleid').val();
		time = $('#time_'+id).text();
		unixstamp = new Date(time).getTime()/1000;
		username = $("#username").text();
		author = $("#author").text();
		data = {"username":username,"time":unixstamp};
		//alert(unixstamp+data["author"]);
	
		$.post("homedelete.php",data,
			function(response){
				//alert(response);
				location.href = "home.php?username="+username+"&author="+author;
			
			})
		return false;
	})
})

//lottery
$(document).ready(function (){  
    var rotateTimeOut = function (){  
        $('#rotate').rotate({  
            angle:0,  
            animateTo:2160,  
            duration:8000,  
            callback:function (){  
               alert('TIME OUT');  
            }  
        });  
    };  
    var bRotate = false;  
  
    var rotateFn = function (awards, angles, txt){  
        bRotate = !bRotate;  
        $('#rotate').stopRotate();  
        $('#rotate').rotate({  
            angle:0,  
            animateTo:angles+1777,  
            duration:8000,  
            callback:function (){  
         
		t_num = parseInt($('#ticket_num').text());
		a_num = parseInt($('#account_num').text());
		if(txt == 'again'){
			alert("your ticket returns back!!!");
			t_num += 1;
			$('#ticket_num').text(t_num);
		}else{
			alert("Congratulation!!!You get "+txt);
			get = parseInt(txt);
			a_num += get;
			$('#account_num').text(a_num);
			//update db
			data = {"author":$('#author').text(),"t_num":t_num,"a_num":a_num};
			$.post(
				"homeLotupdate.php",
				data,
			)
		}
                bRotate = !bRotate;  
            }  
        })  
    };  
  
    $('#pointer').click(function (){  
 	//author or viewer
	username = $('#username').text();
	author = $('#author').text();
	if(username!=author){
		alert('Sorry,you are not the author!!!');
		return false;
	}

	//ticket_enough or not
	t_num = parseInt($('#ticket_num').text());
	//alert(t_num);
	if(t_num == 0){
		alert('your ticket is not enough');
		return false;
	}else{
		t_num -= 1;
		$('#ticket_num').text(t_num);
	}
	
        if(bRotate)return;  
        var item = rnd(0,7);  
  	//var item = 1;

        switch (item) {  
            case 0:  
                //var angle = [26, 88, 137, 185, 235, 287, 337];  
                rotateFn(0, 45, '5');  
                break;  
            case 1:  
                //var angle = [88, 137, 185, 235, 287];  
                rotateFn(1, 90,'again');  
                break;  
            case 2:  
                //var angle = [137, 185, 235, 287];  
                rotateFn(2, 135,'10');  
                break;  
            case 3:  
                //var angle = [137, 185, 235, 287];  
                rotateFn(3, 180,'5');  
                break;  
            case 4:  
                //var angle = [185, 235, 287];  
                rotateFn(4, 225, '0');  
                break;  
            case 5:  
                //var angle = [185, 235, 287];  
                rotateFn(5, 270, '20');  
                break;  
            case 6:  
                //var angle = [235, 287];  
                rotateFn(6, 315, '0');  
                break;  
            case 7:  
                //var angle = [287];  
                rotateFn(7, 0, '10');  
                break;  
        }  
  
        console.log(item);  
    });  
});

function rnd(n, m){  
    return Math.floor(Math.random()*(m-n+1)+n)  
}  
