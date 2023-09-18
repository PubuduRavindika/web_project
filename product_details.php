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
                    <a href="index.php"><img src="images/web-logo.png" width="125px"></a>
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
                <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
    </div>

    <!-------- single product details-------->


    <div class="small-container single-product">
        <div class="row">

        <?php
        if(isset($_GET['pro_id'])){
            $product_id = $_GET['pro_id'];

            $run_query_by_pro_id = mysqli_query($con, "select * from products where product_id = '$product_id'");

            while($row_pro = mysqli_fetch_array($run_query_by_pro_id)){

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
                <div class='col-2'>

                <img src='admin/product_imgs/$pro_img_01' width='100%' id='productImg'>

                <div class='small-img-row'>
                    <div class='small-img-col'>
                        <img src='admin/product_imgs/$pro_img_02' width='100%' class='small-img'>
                    </div>

                    <div class='small-img-col'>
                        <img src='admin/product_imgs/$pro_img_03' width='100%' class='small-img'>
                    </div>

                    <div class='small-img-col'>
                        <img src='admin/product_imgs/$pro_img_04' width='100%' class='small-img'>
                    </div>

                    <div class='small-img-col'>
                        <img src='admin/product_imgs/$pro_img_05' width='100%' class='small-img'>
                    </div>
                </div>
            </div>
            <div class='col-2'>
                <p>Home / $pro_title</p>
                <h1>$pro_title</h1>
                <h4>Rs.$pro_price.00</h4>

                <select>
                    <option>Select Color</option>
                    <option>Red</option>
                    <option>Black</option>
                    <option>Brown</option>
                </select>

                <input type='number' value='1'>
                <a href='product_details.php?add_cart=$pro_id' class='btn'>Add to Cart</a>

                <h3>Product Details <i class='fa fa-indent'></i></h3>
                <br>
                <p>$pro_desc</p>
            </div>
                ";
            }
        }
    ?>     
        </div>
    </div>

    <?php
    if(isset($_GET['add_cart'])){
        
        $product_id = $_GET['add_cart'];

        $run_check_pro = mysqli_query($con, "select * from cart where product_id='$product_id'");

        if(mysqli_num_rows($run_check_pro) > 0){
            echo "";
        }
        else{

            $fetch_pro = mysqli_query($con, "select * from products where product_id='$product_id'");
            $fetch_pro = mysqli_fetch_array($fetch_pro);
            $pro_title = $fetch_pro['product_title'];

            // get ip address
            function get_ip() {  
                //whether ip is from the share internet  
                 if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                            $ip = $_SERVER['HTTP_CLIENT_IP'];  
                    }  
                //whether ip is from the proxy  
                elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
                 }  
            //whether ip is from the remote address  
                else{  
                         $ip = $_SERVER['REMOTE_ADDR'];  
                 }  
                 return $ip;  
            }  

            $ip = get_ip();

            $run_insert_pro = mysqli_query($con, "insert into cart (product_id, product_title, ip_address, quality) values('$product_id', '$pro_title', '$ip', '')");
            
            if ($run_insert_pro) {
                header("location:products.php");
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

        }

    }
    ?>


    <!-------- titile-------->

    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <p>View More</p>
        </div>
    </div>


    <!-------- products-------->
    <div class="small-container">


        <div class="row">
            <div class="col-4">
                <img src="images/Guitar_01.png">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>Rs.500.00</p>
            </div>

            <div class="col-4">
                <img src="images/Violin_01.png">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>Rs.500.00</p>
            </div>

            <div class="col-4">
                <img src="images/Guitar_03.png">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>Rs.500.00</p>
            </div>

            <div class="col-4">
                <img src="images/Drum_01.png">
                <h4>Red Printed T-Shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>Rs.500.00</p>
            </div>
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
                <img src="images/web-logo-white.png" width="300px">
                    <p>Your journey to musical excellence begins here</p>
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

    <!--------js for toggle menu-------->

    <script>
        var menuItems = document.getElementById("menuItems");

        menuItems.style.maxHeight = "0px";

        function menutoggle(){
            if(menuItems.style.maxHeight == "0px"){
                menuItems.style.maxHeight = "200px";
            }

            else{
                menuItems.style.maxHeight = "0px";
            }
        }
    </script>


    <!-- ------js for product gallery-------->

    <script type="text/JavaScript">
        var productImg = document.getElementById("productImg");
        var smallImg = document.getElementsByClassName("small-img");

        // if (productImg == null) {
        //     console.log('productImg is null');
        // }
        // else{
        //     console.log('productImg is not null');
        // }

        smallImg[0].onclick = function(){
            
            // console.log(productImg);
            productImg.src = smallImg[0].src;
        }

        smallImg[1].onclick = function(){
            productImg.src = smallImg[1].src;
        }

        smallImg[2].onclick = function(){
            productImg.src = smallImg[2].src;
        }

        smallImg[3].onclick = function(){
            productImg.src = smallImg[3].src;
        }
    </script>

</body>

</html>