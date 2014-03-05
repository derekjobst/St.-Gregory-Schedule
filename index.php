<?php

session_start();

$firstname = $_SESSION['firstname'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$remember = $_SESSION['remember'];
$timestamp = date_format(date_create(), 'H:i:s Y-m-d');

if(!isset($_SESSION['username'])){
	
	header("location:checkremember.html");
	
}

mysql_connect("localhost", "XXXXX", "XXXXX")or die("cannot connect"); 
mysql_select_db("XXXXX")or die("cannot select DB");

$userData = mysql_query("SELECT * FROM users WHERE username='$username'") or die (mysql_error());

mysql_query("UPDATE statistics SET recent='$timestamp', views=views+1 WHERE username='$username'");

$userArray = mysql_fetch_array($userData);

?>

<!DOCTYPE html>

<!-- Created by Derek Jobst on 2/10/13 -->

<html>


<head>

	<title>Class Schedule</title>	
	
	<meta name="description" content="The class schedule organizer for St. Gregory College Prepatory. Created by Derek Jobst.">
	<meta name="keywords" content="St. Gregory College Prepatory, St. Gregory, stgcp, St. Gregory Schedule, St. Gregory Class Schedule, St. Gregory Tucson, Derek Jobst Media">

    <meta name="viewport" content="initial-scale=1, user-scalable=no">

	<script type="text/javascript">
	
	if(window.location == "http://www.derekjobst.com/schedule/" || window.location == "http://derekjobst.com/schedule/"){window.location = "http://schedule.derekjobst.com/";}
	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-35265867-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
	
	<link rel="icon" type="image/png" href="http://www.derekjobst.com/schedule/resources/classic/favicon.png" />
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
	
</head>


<style type="text/css">

/* General Style */

body{
	background-image: url("http://www.derekjobst.com/resources/backgrounds/pattern_115.png");
	margin: 0px;
	padding: 0px;
	font-family: "Lato";
	
}


#wrapper{
	width: 970px;
	margin-top: 25px;
	margin-left: auto;
	margin-right: auto;
}
.body{
	width: 960px;
	border: 1px solid #ffffff;
	border-radius: 8px;
	box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
	background-color: #f4f4f4;
	background-image: -webkit-gradient(radial, 50% 100%,100,50% -50%,100, from(rgb(234, 234, 234)), to(rgb(255, 255, 255)));
	background-image: -webkit-radial-gradient(50% 0%, rgb(255, 255, 255), rgb(234, 234, 234));
	background-image: -moz-radial-gradient(50% 0%, rgb(255, 255, 255), rgb(234, 234, 234));
}
.bodyBlack{
	width: 960px;
	background-color: rgb(235,235,235);
	border: 1px solid #000000;
	border-radius: 8px;
	box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
	background-color: #9e9e9f;
	background-image: -webkit-gradient(radial, 50% 100%,100,50% -50%,100, from(rgb(113, 113, 113)), to(rgb(204, 203, 205)));
	background-image: -webkit-radial-gradient(50% 0%, rgb(204, 203, 205), rgb(113, 113, 113));
	background-image: -moz-radial-gradient(50% 0%, rgb(204, 203, 205), rgb(113, 113, 113));
}

/* Title Section */

#header{
	height: 80px;
	margin: none;
	padding: 20px 20px 10px 20px;
}
#title{
	height: 80px;
	text-align: center;
	font-weight: 300;
	color: #bcbcbc;
	-webkit-user-select: none;
}
#titleText{
	font-size: 60px;
    color: rgba(111,111,111,0.4);
    text-shadow: 1px 4px 3px #fff, 0 0 0 #000;
	
}
#dayInfoWrapper{
	height: 40px;
	padding: 0px;
	font-size: 12px;
	color: #434343;
	font-weight: 300;
		margin-left: auto;
	margin-right: auto;
	text-align: center;
	width: 700px;

}

#logoutButton{
	border: 1px solid #838383;
	border-radius: 3px;
	background-color: #f3f2f5;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(254, 252, 255)), to(rgb(233, 232, 235)));
	background-image: -webkit-linear-gradient(top, rgb(254, 252, 255), rgb(233, 232, 235));
	font-weight: 300;
	color: #6b6b6b;
	float: top;
	text-decoration: none;
	padding: 0px 5px;
	margin-top: 2px;
	display: inline;
	
}

#logoutButton a{
	
	text-decoration: none;
	color: inherit;
	
}


/* Classes Table */

