<?php
session_start();
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    // Add other fields as needed

    // Update product details
    $update_query = "UPDATE products SET product_title = '$product_title', product_price = '$product_price' WHERE product_id = '$product_id'";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        echo "<script>alert('Product has been updated successfully!')</script>";
        echo "<script>window.open('view_product.php?action=view_pro','_self')</script>";
    } else {
        echo "<script>alert('Failed to update product!')</script>";
    }
}
?>