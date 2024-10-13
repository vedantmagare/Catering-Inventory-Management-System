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
     
?>
<html>
<head>
<title>View Image Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="imagestyle.css">
    <style>
        body{
		//	background-color:white;
		}
div.gallery {
  margin-left: 150px;
  margin-top:50px;
  border: 1px solid white;
  float: left;
  width: 200px;
}

div.gallery:hover {
  border: 1px solid pink;
  -webkit-transform: scale(3.5);

     position:fixed;
    left: 35%;
    top: 30%;
	
}

div.gallery img {
  width: 150px;
  height: 150px;
  
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>

</head>
<body>
  
  
 
<?php

      $con1 = mysqli_connect("localhost", "root", "");
      $db_selected = mysqli_select_db($con1,"cateringdb");	
      $sql = " select menuname,iname from image,menu where menu.mid=image.mid";
    
  $recs = mysqli_query($con1,$sql);
	  while($data = mysqli_fetch_array($recs))
          {
		$image=$data['iname'];
		echo"<div class='gallery'>";
		echo"<a target='_blank' href='uploads/$image'>";
		echo"<img class='mySlides1' id='mySlides1' src='uploads/$image'  width='600' height='400'/></a>";
		echo"<div class='desc'><span style='font-size:20px;color:white;'>$data[menuname]</span></div>";
		echo"</div>";
 	  }
mysqli_close($con1);
?>



</body>
</html>

 