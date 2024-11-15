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

<section class="section-back">
    <?php
    if ($_GET['id'] == "laboratoryType") { ?>
        <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transform:uppercase">Add Laboratory Type</h3>
        <!-- <div > -->
        <form action="logics/logic.add.laboratory.php" method="post" enctype="multipart/form-data">
            <div class="container py-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4 w-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="laboratorytype">Laboratory Type</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="laboratorytype" placeholder="Enter Laboratory Type" id="laboratorytype">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input type="submit" value="Add Laboratory Type" name="add-laboratory-type" class="btn btn-outline-dark rounded-pill">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- </div> -->
    <?php } elseif ($_GET['id'] == "another") { ?>
        <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transform:uppercase">Request For Another Thing</h3>
    <?php } ?>
</section>

<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<?php require("includes/footer.inc.php"); ?>