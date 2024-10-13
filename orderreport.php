<?php
	include("adminmenu.php");
?>
<html>
<style>
 table.report {
            margin-left: auto;
            margin-right: auto;
            font-size: 20px;
            height: 20%;
            width: 80%;
            table-layout: fixed;
	    text-align:center;
        }
   body
   {
		background-color:white;
   }
   td
   {
	color:black;
   }
#print
{
background: black;
color: white;
width:100px;
height:50px;
}

</style>
<?php

$bdate=date("Y-m-d");
$con = mysqli_connect("localhost", "root", "","cateringdb");

echo"<center><h2 style='color:red;'>Menus</center></h2>";
 $sql = "  select distinct(booking.bookingid),menutypename,menuname,venue,fdate,fdesc,quantity from menu,menutype,booking,bookingdetail,billing where menutype.mtid=menu.mtid and menutype.mtid=menu.mtid and booking.bookingid=billing.bookingid and booking.bookingid=bookingdetail.bookingid and fdate>'$bdate' and menu.mid=bookingdetail.mid order by fdate";
 $rec = mysqli_query($con,$sql);
 
echo"<table class='report' border='2'><tr><th>Booking ID</th><th>Menu</th><th>Venue</th><th>Function Date</th><th> Function Description</th><th>Qunatity</th></tr>";

 while($row = mysqli_fetch_array($rec))
 {
	 echo"<tr><td>$row[bookingid]</td><td>$row[menuname]</td><td>$row[venue]</td><td>$row[fdate]</td><td>$row[fdesc]</td><td>$row[quantity]</td></tr>";
  }
echo"<table>";

echo"<center><input type='submit' name='print' id='print' value='print' onclick='window.print();' style='font-size:25px'</center>";

?>
</html>

