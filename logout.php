<?php
session_start();
if(!session_is_registered(username)){
	
	header("location:login.php");
}
session_destroy();

?>
<!DOCTYPE html>

<!-- Created by Derek Jobst on 2/7/13 -->

<html>


<head>

	<title>Logout</title>
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
	height: 150px;
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

#title{
	
	font-weight: 300;
	color: #555555;
	font-size: 20px;
	text-align: center;
	margin-top: 50px
	
}

.customButton{
	border: 1px solid #7a7a7a;
	border-radius: 5px;
	background-color: #e2e2e2;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(242, 242, 242)), to(rgb(211, 211, 211)));
	background-image: -webkit-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
	background-image: -moz-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
	color: #555555;
	font-family: "Lato", sans-serif;
	font-weight: 300;

}

.customButton:active{
	
	background-color: #eaeaea;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(226, 226, 226)), to(rgb(242, 242, 242)));
	background-image: -webkit-linear-gradient(top, rgb(226, 226, 226), rgb(242, 242, 242));
	background-image: -moz-linear-gradient(top, rgb(226, 226, 226), rgb(242, 242, 242));
}

#loginButton{
	
	width: 200px;
	height: 25px;
	margin: 20px 100px 15px 100px;
	font-size: 15px;
	
}

#loginButton:hover{

	box-shadow:inset 0px 1px 5px rgba(0,0,0,0.4);
}

#loginButton:active{

	box-shadow:inset 0px 1px 5px rgba(0,0,0,0.6);
}

</style>


<body>

<div id="wrapper">
	<div id="body">
		<div id="title">
			You have been logged out.
		</div>
		<a href="login.php"><input class="customButton" id="loginButton" type="button" value="Login"></a>
	</div>
</div>

</body>

<script type="text/javascript">

localStorage.username = "";
localStorage.password = "";


</script>


</html>