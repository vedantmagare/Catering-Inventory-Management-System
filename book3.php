<?php
if(!isset($_SESSION))
{
    session_start();
}
$con1 = mysqli_connect("localhost", "root", "");
	$db_selected = mysqli_select_db($con1,"cateringdb");	

	$sql = "select max(bdid) from bookingdetail";
	$result = mysqli_query($con1,$sql);
	while($rowval = mysqli_fetch_array($result))
	{
		 $count= $rowval['max(bdid)'];
		 $count++;
	}	
//delete
if(isset($_GET['mid']))
{
	$bookingid=$_GET['bookingid'];
	$mid=$_GET['mid'];
	
	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	$sql = "delete from bookingdetail where bookingid=$bookingid and mid=$mid";
	if(mysqli_query($con,$sql))
	{
	   echo ("<script LANGUAGE='JavaScript'>
  	   window.alert('Succesfully deleted');
   	   window.location.href='book2.php';
    	   </script>");
	} 
	else
	{
    		 echo ("<script LANGUAGE='JavaScript'>
				window.alert('Record not found');
				window.location.href='book2.php';
    	   </script>");
	}
	mysqli_close($con);
}

if(isset($_GET['confirmid']))
{
	$bookingid=$_GET['confirmid'];
	$amount=$_GET['amount'];
	$taxamount=$amount*0.15;
	$totalamount=$amount+$taxamount;
	$bdate=date("Y-m-d");
	

	$con1 = mysqli_connect("localhost", "root", "");
	$db_selected = mysqli_select_db($con1,"cateringdb");	

	$sql = "select max(billid) from billing";
	$result = mysqli_query($con1,$sql);
	while($rowval = mysqli_fetch_array($result))
	{
		 $billid= $rowval['max(billid)'];
		 $billid++;
	}	
	

	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	
	
		$sql = "insert into billing(billid,bookingid,amount,taxamount,totalamount,bdate) values($billid,$bookingid,$amount,$taxamount,$totalamount,'$bdate')";
		if(mysqli_query($con,$sql))
		{
			  echo ("<script LANGUAGE='JavaScript'>
  	   window.alert('Confirmed booking and print order');
   	   window.location.href='receipt.php?billid=$billid';
    	   </script>");
		}
	

	mysqli_close($con);
}

if (isset($_POST['save']))
{
	
	$mid=$_POST['mid'];
	$bookingid=$_POST['bookingid'];
	$fdate=$_POST['fdate'];
	$fdesc=$_POST['fdesc'];
	$quantity=$_POST['quantity'];	
   $bookingid=$_SESSION['bookingid'];
	
	$con1 = mysqli_connect("localhost", "root", "");
	$db_selected = mysqli_select_db($con1,"cateringdb");	

	$sql = "select max(bdid) from bookingdetail";
	$result = mysqli_query($con1,$sql);
	while($rowval = mysqli_fetch_array($result))
	{
		 $bdid= $rowval['max(bdid)'];
		 $bdid++;
	}	
	


	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	
	$sql1 = "select * from bookingdetail where mid=$mid and bookingid=$bookingid";
	//echo $sql;
	//die;


	$result = mysqli_query($con,$sql1);
	
	$rowcount = mysqli_num_rows( $result );
	if($rowcount>0)
	{
			  echo ("<script LANGUAGE='JavaScript'>
  	   window.alert(' Menu already present');
   	   window.location.href='book2.php';
    	   </script>");
	}
	else
	{
		$sql = "insert into bookingdetail(bdid,bookingid,fdate,fdesc,mid,quantity) values($bdid,$bookingid,'$fdate','$fdesc',$mid,$quantity)";
		if(mysqli_query($con,$sql))
		{
			  echo ("<script LANGUAGE='JavaScript'>
  	   window.alert('Menu added successfully');
   	   window.location.href='book2.php';
    	   </script>");
		}
	}

	mysqli_close($con);
}


?>