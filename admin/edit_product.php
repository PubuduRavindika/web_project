<?php
session_start();
include("../config.php");

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Retrieve product details
    $result = mysqli_query($con, "SELECT * FROM products WHERE product_id = '$product_id'");
    $row = mysqli_fetch_assoc($result);

    // Display the form for editing
    // You may need to customize this form based on your product details
    echo "<form method='post' action='update_product.php'>";
    echo "<input type='hidden' name='product_id' value='" . $row['product_id'] . "'>";
    echo "Product Title: <input type='text' name='product_title' value='" . $row['product_title'] . "'><br>";
    echo "Product Price: <input type='text' name='product_price' value='" . $row['product_price'] . "'><br>";
    echo "<input type='submit' value='Update Product'>";
    echo "</form>";
}
?>

<select name="product_cat">
    <option disabled selected>Select a Category</option>
    $get_cats = "select * from categories";

    $run_cats =  mysqli_query($con, $get_cats);

    while ($row_cats = mysqli_fetch_array($run_cats)) {
        $cat_id = $row_cats['cat_id'];

        $cat_title = $row_cats['cat_title'];

        echo "<option value='$cat_id'>$cat_title</option>";
    }
</select>