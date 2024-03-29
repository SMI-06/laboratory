<?php
require("../includes/config.php");
session_start();
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
    $logged_id = $userDetail["userId"];
}
elseif (isset($_SESSION['testerDetails'])) {
    $testerDetail = $_SESSION['testerDetails'];
    $logged_id = $testerDetail["testerId"];
}


if (isset($_REQUEST['add_product'])) {
    $product_image = $_FILES['ProductImage']['name'];
    $product_tmp_image = $_FILES['ProductImage']['tmp_name'];
    $Imagepath = '../assets/img/productsImages/' . $product_image;
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
            $query1 =  "INSERT INTO `products`(`productName`, `productCategory`, `productDescription`, `productPrice`, `productImage`, `user_id`,`lab_id`) VALUES ('$product_name','$product_category','$product_description','$product_price','$product_image',$logged_id,$product_laboratory)";
            $insert_product = mysqli_query($conn,$query1);
            $p_id =  mysqli_insert_id($conn);
            $product_nameCode = str_split($product_name);
            $productCode = $product_nameCode[0] ."-". $p_id;
            $product_code = mysqli_query($conn,"UPDATE `products` SET `Product_code`='$productCode' WHERE Product_id = $p_id");
            header("location: ../product.php?id=productshowsssss");
            
        }
    } else {
        echo "<script>alert('Please Upload a Image')</script>";
    }
}
