<?php
	if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['first'])&&isset($_POST['sur'])&&isset($_POST['city'])&&isset($_POST['address'])&&isset($_POST['nmb'])){
		$username=$_POST["username"];
		$password=$_POST["password"];
		$first=$_POST["first"];
		$sur=$_POST["sur"];
		$city=$_POST["city"];
		$address=$_POST["address"];
		$nmb=$_POST["nmb"];
	}
	else
		echo"BAD PARAMETERS";

    if(!empty($username)){
	    $sql[0] = "select username from users where username='$username'";
		
		$sql[1] = "INSERT INTO users(username,password,firstname, surname, city, address, reg_date) 
				  VALUES ('$username','$password','$first','$sur','$city',concat('$address',' ','$nmb'),now())";
	    
		include("db_config.php");
		$result[0]= mysqli_query($conn,$sql[0]) or die(mysqli_error());
        if (mysqli_num_rows($result[0])==0){
		$result[1]= mysqli_query($conn,$sql[1]) or die(mysqli_error());		
		if(mysqli_affected_rows($conn)>0)
            echo"1";
		}
	    else{
          echo"0";
		}
    $conn->close();
	}
?>
