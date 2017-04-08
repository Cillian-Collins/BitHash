function loginUser(){
var username = document.getElementById("name").value;
var password = document.getElementById("pass").value;

if ((((((password.length * username.length + username.length) * username.charCodeAt(4))*9999) % 100000) - (username.length - password.length))*999909110199190 == 95044360651763610000){
	alert("Success!");
	}
else{
	alert("Access denied!");
	}
}