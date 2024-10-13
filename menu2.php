<?php
//delete
if(isset($_POST['delete']))
{
	
	$menuname=$_POST['menuname'];
	
	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	$sql = "delete from menu where menuname='$menuname'";
	if(mysqli_query($con,$sql))
	{
	   echo ("<script LANGUAGE='JavaScript'>
  	   window.alert('Succesfully deleted');
   	   window.location.href='menu1.php';
    	   </script>");
	} 
	else
	{
    		 echo ("<script LANGUAGE='JavaScript'>
				window.alert('Record not found');
				window.location.href='menu1.php';
    	   </script>");
	}
	mysqli_close($con);
}


if(isset($_POST['update']))
{
	$mid=$_POST['mid'];
	$menuname=$_POST['menuname'];
	$description=$_POST['description'];
	$rate=$_POST['rate'];
	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	$sql = "update menu set menuname='$menuname',description='$description',rate=$rate where mid='$mid'";
	
	if(mysqli_query($con,$sql))
	{
	   echo ("<script LANGUAGE='JavaScript'>
  	   window.alert('Succesfully updated');
   	   window.location.href='menu1.php';
    	   </script>");
	} 
	else
	{
    		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}
	mysqli_close($con);
}
if(isset($_POST['search']))
{
	$servicename=$_POST['servicename'];
		
	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"eventdb");
	$sql = "select * from service where servicename like '%$servicename%'";
	//echo $sql;
	//die;


	$result = mysqli_query($con,$sql);

	$flag=0;

	while($rowval = mysqli_fetch_array($result))
	{
		$flag=1;
		$serviceid=$rowval['serviceid'];
		$servicename=$rowval['servicename'];
		$description= $rowval['description'];
		$rate=$rowval['rate'];
	}
	
?>

<?php
	if($flag==1)
	{
	
       echo("<script LANGUAGE='JavaScript'>
 	window.location.href='service1.php?serviceid=$serviceid&servicename=$servicename&description=$description&rate=$rate';</script>");
	}
	if($flag==0)
	{
	   echo ("<script LANGUAGE='JavaScript'>
  	   window.alert('Record not found');
   	   window.location.href='service1.php';
    	   </script>");

	}
	mysqli_close($con);
	
	
}

if (isset($_POST['save']))
{
	$mtid=$_POST['menutype'];
	$menuname=$_POST['menuname'];
	
	$description=$_POST['description'];
   
	$rate=$_POST['rate'];
   
	


	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	
	$sql1 = "select * from menu where menuname like '%$menuname%'";
	

	$result = mysqli_query($con,$sql1);
	
	$rowcount = mysqli_num_rows( $result );
	if($rowcount>0)
	{
			  echo ("<script LANGUAGE='JavaScript'>
  	   window.alert('Menu already present');
   	   window.location.href='menu1.php';
    	   </script>");
	}
	else
	{
		$sql = "insert into menu(mtid,menuname,description,rate) values($mtid,'$menuname','$description',$rate)";
		if(mysqli_query($con,$sql))
		{
			  echo ("<script LANGUAGE='JavaScript'>
  	   window.alert('service added successfully');
   	   window.location.href='menu1.php';
    	   </script>");
		}
	}
?>

<?php

	mysqli_close($con);
}


?>