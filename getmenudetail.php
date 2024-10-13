<?php
$q = $_GET['mid'];
$con = mysqli_connect('localhost','root','','cateringdb');
if (!$con) 
{
    die('Could not connect: ' . mysqli_error($con));
}


$sql="SELECT mtid,menuname,description,rate FROM menu WHERE mid =$q";
$result = mysqli_query($con,$sql);
$sname="";
while($data = mysqli_fetch_array($result)) 
{
	$sdname=$data['menuname'];
  $description=$data['description'];
  $rate=$data['rate'];
  $mid=$q;
}
echo$sdname."#".$description."#".$rate."#".$mid."#";
mysqli_close($con);
?>
</body>
</html>
