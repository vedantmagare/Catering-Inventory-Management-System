<?php
if(!isset($_SESSION))
{
    session_start();
}
//$q = $_SESSION['bookingid'];
echo"hello";
/*$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	
	$sql = "select bookingdetail.mid,menuname,rate,quantity from menu,bookingdetail where menu.mid=bookingdetail.mid and bookingid=$q";
	
	$result = mysqli_query($con,$sql);
	echo"Hi";
	echo"<div id='popup-window'>";
	echo"</div>";
							
	echo"<table border='1' width='500' height='200'>";
	echo"<tr><th>Service</th><th>Rate</th><th>Quantity</th><th>Amount</th></tr>";
	$total=0;	
	while($rowval = mysqli_fetch_array($result))
	{
		
		echo"<tr>";
			echo"<td>$rowval[menuname]</td>";
			echo"<td>$rowval[rate]</td>";
			echo"<td>$rowval[quantity]</td>";
			$amount=$rowval['rate']*$rowval['quantity'];
			echo"<td>".$amount."</td>";
			echo"<td><a style='background:red; color:black;' href='book3.php?mid=$rowval[mid]&bookingid=$q'>Delete</a></td>";
		echo"</tr>";
		$total=$total+$amount;
	}
	echo"<tr><td colspan='3'><center>Total</center></td><td>$total</td></tr>";
	echo"<a class='close' href='book2.php' style='position: absolute; top: 550px; right: 20px; transition: all 200ms;
                      font-size: 15px; font-weight: bold; text-decoration: none; background: black; color:red'>OK</a>";
	echo"<a class='close' href='book3.php?confirmid=$q&amount=$total' style='position: absolute; top: 550px; right: 100px; transition: all 200ms;
                      font-size: 15px; font-weight: bold; text-decoration: none; background: green; color:black'>Confirm</a>";
*/
?>
</body>
</html>
