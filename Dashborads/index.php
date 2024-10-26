<?php 
require("includes/config.php"); ?>
 
<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
} else if (isset($_SESSION['testerDetails'])) {
    $testerDetails = $_SESSION['testerDetails'];
}
$title = "Lab Automation | Dashboard"
?>

<?php  require("includes/header.inc.php"); ?>

<!-- Navbar Start -->
<?php require("components/navbar.php"); ?>
<!-- Navbar End -->

<!-- Sidebar Start -->
<?php require("components/sidebar.php"); ?>
<!-- Sidebar End -->
<style>
    .welcome {
        color: #2B7DDF
    }

    .name {
        color: #2B7DDF;
    }
</style>


<section class="main-section">
    <?php
    if (isset($testerDetails['Role']) == "Tester") {
        require("Index_pages/tester.index.php");
    }
    //  Admin Dashborad
    else if ($userDetail['Role'] == "admin") {
        require("Index_pages/admin.index.php");
    }
    //  Tester Dashborad
    else if ($userDetail['Role'] == "super admin") {
        require("Index_pages/super.admin.index.php");
    }
    // User Dashborad
    else if (isset($userDetail['Role']) == "User") { ?>
        <?php require("Index_pages/user.index.php"); ?>
        <!-- Hello -->
    <?php } ?>
</section>
<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php require("includes/footer.inc.php"); ?>