<?php

include "dbConn.php";

$bike =$_POST["bike"];
$productName =$_POST["ProductName"];
$brand =$_POST["Brand"];
$itemPrice =$_POST["ItemPrice"];
$quantity =$_POST["quantity"];

$sql = "INSERT INTO product (bike,ProductName,Brand,ItemPrice,quantity) VALUES('$bike','$productName','$brand','$itemPrice','$quantity')";

if($conn->query($sql)=== TRUE){
    echo "<script>alert('data added to database')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index.html'>";
    
}
else{
    echo $conn->error;
}

?>