<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserting Products</title>
    <link rel="stylesheet" href="admin_style.css">
</head>

<body>
    <div class="container">
        <form action="insert_product.php" method="post">
            <table>
                <tr>
                    <th>Insert New Post Here</th>
                </tr>

                <tr class="details_tr">
                    <td>Product Title:</td>
                    <td><input type="text" name="product_title" placeholder="Product Title" required></td>
                </tr>

                <tr class="details_tr">
                    <td>Product Category:</td>
                    <td>
                        <select name="product_cat">
                            <option>Select a Category</option>

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
                    </td>
                </tr>

                <tr class="details_tr">
                    <td>Product Brand:</td>
                    <td>
                        <select name="product_brand">
                            <option>Select a Brand</option>

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
                    </td>
                </tr>

                <tr class="details_tr">
                    <td>Product Image:</td>
                    <td><input type="file" name="product_img" required></td>
                </tr>

                <tr class="details_tr">
                    <td>Product Price:</td>
                    <td><input type="text" name="product_price" placeholder="Product Price" required></td>
                </tr>

                <tr class="details_tr">
                    <td>Product Description:</td>
                    <td><textarea cols="20" rows="10" name="product_desc" required></textarea></td>
                </tr>

                <tr class="details_tr">
                    <td>Product Keywords:</td>
                    <td><input type="text" name="product_keywords" placeholder="Product Keywords" required></td>
                </tr>

                <tr class="submit_tr">
                    <td><input class="btn" type="submit" name="insert_post" value="Insert Product Now"></td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>

<?php

if(isset($_POST['insert_post'])){
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = trim(mysqli_real_escape_string($con,$_POST['product_desc']));
    $product_keywords = $_POST['product_keywords'];

    //getting the image from the field

    $product_img = $_FILES['product_img']['name'];
    $product_img_tmp = $_FILES['product_img']['tmp_name'];

    move_uploaded_file($product_img_tmp,"product_imgs/$product_img");

    $insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_img,product_keywords) values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_img','$product_keywords')";

    $insert_pro = mysqli_query($con, $insert_product);

    if($insert_pro){
        echo "<script>alert('Product has been insert successfully')</script>";

        echo "<script>window.open('index.php?insert_product','self')</script>";
    }

}
?>