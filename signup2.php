<?php

$uname=$_POST['Username'];
$pass=$_POST['Password'];
$custname=$_POST['custname'];
$custaddr=$_POST['custaddr'];
$custstate=$_POST['custstate'];
$custpin=$_POST['custpin'];
$custmob=$_POST['custmob'];
$custemailid=$_POST['custemailid'];


$server_name='localhost';
$username='root';
$password='';
$database_name='cateringdb';

$con=mysqli_connect($server_name,$username,$password,$database_name);

if (!$con)
	{
  		die('Could not connect: '. mysqli_connect_error());
  	}

$chkuser="select * from customer where username='$uname'";

$result = mysqli_query($con, $chkuser);
if($result)
{
	if (mysqli_num_rows($result)>0)
	{
		echo ("<script LANGUAGE='JavaScript'>
			 window.alert('User already exist. Please enter another user name');
			  window.location.href='signup1.php';
			   </script>");	
	}
	else
	{
		$sql = "insert into customer (username , password, custname, custaddr, custstate, custpin, custmob, custemailid) 
		values('$uname','$pass','$custname','$custaddr', '$custstate', '$custpin', '$custmob', '$custemailid')";
//echo $sql;die;

		if(mysqli_query($con,$sql))
		{
		   echo ("<script LANGUAGE='JavaScript'>
			 window.alert('Registered Successfully. Please Enter to Login');
			  window.location.href='login1.php';
			   </script>");
		} 
		else
		{
				echo "ERROR: Could not able to execute $sql. " . mysqli_connect_error($con);
		}
	}
}
else
{
	echo "ERROR: Could not able to execute $sql. " . mysqli_connect_error($con);
}
mysqli_close($con);
?>
