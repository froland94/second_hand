<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Second Hand</title>
	<meta name="generator" content="CSE HTML Validator Professional (http://www.htmlvalidator.com/)" />
	<link type="text/css" rel="stylesheet" href="shop.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body onload="login();">
    <div id="header1">
	     <div id="pur_button" onclick="purchases()" class="head">My Purchases</div>
	<div id="registration_button" onclick="document.getElementById('registration_panel').style.display='block'" class="head">Registration</div>
	<div id="login_button" onclick="document.getElementById('log_panel').style.display='block'" class="head">Login</div>
	<div id="logout_button" onclick="logout()" class="head">Logout</div>
</div>
<div id="pur_panel"></div>
<div id="registration_panel" class="login_panel">
	<div class ="cont">
		<div id="reg_x" class="x" onclick="document.getElementById('registration_panel').style.display='none'">X</div>
		<p class="log_title">Registration Panel</p>
		<form id="MyForm">
		<input id="reg_username" type="text" value="Username"  onfocus="input_focus('reg_username','Username')" onblur="input_blur('reg_username','Username')" />
		<input id="reg_password" type="text" value="Password"  onfocus="input_focus('reg_password','Password')" onblur="input_blur('reg_password','Password')" />
		<input id="firstname" type="text" value="First name"  onfocus="input_focus('firstname','First name')" onblur="input_blur('firstname','First name')" />
		<input id="surname" type="text" value="Surname"  onfocus="input_focus('surname','Surname')" onblur="input_blur('surname','Surname')" />
		<input id="city" type="text" value="City"  onfocus="input_focus('city','City')" onblur="input_blur('city','City')" />
		<input id="address" type="text" value="Address"  onfocus="input_focus('address','Address')" onblur="input_blur('address','Address')" />
		<input id="nmb" type="text" value="nmb"  onfocus="input_focus('nmb','nmb')" onblur="input_blur('nmb','nmb')" />
		<div id="reg_send" onclick="check_reg();" >REGISTRATION</div>
		</form>
	</div>
</div>

<div id="log_panel" class="login_panel">
	<div class ="cont">
		<div id="login_x" class="x" onclick="document.getElementById('log_panel').style.display='none'"> X </div>
		<p class="log_title">Login</p>
		<input id="username" type="text" value="Username"  onfocus="input_focus('username','Username')" onblur="input_blur('username','Username')" />
		<input id="password" type="text" value="Password"  onfocus="input_focus('password','Password')" onblur="input_blur('password','Password')" />
		<div id="login_but" onclick="login();" >LOGIN</div>
	</div>
</div>
    <div id="panel"> </div>
    <a id="back" href="index.html"  >SECOND HAND</a>
<?php
error_reporting(E_ERROR);
    if(isset($_GET["type"]))
	$type=$_GET["type"];
	else
	$type=0;
	
	if(!empty($type)){
		if($type==1){
			echo "<div id=\"header\" 
			onmouseover=\" document.getElementById('header').style.backgroundImage='url(images/bg_watch.jpg)'\" 
			onmouseout=\" document.getElementById('header').style.backgroundImage='url(images/bg2.jpg)'\">
			</div>";	
			$flag=3;
		}
		if($type==3){
			echo "<div id=\"header\" 
				onmouseover=\" document.getElementById('header').style.backgroundImage='url(images/bg_shoes.jpg)'\" 
				onmouseout=\" document.getElementById('header').style.backgroundImage='url(images/bg2.jpg)'\">
				</div>";	
			$flag=2;
		}
	
		if($type==2){
			echo "<div id=\"header\" 
				onmouseover=\" document.getElementById('header').style.backgroundImage='url(images/bg_satchel.jpg)'\" 
				onmouseout=\" document.getElementById('header').style.backgroundImage='url(images/bg2.jpg)'\">
				</div>";	
		$flag=1;
		}
	}
	else{
		echo"<div id=\"header\"></div>";
		$flag=1;
	}
	
	echo "<div id=\"container\">";
	
    include("shop_list.php");
	echo "</div>";
?>

<script src="shop.js"></script>
<script src="second_hand.js"></script>
</body>
</html>