#classesWrapper{
	background-color: #636363;
	background-image: url("http://www.derekjobst.com/resources/backgrounds/pattern_012.png");
	padding: 50px 50px;
	box-shadow: inset 0px 50px 40px -50px rgba(0,0,0,0.75),inset 0px -50px 40px -50px rgba(0,0,0,0.5);
}
#classesTable{
	width: auto;
	margin-left: auto;
	margin-right: auto;
}
#sheduleWrapper{
	height: 420px;
}
#tableShadow{
	width: 863px;
	border-radius: 5px;
	margin-left: auto;
	margin-right: auto;
	box-shadow: 0px 1px 7px black;
}
table{
	border-collapse: collapse;
}
td,th{
	padding-left: 0px;
	padding-top: 0px;
}
#topRow{
	height: 45px;
	width: auto;
	background-color: #e2e3e3;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(242, 242, 242)), to(rgb(211, 213, 213)));
	background-image: -webkit-linear-gradient(top, rgb(242, 242, 242), rgb(211, 213, 213));
	background-image: -moz-linear-gradient(top, rgb(242, 242, 242), rgb(211, 213, 213));
	background-image: linear-gradient(top, rgb(242, 242, 242), rgb(211, 213, 213));
	border-radius: 5px 5px 5px 5px;
}
#c0-1,#c0-2,#c0-3,#c0-4{
	text-align: center;
	float: none;
}
#top-left{
	border-radius: 5px 0px 0px 0px;
}
#top-right{
	border-radius: 0px 5px 0px 0px;
}
#c4-1{
	border-radius: 0px 0px 0px 5px;
}
#c4-4{
	border-radius: 0px 0px 5px 0px;
}
.classCell{
	height: 45px;
	width: 215px;
	font-weight: 300;
	font-size: 19px;
	background-color: #e2e2e2;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(242, 242, 242)), to(rgb(211, 211, 211)));
	background-image: -webkit-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
	background-image: -moz-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
	background-image: linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
}
.selectedClassCell{
	height: 45px;
	width: 215px;
	font-weight: 300;
	font-size: 19px;
	background-color: #505050;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(61, 61, 61)), to(rgb(99, 99, 99)));
	background-image: -webkit-linear-gradient(top, rgb(61, 61, 61), rgb(99, 99, 99));
	background-image: -moz-linear-gradient(top, rgb(61, 61, 61), rgb(99, 99, 99));
	background-image: linear-gradient(top, rgb(61, 61, 61), rgb(99, 99, 99));
	color: white;
}
.titleCell{
	height: 45px;
	width: 215px;
	font-weight: 300;
	background-color: #e2e2e2;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(242, 242, 242)), to(rgb(211, 211, 211)));
	background-image: -webkit-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
	background-image: -moz-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
	background-image: linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
}
.titleCellText{
	font-size: 20px;
	padding: 10px 0px 0px 0px;
}
.titleCellDayLabel{
	font-size: 9px;
	text-align: center;
	margin-top: -2;
	font-weight: 400;
}
.classCell:hover{
	background-color: #e2e2e2;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(211, 211, 211)), to(rgb(242, 242, 242)));
	background-image: -webkit-linear-gradient(top, rgb(211, 211, 211), rgb(242, 242, 242));
	background-image: -moz-linear-gradient(top, rgb(211, 211, 211), rgb(242, 242, 242));
	background-image: linear-gradient(top, rgb(211, 211, 211), rgb(242, 242, 242));
	box-shadow: inset 0px 0px 7px rgba(0,0,0,0.4);
}
.classCell:active{
	background-color: #505050;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(61, 61, 61)), to(rgb(99, 99, 99)));
	background-image: -webkit-linear-gradient(top, rgb(61, 61, 61), rgb(99, 99, 99));
	background-image: -moz-linear-gradient(top, rgb(61, 61, 61), rgb(99, 99, 99));
	background-image: linear-gradient(top, rgb(61, 61, 61), rgb(99, 99, 99));
	color: white;
}
.selectedBox{
	background-color: #e2e2e2;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(211, 211, 211)), to(rgb(242, 242, 242)));
	background-image: -webkit-linear-gradient(top, rgb(211, 211, 211), rgb(242, 242, 242));
	background-image: -moz-linear-gradient(top, rgb(211, 211, 211), rgb(242, 242, 242));
	background-image: linear-gradient(top, rgb(211, 211, 211), rgb(242, 242, 242));
}
.colorSphere{
	float: left;
	width: 20px;
	height: 20px;
	margin: 12px 13px 0px 10px;
	border: 1px solid white;
	border-radius: 50%;
	box-shadow: 0px 2px 6px rgba(0,0,0,0.4);
}
.noColor{
	border: none;
	box-shadow: none;
}
.aluminum{
	background-color: #bebfbf;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(224, 224, 224)), to(rgb(156, 158, 158)));
	background-image: -webkit-linear-gradient(top, rgb(224, 224, 224), rgb(156, 158, 158));
}
.aquamarine{
	background-color: #2fd2d4;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(38, 219, 228)), to(rgb(57, 202, 197)));
	background-image: -webkit-linear-gradient(top, rgb(38, 219, 228), rgb(57, 202, 197));	
}
.burgundy{
	background-color: #ba1d1a;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(217, 34, 30)), to(rgb(156, 24, 23)));
	background-image: -webkit-linear-gradient(top, rgb(217, 34, 30), rgb(156, 24, 23));
}
.cappuccino{
	background-color: #ab6222;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(207, 123, 45)), to(rgb(136, 74, 23)));
	background-image: -webkit-linear-gradient(top, rgb(207, 123, 45), rgb(136, 74, 23));
}
.cerise{
	background-color: #df3aa0;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(243, 74, 208)), to(rgb(203, 43, 112)));
	background-image: -webkit-linear-gradient(top, rgb(243, 74, 208), rgb(203, 43, 112));	
}
.cerulean{
	background-color: #1996b6;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(49, 182, 210)), to(rgb(2, 119, 154)));
	background-image: -webkit-linear-gradient(top, rgb(49, 182, 210), rgb(2, 119, 154));
}
.lavender{
	background-color: #7d3f83;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(176, 104, 190)), to(rgb(74, 22, 72)));
	background-image: -webkit-linear-gradient(top, rgb(176, 104, 190), rgb(74, 22, 72));	
}
.midnight{
	background-color: #0b23a9;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(16, 46, 206)), to(rgb(6, 25, 132)));
	background-image: -webkit-linear-gradient(top, rgb(16, 46, 206), rgb(6, 25, 132));	
}
.spring{
	background-color: #2fbf3e;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(79, 225, 78)), to(rgb(16, 158, 47)));
	background-image: -webkit-linear-gradient(top, rgb(79, 225, 78), rgb(16, 158, 47));
}
.sunglow{
	background-color: #f3ae2d;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(248, 222, 65)), to(rgb(238, 127, 26)));	
}
.forest{
	background-color: #008426;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(0, 160, 48)), to(rgb(0, 105, 28)));
	background-image: -webkit-linear-gradient(top, rgb(0, 160, 48), rgb(0, 105, 28));	
}
.florida{
	background-color: #e07f30;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(243, 156, 61)), to(rgb(205, 98, 35)));
	background-image: -webkit-linear-gradient(top, rgb(243, 156, 61), rgb(205, 98, 35));	
}
.cellText{
	padding: 10px 0px 10px 0px;
	float: left;
	max-width: 160px;
	word-wrap: break-word;
}
.cornerLabel{
	background-color: rgba(255,255,255,0);
	padding: 2px;
	width: 14px;
	height: 14px;
	z-index: 10;
	position: absolute;
	margin: 0px 0px 0px 197px;
	font-weight: 300;
	font-size: 12px;
	text-align: center;
	color: #919191;
}
.revealCell{
	padding: 0;
}
.revealDiv{
	background-color: rgba(255,255,255,0.5);
	height: 0px;
	padding-bottom: 0px;
	width: 863px;
}
iframe{
	height: 0px;
	width: 863px;
	border: none;
}
.scroll-ios{
    overflow:scroll;
    -webkit-overflow-scrolling: touch;
}
.frameFooter{
	height: 0px;
	margin-bottom: 0px;
	width: 863px;
	display: none;
	background-color: #e2e2e2;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(242, 242, 242)), to(rgb(211, 211, 211)));
	background-image: -webkit-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
	background-image: -moz-linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
	background-image: linear-gradient(top, rgb(242, 242, 242), rgb(211, 211, 211));
}
#frameFooter4{
	border-radius: 0px 0px 5px 5px;
}
.frameFooterLeft{
	border-radius: 0px 0px 0px 5px;
}
.frameFooterRight{
	border-radius: 0px 0px 5px 0px;
}
.frameFooterButton{
	font-weight: 300;
	font-size: 14px;
	padding: 6px 15px 5px 15px;
}
.frameFooterButton:hover{
	background-color: #e2e2e2;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(211, 211, 211)), to(rgb(242, 242, 242)));
	background-image: -webkit-linear-gradient(top, rgb(211, 211, 211), rgb(242, 242, 242));
	background-image: -moz-linear-gradient(top, rgb(211, 211, 211), rgb(242, 242, 242));
	background-image: linear-gradient(top, rgb(211, 211, 211), rgb(242, 242, 242));
	box-shadow: inset 0px 0px 7px rgba(0,0,0,0.4);
}
.frameFooterButton:active{
	background-color: #505050;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(61, 61, 61)), to(rgb(99, 99, 99)));
	background-image: -webkit-linear-gradient(top, rgb(61, 61, 61), rgb(99, 99, 99));
	background-image: -moz-linear-gradient(top, rgb(61, 61, 61), rgb(99, 99, 99));
	background-image: linear-gradient(top, rgb(61, 61, 61), rgb(99, 99, 99));
	color: white;
	box-shadow: inset 0px 0px 7px rgba(0,0,0,0.4);
}
.frameBack,.frameForward{
	float: left;
	border-right: 1px solid #636363;
	padding: 7px 15px 4px 15px;
}
.frameOpen{
	float: right;
	border-left: 1px solid #636363;
	padding: 6px 15px 2px 15px;
}

