<?php

include "dbConn.php";

$bike =$_POST["bike"];
$productName =$_POST["ProductName"];
$brand =$_POST["Brand"];
$quantity =$_POST["quantity"];
$buyingPrice = $_POST["BuyingPrice"];
$sellingPrice =$_POST["SellingPrice"];

$sqlProduct = "INSERT INTO product (bike,ProductName,Brand,quantity,BuyingPrice,SellingPrice) VALUES('$bike','$productName','$brand','$quantity','$buyingPrice','$sellingPrice')";

if($conn->query($sqlProduct)=== TRUE){
    echo "<script>alert('data added to database')</script>";
    echo "<meta http-equiv='refresh' content='1;url=../index.html'>";   
}
else{
    echo $conn->error;
}

?>