<?php
session_start();
if(isset($_SESSION['username'])){
	
	header("location:index.php");	
}
?>

<html>

<head>

	<title>Schedule Login</title>
	<link rel="icon" type="image/png" href="http://www.derekjobst.com/schedule/resources/favicon.png" />
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	
</head>


<style type="text/css">

body{
	
	background-image: url("http://server.derekjobst.com/resources/backgrounds/pattern_115.png"); 
	font-family: "Lato", sans-serif;
}

#wrapper{

	width: 600px;
	margin-left: auto;
	margin-right: auto;	
}

#body{

	width: 400px;
	background-color: rgb(235,235,235);
	border: 1px solid #ffffff;
	border-radius: 8px;
	box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
	margin-left: auto;
	margin-right: auto;
	margin-top: 100px;
	background-color: #f4f4f4;
	background-image: -webkit-gradient(radial, 50% 100%,100,50% -50%,100, from(rgb(234, 234, 234)), to(rgb(255, 255, 255)));
	background-image: -webkit-radial-gradient(50% 0%, rgb(255, 255, 255), rgb(234, 234, 234));
	background-image: -moz-radial-gradient(50% 0%, rgb(255, 255, 255), rgb(234, 234, 234));
}

#header{

	height: 60px;	
	margin: none;
	padding: 10px 0px 40px 0px;
	
}

#title{

	text-align: center;
	font-weight: 300;
	color: #bcbcbc;
	-webkit-user-select: none;
}
#titleText{
	font-size: 70px;
    color: rgba(111,111,111,0.4);
    text-shadow: 1px 4px 3px #fff, 0 0 0 #000;
	
}
#inputArea{
	
	background-color: #636363;
	background-image: url("http://www.derekjobst.com/resources/backgrounds/pattern_012.png"); 
	padding: 25px 55px;
	box-shadow: inset 0px 50px 40px -50px rgba(0,0,0,0.75),inset 0px -50px 40px -50px rgba(0,0,0,0.5);	
}

#usernameWrapper{
	
	margin-bottom: 1px;
	border-radius: 5px 5px 0px 0px;
}

#usernameInput{
	
		border-radius: 3px;	
}

#passwordWrapper{
	
	border-radius: 0px 0px 5px 5px;	
}

#passwordInput{

	border-radius: 3px;	
}

.loginText{
	font-family: "Lato", sans-serif;
	width: 280px;
	height: 30px;
	margin: 5px;	
	background-color: rgba(255,255,255,.7);
	border: 1px solid rgba(255,255,255,1);
	box-shadow: inset 0px 1px 6px rgba(0,0,0,0.5);	
	font-weight: 400;
	font-size: 18px;
	color: #666666;
	text-align: center;	
}

.loginText:focus{
	
	outline: none;
	background-color: rgba(255,255,255,.7);
	border: 1px solid rgba(136,136,136,1);
	box-shadow: inset 0px 1px 6px rgba(0,0,0,0.5);
	border-radius: 3px;	
}

.loginWrapper{
	
	background-color: #e2e2e2;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(242, 242, 242)), to(rgb(211, 211, 211)));
	background-image: -webkit-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
	background-image: -moz-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
	height: 40px;	
}

.customButton{
	font-family: "Lato", sans-serif;
	border: 1px solid #7a7a7a;
	border-radius: 5px;
	background-color: #e2e2e2;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(242, 242, 242)), to(rgb(211, 211, 211)));
	background-image: -webkit-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
	background-image: -moz-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
	color: #555555;
	font-weight: 300;

}

.customButton:active{
	
	background-color: #eaeaea;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(226, 226, 226)), to(rgb(242, 242, 242)));
	background-image: -webkit-linear-gradient(top, rgb(226, 226, 226), rgb(242, 242, 242));
	background-image: -moz-linear-gradient(top, rgb(226, 226, 226), rgb(242, 242, 242));
}

#submitButton{
	
	width: 370px;
	height: 50px;
	margin: 15px 15px 0px 15px;
	font-size: 25px;
}

#submitButton:hover{

	box-shadow:inset 0px 1px 10px rgba(0,0,0,0.4);
}

#submitButton:active{

	box-shadow:inset 0px 1px 10px rgba(0,0,0,0.6);
}

#registerButton{
	
	width: 200px;
	height: 25px;
	margin: 0px 100px 15px 100px;
	font-size: 15px;
	color: #313131;
	
}

#registerButton:hover{

	box-shadow:inset 0px 1px 5px rgba(0,0,0,0.4);
}

#registerButton:active{

	box-shadow:inset 0px 1px 5px rgba(0,0,0,0.6);
}

#rememberWrapper{
	
	color: #333333;
	font-weight: 300;
	font-size: 12px;
	text-align: center;
	margin: 5px 0px -10px 0px;	
}

#footer {

	bottom: 10px;
	width: 100%;
	color: #a1a1a1;
	font-weight: 700;
	font-size: 10px;
	text-align: center;
	margin: 20px 0px 20px 0px;
				 
}

#message{
	
	color: #FF0000;
	font-weight: 300;
	font-size: 12px;
	text-align: center;
	margin: 0px 0px 5px 0px;		
}

