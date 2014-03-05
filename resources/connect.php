<?php
session_start();

$firstname = $_SESSION['firstname'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$remember = $_SESSION['remember'];

if(!isset($_SESSION['username'])){
	
	header("location:login.php");
	
}

mysql_connect("localhost", "XXXXX", "XXXXX")or die("cannot connect"); 
mysql_select_db("XXXXX")or die("cannot select DB");

$userdata = mysql_query("SELECT * FROM users WHERE username='$username'") or die (mysql_error());

$userarray = mysql_fetch_array($userdata);


?>