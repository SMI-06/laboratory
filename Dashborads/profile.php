<?php require("includes/config.php"); ?>

<?php
require("auth/auth.check.php");
$id = 0;
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
    $id = (int) $userDetail['userId'];
    if ($userDetail['Role'] == "Super Admin") {
        $heading = "Super Admin";
    } elseif ($userDetail['Role'] == "admin") {
        $heading = "admin";
    } else {
        $heading = "User";
    }
} elseif (isset($_SESSION['testerDetails'])) {
    $testerDetails = $_SESSION['testerDetails'];
    $T_id = (int) $testerDetails['testerId'];
    $heading = "Tester";
}
$title = "Lab Automation | Profile"
?>

<?php require("includes/header.inc.php"); ?>

<!-- Navbar Start -->
<?php require("components/navbar.php"); ?>
<!-- Navbar End -->

<!-- Sidebar Start -->
<?php require("components/sidebar.php"); ?>
<!-- Sidebar End -->

<section class="section-back">
    <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transform:uppercase"><?php echo $heading ?> Profile</h3>
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">

                        <!-- ///////////////   Tester   \\\\\\\\\\\\\\\ -->

                        <?php
                        if (isset($_GET['P_id']) == "tester") {
                            if (isset($testerDetails)) {
                                // echo "Tester Profile";
                                $res = mysqli_query($conn, "SELECT * FROM `signup_tester` where TesterId =$T_id");
                                if (mysqli_num_rows($res) > 0) {
                                    $row = mysqli_fetch_assoc($res);
                                    if (isset($row['Testerimage'])) { ?>
                                        <img class="rounded-circle" src="./assets/img/testerImages/<?php echo $row['Testerimage'] ?>" alt="" style="width: 25%;">
                                    <?php } else { ?>
                                        <img class="rounded-circle" src="./assets/img/user.png" alt="" style="width: 150px;">
                                    <?php } ?>
                                <?php } ?>
                                <h5 class="my-3"><?php echo $testerDetails['testerName'] ?></h5>
                                <p class="text-muted mb-1"><?php echo $testerDetails['Role'] ?></p>
                                <!-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->
                                <div class="d-flex justify-content-center mb-2 mt-3">
                                    <?php
                                    $res = mysqli_query($conn, "SELECT * FROM `signup_tester` where TesterId =$T_id");
                                    if (mysqli_num_rows($res) > 0) {
                                        $row = mysqli_fetch_assoc($res);
                                        if (isset($row['TesterCNIC'])) { ?>
                                            <a href="profile.updated.profile.php?testerImage=<?php echo $testerDetails['testerId'] ?> " class="btn btn-outline-dark rounded-pill">Update Profile Image</a>
                                        <?php } else { ?>
                                            <a href="profile.update.php?testerId=<?php echo $testerDetails['testerId'] ?>" class="btn btn-outline-dark rounded-pill">Update Profile</a>
                                    <?php }
                                    } ?>
                                </div>
                                <?php
                            }
                        }

                        ///////////////  ADMINS & USERS  \\\\\\\\\\\\\\\\\\
                        else {
                            $res = mysqli_query($conn, "SELECT * FROM `signup` where id =$id");
                            if (mysqli_num_rows($res) > 0) {
                                $row = mysqli_fetch_assoc($res);
                                if (isset($row['userimage'])) { ?>
                                    <img class="rounded-circle" src="./assets/img/UserImages/<?php echo $row['userimage'] ?>" alt="" style="width: 25%;">
                                <?php } else { ?>
                                    <img class="rounded-circle" src="./assets/img/user.png" alt="" style="width: 150px;">
                                <?php } ?>
                            <?php } ?>
                            <h5 class="my-3"><?php echo $userDetail['userName'] ?></h5>
                            <p class="text-muted mb-1"><?php echo $userDetail['Role'] ?></p>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <!-- Select User Profile -->
                        <?php
                        if (isset($_GET['P_id']) == "tester") {
                            if (isset($testerDetails)) {
                                $res = mysqli_query($conn, "SELECT * FROM `signup_tester` where TesterId =$T_id");
                                if (mysqli_num_rows($res) > 0) {
                        ?>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Code</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['Code'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['TesterFullName'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $testerDetails['testerEmail'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">CNIC</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['TesterCNIC'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['TesterPhone'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Religion</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['TesterReligion'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Gender</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['TesterGender'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">City</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['TesterCity'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Country</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['TesterCountry'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['TesterAddress'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Password</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['TesterPassword'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>Education</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Education</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['Education'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Subject</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['Subject'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Institute</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['Institute'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Latest Degree</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['Latest Degree'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?php if (isset($row['TesterCNIC'])) { ?>
                                                <a href="profile.updated.profile.php?testerDetails=<?php echo $testerDetails['testerId'] ?> " class="btn btn-outline-dark rounded-pill">Update Other Details</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        } else {
                            $query = mysqli_query($conn, "Select * From signup where id = $id");
                            if (mysqli_num_rows($query)) {
                                $row = mysqli_fetch_assoc($query);
                                ?>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $row['userFullName'] ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $userDetail['userEmail'] ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">CNIC</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $row['userCNIC'] ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $row['userPhone'] ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Religion</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $row['userReligion'] ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $row['userGender'] ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $row['userAddress'] . ", " . $row['userCity'] . ", " . $row['userCountry'] ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Password</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $row['userPassword'] ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <?php
                                        if (isset($userDetail['userCNIC'])) {
                                            echo "hello" . $userDetail['userCNIC'];
                                        }
                                        ?>

                                        <?php if (isset($row['userCNIC'])) {
                                        ?>
                                            <a href="profile.updated.profile.php?userDetails=<?php echo $row['userCNIC'] ?> " class="btn btn-outline-dark rounded-pill">Edit Your Details</a>
                                        <?php  } else {
                                        ?>
                                            <a href="profile.updated.profile.php?userDetails=<?php echo $userDetail['userId'] ?> " class="btn btn-outline-dark rounded-pill">Update Profile Details</a>
                                        <?php  }
                                        ?>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                        <!-- Select User Profile -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php require("includes/footer.inc.php"); ?>