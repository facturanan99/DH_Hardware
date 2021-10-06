<?php 
    // Add the main Class
    require_once("main.php");
    // Get user session details 
    $userdatails = $main_class->get_userdata();
    // Check if the account is admin
    if(isset($userdatails) && $userdatails['access'] == 'admin'){
        
    } else {
        header("Location: login.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- FONT Awesome -->
    <script src="https://kit.fontawesome.com/4f1a945a46.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href = "css/style.css" rel="stylesheet">
    <title>DH Hardware | Admin </title>
  </head>
  <body>
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <!-- Side Panel -->
            <div class="col-12 col-md-3 side-panel-container m-0 px-4 py-4 text-white">
            <!-- Company name -->
           
                <p class="title">Admin Panel</p>
                
                <hr class="m-0 p-0 mt-2" style="height: 3px">

                <p class="subtitle text-muted">MANAGEMENT</p>
                <ul class='list-unstyled'>
                    <li><i class="fas fa-user-tie"></i> <a href="show_employees.php">Employees</a></li>
                    <li><i class="fab fa-product-hunt"></i><a href="products.php">Products</a></li>
                </ul>

                <hr>

                <p class="subtitle text-muted mt-3">BUSINESS</p>
                <ul class='list-unstyled'>
                    <li><i class="fab fa-product-hunt"></i><a href="#">Customers</a></li>
                    <li><i class="fas fa-warehouse"></i><a href="#">Orders</a></li>
                    <li><i class="fas fa-warehouse"></i><a href="#">Sales</a></li>
                </ul>

                <hr>
                <p class="subtitle text-muted mt-3">PAGES</p>
                <ul class='list-unstyled'>
                    <li><i class="fas fa-user-tie"></i> <a href="index.php">Home</a></li>
                    <li><i class="fas fa-warehouse"></i><a href="#">Messages</a></li>
                </ul>
            </div>

            <!-- Right Panel -->
            <div class="col-12 col-md-9 m-0 p-0 right-panel">
                <div class="bg-white text-dark px-4 py-4 shadow d-flex justify-content-end align-items-center">
                    <img src="images/admin-pic.png" alt="admin profile" class="admin-pic">
                    <p class="m-0 p-0"><?= $userdatails['full_name']; ?>  <span id="date_time"></span></p>
                </div>
                <p class="text-center title">Manage Products</p>

                <div class="employee-options px-3 py-4">
                    <a href="show_products.php"><button class="btn btn-primary text-white">Show Products</button></a>
                    <button class="btn btn-info text-white">Add Product</button>
                    <a href="update_product.php"><button class="btn btn-success text-white">Update Product</button></a>
                    <a href="delete_product.php"><button class="btn btn-danger text-white">Delete Product</button></a>
                </div>

                <form method="POST" class="add_product_form mt-5" enctype="multipart/form-data">
                    <div class="label-container">
                        <label for="pname" class="text-muted">Product Name</label>
                        <input type="text" name="pname" id="pname" autocomplete="off" required>
                    </div>

                    <div class="label-container mt-4">
                        <label for="price" class="text-muted">Price</label>
                        <input type="text" name="p" id="p" autocomplete="off" required>
                    </div>

                    <div class="label-container mt-4">
                        <label for="qty" class="text-muted">Quantity</label>
                        <input type="text" name="qty" id="qty" autocomplete="off" required>
                    </div>

                    <div class="label-container mt-4">
                        <label for="category" class="text-muted">Category</label>
                        <input type="text" name="category" id="category" autocomplete="off" required>
                    </div>

                    <div class="label-container mt-4">
                        <label for="product-img" class="text-muted">Add Image</label>
                        <input type="file" name="product_img" id="product_img" accept="image/*" required>

                        <!-- Dito mag pe preview ung image na si nave -->
                        <img id="fileDisplayArea" src="#" style="width: 100px"> </img>
                    </div>
                    
                   

                    <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>

                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    $product_name = $_POST['pname'];
                    $price = $_POST['p'];
                    $qty = $_POST['qty'];
                    $category = $_POST['category'];
                    
                    // Save the image
                    $tmpFile = $_FILES['product_img']['tmp_name'];
                    $newFile = './images/products/'.$_FILES['product_img']['name'];
                    $result = move_uploaded_file($tmpFile, "$newFile");
                    $pic_name = $_FILES['product_img']['name'];
                    if ($result) {
                        echo '<br> The file was uploaded<br />';
                    } else {
                        echo '<br> failed to upload<br />';
                    }

                    
                    $con = $main_class->openConnection();
                    $query = $con->prepare("INSERT INTO products (`product_name`, `pic_name`, `price`, `qty`, `category`) VALUES (?, ?, ?, ?, ?)");
                    $query->execute([$product_name, $pic_name, $price, $qty, $category]);
                }

            
                ?>
                </form>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="js/main.js"></script>

  </body>
</html>