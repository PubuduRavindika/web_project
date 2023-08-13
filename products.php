<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - RedStore</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" width="125px"></a>
                </div>
                <nav>
                    <ul id="menuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="products.php">Product</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Conatact</a></li>
                        <li><a href="account.html">Account</a></li>
                    </ul>
                </nav>
                <a href="cart.html"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
    </div>

    <div class="small-container">

        <div class="row row-2">
            <h2>All Products</h2>
            <div class="search-container">
                <input type="text" name="user_query" class="search" placeholder="Search">
                <div name="search" class="btn search-btn">Search</div>
                <!-- <input type="submit" name="search" value="search" class="btn search-btn"> -->
            </div>
            <select>
                <option>All Categories</option>

                <?php
                $get_cats = "select * from categories";

                $run_cats =  mysqli_query($con, $get_cats);

                while ($row_cats = mysqli_fetch_array($run_cats)) {
                    $cat_id = $row_cats['cat_id'];

                    $cat_title = $row_cats['cat_title'];

                    echo "<option value='$cat_id'>$cat_title</option>";
                }

                ?>
            </select>

            <?php
            ?>

            <select>
                <option>All Brands</option>

                <?php
                $get_brands = "select * from brands";

                $run_brands =  mysqli_query($con, $get_brands);

                while ($row_brands = mysqli_fetch_array($run_brands)) {
                    $brand_id = $row_brands['brand_id'];

                    $brand_name = $row_brands['brand_name'];

                    echo "<option value='$brand_id'>$brand_name</option>";
                }
                ?>
            </select>
        </div>

        <div class="row-products">

            <?php
            $get_pro = "select * from products";

            $run_pro = mysqli_query($con, $get_pro);

            while ($row_pro = mysqli_fetch_array($run_pro)) {
                $pro_id = $row_pro['product_id'];
                $pro_cat = $row_pro['product_cat'];
                $pro_brand = $row_pro['product_brand'];
                $pro_title = $row_pro['product_title'];
                $pro_price = $row_pro['product_price'];
                $pro_desc = $row_pro['product_desc'];
                $pro_img = $row_pro['product_img'];

                echo "
                    <div class='col-4'>
                    <a href='product_details.php'><img src='admin/product_imgs/$pro_img'></a>
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
            }
            ?>



        </div>

        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594</span>
        </div>
    </div>

    <!-- ------ footer------ -->

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Lorem ipsum dolor sit amet</p>
                    <div class="app-logo">
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>
                </div>

                <div class="footer-col-2">
                    <img src="images/logo-white.png">
                    <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                </div>

                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
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
            <p class="copyright">Copyright 2023 - Delf Media</p>
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