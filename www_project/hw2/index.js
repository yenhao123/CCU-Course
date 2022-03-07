var numBef = "0";
var num = "0";
var sign = "+";
var used = 0;
var operatorUsed = 0;

function changeJson(obj){
    document.getElementsByClassName("dropbtn")[0].value = obj.value;
}

function load(obj){
    jsonFile = document.getElementById("dropdown").value;
    url = "http://www2021.csie.io:82/api/v0/json?name=" + jsonFile;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET",url,false);
    xmlhttp.send();
    jsonObj = JSON.parse(xmlhttp.responseText);
    
    var res = jsonObj[0]["value"];
    for(var i = 0;i < (jsonObj.length-1)/2;i++){
        operator1 = jsonObj[2*i+1]["value"];
        item1 = jsonObj[2*i+2]["value"];

        if(operator1 == "+"){
            res += item1;
        }
        else if(operator1 == "-"){
            res -= item1;
        }
        else if(operator1 == "*"){
            res *= item1;
        }
        else if(operator1 == "/"){
            res /= item1;
        }
    }
    res = res.toFixed(4);
    numBef = "0";
    num = res;
    usde = 1;
    document.getElementsByClassName("calculator-screen")[0].value = res;
}

function digitClick(obj){
        if(num == "0"){
            num = obj.value;
        }
        else{
            num = num + obj.value;
        }
        
        //if above 13 digit
        if(num.length >= 13){
            screen = document.getElementsByClassName("calculator-screen")[0];
            screen.style.fontSize = "3rem";
            screen.value = num;
        }
        else{
            document.getElementsByClassName("calculator-screen")[0].value = num;
        }
}
function decClick(obj){
    
    if(used == 0){
        num = num + obj.value;
        document.getElementsByClassName("calculator-screen")[0].value = num;
        used = 1;
    }
}

function operator(obj){
    
    //tackle prev
    if(sign != "="){
        if(sign == "+"){
            if(used == 0){
                res = parseInt(numBef) + parseInt(num);
            }
            else{
                res = parseFloat(numBef) + parseFloat(num);
                res = res.toFixed(4);
            }
        }
        else if(sign == "-"){
            if(used == 0){
                res = parseInt(numBef) - parseInt(num);
            }
            else{
                res = parseFloat(numBef) - parseFloat(num);
                res = res.toFixed(4);
            }
        }
        else if(sign == "*"){
            if(used == 0){
                res = parseInt(numBef) * parseInt(num);
            }
            else{
                res = parseFloat(numBef) * parseFloat(num);
                res = res.toFixed(4);
            }
        }
        else if(sign == "/"){
            denominator = parseFloat(num);
            if(denominator != "0"){
                res = parseFloat(numBef) / denominator;
                res = res.toFixed(4);
                used = 1;
            }
            else{
                document.getElementsByClassName("calculator-screen")[0].value = "ERR";
                return;
            }
        }
        num = res.toString();
        document.getElementsByClassName("calculator-screen")[0].value = num;

        //tackle curr
        numBef = num;
        num = "0";
        sign = obj.value;
        operatorUsed = 1;
    }
    else{
        sign = obj.value;
    }
}

function SignChange(){
    
    if(operatorUsed == 0){
        number = parseFloat(num);                    
        if(number > 0){
            num = "-" + num;
            document.getElementsByClassName("calculator-screen")[0].value = num;
        }
    }
    else{
        number = parseFloat(numBef);
        if(number > 0){
            numBef = "-" + numBef;
            document.getElementsByClassName("calculator-screen")[0].value = numBef;
            }
    }
}

function clean(){
    num = "0";numBef="0";sign = "+";used = 0;operatorUsed = 0;
    document.getElementsByClassName("calculator-screen")[0].value = num;
    document.getElementById("dropdown").value = "test";
}