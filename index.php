<?php
session_start();
include("config.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/web-logo.png" width="125px"></a>
                </div>
                <nav>
                    <ul id="menuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="products.php">Product</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Conatact</a></li>
                        <li><a href="account.php">Log In</a></li>
                    </ul>
                </nav>
                <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
                <div class="noti_cart_number">
                <?php
                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];

                        $ip = get_ip();

                        $run_items = mysqli_query($con, "select * from cart where ip_address='$ip' and user_id='$user_id'");

                        echo $count_items = mysqli_num_rows($run_items);
                    }
                    ?>
                </div>

                <?php
                if (isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];

                    $run_query_by_id = mysqli_query($con, "select * from users where id = '$user_id'");
                    while ($row_user = mysqli_fetch_array($run_query_by_id)) {
                        $user_img = $row_user['image'];
                    }
                    echo "
                    <div class='profile'>
                    <a href='user/user_profile.php'><img src='upload-files/$user_img'></a>   
                    </div>
                        
                    ";
                } else {
                    echo "
                    <div class='profile'>
                    <a href='account.php'><img src='images/profile-1.png'></a>   
                    </div>   
                    ";
                }

                ?>

                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>

            <div class="row">
                <div class="col-2">
                    <h1>Elevate Your Melody<br>TUNE MART!</h1>
                    <p>Welcome to our online music instrument store,<br>where we're dedicated to elevating your musical journey.</p>
                    <a href="products.php" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/cover.png">
                </div>
            </div>
        </div>
    </div>

    <!-- ---------------featured categories----------------- -->

    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="images/Guitar_02.png">
                </div>
                <div class="col-3">
                    <img src="images/Drum_01.png">
                </div>
                <div class="col-3">
                    <img src="images/Violin_01.png">
                </div>
            </div>
        </div>
    </div>

    <!-- ---------------featured products----------------- -->

    <div class="small-container">
        <h2 class="title">Fearured Product</h2>
        <div class="fearured-products">

            <?php
            $get_pro = "select * from products";
            $run_pro = mysqli_query($con, $get_pro);

            $count = 0; // Initialize counter variable

            while ($row_pro = mysqli_fetch_array($run_pro)) {
                $pro_id = $row_pro['product_id'];
                $pro_cat = $row_pro['product_cat'];
                $pro_brand = $row_pro['product_brand'];
                $pro_title = $row_pro['product_title'];
                $pro_price = $row_pro['product_price'];
                $pro_desc = $row_pro['product_desc'];
                $pro_img_01 = $row_pro['product_img_01'];
                $pro_img_02 = $row_pro['product_img_02'];
                $pro_img_03 = $row_pro['product_img_03'];
                $pro_img_04 = $row_pro['product_img_04'];
                $pro_img_05 = $row_pro['product_img_05'];

                echo "
                <div class='col-4 item_holder product_brand_$pro_brand product_category_$pro_cat'>
                <a href='product_details.php?pro_id=$pro_id'><img src='admin/product_imgs/$pro_img_01'></a>
                <a href='product_details.php'><h4>$pro_title</h4></a>
                <div class='rating'>
                <i class='fa fa-star'></i>
                <i class='fa fa-star'></i>
                <i class='fa fa-star'></i>
                <i class='fa fa-star'></i>
                <i class='fa fa-star-o'></i>
                </div>
                <p>Rs.$pro_price.00</p>
                </div>
                ";

                $count++; // Increment the counter

                if ($count >= 4) {
                    break; // Exit the loop once 4 items are displayed
                }
            }
            ?>

        </div>




        <h2 class="title">Latest Product</h2>
        <div class="fearured-products">

            <?php
            $get_pro = "SELECT * FROM products ORDER BY product_id DESC";
            $run_pro = mysqli_query($con, $get_pro);

            $count = 0; // Initialize counter variable

            while ($row_pro = mysqli_fetch_array($run_pro)) {
                $pro_id = $row_pro['product_id'];
                $pro_cat = $row_pro['product_cat'];
                $pro_brand = $row_pro['product_brand'];
                $pro_title = $row_pro['product_title'];
                $pro_price = $row_pro['product_price'];
                $pro_desc = $row_pro['product_desc'];
                $pro_img_01 = $row_pro['product_img_01'];
                $pro_img_02 = $row_pro['product_img_02'];
                $pro_img_03 = $row_pro['product_img_03'];
                $pro_img_04 = $row_pro['product_img_04'];
                $pro_img_05 = $row_pro['product_img_05'];

                echo "
                <div class='col-4 item_holder product_brand_$pro_brand product_category_$pro_cat'>
                <a href='product_details.php?pro_id=$pro_id'><img src='admin/product_imgs/$pro_img_01'></a>
                <a href='product_details.php'><h4>$pro_title</h4></a>
                <div class='rating'>
                <i class='fa fa-star'></i>
                <i class='fa fa-star'></i>
                <i class='fa fa-star'></i>
                <i class='fa fa-star'></i>
                <i class='fa fa-star-o'></i>
                </div>
                <p>Rs.$pro_price.00</p>
                </div>
                ";

                $count++; // Increment the counter

                if ($count >= 4) {
                    break; // Exit the loop once 4 items are displayed
                }
            }
            ?>

        </div>
        
    </div>

    <!-- ---------------offer----------------- -->

    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="images/Discount.png" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Lorem ipsum dolor sit amet</p>
                    <h1>Classic Violin</h1>
                    <small>Lorem, ipsum dolor sit amet consectetur
                        adipisicing elit. Fuga natus recusandae
                        delectus adipisci optio perferendis fugiat
                        qui! Autem asperiores accusantium unde,
                    </small>
                    <a href="product_details.php" class="btn">Buy Now &#8594;</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ------ testimonial ------ -->

    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem, ipsum dolor sit amet consectetur
                        adipisicing elit. Fuga natus recusandae
                        delectus adipisci optio perferendis fugiat
                    </p>

                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="images/user-1.png">
                    <h3>Pubudu Ravindika</h3>
                </div>

                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem, ipsum dolor sit amet consectetur
                        adipisicing elit. Fuga natus recusandae
                        delectus adipisci optio perferendis fugiat
                    </p>

                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="images/user-2.png">
                    <h3>Pubudu Ravindika</h3>
                </div>

                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem, ipsum dolor sit amet consectetur
                        adipisicing elit. Fuga natus recusandae
                        delectus adipisci optio perferendis fugiat
                    </p>

                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="images/user-3.png">
                    <h3>Pubudu Ravindika</h3>
                </div>

            </div>
        </div>
    </div>

    <!-- ------ brands------ -->

    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="images/logo_yamaha.png">
                </div>

                <div class="col-5">
                    <img src="images/logo_fender.png">
                </div>

                <div class="col-5">
                    <img src="images/logo_shure.png">
                </div>

                <div class="col-5">
                    <img src="images/logo_gibsun.png">
                </div>

                <div class="col-5">
                    <img src="images/logo_sure.png">
                </div>
            </div>
        </div>
    </div>

    <!-- ------ footer------ -->

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <!-- <h3>Download Our App</h3>
                    <p>Lorem ipsum dolor sit amet</p> -->
                    <h3>Available Payment Methods</h3>
                    <p>Credit Card/ Debit Card</p>
                    <div class="app-logo">
                        <!-- <img src="images/play-store.png">
                        <img src="images/app-store.png"> -->
                        <img src="images/Payment.png">
                    </div>
                </div>

                <div class="footer-col-2">
                    <img src="images/web-logo-white.png" width="300px">
                    <p>Your journey to musical excellence begins here</p>
                </div>

                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Products</li>
                        <li>About US</li>
                        <li>Contact</li>
                    </ul>
                </div>

                <div class="footer-col-4">
                    <h3>Follow us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instergram</li>
                        <li>YouTube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2023 - Tune Mart</p>
        </div>
    </div>

    <!-- ------js for toggle menu------ -->

    <script>
        var menuItems = document.getElementById("menuItems");

        menuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (menuItems.style.maxHeight == "0px") {
                menuItems.style.maxHeight = "200px";
            } else {
                menuItems.style.maxHeight = "0px";
            }
        }
    </script>


</body>

</html>