<?php

session_start();

$username = $_SESSION['username'];

if(!isset($_SESSION['username'])){
	
	header("location:login.php");
	
}

mysql_connect("localhost", "XXXXX", "XXXXX")or die("cannot connect"); 
mysql_select_db("XXXXX")or die("cannot select DB");

mysql_query("UPDATE users SET ablockclass='$ablockclass', bblockclass='$bblockclass', cblockclass='$cblockclass', dblockclass='$dblockclass', eblockclass='$eblockclass', fblockclass='$fblockclass', gblockclass='$gblockclass', hblockclass='$hblockclass' WHERE username='$username'");

mysql_query("UPDATE users SET aurl='$aurl', burl='$burl', curl='$curl', durl='$durl', eurl='$eurl', furl='$furl', gurl='$gurl', hurl='$hurl' WHERE username='$username'");

mysql_query("UPDATE users SET acolor='$acolor', bcolor='$bcolor', ccolor='$ccolor', dcolor='$dcolor', ecolor='$ecolor', fcolor='$fcolor', gcolor='$gcolor', hcolor='$hcolor' WHERE username='$username'");


header("location:index.php");

?>