/* Link Buttons */

#buttonsDiv{
	margin: 20px;
	width: 455px;
	margin-left: auto;
	margin-right: auto;
}
.customButton{
	border: 1px solid #838383;
	border-radius: 5px;
	width: 150px;
	background-color: #f3f2f5;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(254, 252, 255)), to(rgb(233, 232, 235)));
	background-image: -webkit-linear-gradient(top, rgb(254, 252, 255), rgb(233, 232, 235));
	background-image: -moz-linear-gradient(top, rgb(254, 252, 255), rgb(233, 232, 235));
	background-image: linear-gradient(top, rgb(254, 252, 255), rgb(233, 232, 235));
	font-weight: 100;
	font-size: 12px;
	color: #6b6b6b;
	float: left;
	padding-top: 3px;
	margin-bottom: 20px;
}
.centerBorder{
	border-right: none;
	border-left: none;
	border-radius: 0px;
}
.leftBorder{
	border-radius: 5px 0px 0px 5px;
}
.rightBorder{
	border-radius: 0px 5px 5px 0px;
}
.customButton:active{
	box-shadow: inset 0px 0px 8px rgba(0,0,0,0.7);
}
.customButton:hover{
	box-shadow: inset 0px 0px 7px rgba(0,0,0,0.4);
}

/* Schedule Section */

