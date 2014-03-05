<?php

session_start();

$firstname = $_SESSION['firstname'];
$username = $_SESSION['username'];

if(!isset($_SESSION['username'])){
	
	header("location:login.php");
	
}

mysql_connect("localhost", "XXXXX", "XXXXX")or die("cannot connect"); 
mysql_select_db("XXXXX")or die("cannot select DB");

$userData = mysql_query("SELECT * FROM users WHERE username='$username'") or die (mysql_error());

$userArray = mysql_fetch_array($userData);



?>

<!DOCTYPE html>

<!-- Created by Derek Jobst on 2/7/13 -->

<html>


<head>

	<title>Class Preferences</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
</head>


<style type="text/css">

body{	
	background-image: url("http://www.derekjobst.com/resources/backgrounds/pattern_115.png"); 
	font-family: "Lato", sans-serif;
	font-weight: 300;
	font-size: 16px;
}
#title{
	height: 80px;	
	text-align: center;
	font-size: 60px;
	color: #bcbcbc;
	-webkit-user-select: none;
}
#titleText{
	font-size: 60px;
	font-weight: 300;
    color: rgba(111,111,111,0.4);
    text-shadow: 1px 4px 3px #fff, 0 0 0 #000;
	
}
#wrapper{
	width: 700px;
	height: inherit;
	background-color: red;
	margin: 20px auto 0px auto;
	padding: 20px 50px;
	border: 1px solid #ffffff;
	border-radius: 8px;
	box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
	background-color: #f4f4f4;
	background-image: -webkit-gradient(radial, 50% 100%,100,50% -50%,100, from(rgb(234, 234, 234)), to(rgb(255, 255, 255)));
	background-image: -webkit-radial-gradient(50% 0%, rgb(255, 255, 255), rgb(234, 234, 234));
}
.customButton{
	border: 1px solid #838383;
	border-radius: 5px;
	background-color: #f3f2f5;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(254, 252, 255)), to(rgb(233, 232, 235)));
	background-image: -webkit-linear-gradient(top, rgb(254, 252, 255), rgb(233, 232, 235));
	font-size: 12px;
	color: #6b6b6b;
	padding-top: 2px;
}
.customButton:active{
	box-shadow:inset 0px 0px 5px rgba(0,0,0,0.5);
}
.customButton:hover{	
	border-color: rgba(0,0,0,0.5);
	box-shadow:inset 0px 0px 5px rgba(0,0,0,0.25);

}
#buttonsDiv{
	margin: 0px;
	text-align: center;
}

input,option,select{
	font-family: "Lato", sans-serif;
	font-weight: 400;
	
}

.customTextBox{
	
	background-color: rgba(255,255,255,0.5);
	border: 1px solid rgba(0,0,0,0.5);
	border-radius: 3px;

	height: 18px;
	font-size: 13px;
	color: #333333;
	
	margin-bottom: 5px;
	
}

.customTextBox:focus{
	
	outline: none;
	
	border: 1px solid rgba(0,0,0,0.8);
	background-color: rgba(255,255,255,0.8);
	
	box-shadow: none;
	
}

.customTextBox:hover{
	
	border: 1px solid rgba(0,0,0,0.8);
	background-color: rgba(255,255,255,0.8);

}

b{

font-weight: 700;
	
}

</style>

