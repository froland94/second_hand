<?php
    session_start();
	include("db_config.php");
	if(!isset($_SESSION['login_user'])){  
    if (empty($_POST['username']) || empty($_POST['password'])) {
    echo "Username or Password is invalid";
    }
    else{
         $username=mysqli_real_escape_string($conn, $_POST['username']);
         $password=mysqli_real_escape_string($conn, $_POST['password']);   
         $username = stripslashes($username);
         $password = stripslashes($password);
        $sql[0] = "select username from users where username='$username' and password='$password'";	
		$result[0]= mysqli_query($conn,$sql[0]) or die(mysqli_error());
        if (mysqli_num_rows($result[0])>0){
		echo "1";
        $_SESSION['login_user']=$username;
		}		
	    else{
          echo"0";
		}
        $conn->close();
    }
}
else{
echo"2";
}
?>