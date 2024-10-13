<!DOCTYPE html>
<html>
<head>
	<title>Event Management</title>
	<style>
		body {
			font-family: Arial, sans-serif;

			
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
			font-family: Arial, sans-serif;
			border: 1px solid #ccc;
			padding: 20px;
			border-radius: 10px;
			height: 800px;
			
			
			background-color: #c8c8c8;
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
		#Register{
			
			background-color: maroon;
			color: pink;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			margin-top: 10px;
			margin-bottom: 20px;
			margin-left:350px;
			font-size: 16px;
		}
		#custaddr
		{
			 padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 95%;
				  margin-left: 20px;
		}
		
		.del:hover {
			background-color: red;
		}
		
	</style>
</head>
<body>
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
?><br>
<?php
	
	
?>
		<h1>Customer</h1>
	
	 <form action="signup2.php" method="POST" onsubmit="return validateForm()">
        <div class="form">
			<div class="inputfield">
			<label>Username</label>
			<input id="Username" name="Username" type="text" class="input" required>
			</div>  

			<div class="inputfield">
			<label>Password</label>
			<input id="Password" name="Password" type="password" class="input"required>
			</div>  

			<div class="inputfield">
				<label>Name </label>
				<input id="custname" name="custname" type="text" class="input" required>
			</div> 
			
			<div class="inputfield">
				<label>Address </label>
				<br>
				<textarea id="custaddr" name="custaddr" class="textarea" width="100" required></textarea>
			</div> 
			
			<div class="inputfield">
				<label>State </label>
				<input id="custstate" name="custstate" type="text" class="input" required>
			</div> 
			
			<div class="inputfield">
				<label>Pin </label>
				<input id="custpin" name="custpin" type="text" class="input" maxlength="6" onkeypress="return isNumberKey(event)" required>
			</div>
			
			<div class="inputfield">
				<label>Contact Number </label>
				<input id="custmob" name="custmob" type="text" class="input" maxlength="10" onkeypress="return isNumberKey(event)" required>
			</div> 

			<div class="inputfield">
				<label>Email ID  </label>
				<input id="custemailid" name="custemailid" type="text" class="input" required>
			</div> 
			
          
            
            <input id="Register" name="Register" type="submit" value="Register" class="btn">
     
        </div>
    </div>
  </form>
<footer>
<?php include("footer.php");
?>
</footer>
</body>
</html>
<?php

?>
<script>
function validateForm() 
{
  var mailformat = /\S+@\S+\.\S+/;
  var regnumeric =/^\d{10}$/; 

 
  
 
  if(!document.getElementById("custmob").value.match(regnumeric)) 
  {            
            alert("Enter 10 Digit Contact Number");
            return false;
  }
  
  else if(!document.getElementById("custemailid").value.match(mailformat)) 
  {            
            alert("Enter Valid Email Address");
            return false;
  }
}	

</script>

