<?php
require("includes/config.php");
?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
}
$title = "Lab Automation | All Users "
?>

<?php require("includes/header.inc.php"); ?>

<!-- Navbar Start -->
<?php require("components/navbar.php"); ?>
<!-- Navbar End -->

<!-- Sidebar Start -->
<?php require("components/sidebar.php"); ?>
<!-- Sidebar End -->

<div class="container-fluid pt-4 px-4">
    <h3 class="text-dark text-center text-uppercase">Edit Product</h3>
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <form method="post" action="logics/logic.edit.user.php">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    // echo $id; exit();
                }
                $query = mysqli_query($conn, "SELECT * FROM `products` WHERE Product_code = '$id' ");

                if (mysqli_num_rows($query)) {
                    while ($row = mysqli_fetch_assoc($query)) {
                ?>
                        <div class="row mb-3">
                            <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" hidden readonly name="Product_code" class="form-control" value="<?php echo $row['Product_code'] ?>" id="Product_code">
                                <input type="text" name="productName" class="form-control" value="<?php echo $row['productName'] ?>" id="productName">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="productCategory" class="col-sm-2 col-form-label">Product Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="ProductCategory" id="ProductCategory" aria-label="Floating label select example">
                                    <option selected hidden disabled>Select Product Category</option>
                                    <option value="Electrical Category">Electrical Category</option>
                                    <option value="Medical Category">Medical Category</option>
                                    <option value="Other Category">Other Category</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="productDescription" class="col-sm-2 col-form-label">Product Description</label>
                            <div class="col-sm-10">
                                <input type="text" readonly value="<?php echo $row['productDescription'] ?>" name="productDescription" class="form-control" id="productDescription">
                            </div>
                        </div>
                        <button type="submit" name="editUser" class="btn btn-dark  rounded-pill py-2 w-100 mt-4">Edit User</button>
                <?php }
                } ?>
            </form>
        </div>
    </div>
</div>

<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php require("includes/footer.inc.php"); ?>