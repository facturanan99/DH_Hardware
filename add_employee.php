<?php                                    
    require_once("main.php");
    $main_class->addEmployee();   
    $userdatails = $main_class->get_userdata();
    print_r($userdatails);

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
    <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
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
                    <li><i class="fas fa-user-tie"></i> <a href="#">Employees</a></li>
                    <li><i class="fab fa-product-hunt"></i><a href="products.php">Products</a></li>
                </ul>

                <hr>

                <p class="subtitle text-muted mt-3">BUSINESS</p>
                <ul class='list-unstyled'>
                    <li><i class="fas fa-user-tie"></i> <a href="#">Analytics</a></li>
                    <li><i class="fab fa-product-hunt"></i><a href="#">Customers</a></li>
                    <li><i class="fas fa-warehouse"></i><a href="#">Orders</a></li>
                </ul>

                <hr>
                <p class="subtitle text-muted mt-3">PAGES</p>
                <ul class='list-unstyled'>
                    <li><i class="fas fa-user-tie"></i> <a href="index.php">Home</a></li>
                    <li><i class="fab fa-product-hunt"></i><a href="#">Faq</a></li>
                    <li><i class="fas fa-warehouse"></i><a href="#">Messages</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-9 m-0 p-0 right-panel">
                <div class="bg-white text-dark px-4 py-4 shadow d-flex justify-content-end align-items-center">
                    <img src="images/admin-pic.png" alt="admin profile" class="admin-pic">
                    <p class="m-0 p-0"><?php echo $userdatails['full_name'] ?> <span id="date_time"></span></p>
                </div>
                <p class="text-center title">Manage Employees</p>

                <div class="employee-options px-3 py-4">
                    <a href="show_employees.php"><button class="btn btn-primary text-white">Show Employee</button></a>
                    <button class="btn btn-info text-white">Add Employee</button>
                    <a href="update_employee.php"><button class="btn btn-success text-white">Update Employee</button></a>
                    <a href="delete_employee.php"><button class="btn btn-danger text-white">Delete Employee</button></a>
                </div>

                <form method="post" class="px-3 py-4 add_employee_form mt-4">
                    <div class="label-container">
                        <label for="name" class="text-muted">First Name</label>
                        <input type="text" name="fname" id="fname" autocomplete="off">
                    </div>

                    <div class="label-container mt-4">
                        <label for="lname" class="text-muted">Last Name</label>
                        <input type="text" name="lname" id="lname" autocomplete="off">
                    </div>

                    <div class="label-container mt-4">
                        <label for="email" class="text-muted">Email</label>
                        <input type="email" name="email" id="email" autocomplete="off">
                    </div>

                    <div class="label-container mt-4">
                        <label for="password" class="text-muted">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off">
                    </div>
                    
                    <div class="label-container mt-4">
                        <label for="age" class="text-muted">Age</label>
                        <input type="text" name="age" id="age" autocomplete="off">
                    </div>
                    
                    <div class="label-container mt-4">
                        <label for="address" class="text-muted">Address</label>
                        <input type="text" name="address" id="address" autocomplete="off">
                    </div>

                    <div class="label-container mt-4">
                        <label for="position" class="text-muted">Position</label>
                        <select name="position" id="position">
                            <option value="employee">employee</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script src="js/main.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>