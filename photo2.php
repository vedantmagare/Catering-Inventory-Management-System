
<html>
<body>
<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
{
    
    $mid=$_POST['availableservice'];
	
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) 
    {
        echo "";
        $uploadOk = 1;
    } else 
    {
        echo "<center>File is not an image.</center>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<center>Sorry, file already exists.</center>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<center>Sorry, your file is too large.</center>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<center>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</center>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<center>Sorry, your file was not uploaded.</center>";
// if everything is ok, try to upload file
} else 
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
{
        echo "<center><i><h4>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h4></i></center>";


	$con2 = mysqli_connect("localhost", "root", "");
	$db_selected = mysqli_select_db($con2,"eventdb");	

	/*$sql = "select max(imageid) from image";
	$result = mysqli_query($con2,$sql);
	while($rowval = mysqli_fetch_array($result))
	{
		 $imageid= $rowval['max(imageid)'];
		 $imageid++;
	}*/	

	  			
	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	$filename=$_FILES["fileToUpload"]["name"];

	$sql = "insert into image(mid,iname) values($mid,'$filename')";
	if(mysqli_query($con,$sql))
	{ 
    	 
	

	   echo ("<script LANGUAGE='JavaScript'>
  	   window.alert('Image Succesfully saved');
   	   window.location.href='photo1.php';
    	   </script>");
	} 
    
} 
else 
{
        echo "<center>Sorry, there was an error uploading your file.</font></center>";
    }
}
?>
</body>
</html>