<?php

function fetch_data(){
   include "dbConn.php";
   $bike = $_POST["search-Bike"];
   $productName =$_POST["search-product"];
   if(empty($bike)){
       $sqlSearch = "SELECT bike,productId,ProductName,Brand,SellingPrice,quantity From product WHERE ProductName = '$productName' ";
       $exec=mysqli_query($conn, $sqlSearch);

   }
   else if(empty($productName )){
       $sqlSearch = "SELECT bike,productId,ProductName,Brand,SellingPrice,quantity From product WHERE Bike = '$bike'";
       $exec=mysqli_query($conn, $sqlSearch);


   }
   else{
       $sqlSearch = "SELECT bike,productId,ProductName,Brand,SellingPrice,quantity From product WHERE Bike = '$bike' AND ProductName = '$productName' ";
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
            <th scope="col">SellingPrice</th>
            <th scope="col">change quantity</th>
            <th scope="col">add to cart</th>
        </tr>';
      if(count($fetchData)>0){
          $sn=1;
          foreach($fetchData as $data){ 
            echo "<tr class='itemsTd'>";
            echo "<td>". $data["bike"]. "</td>";
            echo "<td>". $data["ProductName"]. "</td>";
            echo "<td>". $data["Brand"]. "</td>";
            echo "<td>". $data["quantity"]. "</td>";
            echo "<td>". $data["SellingPrice"]. "</td>";
            echo '<td>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <button class="btn btn-link px-2"
                    onclick="this.parentNode.querySelector(\'input[type=number]\').stepDown()">
                    <i class="fas fa-minus"></i>
                    </button>

                    <input id="quantity-For-Bill-' .$data["productId"] .'" min="0" name="quantity" value="1" type="number"
                    class="form-control form-control-sm" style="width: 50px;" />
                    
                    <button class="btn btn-link px-2"
                    onclick="this.parentNode.querySelector(\'input[type=number]\').stepUp()">
                    <i class="fas fa-plus"></i>
                    </button>
                </div></td>';


            echo "<td> <button type='button' onclick='cart(\"{$data["productId"]}\",\"{$data["ProductName"]}\",\"{$data["Brand"]}\",{$data["SellingPrice"]})' class='btn btn-info cart-btns' value ='{$data["productId"]}'>Cart</button></td>";
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