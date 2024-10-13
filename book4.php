<head>
	<title>Event Management System</title>
	<style>

		body 
		{
			font-family: Arial, sans-serif;

			background-image: url("usercss/image/event.jpg");
			background-repeat: no-repeat;
			background-size: 1600px 775px;
		}
		form {
			margin: 20px auto;
			width: 60%;
			font-family: Arial, sans-serif ;
			border: 1px solid #ccc;
			padding: 20px;
			border-radius: 10px;
			height: 400px;
			
			color:white;
			background-color: #284942	;
		}
</style>
</head>
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
$userid=$_SESSION['userid'];
$billid=$_GET['billid'];
$bookingid=$_SESSION['bookingid'];

	$bdate=date("Y-m-d");
	$con1 = mysqli_connect("localhost", "root", "");
	$db_selected = mysqli_select_db($con1,"eventdb");	

	$sql = "select custname,custmob from customer where userid=$userid";
	$result = mysqli_query($con1,$sql);
	while($rowval = mysqli_fetch_array($result))
	{
		 $custname= $rowval['custname'];
		 $mob=$rowval['mob'];
	}
	
	$con2 = mysqli_connect("localhost", "root", "");
	$db_selected = mysqli_select_db($con2,"eventdb");	

	$sql = "select venue,description,fdate from  booking,billing where billing.bookingid=booking.bookingid and billing.bookingid=$bookingid and billid=$billid";
	$result = mysqli_query($con2,$sql);
	while($rowval = mysqli_fetch_array($result))
	{
		 $venue= $rowval['venue'];
		 $description=$rowval['description'];
		 $fdate= $rowval['fdate'];
	}
	
	mysqli_close($con1);
	
?>
<form>
<div id="myDiv" name="myDiv" style="color: red;border: 3px solid black;margin-right:400px; margin-left:400px ;margin-top:20px">
   <center>   
   <table border="1" width="700" height="300" >
	
	<b><caption>Bill</caption></b>
	<tr><td colspan="2" style='text-align: right;'>Date:<?php echo$bdate;?></td><tr>	
	<tr><td colspan="2">Customer Name:<?php echo$custname;?></td><tr>	
	<tr><td colspan="2">Customer Mobile:<?php echo$mob;?></td><tr>
	<tr><td colspan="2">Venue:<?php echo$venue;?></td><tr>	
	<tr><td style='text-align:center;'>Function Date</td><td style='text-align:center;'><?php echo$fdate;?></td><tr>
	
   </table>
<input id="book" type="submit" name="order" value="Print Bill" onclick="window.print();"></center>
</div>
</form>