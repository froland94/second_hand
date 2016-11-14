<?php
    include("db_config.php");
	$sql[0] = "SELECT * FROM products where in_stock>0 order by type desc,price asc";
	$sql[1] = "SELECT * FROM products where type='watch' and in_stock>0  order by price asc";
	$sql[2] = "SELECT * FROM products where type='satchel' and in_stock>0  order by price asc";
	$sql[3] = "SELECT * FROM products where type='shoes' and in_stock>0  order by price asc";
	
    if(!empty($type))
		$result= mysqli_query($conn,$sql[$type]) or die(mysqli_error());

    else
		$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	
    if (mysqli_num_rows($result)>0){ 
	    while ($record = mysqli_fetch_array($result)){
		    if($flag==1 && $record[type]=='satchel' ){
				echo "<p class=\"type\">SATCHELS</p>";		   
				$flag++;
			}
		    if($flag==2 && $record[type]=='shoes' ){			
				echo "<p class=\" type\">SHOES</p>";
				$flag++;
			}
			if($flag==3 && $record[type]=='watch' ){
				echo "<p class=\" type\">WATCHES</p>";
				$flag++;
			}
			echo "<div class=\"td\" onclick=\"loadData('$record[id]');\">			          
				     <img onmouseover=\"document.getElementById($record[id]).style.display='block'\" 
						onmouseout=\"document.getElementById($record[id]).style.display='none'\" alt=\"$record[img]\" src=\"$record[img]\" />
					 <div id=\"$record[id]\" class=\"cover\" 
					   onmouseover=\"document.getElementById($record[id]).style.display='block'\" 
					   onmouseout=\"document.getElementById($record[id]).style.display='none'\" >
						 <p class=\"title \">$record[name]<p><p class=\"price \"> $record[price] din<p>
					 </div>
				  </div>";				   
				   }
    }
    $conn->close();
?>
