<?php
$q = $_GET['mtid'];
$con = mysqli_connect('localhost','root','','cateringdb');
if (!$con) 
{
    die('Could not connect: ' . mysqli_error($con));
}



 
$sql="SELECT mid,menuname FROM menu WHERE mtid =$q";
$result = mysqli_query($con,$sql);
echo"<select name='availablemenu' id='availablemenu'>
    <option disabled selected value=0>-- Avaialble Menus--</option>
  </select>";
while($data = mysqli_fetch_array($result)) 
{
  echo "<option value='". $data['mid'] ."'>" .$data['menuname'] ."</option>";  

  
}
mysqli_close($con);
?>
</body>
</html>