#scheduleImage{
	margin: 0px 118px 0px 118px;
}
#scheduleTable{
	-webkit-user-select: none;

	margin-left: auto;
	margin-right: auto;
}
.scheduleCell{
	background-color: grey;
	width: 350px;
	height: 45px;
	font-weight: 100;
	color: white;
	background-color: #636363;
	background-image: url("http://www.derekjobst.com/resources/backgrounds/pattern_012.png");
	box-shadow: inset 0px 50px 40px -50px rgba(0,0,0,0.75),inset 0px -50px 40px -50px rgba(0,0,0,0.5);
}
.heavy{
	font-weight: 300;
}
.scheduleText{
	float: left;
	font-size: 30px;
	margin-top: 5px;
	margin-left: 10px;
}
.scheduleTime{
	float: right;
	font-size: 15px;
	margin-top: 20px;
	margin-right: 5px;
	font-weight: 300;
}
#footer{
	margin-top: 20px;
	margin-bottom: 10px;
	margin-left: auto;
	margin-right: auto;
	width: 320px;
	height: 20px;
	color: #888888;
	font-weight: 400;
	font-size: 10px;
	text-align: center;
}
#footer a{
	color: #888888;
	text-decoration: none;
}
#flag{
	margin-left: 50%;
	width: 15px;
	margin-bottom: 10px;
}

b{
	
	font-weight: 400;
	
}

.shadowOriginalHeight{
	height: 229px;
}

</style>


<body id="bodyID" onkeydown="keypress()">


