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

    <style>
        <?php include "css/style.css"?>
    </style>
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
                    <li><i class="fab fa-product-hunt"></i><a href="#">Customers</a></li>
                    <li><i class="fas fa-warehouse"></i><a href="#">Orders</a></li>
                    <li><i class="fas fa-warehouse"></i><a href="#">Sales</a></li>
                </ul>

                <hr>
                <p class="subtitle text-muted mt-3">PAGES</p>
                <ul class='list-unstyled'>
                    <li><i class="fas fa-user-tie"></i> <a href="#">Home</a></li>
                    <li><i class="fas fa-warehouse"></i><a href="#">Messages</a></li>
                </ul>
            </div>
            
            <!-- Side Panel -->
            <div class="col-12 col-md-9 m-0 p-0 right-panel">
                <div class="bg-white text-dark px-4 py-4 shadow d-flex justify-content-end align-items-center">
                    <img src="images/admin-pic.png" alt="admin profile" class="admin-pic">
                    <p class="m-0 p-0">Admin name  <span id="date_time"></span></p>
                </div>
                <p class="text-center title">Manage Employees</p>

                <div class="employee-options px-3 py-4">
                    <a href="#"><button class="btn btn-primary text-white">Show Employee</button></a>
                    <a href="add_employee.php"><button class="btn btn-info text-white">Add Employee</button></a>
                    <a href="update_employee.php"><button class="btn btn-success text-white">Update Employee</button></a>
                    <a href="delete_employee.php"><button class="btn btn-danger text-white">Delete Employee</button></a>
                </div>
                <table id="employee_table" class="table table-hover">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Position</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            require_once("main.php");
                            $employees = $store->showEmployees();
                        ?>
                        <?php foreach($employees as $employee){ ?>
                            <tr>
                                <td><?=$employee['name'] ?></td>
                                <td><?=$employee['lastname'] ?></td>
                                <td><?=$employee['email'] ?></td>
                                <td><?=$employee['age'] ?></td>
                                <td><?=$employee['address'] ?></td>
                                <td><?=$employee['position'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>        
                </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    
  </body>
</html>