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
th.cid, th.cname, th.address,th.cno,th.ano,th.uname,th.pass{
  width: 11%;
}
td{color:black;}

#print
{
background: black;
color: white;
width:100px;
height:50px;
}

body {font-family: Arial, Helvetica, sans-serif;
color:black;
background-color:white;
}
th.email{
  width: 23%; /* Not necessary, since only 70% width remains */

}
</style>
<?php


$con = mysqli_connect("localhost", "root", "","cateringdb");

echo"<center><h2 style='color:red;'>*****Customer*****</center></h2>";
 $sql = " select * from customer";
 $rec = mysqli_query($con,$sql);
 
echo"<table class='report' border='2'><tr><th class='cid'>User ID</th><th class='cname'>Name</th><th class='address'>Address</th><th class='address'>State</th><th class='address'>Pin Code</th><th class='cno'>Contact NO</th><th class='uname'>username</th><th class='pass'>Password</th><th class='email'>Email</th></tr>";

 while($row = mysqli_fetch_array($rec))
 {
	 echo"<tr><td>$row[userid]</td><td>$row[custname]</td><td>$row[custaddr]</td><td>$row[custstate]</td><td>$row[custpin]</td><td>$row[custmob]</td><td>$row[username]</td><td>$row[password]</td><td>$row[custemailid]</td>";
  }

echo"<table>";

echo"<center><input type='submit' name='print' id='print' value='print'style='font-size:25px' onclick='window.print();'</center>";

?>
</html>

