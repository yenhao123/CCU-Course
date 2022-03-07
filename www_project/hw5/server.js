const express = require("express");
const bodyParser = require("body-parser");
const cors = require('cors');

app = express();
//app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended:false}));
app.use(bodyParser.json())
app.use(cors());

//const userService = require("./user_service");

app.get("/",function(req,res){
	res.send('1234');
})

//signin & signup
const fs = require('fs');
const firebase = require("firebase/app");
require("firebase/auth");
require('firebase/database');

const apiKey = process.env.FIREBASE_API_KEY;
const fb = firebase.initializeApp({
	apiKey: "AIzaSyCGGCissh3SrHzAErLgfNjSiKy_WmOHeCI",
    authDomain: "assignment5-c2e9d.firebaseapp.com",
    projectId: "assignment5-c2e9d",
    storageBucket: "assignment5-c2e9d.appspot.com",
    messagingSenderId: "531063750627",
    appId: "1:531063750627:web:d6fd2a07bf21927447aad6",
    measurementId: "G-JEQB3Y77ZG"
});

//console.log(fb)

console.log(fb.database());

app.post("/signup", async (req, res) => {
  const { email, password } = req.body;
  try {
	//res.send("signup");
	//const email = req.body.email;
	//const password = req.body.password;
	console.log(email+password);	
	
	//check username exists
	var flag = 0;
	var response = '';
	var tb = fb.database().ref('users');
	console.log('first');
	tb.on('value',function(snapshot){	
		var users = snapshot.val();
		for(var user in users){
			path = 'users/'+user;
			console.log(path);
			var tb2 = fb.database().ref(path);
			tb2.on('value',function(s2){
				var datas = s2.val();
				console.log(datas["email"] + ":" + email);
				if(datas["email"] == email){
					flag = 1;
				}
				return;
			})
		}
		
		console.log(flag);
		//exists and break
		if(flag == 1){
			fs.writeFile('signup.txt','used', (err) => {
  				if (err) throw err;
  				console.log('The file has been saved!');
			});
			console.log("back");
			res.status(200).end();
		}else{	
			//not exists and signup
			var tb3 = fb.database().ref('users');
			tb3.push({
				'email':email,
				'password':password
			});
			fs.writeFile('signup.txt','nused', (err) => {
				if (err) throw err;
				console.log('The file has been saved!');
			});
			console.log("back");
			res.status(200).end();
		}
	});
  } catch (err) {
    res.status(401).json({ error: err.message });
  }
});

app.post("/signin", async (req, res) => {
  const { email, password } = req.body;
  try {
	//check member exists or not
	
	var flag = 0;
	var tb = fb.database().ref("users");
	tb.on("value",function(s1){
		for(var user in s1.val()){
			path = 'users/' + user;
			console.log(path);
			var tb2 = fb.database().ref(path);
			tb2.on('value',function(s2){
				datas = s2.val();
				console.log(datas["email"] + ":" + email);
				if(datas["email"] == email){
					if(datas["password"] == password){
						flag = 1;
					}else{
						flag = 2;
					}
				}
			})
		}
		if(flag == 1){
			fs.writeFile('signin.txt','success', (err) => {
				if (err) throw err;
				console.log('The file has been saved!');
			});
			res.status(200).end();
		}else if(flag == 2){
			fs.writeFile('signin.txt','password', (err) => {
				if (err) throw err;
				console.log('The file has been saved!');
			});
			res.status(200).end();
		}else if(flag == 0){
			fs.writeFile('signin.txt','email', (err) => {
				if (err) throw err;
				console.log('The file has been saved!');
			});
			res.status(200).end();
		}
	})
	
  } catch (err) {
    res.status(401).json({ error: err.message });
  }
});

const port = process.env.PORT || 3000;
app.listen(port, () => console.log(`Server started at port ${port}`));
