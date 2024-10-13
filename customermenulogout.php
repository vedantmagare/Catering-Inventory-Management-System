<?php
if(!isset($_SESSION)) 
    { 
	      session_start();
 }
	  
	  ?>
<html>
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

   <link rel="stylesheet" href="usercss/styles.css">
   <link rel="stylesheet" href="usercss/styles1.css">
   <link rel="stylesheet" href="usercss/search.css">
<style>
   body{
        margin: 0px;
        padding: 0px;
        font-family: 'Times New Roman', serif;
		  background-color:black;
		 width: 100%;
    }
    .cssmenu
	{
		font-size:50px;
		fon
	}
   .content a:hover{
    color: pink;
    filter: drop-shadow(2px 2px 5px );
   }

   
</style>
    </head>
<body>
<div class="content">
    
    <table width="100%" style="background-color:black"><tr><td>
   
    </td>
    

    </td>
<?php
if(!isset($_SESSION)) 
    { 
	      session_start();
 }
	      if(!isset($_SESSION['uname']))
              {
                     $data="";
              }
              else
              {

                     $data="Welcome ".$_SESSION['uname'];
              }
?>
  <td><font face="Brush Script MT, Brush Script Std, cursive" size="6" color="white"><?php echo$data;?></font></td>
          
    </tr>
    </table>
    
   
    
      
    <div id='cssmenu'>
<ul>


<li class='active has-sub'><a href='home.php'><span style="font-size:20px;">Home</span></a>




</li>



<li class='active has-sub'style="font-size:50px;"><a href='aboutus.php'><span style="font-size:20px;">About US</span></a>
       
    
</li>

<li class='active has-sub' style='font-size:50px;'><a href='#'><span style="font-size:20px;">Our Menus</span></a>
    <ul>
      <?php
       	$con1 = mysqli_connect("localhost", "root", "");
	    $db_selected = mysqli_select_db($con1,"cateringdb");	

	    $sql = "select mtid,menutypename from menutype";

        $records = mysqli_query($con1,$sql);

        while($data = mysqli_fetch_array($records))
        {
       echo "<li class='has-sub'><a href='showmenu1.php?mtid=$data[mtid]'><span style='font-size:20px;'>$data[menutypename]</span></a></li>";  
        }	
    ?>  
  </select>
 	</ul>
</li>

<li class='active has-sub' style="font-size:50px;"><a href='gallery.php'><span style="font-size:20px;">Gallery </span></a></li>


	
<li class='active has-sub' style="font-size:50px;"><a href='contactus.php'><span style="font-size:20px;">Contact Us</span></a></li>
<li class='active has-sub' style="font-size:100px;"><a href='book1.php'><span style="font-size:20px;">Book</span></a></li>
<li class='active has-sub' style="font-size:100px;"><a href='mybooking.php'><span style="font-size:20px;">My Booking</span></a></li>
             

<li class='active has-sub' style="font-size:100px;"><a href='logout.php'><span style="font-size:20px;">Log Out</span></a></li>
         


</ul>
</div>
  </div>
    </body>
</html>
