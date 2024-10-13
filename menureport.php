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


$con = mysqli_connect("localhost", "root", "","cateringdb");

echo"<center><h2 style='color:red;'>Menus</center></h2>";
 $sql = " select mid,menutypename,menuname,rate,description from menu,menutype where menutype.mtid=menu.mtid";
 $rec = mysqli_query($con,$sql);
 
echo"<table class='report' border='2'><tr><th>Menu ID</th><th>Menu Type</th><th>Menu Name</th><th>Rate</th><th>Description</th></tr>";

 while($row = mysqli_fetch_array($rec))
 {
	 echo"<tr><td>$row[mid]</td><td>$row[menutypename]</td><td>$row[menuname]</td><td>$row[rate]</td><td>$row[description]</td></tr>";
  }
echo"<table>";

echo"<center><input type='submit' name='print' id='print' style='font-size:25px' value='print' onclick='window.print();'</center>";

?>
</html>

