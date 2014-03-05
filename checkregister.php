<?php

$username = $_POST["username"]; 
$password = $_POST["password"];
$encryptedPass = crypt($password,'key');
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$timestamp = date_format(date_create(), 'H:i:s Y-m-d');

mysql_connect("localhost", "XXXXX", "XXXXX")or die("cannot connect"); 
mysql_select_db("XXXXX")or die("cannot select DB");

$checkduplicate = mysql_query("SELECT username FROM users WHERE username='$username'") or die (mysql_error());

if(mysql_num_rows($checkduplicate) > 0){
	
	header("location:register.php?error='$username'");

}
else{
	
	mysql_query("INSERT INTO users (username, password, firstname, lastname)
	VALUES ('$username', '$encryptedPass', '$firstname', '$lastname')");
	
	mysql_query("INSERT INTO statistics (username, encryptedpass, created, views)
	VALUES ('$username', '$encryptedPass', '$timestamp', '1')");
	 
	session_start();
	session_register("username");
	session_register("firstname");

	header("location:setup.php");

}

?>