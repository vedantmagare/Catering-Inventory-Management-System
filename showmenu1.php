<!DOCTYPE html>
<html>
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
<head>
	<title>Event Management Admin</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			//background-image: url("usercss/image/event.jpg");
		
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		label {
			display: block;
			margin-bottom: 10px;
		}
	
		#servicename  {
				  padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 95%;
				  margin-left: 20px;
		}
		#availableservice {
				  padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 95%;
				  margin-left: 20px;
		}
		#ratediv
		{
			margin-left:40px;
			font-size:20px;
		}
		.add{
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			margin-top: 10px;
			margin-bottom: 20px;
			font-size: 16px;
		}
		.add:hover {
			background-color: #3e8e41;
		}
			h1 {				
				margin-top: 10px;
				margin-left: 550px;		
				filter: drop-shadow(2px 3px 2px maroon);
				color: white;
				width: 15%;
				padding-left: 4px;
		}
	
		form {
			margin: 20px auto;
			width: 60%;
			font-family: Arial, sans-serif ;
			border: 1px solid #ccc;
			padding: 20px;
			border-radius: 10px;
			height: 600px;
			
			color:white;
			//background-color: #284942	;
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
		img {
  border-radius: 10%;
}
	</style>
</head>
<body>


	  
<?php

echo"<center><h2 style='color:red;'>Available Menus</center></h2>";
echo"<br><center><table width='700'>";


$mtid=$_GET['mtid'];
      $con1 = mysqli_connect("localhost", "root", "");
      $db_selected = mysqli_select_db($con1,"cateringdb");	
      $sql1 = "select menuname,rate,mid,description,menutype.mtid from menu,menutype where menu.mtid=menutype.mtid and menutype.mtid=$mtid and mid in(select mid from image);";
    
 $rec1 = mysqli_query($con1,$sql1);

 $sql2 = "select menuname,rate,mid,description,menutype.mtid from menu,menutype where menu.mtid=menutype.mtid and menutype.mtid=$mtid and mid not in(select mid from image);";
    
	$rec2 = mysqli_query($con1,$sql2);
	 
	 while($data = mysqli_fetch_array($rec1))
      {
         
		$sql3="select iname from image where mid=$data[mid] limit 1";	
		$rec3 = mysqli_query($con1,$sql3);		
        $image=mysqli_fetch_array($rec3);
		
		echo"<tr><td><img src='uploads/$image[iname]' width=300 height=200></td><td><span style='font-size:30px;color:pink;'>Menu Name:$data[menuname]</span><span style='font-size:20px;color:white;'> Description:$data[description] ,Price:$data[rate]</span></td></tr>";
	
		}
         while($row2 = mysqli_fetch_array($rec2))
		{
			echo"<tr><td><img src='uploads/noimage.jpg' width=300 height=200></td><td><span style='font-size:30px;color:pink;'>Menu Name:$row2[menuname]</span><span style='font-size:20px;color:white;'> Description:$row2[description] ,Price:$row2[rate]</span></td></tr>";
		}
	
	
mysqli_close($con1);
?>
</td>

</div>


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
		const myArray = this.responseText.split(",")
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
	</form>
</body>


</footer>
</html>