<div id="wrapper">
	<div id="body" class="body">
		<div id="header">
			<div id="title">
				<span id="titleText">Class Schedule</span>
			</div>
		</div>
		<div id="dayInfoWrapper">
			
			Welcome, &nbsp<b><?=$firstname?></b>. &nbspYou are currently logged in as &nbsp<b><?=$username?></b>. &nbsp &nbsp &nbsp<div id="logoutButton"><a href="logout.php">Logout</a></div>
			<br>Hey! Want an new feature? Found a bug? <a href="https://docs.google.com/forms/d/1lBUduZGBZ8a2bFb5doe2M0PDo68P3Uw97veHFVZShzI/viewform">Click Here</a> to report it!
		</div>
		<div id="classesWrapper">
			<div id="tableShadow" class="shadowOriginalHeight">
				<div id="topRow">
			<table id="classesTable">
				<tr>
					<td>
						<div class="titleCell" id="top-left">
							<div id="c0-1" class="titleCellText">1</div>
							<div id="dayLabel1" class="titleCellDayLabel"></div>

						</div>
					</td>
					<td>
						<div class="titleCell">
							<div id="c0-2" class="titleCellText">2</div>
							<div id="dayLabel2" class="titleCellDayLabel"></div>
						</div>
					</td>
					<td>
						<div class="titleCell">
							<div id="c0-3" class="titleCellText">3</div>													
							<div id="dayLabel3" class="titleCellDayLabel"></div>
						</div>
					</td>
					<td>
						<div class="titleCell" id="top-right">
							<div id="c0-4" class="titleCellText">4</div>
							<div id="dayLabel4" class="titleCellDayLabel"></div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="classCell" id="c1-1" onclick="openWebTray(0,1,1)">
							<div class="colorSphere" id="i1-1"></div>
							<div class="cellText" id="t1-1">Class Name</div>
							<div class="cornerLabel">A</div>
						</div>
					</td>
					<td>
						<div class="classCell"  id="c1-2" onclick="openWebTray(4,1,2)">
							<div class="colorSphere" id="i1-2"></div>
							<div class="cellText" id="t1-2">Class Name</div>
							<div class="cornerLabel">E</div>
						</div>
					</td>
					<td>
						<div class="classCell" id="c1-3" onclick="openWebTray(3,1,3)">
							<div class="colorSphere" id="i1-3"></div>
							<div class="cellText" id="t1-3">Class Name</div>
							<div class="cornerLabel">D</div>
						</div>
					</td>
					<td>
						<div class="classCell" id="c1-4" onclick="openWebTray(7,1,4)">
							<div class="colorSphere" id="i1-4"></div>
							<div class="cellText" id="t1-4">Class Name</div>
							<div class="cornerLabel">H</div>
						</div>
					</td>
				</tr>
				
				<tr>
					<td colspan="4" class="revealCell">
						<div class="revealDiv scroll-ios" id="r1">
							<iframe id="frame1" src=""></iframe>
							</div>
					</td>
				</tr>
				
				<tr>
					<td colspan="4"class="revealCell">
						<div id="frameFooter1" class="frameFooter">
							<div class="frameFooterContent">
								<div class="frameFooterButton frameBack" onclick="iframeBack(1)">
								<img src="http://www.derekjobst.com/schedule/resources/classic/icons/back.png"></div>
								<div class="frameFooterButton frameForward" onclick="iframeForward(1)">
								<img src="http://www.derekjobst.com/schedule/resources/classic/icons/forward.png"></div>
								<div class="frameFooterButton frameOpen" onclick="iframeOpen(1)">
								<img src="http://www.derekjobst.com/schedule/resources/classic/icons/display.png"></div>
							</div>
						</div>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="classCell" id="c2-1" onclick="openWebTray(1,2,1)">
							<div class="colorSphere" id="i2-1"></div>
							<div class="cellText" id="t2-1">Class Name</div>
							<div class="cornerLabel">B</div>
						</div>
					</td>
					<td>
						<div class="classCell" id="c2-2" onclick="openWebTray(5,2,2)">
							<div class="colorSphere" id="i2-2"></div>
							<div class="cellText" id="t2-2">Class Name</div>
							<div class="cornerLabel">F</div>
						</div>
					</td>
					<td>
						<div class="classCell" id="c2-3" onclick="openWebTray(1,2,3)">
							<div class="colorSphere" id="i2-3"></div>
							<div class="cellText" id="t2-3">Class Name</div>
							<div class="cornerLabel">B</div>
						</div>
					</td>
					<td>
						<div class="classCell" id="c2-4" onclick="openWebTray(5,2,4)">
							<div class="colorSphere" id="i2-4"></div>
							<div class="cellText" id="t2-4">Class Name</div>
							<div class="cornerLabel">F</div>
						</div>
					</td>				
				</tr>
				
				<tr>
					<td colspan="4" class="revealCell">
						<div class="revealDiv scroll-ios" id="r2">
							<iframe id="frame2" src=""></iframe>
							</div>
					</td>
				</tr>
				
				<tr>
					<td colspan="4"class="revealCell">
						<div id="frameFooter2" class="frameFooter">
							<div class="frameFooterContent">
								<div class="frameFooterButton frameBack" onclick="iframeBack(2)">
								<img src="http://www.derekjobst.com/schedule/resources/classic/icons/back.png"></div>
								<div class="frameFooterButton frameForward" onclick="iframeForward(2)">
								<img src="http://www.derekjobst.com/schedule/resources/classic/icons/forward.png"></div>
								<div class="frameFooterButton frameOpen" onclick="iframeOpen(2)">
								<img src="http://www.derekjobst.com/schedule/resources/classic/icons/display.png"></div>
							</div>
						</div>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="classCell" id="c3-1" onclick="openWebTray(2,3,1)">
							<div class="colorSphere" id="i3-1"></div>
							<div class="cellText" id="t3-1">Class Name</div>
							<div class="cornerLabel">C</div>
						</div>
					</td>
					<td>
						<div class="classCell" id="c3-2" onclick="openWebTray(6,3,2)">
							<div class="colorSphere" id="i3-2"></div>
							<div class="cellText" id="t3-2">Class Name</div>
							<div class="cornerLabel">G</div>
						</div>
					</td>
					<td>
						<div class="classCell" id="c3-3" onclick="openWebTray(2,3,3)">
							<div class="colorSphere" id="i3-3"></div>
							<div class="cellText" id="t3-3">Class Name</div>
							<div class="cornerLabel">C</div>
						</div>
					</td>
					<td>
						<div class="classCell" id="c3-4" onclick="openWebTray(6,3,4)">
							<div class="colorSphere" id="i3-4"></div>
							<div class="cellText" id="t3-4">Class Name</div>
							<div class="cornerLabel">G</div>
						</div>
					</td>
				</tr>
				
				<tr>
					<td colspan="4" class="revealCell">
						<div class="revealDiv scroll-ios" id="r3">
							<iframe id="frame3" src=""></iframe>
							</div>
					</td>
				</tr>
				
				<tr>
					<td colspan="4"class="revealCell">
						<div id="frameFooter3" class="frameFooter">
							<div class="frameFooterContent">
								<div class="frameFooterButton frameBack" onclick="iframeBack(3)">
								<img src="http://www.derekjobst.com/schedule/resources/classic/icons/back.png"></div>
								<div class="frameFooterButton frameForward" onclick="iframeForward(3)">
								<img src="http://www.derekjobst.com/schedule/resources/classic/icons/forward.png"></div>
								<div class="frameFooterButton frameOpen" onclick="iframeOpen(3)">
								<img src="http://www.derekjobst.com/schedule/resources/classic/icons/display.png"></div>
							</div>
						</div>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="classCell" id="c4-1" onclick="openWebTray(3,4,1)">
							<div class="colorSphere" id="i4-1"></div>
							<div class="cellText" id="t4-1">Class Name</div>
							<div class="cornerLabel">D</div>
						</div>
					</td>
					<td>
						<div class="classCell" id="c4-2" onclick="openWebTray(7,4,2)">
							<div class="colorSphere" id="i4-2"></div>
							<div class="cellText" id="t4-2">Class Name</div>
							<div class="cornerLabel">H</div>
						</div>
					</td>
					<td>
						<div class="classCell" id="c4-3" onclick="openWebTray(0,4,3)">
							<div class="colorSphere" id="i4-3"></div>
							<div class="cellText" id="t4-3">Class Name</div>
							<div class="cornerLabel">A</div>
						</div>
					</td>
					<td>
						<div class="classCell" id="c4-4" onclick="openWebTray(4,4,4)">
							<div class="colorSphere" id="i4-4"></div>
							<div class="cellText" id="t4-4">Class Name</div>
							<div class="cornerLabel">E</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="4" class="revealCell">
						<div class="revealDiv scroll-ios" id="r4">
							<iframe id="frame4" src=""></iframe>
							</div>
					</td>
				</tr>
				
				<tr>
					<td colspan="4"class="revealCell">
						<div id="frameFooter4" class="frameFooter">
							<div class="frameFooterContent">
								<div class="frameFooterButton frameBack frameFooterLeft" onclick="iframeBack(4)">
								<img src="http://www.derekjobst.com/schedule/resources/classic/icons/back.png"></div>
								<div class="frameFooterButton frameForward" onclick="iframeForward(4)">
								<img src="http://www.derekjobst.com/schedule/resources/classic/icons/forward.png"></div>
								<div class="frameFooterButton frameOpen frameFooterRight" onclick="iframeOpen(4)">
								<img src="http://www.derekjobst.com/schedule/resources/classic/icons/display.png"></div>
							</div>
						</div>
					</td>
				</tr>

			</table>
			</div>
			</div> <!shadow>
		</div>
		<div id="buttonsDiv">
			<a href="http://ps.stgregoryschool.org" target="_blank" ><input type="button" value="Check Grades" class="customButton leftBorder"></a>
			<input type="button" value="Change Classes" onclick="setData()" class="customButton centerBorder">
			<a href="https://mail.google.com" target="_blank" ><input type="button" value="Check Email" class="customButton rightBorder"></a>
			</div>
		<div id="sheduleWrapper">
			
			
			<table id="scheduleTable">
				
				<tr>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText"><span class="heavy"></span> </div>	
							<div class="scheduleTime"></div>					
						</div>
					</td>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText"><span class="heavy">First</span> Period</div>	
							<div class="scheduleTime">8:00 to 9:15</div>					
						</div>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText"><span class="heavy">First</span> Period</div>	
							<div class="scheduleTime">9:00 to 10:15</div>					
						</div>
					</td>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText">Advisory/Meeting</div>	
							<div class="scheduleTime">9:20 to 9:40</div>					
						</div>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText"><span class="heavy">Second</span> Period</div>	
							<div class="scheduleTime">10:20 to 11:35</div>					
						</div>
					</td>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText"><span class="heavy"></span> Break</div>	
							<div class="scheduleTime">9:40 to 9:55</div>					
						</div>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText"><span class="heavy"></span> Meeting</div>	
							<div class="scheduleTime">11:40 to 12:00</div>					
						</div>
					</td>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText"><span class="heavy">Second</span> Period</div>	
							<div class="scheduleTime">10:00 to 11:15</div>					
						</div>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText"><span class="heavy"></span> Lunch</div>	
							<div class="scheduleTime">12:00 to 12:50</div>					
						</div>
					</td>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText"><span class="heavy">Third</span> Period</div>	
							<div class="scheduleTime">11:20 to 12:35</div>					
						</div>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText"><span class="heavy">Third</span> Period</div>	
							<div class="scheduleTime">12:55 to 2:10</div>					
						</div>
					</td>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText"><span class="heavy"></span> Lunch</div>	
							<div class="scheduleTime">12:40 to 1:30</div>					
						</div>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText"><span class="heavy">Fourth</span> Period</div>	
							<div class="scheduleTime">2:15 to 3:30</div>					
						</div>
					</td>
					<td>
						<div class="scheduleCell">
							<div class="scheduleText"><span class="heavy">Fourth</span> Period</div>	
							<div class="scheduleTime">1:35 to 2:50</div>					
						</div>
					</td>
				</tr>
				
				
				
			</table>

			
		</div>
	</div>
