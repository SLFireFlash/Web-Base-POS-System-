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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            </div>
            </div>
        </nav>

        <div class="left-side container">
            <form action="?" method="POST">
                <input type="text" id="serach-product" name="search-product" placeholder="Product Name">
                <input type="text" id="search-Bike" name="search-Bike" placeholder="Bike">
                <button type="submit" class="btn btn-success">Search</button>
                
                <!-- Button trigger modal -->
                <button type="button" name="loadCart1" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">View Cart</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">CART</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <table class="table-output">
                        <table>
                        <tr>
                            <td>
                                Product Name
                            </td>
                            <td>
                                Brand
                            </td>
                            <td>
                                Price
                            </td>
                        </tr>
                        <?php
                            loadCart();
                        ?>

                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
            </form>
        </div>



        <div class="right-side container">
        <form action="?" method="post">
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
                        quantity
                    </td>
                </tr>
                
                <?php
                    
                    function search(){
                        include "php/dbConn.php";
                        $bike =$_POST["search-Bike"];
                        $productName =$_POST["search-product"];
                        
                        if(empty($bike)){
                            $sqlSearch = "SELECT bike,productId,ProductName,Brand,SellingPrice,quantity From product WHERE ProductName = '$productName' ";
                            $result = $conn->query($sqlSearch);

                        }
                        else if(empty($productName )){
                            $sqlSearch = "SELECT bike,productId,ProductName,Brand,SellingPrice,quantity From product WHERE Bike = '$bike'";
                            $result = $conn->query($sqlSearch);


                        }
                        else{
                            $sqlSearch = "SELECT bike,productId,ProductName,Brand,SellingPrice,quantity From product WHERE Bike = '$bike' AND ProductName = '$productName' ";
                            $result = $conn->query($sqlSearch);

                        }

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='itemsTd'>";
                        echo "<td>". $row["bike"]. "</td>";
                        echo "<td>". $row["ProductName"]. "</td>";
                        echo "<td>". $row["Brand"]. "</td>";
                        echo "<td>". $row["quantity"]. "</td>";
                        echo "<td>". $row["SellingPrice"]. "</td>";
                        echo "<td> <button type='submit' name='button2' class='btn btn-info cart-btns' value ='{$row["productId"]},{$row["ProductName"]},{$row["Brand"]},{$row["quantity"]},{$row["SellingPrice"]}'>Cart</button></td>";
                        echo "</tr>";


                    }
                    } else {
                    echo "0 results";
                    }
                }
                if(array_key_exists('search-product', $_POST) AND array_key_exists('search-Bike',$_POST)) {
                    search();
                }
                else if(array_key_exists('button2', $_POST)) {
                    button2();
                }
                function button2() {
                    include "php/dbConn.php";
                    $btnValue = $_POST["button2"];
                    $btnValueArray = explode(",",$btnValue);
                    $sqlCart = "INSERT INTO cartitems (productId,ProductName,Brand,quantity,SellingPrice) VALUES('$btnValueArray[0]','$btnValueArray[1]','$btnValueArray[2]','$btnValueArray[3]','$btnValueArray[4]')";
                    if($conn->query($sqlCart)=== TRUE){
                        echo "<script>alert('item Added To cart')</script>"; 
                    }
                    else{
                        echo $conn->error;
                    }


                }
                function loadCart(){
                    include "php/dbconn.php";
                    
                    $sqlLoadCart = "SELECT productId,ProductName,Brand,quantity,SellingPrice FROM cartitems";
                    $result = $conn->query($sqlLoadCart);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr class='itemsTd'>";
                            echo "<td>". $row["ProductName"]. "</td>";
                            echo "<td>". $row["Brand"]. "</td>";
                            echo "<td>". $row["SellingPrice"]. "</td>";
                            echo "</tr>";
                        }
                        } else {
                        echo "0 results";
                        }

                }
                ?>

            </table>
            </form>

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
</body>
</html>
