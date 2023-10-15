<?php
    include 'dbConn.php';
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData);
    $sql="UPDATE product SET BuyingPrice ='".$data[1]."',SellingPrice ='".$data[2]."',quantity ='".$data[3]."' where productId='".$data[0]."'" ;
    if ($conn->query($sql) === TRUE) {
        echo "Record with product has been Updated successfully.";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    
?>
