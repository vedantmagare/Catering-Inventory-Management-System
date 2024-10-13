<!DOCTYPE html>
<?php
	include("adminmenu.php");
?>
<html>
<head>
	<title>Catering Management Admin</title>
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
		input[type="text"], input[type="password"], select {
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
		}
		.add:hover {
			background-color: #3e8e41;
		}
			h1 {
				
				margin-top: 50px;
				margin-left: 650px;		
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
			height: 250px;
			
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

	$sql = "select max(mtid) from menutype";
	$result = mysqli_query($con1,$sql);
	while($rowval = mysqli_fetch_array($result))
	{
		 $count= $rowval['max(mtid)'];
		 $count++;
	}	
	
?>
		<h1>Service</h1>
	
	<form method="post" action="menutype2.php">

		<label for="menutype-name"> Menu Type</label>
		<input type="text" id="menutype" name="menutype" required>
		<input type="hidden" id="mtid" name="mtid" value="<?php echo $count;?>" autocomplete="off">


	   
        <input class="add" type="submit" value="Add" name="save" onclick=" return checkempty()">
        <input class="upd" type="submit" value="Edit" name="update" onclick=" return validateitemid()">
		<input class="del" type="submit" value="Delete" name="delete" onclick=" return validateitemid()">
		<input class="add" type="submit" value="Search" name="search" onclick=" return validateitemid()">
		
		
	</form>
<footer>
<?php include("footer.php");
?>
</footer>
</body>
</html>
<?php
if(isset($_GET['menutype']))
{
	
$mtid=$_GET['mtid'];
$menutype=$_GET['menutype'];

?>
<script LANGUAGE='JavaScript'>  
var mtid = '<?php echo $mtid; ?>';
var menutype = '<?php echo $menutype; ?>';



document.getElementById('mtid').value=mtid;	
document.getElementById('menutype').value=menutype;	

</script>
<?php
}
?>
<script>
function checkempty()
	{
	
 	   var servicename=document.getElementById('servicename').value;	
 	   var description=document.getElementById('description').value;	
 
		
		
	   if (servicename === "")
             {
                   alert ( "Please enter Service Name." );
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
