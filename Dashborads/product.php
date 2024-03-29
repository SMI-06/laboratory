<?php require("includes/config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
} elseif (isset($_SESSION['testerDetails'])) {
    $testerDetail = $_SESSION['testerDetails'];
}
$title = "Lab Automation | Products"
?>

<?php require("includes/header.inc.php"); ?>

<!-- Navbar Start -->
<?php require("components/navbar.php"); ?>
<!-- Navbar End -->

<!-- Sidebar Start -->
<?php require("components/sidebar.php"); ?>
<!-- Sidebar End -->

<section class="section-back">
    <!-- City -->
    <?php
    if ($_GET['id'] == "productAdd") { ?>
        <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transform:uppercase">Add Product</h3>
        <?php require('products_pages/add.products.php'); ?>




        <!-- ////////////////////  --------------  Product Show --------------------------  \\\\\\\\\\\\\ -->

    <?php } else if ($_GET['id'] == "productshow") { ?>
        <h3 class="text-dark text-center text-uppercase mt-3"> products</h3>
        <div class="col-sm-12 col-xl-12">
            <?php
            if (isset($testerDetail["Role"]) == "Tester") {
                require('products_pages/tester.products.all.php');
            } elseif ($userDetail["Role"] == "User") {
                require('products_pages/user.products.all.php');
            }
            // else { }
            ?>
        </div>
    <?php } ?>

</section>

<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php require("includes/footer.inc.php"); ?>