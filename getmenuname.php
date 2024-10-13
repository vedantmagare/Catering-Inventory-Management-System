<?php
$q = $_GET['mtid'];
$con = mysqli_connect('localhost','root','','cateringdb');
if (!$con) 
{
    die('Could not connect: ' . mysqli_error($con));
}



 
$sql="SELECT mid,menuname FROM menu WHERE mtid =$q";
$result = mysqli_query($con,$sql);
$sname="";
while($data = mysqli_fetch_array($result)) 
{
	$sname=$data['menuname'];
  
  
}
echo$sname."#";
mysqli_close($con);
?>
</body>
</html>
