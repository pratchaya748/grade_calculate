<?php 
	$host 			            = "localhost";
	$username_db		= "root";
	$password_db		= "12345678";
	$dbname		            = "gpa";
	
	$connect = @mysqli_connect($host,$username_db,$password_db,$dbname) 
	or die ("<h2 style='margin-top:45vh; text-align:center; color:#C30101; font-size:40px; font-family:Helvetica; background-color:#ECD0DF; padding:20px 0px;'>Sorry ! we cannot access database ):<h2>");
	$connect->set_charset('utf8');
?>