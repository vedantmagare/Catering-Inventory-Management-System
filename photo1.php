<html>
<?php
include("adminmenu.php");
?>
<style>
#fileToUpload
{
background: black;
color: white;
}
#upload
{
background: black;
color: white;
}
	body {
			font-family: Arial, sans-serif;

			  background-image: url("catering2.jpg");
			background-repeat: no-repeat;
			background-size: 1600px 775px;
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
		#servicename  {
				  padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 95%;
				  margin-left: 20px;
}
	#availableservice  {
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
			margin-bottom: 20px;
			font-size: 16px;
				margin-left: 350px;
		}
		.add:hover {
			background-color: #3e8e41;
		}
			h1 {
				
				margin-top: 50px;
				margin-left: 20px;		
				filter: drop-shadow(2px 3px 2px maroon);
				color: white;
				width: 15%;
				padding-left: 4px;
		}
	
		form {
			margin: 50px auto;
			width: 60%;
			font-family: Arial, sans-serif ;
			border: 1px solid #ccc;
			padding: 20px;
			border-radius: 10px;
			height: 450px;
			
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
		.fileToUpload{
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
<body>
<center>
<h1>Select Image</h1>
<form action="photo2.php" method="post" enctype="multipart/form-data">
<?php


?>
<br>
<br>
	<label for="service-name"> Select Menu Type </label>
		
		
		<select name="servicename" id="servicename" onchange="getdata(this.value)">
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
	<label for="detailservice-name"> Service Name</label>
		
		
		<select name="availableservice" id="availableservice">
			<option disabled selected value="0">-- Avaialble Menus --</option>
				
  </select>
<label for="description">Description</label>
		<input type="file"name="fileToUpload" class="fileToUpload"id="fileToUpload" required="required">
<br>

    <input  type="submit" value="Upload Image"class="fileToUpload"name="submit" id="upload" onclick=" return checkempty()">
</form>
</center>
<footer>
<?php include("footer.php");
?>
</footer>
</body>
</html>
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
			  
              document.getElementById("availableservice").innerHTML = this.responseText;		
			}
		};
      	xmlhttp.open("GET","getavailablemenus.php?mtid="+str,true);
	
       	xmlhttp.send();
}
function checkempty()
{
		if(document.getElementById("servicename").value==0)
		{
			alert("Select Menu Type");
            return false;
		}
		if(document.getElementById("availableservice").value==0)
		{
			alert("Select Menu ");
            return false;
		}
}
</script>