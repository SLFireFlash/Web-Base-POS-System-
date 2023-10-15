<?php

function fetch_data(){
   include "dbConn.php";
   $bike = $_POST["search-Bike"];
   $productName =$_POST["search-product"];
   if(empty($bike)){
       $sqlSearch = "SELECT bike,productId,ProductName,Brand,BuyingPrice,SellingPrice,quantity From product WHERE ProductName = '$productName' ";
       $exec=mysqli_query($conn, $sqlSearch);

   }
   else if(empty($productName )){
       $sqlSearch = "SELECT bike,productId,ProductName,Brand,BuyingPrice,SellingPrice,quantity From product WHERE Bike = '$bike'";
       $exec=mysqli_query($conn, $sqlSearch);


   }
   else{
       $sqlSearch = "SELECT bike,productId,ProductName,Brand,BuyingPrice,SellingPrice,quantity From product WHERE Bike = '$bike' AND ProductName = '$productName' ";
       $exec=mysqli_query($conn, $sqlSearch);

   }
   if(mysqli_num_rows($exec)>0){
     $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
     return $row;  
         
   }else{
     return $row=[];
   }
 }

function show_data($fetchData){
 echo '<table id="search-result-table"  class="table table-hover table-striped">
        <tr>
            <th scope="col" >bike</th>
            <th scope="col">ProductName</th>
            <th scope="col">Brand</th>
            <th scope="col">quantity</th>
            <th scope="col">BuyingPrice</th>
            <th scope="col">SellingPrice</th>
            <th scope="col">Update</th>
        </tr>';
      if(count($fetchData)>0){
          $sn=1;
          foreach($fetchData as $data){ 
            echo "<tr class='itemsTd'>";
            echo "<td>". $data["bike"]. "</td>";
            echo "<td>". $data["ProductName"]. "</td>";
            echo "<td>". $data["Brand"]. "</td>";
            echo "<td>". $data["quantity"]. "</td>";
            echo "<td><input type='number' id='Buy_". $data["productId"]. "' name='search-product' placeholder='Product Name' value='". $data["BuyingPrice"]."'></td>";
            echo "<td><input type='number' id='sell_". $data["productId"]. "' name='search-product' placeholder='Product Name' value='". $data["SellingPrice"]."'></td>";
            echo "<td><button type='button' class='btn btn-warning' onclick='updateProductData(\"{$data["productId"]}\")'>Update</button></td>";
            echo "</tr>";
        }
      }else{
        
      echo "<tr>
            <td colspan='5'>No Data Found</td>
          </tr>"; 
    }
      echo "</table>";
    }
    
$fetchData= fetch_data();
show_data($fetchData);
?>