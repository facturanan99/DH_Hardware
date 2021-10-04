<?php 
    require_once("main.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- FONT Awesome -->
    <script src="https://kit.fontawesome.com/4f1a945a46.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <style>
        <?php include "css/index.css"?>
    </style> 
    
    <title>DH Hardware</title>
</head>
<body class="login-page-body">
    <div class="container">
        <div class="login-container p-1"> 
            <div class="row h-100 text-white">
                <form method="post" class="col-12 col-md-4 left"> <!-- FORM -->
                    <div class="backToHome"><a href="index.php"><i class="fas fa-arrow-alt-circle-left mx-2"></i></i> Back To Home</a></div>
                    <div class="content"> 
                        <p class="heading mt-5">Welcome to</p>
                        <p class="heading heading-fix">Discounted Hardware</p>
                        <p class="m-0 p-0 mt-3">'Online Shopping is no longer the future of shop, it's the present'</p>
                        <input type="text" name="email" placeholder="Enter Email" autocomplete="off"><br>
                        <input type="password" name="password-login" placeholder="Enter Password" autocomplete="off"><br>
                        <div class="rememberMe mt-2"> 
                            <input type="checkbox" name="rememberMe" id="rememberMe" class="m-0 p-0"> <col-span> Remember Me</span>
                        </div>
                        <button class="btn" type="submit" name="login">Login <i class="fas fa-sign-in-alt"></i></button>
                        <?php 
                             $store->userLogin();
                        ?>
                    </div>
                </form>

                <form method="post" action="#" class="col-12 col-md-8 right"> <!-- FORM -->
                    <div class="content">
                        <center><p class="mb-4 heading text-white">Sign Up<i class="fas fa-user-circle mx-2"></i></p></center>
                        <div class="signup-container">
                            <div class="left-side">
                            <label for="name">Full name</label>
                                <input type="text" name="name" required />

                                <label for="email">Email</label>
                                <input type="email" name="email"  required />

                                <label for="password">Password</label>
                                <input type="password" name="password"  required />

                                <label for="pass-confirmation">Confirm Password</label>
                                <input type="password" name="pass-confirmation"  required />

                   
                            </div>

                            <div class="right-side">
                                <label for="address">Address</label>
                                <input type="text" name="address"  required />

                                <label for="age">Age</label>
                                <input type="text" name="age"  required />

                                <label for="contact-no">Contact no</label>
                                <input type="text" name="contact-no"  required />

                                <label for="b-date">Birth Date</label>
                                <input type="date" name="b_date" id="b_date"  required>

                            </div>
                            
                        </div>
                        <center>
                         <button type="submit" name="submit" class="btn mt-5 w-25 py-3">Submit <i class="fas fa-sign-in-alt"></i></button>
                        </center>
                        <?php 
                             $store->addUser();
                        ?>
                    
                    </div>
                </form>
            </div>
        <div>
    </div>
    
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">


</body>
</html>