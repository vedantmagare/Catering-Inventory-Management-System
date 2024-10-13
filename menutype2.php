<?php
//delete
if(isset($_POST['delete']))
{
	$menutype=$_POST['menutype'];
	
	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	$sql = "delete from menutype where menutypename='$menutype'";
	if(mysqli_query($con,$sql))
	{
	   echo ("<script LANGUAGE='JavaScript'>
  	   window.alert('Succesfully deleted');
   	   window.location.href='menutype1.php';
    	   </script>");
	} 
	else
	{
    		 echo ("<script LANGUAGE='JavaScript'>
				window.alert('Record not found');
				window.location.href='menutype1.php';
    	   </script>");
	}
	mysqli_close($con);
}


if(isset($_POST['update']))
{
	$mtid=$_POST['mtid'];
	$menutype=$_POST['menutype'];
	
	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	$sql = "update menutype set menutypename='$menutype'where mtid='$mtid'";
	
	if(mysqli_query($con,$sql))
	{
	   echo ("<script LANGUAGE='JavaScript'>
  	   window.alert('Succesfully updated');
   	   window.location.href='menutype1.php';
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
	$menutype=$_POST['menutype'];
		
	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	$sql = "select * from menutype where menutypename like '%$menutype%'";
	//echo $sql;
	//die;


	$result = mysqli_query($con,$sql);

	$flag=0;

	while($rowval = mysqli_fetch_array($result))
	{
		$flag=1;
		$mtid=$rowval['mtid'];
		$menutype=$rowval['menutypename'];
	
	}
	
?>

<?php
	if($flag==1)
	{
	
       echo("<script LANGUAGE='JavaScript'>
 	window.location.href='menutype1.php?mtid=$mtid&menutype=$menutype';</script>");
	}
	if($flag==0)
	{
	   echo ("<script LANGUAGE='JavaScript'>
  	   window.alert('Record not found');
   	   window.location.href='menutype1.php';
    	   </script>");

	}
	mysqli_close($con);
	
	
}

if (isset($_POST['save']))
{
	$menutype=$_POST['menutype'];
	
	
   
	


	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	$sql1 = "select * from menutype where menutypename like '%$menutype%'";
	//echo $sql;
	//die;


	$result = mysqli_query($con,$sql1);
	
	$rowcount = mysqli_num_rows( $result );
	if($rowcount>0)
	{
			  echo ("<script LANGUAGE='JavaScript'>
  	   window.alert(' Menu Type already present');
   	   window.location.href='menutype1.php';
    	   </script>");
	}
	else
	{
		$sql = "insert into menutype(menutypename) values('$menutype')";
		if(mysqli_query($con,$sql))
		{
			  echo ("<script LANGUAGE='JavaScript'>
				window.alert('service added successfully');
				window.location.href='menutype1.php';
    	   </script>");
		}
	}
	

?>

<?php

	mysqli_close($con);
}


?>