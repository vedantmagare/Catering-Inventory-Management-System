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

<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Event Management System</title>
        <style>
		body {
			font-family: Arial, sans-serif;

			  background-image: url("catering1.jpg");
			background-repeat: no-repeat;
			background-size: 1700px 775px;
		}
            td{color:black;font-size:x-large}
        </style>

</head>
<body>
<div class="content">
    </br></br>
    <table style="background-color:cyan" width="100%">
    <tr><td>&nbsp;</td></tr>
    <tr><td colspan="3"><h2>Contact Us</h2></td></tr>
    
        <tr><td>
                &#9993;&nbsp;&nbsp;Address:</br></br>Gala Caterers Pvt. Ltd., ABB Building No. 5 Tower B,</br>ABB Circle, DLF Phase2,Sector 25, Satpur,</br> 
                Nashik 422002, India, </br></br>&#9990:&nbsp;&nbsp;0253272344</br>
                &#9742:&nbsp;&nbsp;0253272345</br></br>
		&#9993:&nbsp;&nbsp;www.gala.com</br></br>
                &#9993;&nbsp;&nbsp;gala@gmail.com
        </td></tr>
    </table>
</div>
<footer>
<?php include("footer.php");
?>
</footer>
</body>
</html>

