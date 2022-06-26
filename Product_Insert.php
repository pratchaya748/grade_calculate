<!-- Product_Insert.php -->
<?php
   $txtProductId = $_POST['txtProductId'] ;
   $txtProductName = $_POST['txtProductName'] ;
   $txtProductPrice = $_POST['txtProductPrice'] ;
   $txtProductPicture = $_POST['txtProductPicture'] ;
   print "Hello" ;
   $conn = new mysqli("localhost" , "root" , "12345678" , "comsci62" );
   print "<BR>connected" ;
   $sql = "INSERT into Product  (Product_Id,Product_Name,Product_Price , Product_Picture) values ('$txtProductId','$txtProductName','$txtProductPrice' , '$txtProductPicture') "  ;
   $result = $conn->query($sql);
   if ($result) { 
       print "<BR> บันทึกข้อมูลแล้ว" ;
   } 
   else {
	    print "<BR> มีความผิดพลาด "  ;
   }  
?>