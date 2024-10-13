<!DOCTYPE html>
<?php
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_SESSION['userid']))
{
	include("clientmenulogout.php");
}
else if(!isset($_SESSION['uname']))
{
	include("clientmenulogin.php");
}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Event Management </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="usercss/style56.css">
	
	
<style>
a.two:link {color:#ff0000;}
a.two:visited {color:#0000ff;}
a.two:hover {font-size:150%;}
</style>


</head> 	
<body>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<section>
	
 <a href="#" class="two" ><b>Catering</b></a>  

</section>
<footer>
<?php include("footer.php");
?>
</footer>
</body>
</html>