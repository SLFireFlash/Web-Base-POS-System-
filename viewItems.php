<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>

    <link rel="stylesheet" href="css/viewpage.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/invoice.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body class="bg-light">
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">TeamHiru</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                </li>
                </ul>
                <ul class="navbar-nav  mb-auto me-2 me-lg-0">
                    <li>
                        <a class="nav-link active" aria-current="page" href="#">contact us</a>
                    </li>
                    <li>
                        <a class="nav-link active" aria-current="page" href="#">more info</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>

        <div class="left-side container">
            <form action="?" method="post">
                <input type="text" id="serach-product" name="search-product" placeholder="Product Name">
                <input type="text" id="search-Bike" name="search-Bike" placeholder="Bike">
                <button type="submit" class="btn btn-success">Search</button>

            </form>
            <!-- Example single danger button -->
<!-- 
            <div class="container">
                <nav>
                    <input id="toggle" type="checkbox" checked>
                    <h2>Drop Down Menu</h2>
                    <ul>
                        <li><a href="#chapter1">Chapter 01</a></li>
                        <li><a href="#chapter2">Chapter 02</a></li>
                        <li><a href="#chapter3">Chapter 03</a></li>
                        <li><a href="#chapter4">Chapter 04</a></li>
                    </ul>
                </nav>
            </div> -->
            <!-- <button type="submit" class="btn btn-success">Search</button> -->
            
        </div>
        <div class="right-side container">
            <table class="table-output">
                <tr>
                    <td>
                        Bike
                    </td>
                    <td>
                        Product Name
                    </td>

                    <td>
                        Brand
                    </td>
                    <td>
                        Quantity
                    </td>
                    
                    <td>
                        Price
                    </td>

                    <td>
                        Add to cart
                    </td>
                </tr>
                <?php
                    function search(){
                        include "php/dbConn.php";
                        $bike =$_POST["search-Bike"];
                        $productName =$_POST["search-product"];
                        
                        if(empty($bike)){
                            $sqlSearch = "SELECT bike,productId,ProductName,Brand,SellingPrice,quantity From product WHERE ProductName = '$productName' ";

                        }
                        else if(empty($productName )){
                            $sqlSearch = "SELECT bike,productId,ProductName,Brand,SellingPrice,quantity From product WHERE Bike = '$bike'";


                        }
                        else{
                            $sqlSearch = "SELECT bike,productId,ProductName,Brand,SellingPrice,quantity From product WHERE Bike = '$bike' AND ProductName = '$productName' ";

                        }
                        $result = $conn->query($sqlSearch);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='itemsTd'>";
                        echo "<td>". $row["bike"]. "</td>";
                        echo "<td>". $row["ProductName"]. "</td>";
                        echo "<td>". $row["Brand"]. "</td>";
                        echo "<td>". $row["quantity"]. "</td>";
                        echo "<td>". $row["SellingPrice"]. "</td>";
                        echo "<td> <button type='button' onclick='cart(\"{$row["productId"]}\",\"{$row["ProductName"]}\",\"{$row["Brand"]}\",{$row["quantity"]},{$row["SellingPrice"]})' class='btn btn-info cart-btns' value ='{$row["productId"]}'>Cart</button></td>";
                        echo "</tr>";


                    }
                    } else {
                    echo "0 results";
                    }
                }
                
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    
                    search();
                } 
                ?>

            </table>
        </div>
        <div class="bottompage">
            <div class="hideEle" id="btn-goto-bill">
                <button type="button" class="btn btn-info" onclick="showBill()" >Goto Bill</button>
            </div>
        </div>
 
        <div class="makeBill hideEle" id="btn-Edit-Bill">
            <div class="invoice-box hideEle"id="btn-Edit-Bill-form">
                <table>
                    <tr class="top">
                        <td class="title">
                            <img src="images/logo.jpg" style="width: 80%; max-width: 80px" />
                        </td>
                        <td>

                        </td>
                        <td id="InvoiceTD" class="lastItem">
                                <p>time and date not found</p>
                        </td>
                    </tr>
    
                    <tr class="information">
                            <td class="lastItemAdd">
                                <input type="text" placeholder="Address" class="address">
                                <input type="text" placeholder="Address" class="address">
                                <input type="text" placeholder="Address" class="address">
                            </td>
                            <td>

                            </td>
                            <td class="lastItemAdd" >
                                <input type="text" placeholder="Address" class="address">
                                <input type="text" placeholder="Address" class="address">
                                <input type="text" placeholder="Address" class="address">
                            </td>
                    </tr>
    
                    <tr class="heading" id="add-Items-To-Bill">

                        <td>Item</td>
                        <td >quantity</td>
                        <td class="lastItem">Price</td>
                    </tr>
    
                    <tr class="item" >
                        <td>test</td>
                        <td >50</td>
                        <td class="lastItem">$300.00</td>
                    </tr>
    
                    <tr class="item">
                        <td>test</td>
                        <td>50</td>
                        <td class="lastItem">$75.00</td>
                    </tr>
    
                    <tr class="item last">
                        <td>test</td>
                        <td>50</td>
                        <td class="lastItem">$10.00</td>
                    </tr>

                    <tr class="total">
                        <td>Total:</td>
                        <td></td>
                        <td class="lastItem">$385.00</td>
                    </tr>
                </table>
                </div>

        </div>    
        



    <footer class="bg-light text-muted">
            <div class="socail-icons">
                <a href="https://www.facebook.com/lahiru.prasanna.35/" class="me-4 link-secondary">
                <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/sl_fireflash" class="me-4 link-secondary">
                <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.instagram.com/sl_fireflash/" class="me-4 link-secondary">
                <i class="fab fa-instagram"></i>
                </a>
                <a href="https://github.com/SLFireFlash" class="me-4 link-secondary">
                <i class="fab fa-github"></i>
                </a>
            </div>
            <p>Powered By TeamHiru</p>

    </footer>
    </div>
    <script src="js/app.js"></script>
    <script src="js/cart.js"></script>
    <script src="https://kit.fontawesome.com/5211ff47b8.js" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</div>
</body>
</html>
