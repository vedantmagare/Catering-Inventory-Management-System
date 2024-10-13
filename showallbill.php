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
<head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
 position: fixed;
			width: 900px;
			height: 750px;
			background: white;
			color:black;
			font-size:15x;
			border: 1px solid black;
			//padding: 10px;
			margin: auto;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			z-index: 10;
			display: none;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
    margin-left:100px;
  marging-top:200px;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;

  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
  
}
hr,h1{
    width: 320%;
    margin-left: -40%;
}
.d {
    width: 350%;
    margin-left: -40%;
}
table.d1{
    width: 300%;
    margin-left: -30%;
	font-size:22px;
	font-weight:bold;
}
img {
    
    margin-left: 110%;
}
</style>
</head>
<body onload="openForm()">

<?php

$billid=$_GET['billid'];
$bookingid=$_GET['bid'];
$bdate=date("Y-m-d");

	
	$con2 = mysqli_connect("localhost", "root", "");
	$db_selected = mysqli_select_db($con2,"cateringdb");	

	$sql = "select venue,description,custname,custmob from  customer,booking,billing,bookingdetail where customer.userid=booking.userid and billing.bookingid=bookingdetail.bookingid and billing.bookingid=booking.bookingid and billing.bookingid=$bookingid and billid=$billid";
	$result = mysqli_query($con2,$sql);
	while($rowval = mysqli_fetch_array($result))
	{
		 $venue= $rowval['venue'];
		 $description=$rowval['description'];
		 $custname= $rowval['custname'];
		 $mob=$rowval['custmob'];
	}
	$bdate=date("Y-m-d");
	mysqli_close($con1);
	?>
	<?php
	$con3 = mysqli_connect("localhost", "root", "");
	if (!$con3)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con3,"cateringdb");
	
	$sql = " select billing.bookingid,fdesc,fdate,bookingdetail.mid,menuname,rate,quantity,amount,taxamount,totalamount from menu,bookingdetail,billing,booking where billid=$billid and menu.mid=bookingdetail.mid and bookingdetail.bookingid=billing.bookingid and booking.bookingid=bookingdetail.bookingid;";
	
	$result1 = mysqli_query($con3,$sql);
	
	?>
	
	<div class="form-popup" id="myForm">
  <form action="" class="form-container">
<div class="d"><b><span style="margin-left: 1%;font-size:22px; width: 700%;"><?php echo "Bill Number:$billid";?></span></b><b><span style="margin-left: 550;font-size:22px; "><?php echo $bdate?></span></b></div>
    <center><h1 style='color:blue;'>Receipt</h1>
   
	<img width='50' height='50' src="logo.jpg"></center><br>
	<hr>
	<table width="700">
		<tr><td><span  style="margin-left: -20%;font-size:22px;"><b>Customer Name:<?php echo$custname;?></b></span></td> <td><span  style="margin-left: 15%;font-size:22px;"><b>Mobile:<?php echo$mob;?></b></span></td></tr>
		<tr><td><span  style="margin-left: -20%;font-size:22px;"><b>Venue:<?php echo$venue;?></b></span></td> </tr>
		<tr><td><span  style="margin-left: -20%;font-size:22px;"><b>Description:<?php echo$description;?></b></span></td> </tr>
	</table>
	<hr>
	<table width="700" class="d1" border="1">
	<?php 
	$counter=1;
	echo"<tr style='color:blue;'><td>Sr.No. </td><td>Function Date </td> <td>Function </td>  <td>Service</td> <td> Rate </td><td> Quantity </td><td>   Amount </td></tr>";
	$total=0;	
	while($rowval = mysqli_fetch_array($result1))
	{
		$amount=$rowval["rate"]*$rowval["quantity"];
		$total=$total+$amount;
		echo"<tr><td>$counter </td><td>$rowval[fdate] </td><td>$rowval[fdesc] </td><td>$rowval[menuname] </td><td> $rowval[rate] </td><td> $rowval[quantity] </td><td>  $amount </td></tr>";
		$taxamount=$rowval["taxamount"];
		$totalamount=$rowval["totalamount"];

		
		$counter++;
	
	}
	echo"<tr><td  colspan='6' style='color:blue;text-align:right'>Total</td><td>$total</td></tr>";
	echo"<tr><td  colspan='6' style='color:blue;text-align:right'>Tax(15%)</td><td>$taxamount</td></tr>";
	echo"<tr><td  colspan='6' style='color:blue;text-align:right'>Amount to be paid</td><td>$totalamount</td></tr>";
	/*echo"<tr><td colspan='3'><center>Total</center></td><td>$total</td></tr>";*/
	echo"<a class='close' href='allbill.php' style='position: absolute; top: 690px; right: 130px; transition: all 200ms;
                      font-size: 20px; font-weight: bold; text-decoration: none; background: black; color:blue'>Close</a>";
	echo"<a onclick='window.print();' value='Print' style='padding-top:12;text-align:center;width:90;height:49;position: absolute; top: 690px; right: 30px; transition: all 200ms;
                      font-size: 20px;  font-weight: bold; text-decoration: none; background: black; color:blue'>Print</a>";
					  
	 
?>
	</table>
  </form>
</div>
		
							
	</div>
</body>
</html>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
   