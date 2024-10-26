<?php require("includes/config.php"); ?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
}
$title = "Lab Automation | Profile | Update";
?>

<?php require("includes/header.inc.php"); ?>


<?php
if (isset($_GET['nic'])) { ?>
<section class="section-back" style="margin-top: 20rem; margin-right:15rem">
    <p class="text-white text-center">If You Want To Change Your CNIC Number</p>
    <h6 class="text-white text-center">Contact With Your Admin</h6>
    <a href="profile.updated.profile.php?userDetails=<?php echo $userDetail['userId'] ?> ">
        <p style="margin-left:22.5rem" class="btn btn-outline-dark rounded-pill">Okay</p>
    </a>
</section>
<?php } elseif(isset($_GET['em'])) { ?>
<section class="section-back" style="margin-top: 20rem; margin-right:15rem">
    <p class="text-white text-center">If You Want To Change Your Email Address</p>
    <h6 class="text-white text-center">Contact With Your Admin</h6>
    <a href="profile.updated.profile.php?userDetails=<?php echo $userDetail['userId'] ?> ">
        <p style="margin-left:22.5rem" class="btn btn-outline-dark rounded-pill">Okay</p>
    </a>
</section>
<?php } elseif(isset($_GET['un'])) { ?>
<section class="section-back" style="margin-top: 20rem; margin-right:15rem">
    <p class="text-white text-center">If You Want To Change Your User Name</p>
    <h6 class="text-white text-center">Contact With Your Admin</h6>
    <a href="profile.updated.profile.php?userDetails=<?php echo $userDetail['userId'] ?> ">
        <p style="margin-left:22.5rem" class="btn btn-outline-dark rounded-pill">Okay</p>
    </a>
</section>
<?php } elseif(isset($_GET['pic'])) { ?>
<section class="section-back" style="margin-top: 20rem; margin-right:15rem">
    <p class="text-white text-center">If You Want To Change Your Picture</p>
    <h6 class="text-white text-center">Contact With Your Admin</h6>
    <a href="profile.updated.profile.php?userDetails=<?php echo $userDetail['userId'] ?> ">
        <p style="margin-left:22.5rem" class="btn btn-outline-dark rounded-pill">Okay</p>
    </a>
</section>
<?php }?>

<?php require("includes/footer.inc.php"); ?>