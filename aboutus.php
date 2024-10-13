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
            p{color:white;}

.content
{
	font-size:20;
	color:black;
}

        </style>

</head>
<body>
<div class="content">
    </br></br>
    <p style="text-align:justify; color:white; font-size:25px;">
Need some great food for a Birthday Party, House Party, Sales Call, Office Event, or Team Meeting?
Gala is the simplest way to find and order food from rated and reputed chefs, caterers and restaurants.

</p>
<p style="text-align:justify; color:white; font-size:25px;">
We pride ourselves on creating unique menus to accommodate every special event.

<p style="text-align:justify; color:white; font-size:25px;">
Looking for a perfect food affair to complement your special occasion? Look no further! Gala Caterers provide a sumptuous food itinerary to fulfill your each and every catering need. Be it a large, mid or small sized event, our full-range of outdoor and indoor catering services cover complete food preparation and presentation for formal and informal gatherings.

    </p>
	<p style="text-align:justify; color:white; font-size:25px;">

From an array of food items to choose from, Gala Caterers bring to you the best from all cuisines to suit your event, tastes and pockets even. So while you leave your food worries to us, we let you enjoy those special moments in all the glory. So let the celebrations begin!!
    </p>
	
	<p style="text-align:justify; color:white; font-size:25px;">
Gala Caterers serve you the best with the best to serve. From birthday parties, corporate seminars to weddings and related functions, we give you a range of food items to choose for your occasion.


    </p>
    <table width="100%">
        <tr>
            <td> <img src="catering.jpg" style="width:100%" height="160"></td>
        </tr>
       
    </table>
</div>
<footer>
<?php include("footer.php");
?>
</footer>
</body>
</html>

