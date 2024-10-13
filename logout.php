<?php
session_start();
unset($_SESSION["userid"]);
$_SESSION["userid"]=null;
 	session_destroy();
	echo ("<script LANGUAGE='JavaScript'>
		window.location.href='home.php';
    	   	</script>");
?>