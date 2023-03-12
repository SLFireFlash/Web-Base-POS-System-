<?php
include "dbConn.php";

$bike ="bike";
$pn ="11";


$sqlSearch = "SELECT ProductName,Brand,ItemPrice,quantity From product WHERE ProductName ='$pn' AND Bike = '$bike' ";
$result = $conn->query($sqlSearch);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><table border='1'>";
    echo "<td>". $row["ProductName"]. "</td>";
    echo "<td>". $row["Brand"]. "</td>";
    echo "<td>". $row["ItemPrice"]. "</td>";
    echo "<td>". $row["quantity"]. "</td>";
    echo "</tr></table>";


  }
} else {
  echo "0 results";
}





?>