<!DOCTYPE html>
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
<html>
<head>
	<title>Catering Management System</title>
	<style>
	
	body {
			font-family: Arial, sans-serif;

			  background-image: url("catering1.jpg");
			background-repeat: no-repeat;
			background-size: 1700px 775px;
		}
		
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		label {
			display: block;
			margin-bottom: 10px;
		}
		input[type="text"], input[type="password"],[type="date"]{
				  padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 95%;
				  margin-left: 20px;
}
		#custname  {
				  padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 95%;
				  margin-left: 20px;
		}
		
	
		.add{
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			margin-top: 10px;
			margin-left:330px;
			margin-bottom: 20px;
			font-size: 16px;
		}
		.add:hover {
			background-color: #3e8e41;
		}
		
	
		form {
			margin: 20px auto;
			width: 60%;
			font-family: Arial, sans-serif ;
			border: 1px solid #ccc;
			padding: 20px;
			border-radius: 10px;
			height: 400px;
			
			color:white;
			background-color: #284942	;
		}
			form:hover {
				  transition: all 2s ease-in-out;
			filter: drop-shadow(2px 4px 4px gray);
		}
		label {
			display: block;
			margin-bottom: 10px;
		}
		.upd{
			background-color: darkcyan;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			margin-top: 10px;
			margin-bottom: 20px;
			font-size: 16px;
		}
		.upd:hover {
			background-color: cyan;
			color: black;
		}
		.del{
			background-color: maroon;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			margin-top: 10px;
			margin-bottom: 20px;
			font-size: 16px;
		}
		.del:hover {
			background-color: red;
		}
		.fdate{
				  padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 95%;
				  margin-left: 20px;
		}
	</style>
</head>
<body>

<br>
<?php
	$userid=$_SESSION["userid"];	
	if(empty($userid))
	{
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('First you have to login');
		window.location.href='login1.php';
    	   	</script>");
	}
	$con1 = mysqli_connect("localhost", "root", "");
	$db_selected = mysqli_select_db($con1,"cateringdb");	

	$sql = "select * from customer where userid=$userid";
	$result = mysqli_query($con1,$sql);
	while($rowval = mysqli_fetch_array($result))
	{
		 $custname= $rowval['custname'];
		 
	}
	
	$count=0;
	$con1 = mysqli_connect("localhost", "root", "");
	$db_selected = mysqli_select_db($con1,"cateringdb");	

	$sql = "select max(bookingid) from booking";
	$result = mysqli_query($con1,$sql);
	while($rowval = mysqli_fetch_array($result))
	{
		 $count= $rowval['max(bookingid)'];		
		 $count++;
	}
	$_SESSION["bookingid"]=$count;
	mysqli_close($con1);
?>
			
	<form method="post" action="book2.php">
	<input type="hidden" id="bookingid" name="bookingid" value="<?php echo $count;?>">
		<label for="custname">Customer Name</label>
		<input type="text" id="custname" name="custname" value="<?php echo$custname?>" readonly>

		<input type="hidden" name="userid" value="<?php echo$userid;?>">
		
		<label for="venue">Venue </label>
		<input type="text" id="venue" name="venue" autocomplete="off" required>

		<label for="description">Description</label>
		<input type="text" id="description" name="description" autocomplete="off" required>
		
		
	    
		
	   <input class="add" type="submit" value="Next" name="save" onclick=" return checkempty()">
 
	</form>
	<footer>
<?php include("footer.php");
?>
</footer>
</body>
</html>
<?php
if(isset($_GET['servicename']))
{
	
$serviceid=$_GET['serviceid'];
$servicename=$_GET['servicename'];
$description=$_GET['description'];
$rate=$_GET['rate'];
?>
<script LANGUAGE='JavaScript'>  
var serviceid = '<?php echo $serviceid; ?>';
var servicename = '<?php echo $servicename; ?>';
var description = '<?php echo $description; ?>';
var rate = '<?php echo $rate; ?>';	


document.getElementById('serviceid').value=serviceid;	
document.getElementById('servicename').value=servicename;	
document.getElementById('description').value=description;	
document.getElementById('rate').value=rate;	
</script>
<?php
}
?>

<script>
function checkempty()
	{
	
 	   var servicename=document.getElementById('servicename').value;	
 	   var description=document.getElementById('description').value;	
 	  	   var rate=document.getElementById('rate').value;	
 	 
		
		
	   if (servicename === "")
             {
                   alert ( "Please enter Service Name." );
                  return false;
             }    
		if (description === "")
             {
                   alert ( "Please enter Description." );
                  return false;
             }   
		if (rate === "")
             {
                   alert ( "Please enter Rate." );
                  return false;
             }   
	}
	

function validateitemid()
        {
           
            var serviceid=document.getElementById('servicename').value;
             if (serviceid === "")
             {
                   alert ( "Please enter valid service." );
                   return false;
             }
	
	}
</script>
<script>
function getdata(str)
 {

	if (window.XMLHttpRequest)
	{
            // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
     	} 
	else
	{
          	// code for IE6, IE5
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       	}
        xmlhttp.onreadystatechange = function() 
	{
           if (this.readyState == 4 && this.status == 200) 
	   {
     //  document.getElementById("servicedetailname").value = this.responseText;
		const myArray = this.responseText.split("#")
       document.getElementById("servicedetailname").value = myArray[0];
	   document.getElementById("rate").value="";
	   document.getElementById("description").value="";
	   var s1=myArray[0].toLowerCase();
		if(s1=='catering')
				document.getElementById("ratediv").innerHTML = "per plate";
		else
		{
				document.getElementById("ratediv").innerHTML = " ";
		}
        }
		
		
        };

      	xmlhttp.open("GET","getservicename.php?serviceid="+str,true);
	
       	xmlhttp.send();
		getavailable(str);
}

</script>
<script>
function getavailable(str)
 {

	if (window.XMLHttpRequest)
	{
            // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
     	} 
	else
	{
          	// code for IE6, IE5
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}	
        xmlhttp.onreadystatechange = function() 
	   {
           if (this.readyState == 4 && this.status == 200) 
	       {
			  
              document.getElementById("availableservice").innerHTML = this.responseText;		
			}
		};
      	xmlhttp.open("GET","getavailableservices.php?serviceid="+str,true);
	
       	xmlhttp.send();
	 
	
}


function getDetails(str)
 {

	if (window.XMLHttpRequest)
	{
            // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
     	} 
	else
	{
          	// code for IE6, IE5
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       	}
        xmlhttp.onreadystatechange = function() 
	    {
        if (this.readyState == 4 && this.status == 200) 
	    {
     //  document.getElementById("servicedetailname").value = this.responseText;
		     const myArray = this.responseText.split(",");
             document.getElementById("servicedetailname").value = myArray[0];
			 document.getElementById("description").value = myArray[1];
			 document.getElementById("rate").value = myArray[2];
	
        }	
        };

      	xmlhttp.open("GET","getservicedetail.php?sdid="+str,true);
	
       	xmlhttp.send();
		getavailable(str);
}


</script>
