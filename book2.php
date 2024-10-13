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
	<title>Catering Management Admin</title>
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
				  width: 48%;
				  margin-left: 20px;
		}
		#availablemenu {
				  padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 47%;
				  margin-left: 20px;
		}
		#menuname  {
				 padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 45%;
				  margin-left: 20px;
		}
		#description {
				  padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 45%;
				  margin-left: 20px;
		}
		#ratediv
		{
			margin-left:20px;
			font-size:15px;
			
		}
		.add{
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			margin-top: 10px;
			margin-left: 250px;
			margin-bottom: 20px;
			font-size: 16px;
			width:25%;
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
			height: 550px;
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
		.view{
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
		.confirm{
			background-color: green;
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
		#fdate{
			 padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 45%;
				  margin-left: 20px;
		}
		#fdesc{
			 padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 45%;
				  margin-left: 20px;
		}
		#rate{
			 padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 45%;
				  margin-left: 20px;
		}
		#quantity{
			 padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 45%;
				  margin-left: 20px;
		}
		#total{
			 padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 45%;
				  margin-left: 250px;
		}
		#{
			 padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 45%;
				  margin-left: 20px;
		}
		#quantity{
			 padding: 10px;
				  border: 1px solid #fff;
				  border-radius: 5px;
				  margin-bottom: 20px;
				  width: 45%;
				  margin-left: 20px;
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
		#popup-window {
			position: fixed;
			width: 700px;
			height: 600px;
			background:#76D7C4;
			color:black;
			border: 1px solid black;
			padding: 10px;
			margin: auto;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			z-index: 10;
			display: none;
}    
.popup .close       { position: absolute; top: 20px; right: 30px; transition: all 200ms;
                      font-size: 30px; font-weight: bold; text-decoration: none; color: #333; }
.popup .close:hover { color: orange; }
.popup .content     { max-height: 30%; overflow: auto; }
	</style>
</head>
<body>
<br>
<?php

$bookingid=$_SESSION["bookingid"];
if (isset($_POST['save']))
{
	$bookingid=$_POST["bookingid"];
	$userid=$_POST['userid'];
	$venue=$_POST['venue'];	
	//$fdate=$_POST['fdate'];
	$description=$_POST['description'];
   	$con = mysqli_connect("localhost", "root", "");
	if (!$con)
	{
  		die('Could not connect: ' . mysqli_error());
  	}
	$db_selected = mysqli_select_db($con,"cateringdb");
	
	
	
		$sql = "insert into booking(bookingid,userid,venue,description) values($bookingid,$userid,'$venue','$description')";
		if(mysqli_query($con,$sql))
		{
			  echo ("<script LANGUAGE='JavaScript'>
					    window.alert('Succesfully saved');
					</script>");
		}
	$_SESSION["bookingid"]=$bookingid;	
	mysqli_close($con);
}
?>

	
	<form method="post" action="book3.php">

		<label for="fdate">Function Date <span style='padding-left:370px'>
		Function Description</label>
		<?php
					$date = date("Y/m/d");
			//$date=date('Y-m-d', strtotime($date. ' + 1 day'));

		?>
		<input type="date" name="fdate" id="fdate" value='<?php echo $date?>' required>
		<input type="text" id="fdesc" name="fdesc" autocomplete="off">

		
		<label for="fdate">Menu Type <span style='padding-left:390px'>
		Available Menu</label>
		<select name="servicename" id="servicename" onchange="getavailable(this.value)" required>
			<option disabled selected value="0">-- Select Menu Type --</option>
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
		
			
		<select name="availableservice" id="availablemenu" onchange="getDetails(this.value)" required>
			<option disabled selected value="0">-- Avaialble Menu --</option>
				
  </select>
		<input type="hidden" id="bookingid" name="bookingid" value="<?php echo $bookingid;?>">
		 	<input type="hidden" id="mid" name="mid">
		
		<label for="fdate">Selected Menu  <span style='padding-left:390px'>
		Description</label>
		<input type="text" id="menuname" name="menuname" autocomplete="off">

	  
		<input type="text" id="description" name="description" autocomplete="off" >
		
		
		<label for="rate">Rate <span style='padding-left:430px'>	Quantity</label>
		<input type="text" id="rate" name="rate" autocomplete="off">
			<input type="text" id="quantity" name="quantity" onkeyup="cal(this.value)" autocomplete="off" required>
		
		<label for="ratediv"> </label>
	   <div id="ratediv"> </div>
	   

	
		<label for="total"><span style='padding-left:450px'>Total</span></label>
		<input type="text" id="total" name="total" autocomplete="off">
	    <div id='popup-window'>	
		
		</div>   
		
       <br>
	   <input class="add" type="submit" value="Save & Add More " name="save" id="save"onclick=" return checkempty()">
        <input class="view" type="button" value="View Added Menu " name="view" id="view" onclick="viewadded(<?php echo $_SESSION['bookingid'];?>)">
		
		
		

	</form>
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
<footer>
<?php include("footer.php");
?>
</footer>
<script>
function checkempty()
	{
	
 	   var servicename=document.getElementById('servicename').value;	
 	   var description=document.getElementById('description').value;	
 	  	   var rate=document.getElementById('rate').value;	
 	   var quantity=document.getElementById('quantity').value;	
				  var regnumeric =/^[0-9]+$/; 
		if(document.getElementById("fdate").value==0)
		{
			alert("Please Select Function Date");
            return false;
		}
		
			if (document.getElementById('fdesc').value === "")
             {
                   alert ( "Please enter Function Description." );
                  return false;
             }   
		if(document.getElementById("servicename").value==0)
		{
			alert("Please Select Menu Type");
            return false;
		}
		
		if(document.getElementById("availablemenu").value==0)
		{
			alert("Please Select Menu ");
            return false;
		}
			if(document.getElementById("servicename").value==0)
		{
			alert("Please Select Menu Type");
            return false;
		}
		if (description === "")
             {
                   alert ( "Please enter Description." );
                  return false;
             }    
	
	   if (servicename === "")
             {
                   alert ( "Please enter Service Name." );
                  return false;
             }    
	
		if (rate === "")
             {
                   alert ( "Please enter Rate." );
                  return false;
             }  
			 if (quantity === "")
             {
                   alert ( "Please enter quantity." );
                  return false;
             }   
		if(!document.getElementById("quantity").value.match(regnumeric)) 
		{            
            alert("Enter Only Number in Quantity");
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
     //  document.getElementById("servicedetailname").value = this.responseText;
		     const myArray = this.responseText.split("#");
             document.getElementById("menuname").value = myArray[0];
			 document.getElementById("description").value = myArray[1];
			 document.getElementById("rate").value = myArray[2];
			 document.getElementById("mid").value=myArray[3];
        }	
        };

      	xmlhttp.open("GET","getmenudetail.php?mid="+str,true);
	
       	xmlhttp.send();
		getavailable(myArray[3]);
}

</script>

<script>
function cal(quantity)
{	
	document.getElementById("total").value="";
  	var rate= document.getElementById("rate").value;
	
	var quantity= document.getElementById("quantity").value;
	var quantity=parseInt(quantity);
	var rate=parseInt(rate);
	
	var total=quantity*rate;
	if(Number.isNaN(total))
		document.getElementById("total").value="";
	else
		document.getElementById("total").value=total;
}

function viewadded(str)
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
    	document.getElementById("popup-window").innerHTML = this.responseText;
		
        }
		
		
        };

      	xmlhttp.open("GET","viewaddedmenu.php?bookingid="+str,true);
	
       	xmlhttp.send();
		
}

</script>

<script>
  // Get the elements by their ID
  var   popupbutton = document.getElementById("view");
  var popupWindow = document.getElementById("popup-window");
  var closeButton = document.getElementById("close-button");
  // Show the pop-up window when the link is clicked
  view.addEventListener("click", function(event) {
    event.preventDefault();
    popupWindow.style.display = "block";
  });
  // Hide the pop-up window when the close button is clicked
  closeButton.addEventListener("click", function() {
    popupWindow.style.display = "none";
  });
</script>       




 <script type="text/javascript">
    window.onload=function(){//from ww  w . j  a  va2s. c  o  m
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("fdate")[0].setAttribute('min', today);
    }

      </script> 