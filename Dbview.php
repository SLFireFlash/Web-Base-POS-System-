<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
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

    <?php
    // Connect to the database
    include "php/dbconn.php";

    // Retrieve data from the database
    $sql = "SELECT bike,productId,ProductName,Brand,BuyingPrice,SellingPrice,quantity From product";
    $result = mysqli_query($conn, $sql);
    ?>

    <table border="1" class="table table-hover table-striped table-bordered border-primary">
        <tr>
            <th scope="col">product Id</th>
            <th scope="col">product name</th>
            <th scope="col">bike</th>
            <th scope="col">brand</th>
            <th scope="col">buying price</th>
            <th scope="col">selling price</th>
            <th scope="col">quantity</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr scope="row">
        <td><?php echo $row['ProductName']; ?></td>
            <td><?php echo $row['ProductName']; ?></td>
            <td><?php echo $row['bike']; ?></td>
            <td><?php echo $row['Brand']; ?></td>
            <td><?php echo $row['BuyingPrice']; ?></td>
            <td><?php echo $row['SellingPrice']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
        </tr>
        <?php endwhile; ?>

    </table>

    <?php
    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
