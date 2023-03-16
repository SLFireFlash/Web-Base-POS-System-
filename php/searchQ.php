<?php

function fetch_data(){
   include "dbConn.php";
   $query="SELECT bike,productId,ProductName,Brand,SellingPrice,quantity From product";
   $exec=mysqli_query($conn, $query);
   if(mysqli_num_rows($exec)>0){
     $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
     return $row;  
         
   }else{
     return $row=[];
   }
 }

function show_data($fetchData){
 echo '<table border="1">
        <tr>
            <th>bike</th>
            <th>ProductName</th>
            <th>Brand</th>
            <th>quantity</th>
            <th>SellingPrice</th>
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
            echo '<td><input type="text" placeholder="quantity" class="quantity-input" id="quantity-For-Bill-'.$data["productId"].'"></td>';
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