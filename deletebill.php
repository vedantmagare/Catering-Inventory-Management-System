
<?php

	include("adminmenu.php");
	$billid=$_GET['billid2'];
    $bid=$_GET['bid'];
	
	echo"$bid and $billid";
	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	$sql1 = "delete from billing where billid=$billid";
	$sql2 = "delete from bookingdetail where bookingid=$bid";
	$sql3 = "delete from booking where bookingid=$bid";
	if(mysqli_query($con,$sql1))
	{
		if(mysqli_query($con,$sql2))
		{
			if(mysqli_query($con,$sql3))
			{
	   echo ("<script LANGUAGE='JavaScript'>
  	   window.alert('Succesfully deleted');
   	   window.location.href='allbill.php';
    	   </script>");
			}
		}
	} 
	
	mysqli_close($con);		  
	 
?>

							
