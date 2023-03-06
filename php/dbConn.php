<?php   

$ServerName ="localhost";
$userName = "root";
$password ="password";
$dbUse ="USE JM_Motors";

$conn = mysqli_connect($ServerName,$userName);

if(!$conn){
    die(mysqli_connect_error());
}
if($conn -> query($dbUse) != TRUE){
    echo $conn->error;
}
?>