<body>

	<form method="POST" action="setdata.php"> 
	
	<div id="wrapper">
		
		<div id="title">
		
			<span id="titleText">Class Preferences</span>	
					
		</div>
		
		<p><b>Tips:</b><br>- Maximum 18 characters per class name<br>- Leave the space empty for free blocks<br>- Be sure to include http:// in the url or it will not work</p>
			
		<div id="classOptions">
			A Block: <input type="text" class="customTextBox" id="a" name="ablockclass" maxlength="18">
			<select id="acolor" name="acolor" onchange="changeImage('aPreview','acolor')">
				<option  value="default" disabled="yes" selected="selected">Select Color</option>
				<option value="aluminum">Aluminum</option>
				<option value="aquamarine">Aquamarine</option>
				<option value="burgundy">Burgundy</option>
				<option value="cappuccino">Cappuccino</option>
				<option value="cerise">Cerise</option>
				<option value="cerulean">Cerulean</option>
				<option value="lavender">Lavender</option>
				<option value="midnight">Midnight</option>
				<option value="spring">Spring</option>
				<option value="sunglow">Sunglow</option>
				<option value="forest">Forest</option>
				<option value="florida">Florida</option>
				<option value="noColor">None</option>
			</select>
			<img id="aPreview" width="20px" align="top">
			URL: <input type="text" class="customTextBox" size="40" id="aurl" name="aurl">
			<br>
			
			B Block: <input type="text" class="customTextBox" id="b" name="bblockclass" maxlength="18">
			<select id="bcolor" name="bcolor" onchange="changeImage('bPreview','bcolor')">
				<option  value="default" disabled="yes" selected="selected">Select Color</option>
				<option value="aluminum">Aluminum</option>
				<option value="aquamarine">Aquamarine</option>
				<option value="burgundy">Burgundy</option>
				<option value="cappuccino">Cappuccino</option>
				<option value="cerise">Cerise</option>
				<option value="cerulean">Cerulean</option>
				<option value="lavender">Lavender</option>
				<option value="midnight">Midnight</option>
				<option value="spring">Spring</option>
				<option value="sunglow">Sunglow</option>
				<option value="forest">Forest</option>
				<option value="florida">Florida</option>
				<option value="noColor">None</option>
			</select>
			<img id="bPreview" width="20px" align="top">
			URL: <input type="text" class="customTextBox" size="40" id="burl" name="burl">
			<br>
			
			C Block: <input type="text" class="customTextBox" id="c" name="cblockclass" maxlength="18">
			<select id="ccolor" name="ccolor" onchange="changeImage('cPreview','ccolor')">
				<option  value="default" disabled="yes" selected="selected">Select Color</option>
				<option value="aluminum">Aluminum</option>
				<option value="aquamarine">Aquamarine</option>
				<option value="burgundy">Burgundy</option>
				<option value="cappuccino">Cappuccino</option>
				<option value="cerise">Cerise</option>
				<option value="cerulean">Cerulean</option>
				<option value="lavender">Lavender</option>
				<option value="midnight">Midnight</option>
				<option value="spring">Spring</option>
				<option value="sunglow">Sunglow</option>
				<option value="forest">Forest</option>
				<option value="florida">Florida</option>
				<option value="noColor">None</option>
			</select>
			<img id="cPreview" width="20px" align="top">
			URL: <input type="text" class="customTextBox" size="40" id="curl" name="curl">
			<br>
			
			D Block: <input type="text" class="customTextBox" id="d" name="dblockclass" maxlength="18">
			<select id="dcolor" name="dcolor" onchange="changeImage('dPreview','dcolor')">
				<option  value="default" disabled="yes" selected="selected">Select Color</option>
				<option value="aluminum">Aluminum</option>
				<option value="aquamarine">Aquamarine</option>
				<option value="burgundy">Burgundy</option>
				<option value="cappuccino">Cappuccino</option>
				<option value="cerise">Cerise</option>
				<option value="cerulean">Cerulean</option>
				<option value="lavender">Lavender</option>
				<option value="midnight">Midnight</option>
				<option value="spring">Spring</option>
				<option value="sunglow">Sunglow</option>
				<option value="forest">Forest</option>
				<option value="florida">Florida</option>
				<option value="noColor">None</option>
			</select>
			<img id="dPreview" width="20px" align="top">
			URL: <input type="text" class="customTextBox" size="40" id="durl" name="durl">
			<br>
			
			<br>
			E Block: <input type="text" class="customTextBox" id="e" name="eblockclass" maxlength="18">
			<select id="ecolor" name="ecolor" onchange="changeImage('ePreview','ecolor')">
				<option  value="default" disabled="yes" selected="selected">Select Color</option>
				<option value="aluminum">Aluminum</option>
				<option value="aquamarine">Aquamarine</option>
				<option value="burgundy">Burgundy</option>
				<option value="cappuccino">Cappuccino</option>
				<option value="cerise">Cerise</option>
				<option value="cerulean">Cerulean</option>
				<option value="lavender">Lavender</option>
				<option value="midnight">Midnight</option>
				<option value="spring">Spring</option>
				<option value="sunglow">Sunglow</option>
				<option value="forest">Forest</option>
				<option value="florida">Florida</option>
				<option value="noColor">None</option>
			</select>
			<img id="ePreview" width="20px" align="top">
			URL: <input type="text" class="customTextBox" size="40" id="eurl" name="eurl">
			<br>
			
			F Block: <input type="text" class="customTextBox" id="f" name="fblockclass" maxlength="18">
			<select id="fcolor" name="fcolor" onchange="changeImage('fPreview','fcolor')">
				<option  value="default" disabled="yes" selected="selected">Select Color</option>
				<option value="aluminum">Aluminum</option>
				<option value="aquamarine">Aquamarine</option>
				<option value="burgundy">Burgundy</option>
				<option value="cappuccino">Cappuccino</option>
				<option value="cerise">Cerise</option>
				<option value="cerulean">Cerulean</option>
				<option value="lavender">Lavender</option>
				<option value="midnight">Midnight</option>
				<option value="spring">Spring</option>
				<option value="sunglow">Sunglow</option>
				<option value="forest">Forest</option>
				<option value="florida">Florida</option>
				<option value="noColor">None</option>
			</select>
			<img id="fPreview" width="20px" align="top">
			URL: <input type="text" class="customTextBox" size="40" id="furl" name="furl">
			<br>
			
			G Block: <input type="text" class="customTextBox" id="g" name="gblockclass" maxlength="18">
			<select id="gcolor" name="gcolor" onchange="changeImage('gPreview','gcolor')">
				<option  value="default" disabled="yes" selected="selected">Select Color</option>
				<option value="aluminum">Aluminum</option>
				<option value="aquamarine">Aquamarine</option>
				<option value="burgundy">Burgundy</option>
				<option value="cappuccino">Cappuccino</option>
				<option value="cerise">Cerise</option>
				<option value="cerulean">Cerulean</option>
				<option value="lavender">Lavender</option>
				<option value="midnight">Midnight</option>
				<option value="spring">Spring</option>
				<option value="sunglow">Sunglow</option>
				<option value="forest">Forest</option>
				<option value="florida">Florida</option>
				<option value="noColor">None</option>
			</select>
			<img id="gPreview" width="20px" align="top">
			URL: <input type="text" class="customTextBox" size="40" id="gurl" name="gurl">
			<br>
			
			H Block: <input type="text" class="customTextBox" id="h" name="hblockclass" maxlength="18">
			<select id="hcolor" name="hcolor" onchange="changeImage('hPreview','hcolor')">
				<option  value="default" disabled="yes" selected="selected">Select Color</option>
				<option value="aluminum">Aluminum</option>
				<option value="aquamarine">Aquamarine</option>
				<option value="burgundy">Burgundy</option>
				<option value="cappuccino">Cappuccino</option>
				<option value="cerise">Cerise</option>
				<option value="cerulean">Cerulean</option>
				<option value="lavender">Lavender</option>
				<option value="midnight">Midnight</option>
				<option value="spring">Spring</option>
				<option value="sunglow">Sunglow</option>
				<option value="forest">Forest</option>
				<option value="florida">Florida</option>
				<option value="noColor">None</option>
			</select>
			<img id="hPreview" width="20px" align="top">
			URL: <input type="text" class="customTextBox" size="40" id="hurl" name="hurl">
			<br>

		</div>
		
		<br>
		
		<div id="buttonsDiv">
		
			<input type="submit" id="submit" name="submit" class="customButton" value="Save Schedule">
		
		</div>
	</div>
	
	</form>

