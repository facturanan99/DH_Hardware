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
<body>
    <div class="main-nav">
        <div class="row">
            <div class="col-12 col-md-3 d-flex align-items-center justify-content-center ">
                <p class="m-0 logo lead"><span class="dh">DH</span> Hardware</p>
            </div>

            <div class="col-12 col-md-5 d-flex align-items-center justify-content-center ">
                <input type="text" name="search" id="search" placeholder="What can we help you find?" autocomplete="off">
                <button type="submit" id="search-items">Search<i class="fas fa-search mx-2"></i></button>
            </div>

            <div class="col-12 col-md-4 d-flex align-items-center justify-content-center ">
                <div class="user-container mx-3 d-flex flex-column align-items-center justify-content-center">
                    <div id="user-profile">
                        <img src="images/misc/profile-user.png" alt="user-profile">
                    </div>
                   <a href="user-login.php" class="text-decoration-none"><p class="m-0 p-0 lead c-txt text-white">My Account</p></a> 
                </div>

                <div class="cart-container d-flex flex-column align-items-center justify-content-center">
                    <img src="images/misc/shopping-cart.png" alt="carts" id="cart">
                    <p class="m-0 p-0 lead c-txt">Cart</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Link -->
    <div class="container-fluid nav">
        <div class="container d-flex align-items-center">
            <div class="drp-link h-100">
                <button>All Categories <span class="mx-1"><i class="fas fa-caret-down"></i></span></button>    
                <div class="drp-item d-flex flex-column">
                    <a href="1">Power Tools</a>
                    <a href="#">Hand Tools</a>
                    <a href="#">Wood Products</a>
                    <a href="#">Furnitures</a>
                    <a href="#">Electrical Supplies</a>
                    <a href="#">Cleaning Products</a>
                    <a href="5">Paints</a>
                </div>
            </div>
            <ul class="list-unstyled m-0 p-0 d-flex nav-items">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Top Sales</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>

        </div>
    </div>

    <div class="showcase text-white">
        <div class="container z-fix d-flex flex-column justify-content-center h-100 showcase-container">
            <h1>Discounted Hardware </h1>
            <h2>Online Shop</h2>
            <p class="p-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et, facere. Lorem ipsum dolor sit amet.</p>

            <button class="shopnow-btn">Shop Now</button>
        </div>
    </div>

    <!-- Products -->
    <div class="container">
     <p class="p-title p-0 mt-5">Popular Products</p>

     <div class="my-4 d-flex flex-wrap justify-content-center ">
         <?php
            require_once("main.php");
            $items = $store->displayProducts();
         ?>

         <?php foreach($items as $item) {?>
        <div class="product-container border product-container mt-4 shadow">
            <img src="images/products/<?= $item["pic_name"]?>" alt="product" id="product-img">
            <div class="d-flex align-items-end justify-content-center rating-container mt-3">
                <i class="fa fa-star mx-1" aria-hidden="true"></i>
                <i class="fa fa-star mx-1" aria-hidden="true"></i>
                <i class="fa fa-star mx-1" aria-hidden="true"></i>
                <i class="fa fa-star mx-1" aria-hidden="true"></i>
                <i class="fa fa-star mx-1" aria-hidden="true"></i>
            </div>
            <a href="#"><p class="m-0 p-0 lead mt-2" id="product_name"><?= $item["product_name"] ?></p></a>
            <p class="m-0 p-0 mt-1" id="price">Price: <span>&#8369;</span> <?= $item["price"] ?>.00</p>
            <p class="m-0 p-0">Available Stock: <?= $item["qty"] ?></p>
            <p class="m-0 p-0">Category: <?= $item["category"] ?></p>

            <button class="btn btn-info mt-3 py-2 text-white"><i class="fas fa-cart-plus mx-1"></i> Add to Cart</button>
        </div>    
        <?php } ?>
     </div>

    </div>
    <!-- Footer -->
    <div class="container-fluid footer mt-4 text-white py-4" style="display:none">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <p class="m-0 p-0 "></p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script>
        $(document).ready(function(){
            // showcase text animation
            $(".showcase-container").animate({top: '100px', opacity: 1}, 700, 'linear');
       });
    </script>

</body>
</html>