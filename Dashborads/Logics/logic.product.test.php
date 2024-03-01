<?php
require("../includes/config.php");
session_start();
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
    $logged_id = $userDetail["userId"];
}


if (isset($_REQUEST['add_product'])) {
    $product_image = $_FILES['ProductImage']['name'];
    $product_tmp_image = $_FILES['ProductImage']['tmp_name'];
    $Imagepath = '../assets/img/UserImages/' . $product_image;
    $location = move_uploaded_file($product_tmp_image, $Imagepath);
    if ($location) {
        $product_name = $_REQUEST['Productname'];
        $product_category = $_REQUEST['ProductCategory'];
        $product_description = $_REQUEST['ProductDescription'];
        $product_price = $_REQUEST['ProductPrice'];
        $product_laboratory_type = $_REQUEST['laboratorytype'];
        $product_laboratory = $_REQUEST['Laboratory'];

        if (!($product_name && $product_category && $product_description && $product_price && $product_laboratory_type && $product_laboratory)) {
            echo "<script>alert('Fill All filled')</script>";
        } else {    
            $query1 =  "INSERT INTO `products`(`productName`, `productCategory`, `productDescription`, `productPrice`, `productImage`, `user_id`) VALUES ('$product_name','$product_category','$product_description','$product_price','$product_image',$logged_id)";
            $insert_product = mysqli_query($conn,$query1);
            var_dump($query1);
            var_dump($insert_product);
            if ($insert_product == true) {
                $query = "INSERT INTO `testing_product`(`productName`, `productCetagory`, `productdescription`, `productImage`, `productPrice`, `laboratoryType`, `laboratory`,`user_id`) VALUES (
                    '$product_name',
                    '$product_category',
                    '$product_description',
                    '$product_image',
                    '$product_price',
                    '$product_laboratory_type',
                    '$product_laboratory','$logged_id')";
                $insert_testing_product = mysqli_query($conn, $query);
                header("location: ../index.php");
            }
        }
    } else {
        echo "<script>alert('Please Upload a Image')</script>";
    }
}
