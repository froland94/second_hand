<?php
    session_start();
	include("db_config.php");
	if(isset($_SESSION['login_user'])){
	$username=$_SESSION['login_user'];
	$sql[0] = "SELECT p.img,p.name,o.nmb_products,o.total_value,date(o.order_date) as order_date 
	FROM orders o join products p on p.id=o.id where o.username='$username' order by  o.order_date desc limit 5";
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	
    if (mysqli_num_rows($result)>0){
	    while ($record = mysqli_fetch_array($result)){
			echo "<div class=\"pur_elem\">
			      <img class=\"pur_img\" alt=\"$record[img]\" src=\"$record[img]\" />
				  <div class=\"pur_text\">$record[name]</div>
				  <div class=\"pur_text\">$record[nmb_products] piece</div>
				  <div class=\"pur_text\">$record[total_value] din</div>
				  <div class=\"pur_text\">$record[order_date]</div>
				  </div>";			   
				   }
    }
	else echo"sikertelen";

	}
else
echo"Login first";
    $conn->close();	
?>
