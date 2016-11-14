<?php
    session_start();
	if(isset($_SESSION['login_user'])){
    if(isset($_GET['id']))
    $id=$_GET["id"];
	
	if(!empty($id)){
	$sql[0] = "SELECT * FROM products where id='$id'";
    
	include("db_config.php");
	
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	
    if (mysqli_num_rows($result)>0){
	    while ($record = mysqli_fetch_array($result)){
			echo "<img class=\"order_img \" src=\"$record[img]\" />
			      <div class=\"order_name\">$record[name]($record[in_stock])</div>
				  <div id=\"order_price\">$record[price] din</div>
				  <div id=\"left\" class=\"arrow\" onclick=\"counter('left')\" ><</div>
				  <div id=\"right\" class=\"arrow\" onclick=\"counter('right')\">></div>
				  <div id=\"center\" class=\"arrow\">1</div>
				  <input id=\"dest_city\" type=\"text\" value=\"City\"  onfocus=\"input_focus('dest_city','City')\" onblur=\"input_blur('dest_city','City')\" />
				  <input id=\"dest_address\" type=\"text\" value=\"Address\"  onfocus=\"input_focus('dest_address','Address')\" onblur=\"input_blur('dest_address','Address')\" />
				  <input id=\"dest_nmb\" type=\"text\" value=\"nmb\"  onfocus=\"input_focus('dest_nmb','nmb')\" onblur=\"input_blur('dest_nmb','nmb')\" />
				  <div id=\"inStock\" hidden > $record[in_stock]</div>
				  <div id=\"price\" hidden > $record[price]</div>
				  <div id=\"shop_button\" onclick=\" order('$record[id]')\" >BUY</div>";				  				   
				   }
    }
    $conn->close();
	}
	else
	echo"a termek nem talalhato";
	}
else
echo "0";
?>