</body>

<script type="text/javascript">

var colorOptions = ["aluminum","aquamarine","burgundy","cappuccino","cerise","cerulean","lavender","midnight","spring","sunglow","forest","florida","none",];

var alphabet = ["a", "b", "c", "d", "e", "f", "g", "h"];

<?php
echo "var dataArray = ". json_encode($userArray) . ";\n";
?>


for(var i=0; i<8;i++){

	document.getElementById(alphabet[i]).value = dataArray[(i+5)];
	document.getElementById(alphabet[i]+"url").value = dataArray[(i+13)];
	document.getElementById(alphabet[i]+"color").value = dataArray[(i+21)];

	if(document.getElementById(alphabet[i]+"color").value !== "noColor"){document.getElementById(alphabet[i]+"Preview").src="http://www.derekjobst.com/schedule/resources/classic/" + dataArray[(i+21)] + ".png";}

}

function changeImage(imgID, selectorID) { 

	if(document.getElementById(selectorID).value=="noColor"){
		
		document.getElementById(imgID).src="http://www.derekjobst.com/schedule/resources/classic/blank.png";
	}
	else{
	
		document.getElementById(imgID).src="http://www.derekjobst.com/schedule/resources/classic/" + document.getElementById(selectorID).value + ".png";
	
	}
}


</script>


</html>