</div>

<div id="footer" onmouseover="changeFooter()">|&nbsp &nbspVersion 1.8.1 &nbsp &nbsp|&nbsp &nbsp <a href="http://www.derekjobst.com">&copy 2013 Derek Jobst</a>&nbsp &nbsp |&nbsp &nbsp Made In America&nbsp &nbsp |</div><img src="http://schedule.derekjobst.com/resources/flag.gif" id="flag" onclick="changeToBlack()">

</body>


<script type="text/javascript">


	function setData() { 
	
	    location.href = 'preferences.php';
	
	 }
	
	function openwebsite(URLid,section) { 
	
	animateTray(URLid,section);
	 
	}
	
	function highlight(cellID) { 
	 
	 	alert(cellID);
	 
	}
	
	<?php
		echo "var dataArray = ". json_encode($userArray) . ";\n";
	?>
	
	var firstTime = ["1-1","2-1","3-1","4-1","1-2","2-2","3-2","4-2"];
	var secondTime = ["4-3","2-3","3-3","1-3","4-4","2-4","3-4","1-4"];
	  
	var URLArray = new Array();
	  
	for(var i=0; i<8;i++){
	
		document.getElementById("t"+firstTime[i]).innerHTML = dataArray[(i+5)];
		document.getElementById("t"+secondTime[i]).innerHTML = dataArray[(i+5)];

		URLArray[i] = dataArray[(i+13)];

		document.getElementById("i"+firstTime[i]).className = "colorSphere " + dataArray[(i+21)];
		document.getElementById("i"+secondTime[i]).className = "colorSphere " + dataArray[(i+21)];

	
	}

		
	var numToLetter = new Array(0,"a","b","c","d","e","f","g","h");
	
	
	//animation code	

	function iframeBack(frameID){

		window.frames["frame"+frameID].history.go(-1);

	}

	function iframeForward(frameID){
		
		window.frames["frame"+frameID].history.go(+1);
		
	}
	
	function iframeOpen(frameID){
		
		window.open(document.getElementById("frame"+frameID).src);
		
	}

		
	var currentOpenRow = 0;
	var currentOpenColumn = 0;
	var currentOpenURL = 0;

	function openWebTray(URLid,row,column) { 
	
		//Check to see if you are clicking on a valid box
		if(URLArray[URLid] != null){
		
			//If the web view is closed, open a new one
			if(currentOpenRow==0){

				higlightCell(row,column);

				animateTrayOut(row,column);
				changeURL(URLid,row,column);
				
				return;			
			}
			
			//If click is in the same row, and the same column
			if(currentOpenRow==row && currentOpenColumn==column){
			
				unHighlightPreviousCell();
			
				animateTrayIn(row,column);
				return;
			}
			//If click is in the same row, and a different column
			if(currentOpenRow==row && currentOpenColumn != column){
			
			unHighlightPreviousCell();
			higlightCell(row,column);

			currentOpenRow = row;
			currentOpenColumn = column;
			
			changeURL(URLid,row,column);
			
			}
			//If click is on a different row, don't care about column
			if(currentOpenRow !=row){
			
			unHighlightPreviousCell();
			higlightCell(row,column);

			
			animateTrayIn(currentOpenRow,currentOpenColumn);
			animateTrayOut(row,column);
			changeURL(URLid,row,column);
			}
		}
	}

	function changeURL(URLid,row,column) { 
	
/* 		alert("changeURL, section " + row + " and URL is " + URLid); */
	
			document.getElementById('frame'+row).src = URLArray[URLid];	
			
			currentOpenURL = URLid;
	
	}

	function animateTrayOut(row,column) { 
	
/* 		alert("animateTrayOut, row "+row+", column "+column); */
	
			
		document.getElementById("r"+row).style.height = "300px";
		document.getElementById("frame"+row).style.height = "300px";
		document.getElementById("tableShadow").style.height = "561px";
		
		document.getElementById("frameFooter"+row).style.height = "30px";
		document.getElementById("frameFooter"+row).style.marginBottom = "1px";	
		document.getElementById("frameFooter"+row).style.display = "block";	

			
		document.getElementById("r"+row).style.marginBottom = "1px";	
		
		if(row==4){
			
			document.getElementById("c4-4").style.borderRadius = "0px 0px 0px 0px";
			document.getElementById("c4-1").style.borderRadius = "0px 0px 0px 0px";

			
		}
		
		
		
		currentOpenRow = row;
		currentOpenColumn = column;
		
	}


	function higlightCell(row,column) { 
	
	document.getElementById("c"+row+"-"+column).className = "selectedClassCell";
	}
	
	function unHighlightPreviousCell() { 
	
	document.getElementById("c"+currentOpenRow+"-"+currentOpenColumn).className = "classCell";
	}

	function animateTrayIn(row,column) { 
		
		
		document.getElementById("r"+currentOpenRow).style.height = "0px";
		document.getElementById("frame"+currentOpenRow).style.height = "0px";
		document.getElementById("tableShadow").style.height = "229px";
		
		document.getElementById("frameFooter"+row).style.height = "0px";
		document.getElementById("frameFooter"+row).style.marginBottom = "0px";	
		document.getElementById("frameFooter"+row).style.display = "none";	
		
		document.getElementById("r"+currentOpenRow).style.marginBottom = "0px";
		document.getElementById('frame'+currentOpenRow).src = "";	
		
		document.getElementById("c"+row+"-"+column).className = "classCell";
		
		if(row==4){
						
			document.getElementById("c4-4").style.borderRadius = "0px 0px 5px 0px";
			document.getElementById("c4-1").style.borderRadius = "0px 0px 0px 5px";

			
		}
		
		
		currentOpenColumn = 0;
		currentOpenRow = 0;	
	
	}


