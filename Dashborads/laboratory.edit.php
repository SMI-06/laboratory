<?php require("includes/config.php"); ?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
}
$title = "Lab Automation | Profile | Update"
?>

<?php require("includes/header.inc.php"); ?>

<!-- Navbar Start -->
<?php require("components/navbar.php"); ?>
<!-- Navbar End -->

<!-- Sidebar Start -->
<?php require("components/sidebar.php"); ?>
<!-- Sidebar End -->


<section class="main-section section-back">

<?php 
    if($_GET['p'] === "LReq" && $userDetail["Role"] == 'super admin')
    {
       require("Edits/edit.req.lab.php");
    }
?>

</section>


<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<?php require("includes/footer.inc.php"); ?>