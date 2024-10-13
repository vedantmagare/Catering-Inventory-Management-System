<?php
if(!isset($_SESSION)) 
    { 
	 //     session_start();
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
    
  
   
    
      
    <div id='cssmenu'>
<ul>


<li class='active has-sub'><a href='admin.php'><span style="font-size:20px;">Home</span></a>




</li>



<li class='active has-sub'style="font-size:50px;"><a href='menutype1.php'><span style="font-size:20px;">Menu Type</span></a>
       
    
</li>
<li class='active has-sub'style="font-size:50px;"><a href='menu1.php'><span style="font-size:20px;">Menu</span></a>
       
    
</li>
<li class='active has-sub'style="font-size:50px;"><a href='photo1.php'><span style="font-size:20px;">Photo</span></a>
       
    
</li>
<li class='active has-sub' style='font-size:50px;'><a href='#'><span style="font-size:20px;">Reports</span></a>
    <ul>
     
     <li class='has-sub'><a href='customerreport.php'><span style='font-size:20px;'>Customer Report</span></a></li>
	 <li class='has-sub'><a href='menureport.php'><span style='font-size:20px;'>Menu Report</span></a></li>
     <li class='has-sub'><a href='orderreport.php'><span style='font-size:20px;'>Upcoming orders</span></a></li>
    <li class='has-sub'><a href='allbill.php'><span style='font-size:20px;'>All Bills</span></a></li>

 	</ul>
</li>



<li class='active has-sub' style="font-size:100px;"><a href='home.php'><span style="font-size:20px;">Log Out</span></a></li>
         


</ul>
</div>
  </div>
    </body>
</html>
