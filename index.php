<?php
    require_once("main.php");
    $items = $main_class->displayProducts();

    // Session 
    $userdetails = $main_class->get_userdata();
 
    //if($userdetails['access'] == 'admin'){
        //header("Location: add_employee.php");
    //}
    print_r($userdetails);
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
    <link href="css/index.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    
    <title>DH Hardware</title>
</head>
<body style="width: 100vw">
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
                   <a href="login.php" class="text-decoration-none"><p class="m-0 p-0 lead c-txt text-white">My Account</p></a> 
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
            <div class="d-flex justify-content-center align-items-center mt-3 py-1 px-2 cart-info-container">
                <a href="#" class=""><button class="btn btn-info text-white">More Info</button></a>
                <button class="text-white btn p-0"><i class="btn btn-danger fas fa-cart-plus"></i><br></button>
            </div>
        </div>    
        <?php } ?>
     </div>

    </div>
    
    <!-- News Letter -->
    <div class="container-fluid bg-dark text-white mt-5 py-5">
        <div class="container d-flex flex-column justify-content-center align-items-center newsletter-container pb-2">
            <p class="text-center m-0 p-0 title">Stay in Touch with Us</p>
            <p class="lead">Subscribe to our newsletter for the latest news and product updates straight to your inbox. </p>
            <form action="#" method="post" class="mt-4 w-50">
                <input type="email" name="email" required autocomplete="off" placeholder="Type email here..">
                <a href="#"><i class="fas fa-arrow-alt-circle-right text-primary"></i></a>
            </form>
        </div>
    </div>

    <!-- About Us -->
    <div class="mt-5 container-fluid py-5">
        <div class="container">
            <div class="row aboutus-container">
                <div class="col-12 col-md-4 store-img">
                    
                </div>

                <div class="col-12 col-md-7">
                    <h2 class="m-0 p-0 title">About Us</h2>
                    <hr class="m-0 p-0 mt-2 my-4">
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dignissimos aperiam ad, molestias voluptatum quaerat iusto beatae vel facere fuga aliquid unde sequi minus ipsa! Consequatur officiis perferendis possimus architecto, deleniti laboriosam atque ex commodi animi tempora eaque minus saepe enim ut, consectetur facilis incidunt illum fugiat? Et eaque similique modi sit enim inventore ab error consequatur maiores, deserunt voluptatum facilis sunt, ipsum aliquam sed necessitatibus ipsa voluptas perspiciatis impedit cum culpa. Itaque eaque harum quasi asperiores amet et culpa nobis vitae, consequatur quaerat, iure beatae quas distinctio maxime? Quo laudantium laborum ullam rem natus, ut iste maxime eveniet dolorem fuga aliquam? Nostrum eos velit quo nemo omnis totam, quam optio saepe accusamus ad cumque quia consequatur error illo quos.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="container-fluid pt-5 pb-3 footer text-white bg-dark">
        <div class="container">
            <div class="row">
            <div class="col-12 col-md-4 mx-1">
                    <p class="footer-heading">Contact Us <i class="fas fa-info-circle mx-4 text-warning"></i></p>
                    <hr>
                    <ul class="list-unstyled contact-us">                  
                        <li><a href="#"><i class="fas fa-envelope"></i>discount_hardware@gmail.com</a></li>
                        <li><a href="#"><i class="fas fa-phone-square-alt "></i>02-8123-4567</a></li>
                        <li><a href="#"><i class="fas fa-mobile-alt "></i>+63-2-8123-4567</a></li>  
                        <li><a href="#"><i class="fas fa-map-marker-alt "></i>Palanca Building Cabangan Pasay City</a></li>
                        <li><i class="far fa-calendar-alt "></i>Monday to Friday 8:00am - 10:00pm </li>
                    </ul>
                </div>

                <div class="col-12 col-md-4 mx-1">
                    <ul class="list-unstyled">
                       <p class="footer-heading">Social Media Links<i class="fas fa-heart text-danger mx-4"></i></p>
                        <hr>
                        <div class="footer-link-container">
                            <i class="fab fa-facebook-square "></i>
                            <li><a href="#">www.facebook.com/DiscountedHardware</a></li>
                        </div>

                        <div class="footer-link-container">
                            <i class="fab fa-twitter-square"></i>
                            <li><a href="#">www.twitter.com/DiscountedHardware</a></li>
                        </div>

                        <div class="footer-link-container">
                            <i class="fab fa-instagram-square"></i>
                            <li><a href="#">www.instagram.com/DiscountedHardware</a></li>
                        </div> 
                    </ul>
                </div>

                <div class="col-12 col-md-3">
                    <ul class="list-unstyled policy">
                        <p class="footer-heading">Company Policy<i class="fas fa-thumbtack mx-4 text-info"></i></p>
                        <hr>
                        <li><a href="#">terms of service</a></li>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">return policy</a></li>    
                    </ul>
                </div>
            </div>
            <hr>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <p class="lead m-0 p-0 text-muted">All rights reserve &copy;2021</p>
                <p class="m-0 p-0 text-muted">Access Computer Colleges Capstone 1 Project </p>
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