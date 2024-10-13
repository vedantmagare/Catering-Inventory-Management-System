<!DOCTYPE html>
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Event Management </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="usercss/style56.css">
</head> 	
<body>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<?php
	
?>
<section>
	
	<br>

		   <div>
        <img src="catering1.jpg" style=" width:100%; height: 675px; " alt="Image can not be displayed">
    </div>


</section>

<footer>
<?php include("footer.php");
?>
</footer>
</body>
</html>