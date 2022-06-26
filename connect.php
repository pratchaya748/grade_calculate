<?php 
	$host 			    = "http://gpa.sci.dusit.ac.th/";
	$username_db		= "gpa";
	$password_db		= "12345678";
	$dbname		        = "gpa_mydb";
	
	$connect = @mysqli_connect("http://gpa.sci.dusit.ac.th/", "gpa", "12345678", "gpa_mydb") 
	or die ("<h2 style='margin-top:45vh; text-align:center; color:#C30101; font-size:40px; font-family:Helvetica; background-color:#ECD0DF; padding:20px 0px;'>Sorry ! we cannot access database ):<h2>");
	$connect->set_charset('utf8');
?>