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

$labelarray = array("id","username","password","firstname","lastname","aclass","bclass","cclass","dclass","eclass","fclass","gclass","hclass","aurl","burl","curl","durl","eurl","furl","gurl","hurl");

$return = "";

for($i=0;$i<21;$i++){
	
	$userarraypart = $userarray[$i];
	$labelarraypart = $labelarray[$i];
	
	$return = "$return $labelarraypart: $userarraypart <br>";
} 

?>

<!DOCTYPE html>

<!-- Created by Derek Jobst on 2/7/13 -->

<html>


<head>

	<title>Index PHP</title>
	<link rel="icon" type="image/png" href="http://www.derekjobst.com/schedule/resources/favicon.png" />
</head>


<style type="text/css">



</style>

<script type="text/javascript">

if('<?=$remember?>'=='true'){
	localStorage.username = '<?=$username?>';
	localStorage.password = '<?=$password?>';
	
}

</script>


<body>

<h1>PHP Index</h1>
Welcome, <?=$firstname?>!<br>
Remembered: <?=$remember?><br>

<a href="logout.php"><input type="button" value="Logout"></a><br><br>
<? echo($return);?>


</body>


</html>