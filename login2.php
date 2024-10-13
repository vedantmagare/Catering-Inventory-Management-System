<?php
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_POST['Login']))
{
	$u=$_POST['username'];
	$p=$_POST['password'];
	
	$flag=0;
	$con1 = mysqli_connect("localhost", "root", "");
	$db_selected = mysqli_select_db($con1,"cateringdb");	
	
	$sql = "select username,password from customer";
	$result = mysqli_query($con1,$sql);
	
	while($rowval = mysqli_fetch_array($result))
	{
		 $uname= $rowval['username'];
		 $password= $rowval['password'];
	
	   if($u==$uname && $p==$password)
	   {
		$flag=1;
		break;
	   }
	   else
	   {	
			$flag=0;
	   }	
		echo "<br>$flag";
	}	
	if($flag==1)
	{
		$sql1 = "select userid,custemailid,custname from customer where username='$uname' and password='$password'";
		$result1 = mysqli_query($con1,$sql1);
		while($rowval1 = mysqli_fetch_array($result1))
		{
			 $userid= $rowval1['userid'];
			 $email=$rowval1['custemailid'];
			  $custname=$rowval1['custname'];
		}	
		$_SESSION["userid"] = $userid;
		$_SESSION["username"] = $username;
			$_SESSION["uname"] = $custname;
		$_SESSION["email"] = $email;
	  	echo ("<script LANGUAGE='JavaScript'>
   	   	window.location.href='home.php';
    	   	</script>");		
	}
	else if($_POST['username']=='admin' && $_POST['password']=='admin')
	{
		echo ("<script LANGUAGE='JavaScript'>
		window.location.href='admin.php';
    	   	</script>");
		$flag=1;
	}
	else if($flag==0)
	{
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('user not found.First sign up');
   	 	window.location.href='signup1.php';
    	   	</script>");
	}
  
		
}
?>