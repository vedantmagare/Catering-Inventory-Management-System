<?php
	include("adminmenu.php");
?>
<html>
<head>
	<title>Event Management Admin</title>
	<style>
		body {
			font-family: Arial, sans-serif;

			  background-image: url("catering2.jpg");
			background-repeat: no-repeat;
			background-size: 1600px 775px;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		label {
			display: block;
			margin-bottom: 10px;
		}
		input[type="text"], input[type="password"]  {
				  padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 95%;
				  margin-left: 20px;
}
		#menutype  {
				  padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 95%;
				  margin-left: 20px;
		}
		#availablemenu {
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
			margin-left:250px;
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
			height: 500px;
			
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
		
	</style>
</head>
<body>
<br>
<?php
	$con1 = mysqli_connect("localhost", "root", "");
	$db_selected = mysqli_select_db($con1,"cateringdb");	

	$sql = "select max(mid) from menu";
	$result = mysqli_query($con1,$sql);
	while($rowval = mysqli_fetch_array($result))
	{
		 $count= $rowval['max(mid)'];
		 $count++;
	}	
	
?>
		<h1>Service</h1>
	
	<form method="post" action="menu2.php">

		<label for="menutype"> Menu Type</label>
		
		
		<select name="menutype" id="menutype" onchange="getavailable(this.value)">
			<option disabled selected value="0">-- Select Service --</option>
				<?php
						$con1 = mysqli_connect("localhost", "root", "");
						$db_selected = mysqli_select_db($con1,"cateringdb");	
						$sql = "select mtid,menutypename from menutype";
						$records = mysqli_query($con1,$sql);

						while($data = mysqli_fetch_array($records))
						{
       echo "<option value='". $data['mtid'] ."'>" .$data['menutypename'] ."</option>";  // displaying data in option menu
						}	
    ?>  
  </select>
		
			<label for="menu-name"> Menus Available</label>
		
		
		<select name="availablemenu" id="availablemenu" onchange="getDetails(this.value)">
			<option disabled selected value="0">-- Avaialble Services --</option>
				
  </select>
		<input type="hidden" id="mid" name="mid" value="<?php echo $count;?>" autocomplete="off">

		<label for="menuname">Menu Name</label>
		<input type="text" id="menuname" name="menuname" autocomplete="off">

	    <label for="description">Description</label>
		<input type="text" id="description" name="description" autocomplete="off">

		<label for="rate">Rate</label>
		<input type="text" id="rate" name="rate" autocomplete="off">
		
		<label for="ratediv"> Per Plate</label>
	   <div id="ratediv"></div>
       
	   <input class="add" type="submit" value="Add" name="save" onclick=" return checkempty()">
        <input class="upd" type="submit" value="Edit" name="update" onclick=" return validateitemid()">
		<input class="del" type="submit" value="Delete" name="delete" onclick=" return validateitemid()">

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
	
 	   var menuname=document.getElementById('menuname').value;	
 	   var description=document.getElementById('description').value;	
 	  	   var rate=document.getElementById('rate').value;	
 	 
		  var regnumeric =/^[0-9]+$/; 
		
		if(document.getElementById("menutype").value==0)
		{
			alert("Select Menu Type");
            return false;
		}
	
	   if (menuname === "")
             {
                   alert ( "Please enter Menu Name." );
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
			
		if(!document.getElementById("rate").value.match(regnumeric)) 
		{            
            alert("Enter Only Number in Rate");
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
       document.getElementById("menuname").value = myArray[0];
	   document.getElementById("rate").value="";
	   document.getElementById("description").value="";
	   var s1=myArray[0].toLowerCase();
		
        }
		
		
        };

      	xmlhttp.open("GET","getmenuname.php?mtid="+str,true);
	
       	xmlhttp.send();
	
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
			  
              document.getElementById("availablemenu").innerHTML = this.responseText;		
			}
		};
      	xmlhttp.open("GET","getavailablemenus.php?mtid="+str,true);
	
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
     //  document.getElementById("name").value = this.responseText;
		     const myArray = this.responseText.split("#");
             document.getElementById("menuname").value = myArray[0];
			 document.getElementById("description").value = myArray[1];
			 document.getElementById("rate").value = myArray[2];
			 document.getElementById("mid").value = myArray[3];
        }	
        };

      	xmlhttp.open("GET","getmenudetail.php?mid="+str,true);
	
       	xmlhttp.send();
		getavailable(str);
}

</script>