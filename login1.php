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
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
	 <style>
	body {
			font-family: Arial, sans-serif;

			  background-image: url("catering1.jpg");
			background-repeat: no-repeat;
			background-size: 1700px 775px;
		}
</style>
  </head>
  <body class ="p">

    <div class="center">
      <h1>Login</h1>
	  
      <form method="POST" name="login" action="login2.php">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>User name</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
		
        <!--div class="pass">Forgot Password?</div-->
        <input type="submit" name="Login" value="Login">
        <div class="signup_link">
          Not a member? <a href="signup1.php">Signup</a>
        </div>
      </form>
    </div>

  </body>
  
</html>