body{
	-webkit-perspective: 1000;
}
.alertBoxHidden{
	background-color: #f4f4f4;
	background-image: -webkit-gradient(radial, 50% 100%,100,50% -50%,100, from(rgb(234, 234, 234)), to(rgb(255, 255, 255)));
	background-image: -webkit-radial-gradient(50% 0%, rgb(255, 255, 255), rgb(234, 234, 234));
	background-image: -moz-radial-gradient(50% 0%, rgb(255, 255, 255), rgb(234, 234, 234));
	border: 1px solid #8a8a8a;
	box-shadow: 0px 3px 9px rgba(0,0,0,0.3);
	border-radius: 5px;
	color: white;
	font-weight: 300;
	text-align: center;
	height: 40px;
	margin-top: -60px;
	z-index: 2;
	width: 700px;
	margin-left: auto;
	margin-right: auto;
	-webkit-backface-visibility: hidden;
	-webkit-transform: rotateX(-90deg) translateZ(-10px);
}
.transition{
	-webkit-transition: all 1s;
}
.alertBoxAppear{
	-webkit-transform: rotateX(0deg) translateZ(0px);
	margin-top: 0px;
	height: 40px;
}
#alertText{
	float: left;
	color: #545454;
	margin-top: 10px;
	margin-left: 20px;
}
#dismissAlert{
	float: right;
	background-color: none;
	height: 30px;
	width: 80px;
	border-left: 1px solid #8a8a8a;
	border-radius: 0px 5px 5px 0px;
	padding-top: 10px;
	font-size: 15px;
	color: #545454;
}
#acceptAlert{
	float: right;
	background-color: none;
	height: 30px;
	width: 100px;
	border-left: 1px solid #8a8a8a;
	padding-top: 10px;
	font-size: 15px;
	color: #545454;
}
#dismissAlert:hover{
	box-shadow: inset 0px 0px 10px rgba(0,0,0,0.2);
}
#dismissAlert:active{
	box-shadow: inset 0px 0px 15px rgba(0,0,0,0.5);
}
#acceptAlert:hover{
	box-shadow: inset 0px 0px 10px rgba(0,0,0,0.2);
}
#acceptAlert:active{
	box-shadow: inset 0px 0px 15px rgba(0,0,0,0.5);
}

</style>


<body>
<div id="alertBox" class="alertBoxHidden">
	
	<div id="alertText"></div>
<!-- 	<div id="dismissAlert" onclick="deactivateAlert()">Dismiss</div> -->
	<div id="acceptAlert" onclick="window.location = '/classic.html'">Use Classic</div>a
	
</div>
<div id="wrapper">
	<div id="body">
	
		<div id="header">
			<div id="title">
				<span id="titleText">Login</span>
			</div>
			<div id="message">
				
			<?php
			
			$message = $_GET["error"];
			if($message){
			echo("Sorry, that $message was incorrect");
			}
			 ?>
				
			</div>
		</div>
		
		<form id="loginForm" method="post" action="checklogin.php">
		
		<div id="inputArea">
			
			<div id="usernameWrapper" class="loginWrapper">
				
				<input id="usernameInput" name="username" type="text" class="loginText" placeholder="user@stgregoryschool.org" oninput="shortcut()">
				
			</div>
			<div id="passwordWrapper" class="loginWrapper">
				
				<input id="passwordInput" name="password" type="password" class="loginText" placeholder="password" onfocus="append()">
				
			</div>
			
		</div>
		
		<div id="footerArea">
			
			<div id="submitWrapper">
				
				<input class="customButton" id="submitButton" type="submit" value="Login">

			</div>
			<div id="rememberWrapper">
				Remember Me:<input type="checkbox" id="rememberBox" name="remember" value="true" checked >
			</div>
		</div>
		
		</form>
		
		<a href="register.php"><input class="customButton" id="registerButton" type="button" value="Need an account?"></a>
		
		
	</div>
</div>

<div id="footer">Created by Derek Jobst</div>

</body>

<script type="text/javascript">

var errorMessage = "<?=$message?>";

if(localStorage.username!=null && localStorage.username!=''){

	document.getElementById("usernameInput").value = localStorage.username;
	
	if(localStorage.password!=null && localStorage.password!=''){
	document.getElementById("passwordInput").value = localStorage.password;
	
		if(errorMessage==''){
		document.getElementById("loginForm").submit();
		}
	
	}
	


}

function shortcut(){
	if(RegExp(/@/).test(document.getElementById("usernameInput").value)){
		var userInput = document.getElementById("usernameInput");
		
		userInput.value = (userInput.value.split("@"))[0] + "@stgregoryschool.org";
		
	}						
}

function append(){
	if(RegExp(/@/).test(document.getElementById("usernameInput").value)==false && document.getElementById("usernameInput").value!=""){
		document.getElementById("usernameInput").value = document.getElementById("usernameInput").value + "@stgregoryschool.org";
			
	}
}

function deactivateAlert(){
	
	document.getElementById('alertBox').className = 'alertBoxHidden transition';
	
}
function activateAlert(message){
	
	document.getElementById('alertBox').className = 'alertBoxHidden alertBoxAppear transition';
	document.getElementById('alertText').innerHTML = message;

		
}

activateAlert('Welcome to the new site! To get started press "Need an Account" below!');

document.getElementById("rememberBox").value


</script>

</html>