//Keypress Stuff

function changeToBlack(){
	
	document.getElementById("bodyID").style.backgroundImage = "url('http://www.derekjobst.com/resources/backgrounds/pattern_037.png')";
	
	document.getElementById("body").className = "bodyBlack";
	
	document.getElementById("classesWrapper").style.backgroundColor = "#3e3e3e";
	
}



var typed = "";

function keypress() { 

if(typed.lenght>13){return;}

var x=event.which;

keychar=String.fromCharCode(x);

typed = typed + keychar;


if(RegExp("[1-4]").test(typed)==true){
	
	openWebTray(typed-1,typed,1);
		
	typed = "";
}
if(RegExp("[5-8]").test(typed)==true){
	
	openWebTray(typed-1,typed-4,2);
		
	typed = "";
}


}
function deactivateAlert(){
	
	document.getElementById('alertBox').className = 'alertBoxHidden transition';
	
}
function activateAlert(message){
	
	document.getElementById('alertBox').className = 'alertBoxHidden alertBoxAppear transition';
	document.getElementById('alertText').innerHTML = message;

		
}


if("<?=$remember?>" == "true"){
	
	localStorage.username = "<?=$username?>";
	localStorage.password = "<?=$password?>";		
}


</script>


<script type="text/javascript" src="http://www.google.com/jsapi"></script>


