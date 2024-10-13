<?php

	include("adminmenu.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<style>

body {
			font-family: Arial, sans-serif;

			  background-image: url("catering2.jpg");
			background-repeat: no-repeat;
			background-size: 1600px 775px;
		}
            
            div.wrapper {
               background-color: #fed9ff;
  width: 600px;
  height: 150px;
  overflow-x: hidden;
  overflow-y: auto;
  text-align: center;
  padding: 20px;
  
            }
        
	</style>
</head>
<body >

<center><h2 style='color:red;'>*****All Bills*****</center></h2>
<center>
<div class="wrapper" style="background-color:white; height:500px;">

	
	  <?php

       	$con1 = mysqli_connect("localhost", "root", "");
	    $db_selected = mysqli_select_db($con1,"cateringdb");	

	    $sql = "select distinct billid,billing.bdate as bdate,billing.bookingid as bid from customer,billing,booking where billing.bookingid=booking.bookingid";

        $records = mysqli_query($con1,$sql);
echo"<table>";
        while($data = mysqli_fetch_array($records))
        {
       echo "<tr><td><a target ='_blank' style='margin-left:90;font-size:20px; color:white;border-bottom: solid 1px blue;' href='showallbill.php?billid=$data[billid]&bid=$data[bid]'><b>Bill No:$data[billid], Date:$data[bdate]</b> </a><br><br><br></td><td><a style='background-color:red; margin-top:-30;'href='deletebill.php?billid2=$data[billid]&bid=$data[bid]'>Delete</a></td></tr>";  
        }	
	echo"</table>";
    ?>  
	
	
</div>		
</center
</body>
</html>