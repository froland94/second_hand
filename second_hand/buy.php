<?php
    session_start();
	if(isset($_SESSION['login_user'])&&isset($_POST['id'])&&isset($_POST['city'])&&isset($_POST['address'])&&isset($_POST['nmb'])&&isset($_POST['nmbp'])&&isset($_POST['price'])){
		$id=$_POST["id"];
		$username=$_SESSION['login_user'];
		$city=$_POST["city"];
		$address=$_POST["address"];
		$nmb=$_POST["nmb"];
		$nmbp=$_POST["nmbp"];
		$price=$_POST["price"];
	}
	else
		echo"ERROR";

    if(!empty($id)){
		$sql[0] = "INSERT INTO orders(username, id, dest_city, address, nmb_products, total_value, order_date) 
				  VALUES ('$username','$id','$city',concat('$address',' ','$nmb'),'$nmbp','$price'*'$nmbp',now())";
		$sql[1] = "select in_stock from products where id='$id'";
	    
		include("db_config.php");
	
		$result[0]= mysqli_query($conn,$sql[0]) or die(mysqli_error());
		$result[1]= mysqli_query($conn,$sql[1]) or die(mysqli_error());
		
		if (mysqli_num_rows($result[1])>0){
			while ($record = mysqli_fetch_array($result[1]))
				$in_stock=$record['in_stock'];	
		}
		$in_stock-=$nmbp;
		$sql[2] = "UPDATE products SET in_stock='$in_stock' WHERE id='$id'";
		$result[2]= mysqli_query($conn,$sql[2]) or die(mysqli_error());
	
		if(mysqli_affected_rows($conn)>0)
            echo"SUCCESS";
    $conn->close();
	}
	else
		echo"PRODUCT NOT FOUNDED";
?>
