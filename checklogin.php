<?php

$username = $_POST["username"]; 
$password = $_POST["password"];
$encryptedPass = crypt($password,'key');
$remember = $_POST["remember"];


mysql_connect("localhost", "XXXXX", "XXXXX")or die("cannot connect"); 
mysql_select_db("XXXXX")or die("cannot select DB");

$userdata = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$encryptedPass'");

$count=mysql_num_rows($userdata);

if($count==1){
	
	session_start();
	session_register("username");
	
	$firstname = mysql_result($userdata,0,'firstname');
	
	session_register("firstname");
	session_register("username");
	session_register("password");
	session_register("remember");

	header("location:index.php");
	
}
else{

	$errordata = mysql_query("SELECT * FROM users WHERE username='$username'");
	
	if(mysql_num_rows($errordata)!=1){
		
		$message="username";
	}
	else{
		
		$message="password";	
	}
	
	header("location:login.php?error='$message'");
}


?>