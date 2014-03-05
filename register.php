<html>

<head>

	<title>Register</title>
	<link rel="icon" type="image/png" href="http://www.derekjobst.com/schedule/resources/favicon.png" />
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
</head>

<style type="text/css">

body{
	background-image: url("http://server.derekjobst.com/resources/backgrounds/pattern_115.png"); 
	font-family: "Lato", sans-serif;
	font-weight: 300;

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
	
	border-radius: 5px 5px 0px 0px;
}


#passwordWrapper2{
	
	border-radius: 0px 0px 5px 5px;
	
}

.loginText{
	
	width: 280px;
	height: 30px;
	margin: 5px;
	
	background-color: rgba(255,255,255,.7);
	border: 1px solid rgba(255,255,255,1);
	border-radius: 3px;	

	
	box-shadow: inset 0px 1px 6px rgba(0,0,0,0.5);
	
	font-family: "Lato", sans-serif;
	font-weight: 300;
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
		margin-bottom: 1px;

	
}

#submitButton{
	
	width: 370px;
	height: 50px;
	border: 1px solid #7a7a7a;
	border-radius: 5px;
	
	margin: 15px 15px 0px 15px;
	
	background-color: #e2e2e2;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(242, 242, 242)), to(rgb(211, 211, 211)));
	background-image: -webkit-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
	background-image: -moz-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));

	color: #555555;
	font-family: "Lato", sans-serif;
	font-weight: 300;
	font-size: 25px;

}

#submitButton:hover{

box-shadow:inset 0px 1px 10px rgba(0,0,0,0.4);

}

#submitButton:active{

box-shadow:inset 0px 1px 10px rgba(0,0,0,0.6);
background-color: #eaeaea;
background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(226, 226, 226)), to(rgb(242, 242, 242)));
background-image: -webkit-linear-gradient(top, rgb(226, 226, 226), rgb(242, 242, 242));
background-image: -moz-linear-gradient(top, rgb(226, 226, 226), rgb(242, 242, 242));



}

#footer {
				bottom: 10px;
				width: 100%;
				color: #333333;
				font-size: 10px;
				text-align: center;
				margin: 5px 0px 20px 0px;
				 
}

#policy {
				bottom: 10px;
				width: 100%;
				color: #a1a1a1;
				font-size: 10px;
				text-align: center;
				margin: 20px 0px 0px 0px;
				 
}

#message{
	
	color: #FF0000;
	font-size: 12px;
	
	text-align: center;
	margin: 0px 0px 5px 0px;
	
	
}

b{
	
	font-weight: 400;
	
}

</style>

<body>


<div id="wrapper">
	<div id="body">
	
		<div id="header">
			<div id="title">
				<span id="titleText">Register</span>
			</div>
			
			<div id="message">
							
			<?
			
			$message = $_GET["error"];
			
			if($message){
			echo("The email <b>$message</b> is already in use.");
			}
			 ?>
			
			</div>
		</div>
		
		<form method="post" action="checkregister.php" onsubmit="return validateForm()">
		
		<div id="inputArea">
			
			<div id="usernameWrapper" class="loginWrapper">
				
				<input id="username" name="username" type="text" class="loginText" placeholder="St. Gregory Email" oninput="verifyEmail()">
				
			</div>
			<div id="firstnameWrapper" class="loginWrapper">
				
				<input id="firstname" name="firstname" type="text" class="loginText" placeholder="First Name">
				
			</div>
			<div id="lastnameWrapper" class="loginWrapper">
				
				<input id="lastname" name="lastname" type="text" class="loginText" placeholder="Last Name">
				
			</div>
			<div id="passwordWrapper1" class="loginWrapper">
				
				<input id="password" name="password" type="password" class="loginText" placeholder="Password">
				
			</div>
			<div id="passwordWrapper2" class="loginWrapper">
				
				<input id="confirm" name="confirm" type="password" class="loginText" placeholder="Confirm Password" oninput="verifyPasswordMatch()">
				
			</div>
			
			
		</div>
		
		<div id="footerArea">
			
			<div id="submitWrapper">
				
				<input id="submitButton" type="submit" value="Submit">
				

			</div>

		</div>
		
		</form>
		
	</div>
</div>
<div id="policy"><a href="http://schedule.derekjobst.com/privacypolicy.html">Privacy Policy</a></div>
<div id="footer">Created by Derek Jobst</div>

</body>

<script type="text/javascript">

function validateForm(){
	
	if(document.getElementById("username").value==null || document.getElementById("username").value==""){
		alert("Please enter your St. Gregory email address.");
		return false;
		}
	if(RegExp(/@stgregoryschool\.org/).test(document.getElementById("username").value)==false){
		alert("You must have a stgregoryschool.org email to sign up.");
		return false;
		}
	if(document.getElementById("firstname").value==null || document.getElementById("firstname").value==""){
		alert("Please enter your first name.");
		return false;
		}
	if(document.getElementById("lastname").value==null || document.getElementById("lastname").value==""){
		alert("Please enter your last name.");
		return false;
		}	
	if(document.getElementById("password").value==null || document.getElementById("password").value==""){
		alert("Please enter a password.");
		return false;
		}
	if(document.getElementById("confirm").value!=document.getElementById("password").value){
		alert("Please ensure your passwords match.");
		return false;
		}
		
		var privacypolicy = confirm("By signing up for this website you are agreeing to the privacy policy that can be found at the bottom of this page.")
		if(privacypolicy==false){
			
			return false;
		}
	
}


function verifyPasswordMatch(){
	
	if(document.getElementById("confirm").value!=document.getElementById("password").value){
		
		document.getElementById("confirm").style.borderColor = "#FF0000";	
	}
	else{
		
		document.getElementById("confirm").style.borderColor = "#FFF";	
	}	
}

function verifyEmail(){
	
	if(RegExp(/@stgregoryschool\.org/).test(document.getElementById("username").value)){
		
		document.getElementById("username").style.borderColor = "#FFFFFF";	
		
	}
	else{
		
		document.getElementById("username").style.borderColor = "#FF0000";	
	}	
}

</script>

</html>