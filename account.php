<?php
session_start();
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

    <!-------- account page-------->

    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/cover.png" width="100%">
                </div>

                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="reg()">Register</span>
                            <hr id="indicator">
                        </div>

                        <form id="loginForm" method="post">
                            <input type="text" placeholder="Username" name="email">
                            <input type="password" placeholder="Password" name="password">
                            <button type="submit" class="btn" name="login">Login</button>
                            <a href="">Forgot password</a>
                        </form>

                        <form id="regForm" method="post">
                            <input type="text" placeholder="Username">
                            <input type="email" placeholder="Email">
                            <input type="password" placeholder="Password">
                            <input type="password" placeholder="Confirm Password">
                            <button type="submit" class="btn">Register</button>
                        </form>
                    </div>
                </div>
                
                <?php
                    if(isset($_POST['login'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        $run_login = mysqli_query($con, "select * from users where password='$password' AND email='$email'");

                        $check_login = mysqli_num_rows($run_login);

                        if($check_login == 0){
                            echo "<script>alert('Password or email is incorrect, Please try again!')</script>";
                            exit();
                        }

                        $ip = get_ip();

                        $run_cart = mysqli_query($con, "select * from cart where ip_address='$ip'");
                        $check_cart = mysqli_num_rows($run_cart);
                        if($check_login > 0 AND $check_cart==0){
                            $_SESSION['email'] = $email;
                            echo "<script>alert('Logged in successfully!')</script>";
                            echo "<script>window.open('customer/my_account.php','_self')</script>";
                        }
                        else{
                            $_SESSION['email'] = $email; 
                            echo "<script>alert('Logged in successfully!')</script>";
                            echo "<script>window.open('checkout.php','_self')</script>";
                        }
                    }
                ?>

            </div>
        </div>
    </div>




    <!-------- footer-------->

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

    <!--------js for toggle menu-------->

    <script>
        var menuItems = document.getElementById("menuItems");

        menuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (menuItems.style.maxHeight == "0px") {
                menuItems.style.maxHeight = "200px";
            }

            else {
                menuItems.style.maxHeight = "0px";
            }
        }
    </script>


    <!--------js for toggle form-------->

    <script>
        var loginForm = document.getElementById("loginForm");
        var regForm = document.getElementById("regForm");
        var indicator = document.getElementById("indicator");

        function login(){
            loginForm.style.transform = "translateX(0px)";
            regForm.style.transform = "translateX(0px)";
            indicator.style.transform = "translateX(0px)";
        }

        function reg(){
            loginForm.style.transform = "translateX(300px)";
            regForm.style.transform = "translateX(300px)";
            indicator.style.transform = "translateX(100px)";
        }


    </script>



</body>

</html>