<script type="text/javascript">

google.load("gdata", "2.x");

function padNumber(num) {
  if(num <= 9) {
    return "0" + num;
  }
  return num;
}

function loadCalendarByAddress(calendarAddress) {
  var calendarUrl = 'https://www.google.com/calendar/feeds/' +
                    calendarAddress + 
                    '/public/full';
  loadCalendar(calendarUrl);
}
 
function loadCalendar(calendarUrl) {
  var service = new 
      google.gdata.calendar.CalendarService('gdata-js-client-samples-simple');
  var query = new google.gdata.calendar.CalendarEventQuery(calendarUrl);
  query.setOrderBy('starttime');
  query.setSortOrder('ascending');
  
  var todayDate = new Date();
  var todayFormat = todayDate.getFullYear() + "-" + addZeroToSingleDigit((todayDate.getMonth()+1)) + "-" + addZeroToSingleDigit(todayDate.getDate());
  
	query.setMaxResults(10);  
	query.setMinimumStartTime(todayFormat);

  service.getEventsFeed(query, listEvents, handleGDError);
}

function addZeroToSingleDigit(func){			
	if(func < 10){
		var fixedFunc = "0"+func;
		return fixedFunc;
	}
	else{
		return func;
	}
}

function handleGDError(e) {
  document.getElementById('jsSourceFinal').setAttribute('style', 
      'display:none');
  if (e instanceof Error) {
    /* alert with the error line number, file and message */
    alert('Error at line ' + e.lineNumber +
          ' in ' + e.fileName + '\n' +
          'Message: ' + e.message);
    /* if available, output HTTP error code and status text */
    if (e.cause) {
      var status = e.cause.status;
      var statusText = e.cause.statusText;
      alert('Root cause: HTTP error ' + status + ' with status text of: ' + 
            statusText);
    }
  } else {
    alert(e.toString());
  }
}


function listEvents(feedRoot) {


  var entries = feedRoot.feed.getEntries();

  var len = entries.length;

   var todayDate = new Date();
   var tomorrowDate = new Date(todayDate.getTime() + (24*60*60*1000));
   

  for (var i = 0; i < len; i++) {
	  
	    var entry = entries[i];
	    var title = entry.getTitle().getText();
	    var startDateTime = null;
	    var eventStartDate = null;
	    var times = entry.getTimes();
	    
/* 	    alert(title); */
	    
	    if (times.length > 0) {
	      startDateTime = times[0].getStartTime();
	      eventStartDate = startDateTime.getDate();
	}
    
   

    
    var dayExpression = /Day\s*[1-4]/;
    var specialExpression = /Special/;
    var dayNumber = RegExp("[1-4]").exec(title);

    if(dayExpression.test(title)){


	    /* Editing the Today Div */

    	if(eventStartDate.getDate() == todayDate.getDate()){
    	    		    	 
	    	 document.getElementById("dayLabel" + dayNumber).innerHTML = "Today";
	    	 document.getElementById("c0-" + dayNumber).style.fontSize = "18px";

    	}    	
    	
    	/* Editing the Tomorrow Div */	
    	
    	if(eventStartDate.getDate() == tomorrowDate.getDate()){
	    	
	    	 document.getElementById("dayLabel" + dayNumber).innerHTML = "Tomorrow";
    	document.getElementById("c0-" + dayNumber).style.fontSize = "18px";
	
    	}

    }

    
  }
}

google.setOnLoadCallback(init);
</script>


<script type="text/javascript">
  
loadCalendar('https://www.google.com/calendar/feeds/stgregoryschool.org_9trajmtsancl2o8pt11338klq4@group.calendar.google.com/public/full');

</script>


</html>