<?php
if (isset($_POST['proId'])) {
    $ProductId = $_POST['proId'];
    include 'dbConn.php';
    $sql="DELETE FROM product where productId='".$ProductId."'" ;
    if ($conn->query($sql) === TRUE) {
        echo "Record with product has been deleted successfully.";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    
?>







