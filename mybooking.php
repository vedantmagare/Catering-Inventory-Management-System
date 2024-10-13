<?php
if(!isset($_SESSION))
{
    session_start();	
}
if(isset($_SESSION['userid']))
{
	include("customermenulogout.php");
}
else if(!isset($_SESSION['uname']))
{
	include("customermenulogin.php");
}

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

			  background-image: url("catering1.jpg");
			background-repeat: no-repeat;
			background-size: 1700px 775px;
		}
	a {
  
  display: block;
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

<center><h2 style='color:red;'>*****My Bookings*****</center></h2>
<center>
<div class="wrapper" style="background-color:white; height:500px;">

	
	  <?php
	  $userid=$_SESSION['userid'];
       	$con1 = mysqli_connect("localhost", "root", "");
	    $db_selected = mysqli_select_db($con1,"cateringdb");	

	    $sql = "select distinct billid,billing.bdate as bdate,billing.bookingid as bid from customer,billing,booking where billing.bookingid=booking.bookingid and booking.userid=$userid";

        $records = mysqli_query($con1,$sql);
		$rowcount = mysqli_num_rows( $records );
		if($rowcount>0)
		{
        while($data = mysqli_fetch_array($records))
        {
       echo "<a target ='_blank' style='font-size:20px; color:white;border-bottom: solid 1px blue;' href='showbill.php?billid=$data[billid]&bid=$data[bid]'><b>Bill No:$data[billid], Date:$data[bdate]</b> </a><br><br><br>";  
        }	
		}
		else
		{
	echo"<center><h2 style='color:red;'>*****Nothing in booking*****</center></h2>";

		}
    ?>  
	
	
</div>		
</center
</body>
</html>