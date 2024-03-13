<?php require("includes/config.php"); ?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
}
else if (isset($_SESSION['testerDetails'])) {
    $testerDetails = $_SESSION['testerDetails'];
}
$title = "Lab Automation | Dashboard"
?>

<?php require("includes/header.inc.php"); ?>

<!-- Navbar Start -->
<?php require("components/navbar.php"); ?>
<!-- Navbar End -->

<!-- Sidebar Start -->
<?php require("components/sidebar.php"); ?>
<!-- Sidebar End -->


<section class="main-section">

    <?php
    if ($userDetail['Role'] == "Super Admin") { ?>
        <div class="container-fluid px-4">
            <!-- //////////////  Accounts & Users  ////////////// -->
            <div class="row g-4">
                <h4 class="heading" class="heading">Accounts & Users</h4>
                <div class="col-sm-6 col-xl-3">
                    <a href="users.all.php">
                        <div class="shadow rounded d-flex align-items-center justify-content-between p-4 mycard">
                            <i class="fa fa-user fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">All Users</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup");
                                $row = mysqli_fetch_assoc($query)
                                ?>
                                <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="admin.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user-tie fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Admins</p>
                                <?php
                                $query = mysqli_query($conn, "SELECT 
                            SUM(CASE WHEN role = 'admin' THEN 1 ELSE 0 END) AS admin_count, 
                            SUM(CASE WHEN role = 'Tester' THEN 1 ELSE 0 END) AS tester_count, 
                            SUM(CASE WHEN role = 'User' THEN 1 ELSE 0 END) AS user_count, 
                            SUM(CASE WHEN status = 'Active' THEN 1 ELSE 0 END) AS active_account, 
                            SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending_account 
                            FROM signup;");
                                $row = mysqli_fetch_assoc($query) ?>
                                <h6 class="mb-0"><?php echo $row['admin_count'] ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="tester.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-microscope fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Testers</p>
                                <h6 class="mb-0"><?php echo $row['tester_count'] ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="user.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-dark"></i>
                            <!-- <i class="fa-solid fa-users-line"></i> -->
                            <div class="ms-3 text-dark">
                                <p class="mb-2">Users</p>
                                <h6 class="mb-0"><?php echo $row['user_count'] ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-check fa-3x text-dark"></i>
                        <!-- <i class="fa-solid fa-check-to-slot"></i> -->
                        <div class="ms-3 text-dark">
                            <p class="mb-2" style="white-space: nowrap !important;">Active Accounts</p>
                            <h6 class="mb-0"><?php echo $row['active_account'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="#">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-hourglass-half fa-3x text-dark"></i>
                            <div class="ms-3 text-dark">
                                <p class="mb-2" style="white-space: nowrap !important;">Pending Accounts</p>
                                <h6 class="mb-0"><?php echo $row['pending_account'] ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- //////////////  Laboratory  ////////////// -->
            <div class="row g-4 mt-2">
                <h4 class="heading">Laboratory</h4>
                <div class="col-sm-6 col-xl-3">
                    <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-laptop-medical fa-3x text-dark"></i>
                        <div class="ms-3 text-dark">
                            <p class="mb-2" style="white-space: nowrap !important;">All Laboratories</p>
                            <?php
                            $query = mysqli_query($conn, "SELECT count(*) as id 
                            FROM laboratory");
                            $line = mysqli_fetch_assoc($query) ?>
                            <h6 class="mb-0"><?php echo $line['id'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-check fa-3x text-dark"></i>
                        <div class="ms-3 text-dark">
                            <p class="mb-2" style="white-space: nowrap !important;">Active Laboratories</p>
                            <?php
                            $query = mysqli_query($conn, "SELECT count(*) as id 
                            FROM laboratory");
                            $line = mysqli_fetch_assoc($query) ?>
                            <h6 class="mb-0"><?php echo $line['id'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fas fa-exclamation fa-3x text-dark"></i>
                        <!-- <i class="fa fa-laptop-medical "></i> -->
                        <div class="ms-3 text-dark">
                            <p class="mb-2" style="white-space: nowrap !important;">Disable Laboratories</p>
                            <?php
                            $query = mysqli_query($conn, "SELECT count(*) as id 
                            FROM laboratory");
                            $line = mysqli_fetch_assoc($query) ?>
                            <h6 class="mb-0"><?php echo $line['id'] ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //////////////  Products ////////////// -->
            <div class="row g-4 mt-2">
                <h4 class="heading">Products</h4>
                <div class="col-sm-6 col-xl-3">
                    <a href="users.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-boxes fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Your Products</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="admin.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-thumbs-up fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Pass Products</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup where Role = 'Admin'");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="tester.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-thumbs-down fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Failed Products</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup where Role = 'Tester'");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    <?php }
    //  Admin Dashborad
    else if ($userDetail['Role'] == "admin") { ?>
        <?php
        $query = mysqli_query($conn, "SELECT 
                            SUM(CASE WHEN role = 'admin' THEN 1 ELSE 0 END) AS admin_count, 
                            SUM(CASE WHEN role = 'Tester' THEN 1 ELSE 0 END) AS tester_count, 
                            SUM(CASE WHEN role = 'User' THEN 1 ELSE 0 END) AS user_count, 
                            SUM(CASE WHEN status = 'Active' THEN 1 ELSE 0 END) AS active_account, 
                            SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending_account 
                            FROM signup;");
        $row = mysqli_fetch_assoc($query) ?>


        <div class="container-fluid px-4">
            <!-- //////////////  Accounts & Users ////////////// -->
            <div class="row g-4 mt-2">
                <h4 class="heading">Accounts & Users</h4>
                
                <div class="col-sm-6 col-xl-3">
                    <a href="tester.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-microscope fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Testers</p>
                                <h6 class="mb-0"><?php echo $row['tester_count'] ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="user.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-dark"></i>
                            <!-- <i class="fa-solid fa-users-line"></i> -->
                            <div class="ms-3 text-dark">
                                <p class="mb-2">Users</p>
                                <h6 class="mb-0"><?php echo $row['user_count'] ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-check fa-3x text-dark"></i>
                        <!-- <i class="fa-solid fa-check-to-slot"></i> -->
                        <div class="ms-3 text-dark">
                            <p class="mb-2" style="white-space: nowrap !important;">Active Accounts</p>
                            <?php
                            $query = mysqli_query($conn, "select count(*) as id from signup where status = 'Active'");
                            if (mysqli_num_rows($query) > 0) {
                                $row = mysqli_fetch_assoc($query) ?>
                                <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="#">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-hourglass-half fa-3x text-dark"></i>
                            <div class="ms-3 text-dark">
                                <p class="mb-2" style="white-space: nowrap !important;">Pending Accounts</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup where Status = 'Pending'");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- //////////////  Products ////////////// -->
            <div class="row g-4 mt-2">
                <h4 class="heading">Products</h4>
                <div class="col-sm-6 col-xl-3">
                    <a href="users.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-boxes fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Your Products</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="admin.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-thumbs-up fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Pass Products</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup where Role = 'Admin'");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="tester.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-thumbs-down fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Failed Products</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup where Role = 'Tester'");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    <?php }
    //  Tester Dashborad
    else if ($testerDetails['Role'] == "Tester") { ?>
        <?php
        $query = mysqli_query($conn, "SELECT 
                            SUM(CASE WHEN role = 'admin' THEN 1 ELSE 0 END) AS admin_count, 
                            -- SUM(CASE WHEN role = 'Tester' THEN 1 ELSE 0 END) AS tester_count, 
                            SUM(CASE WHEN role = 'User' THEN 1 ELSE 0 END) AS user_count, 
                            SUM(CASE WHEN status = 'Active' THEN 1 ELSE 0 END) AS active_account, 
                            SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending_account 
                            FROM signup;");
        $row = mysqli_fetch_assoc($query) ?>
        <div class="container-fluid px-4">
            <!-- //////////////  Accounts & Users ////////////// -->
            <div class="row g-4 mt-2">
                <h4 class="heading">Accounts & Users</h4>
                <div class="col-sm-6 col-xl-3">
                    <a href="user.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-dark"></i>
                            <!-- <i class="fa-solid fa-users-line"></i> -->
                            <div class="ms-3 text-dark">
                                <p class="mb-2">Users</p>
                                <h6 class="mb-0"><?php echo $row['user_count'] ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-check fa-3x text-dark"></i>
                        <!-- <i class="fa-solid fa-check-to-slot"></i> -->
                        <div class="ms-3 text-dark">
                            <p class="mb-2" style="white-space: nowrap !important;">Active Accounts</p>
                            <?php
                            $query = mysqli_query($conn, "select count(*) as id from signup where status = 'Active'");
                            if (mysqli_num_rows($query) > 0) {
                                $row = mysqli_fetch_assoc($query) ?>
                                <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="#">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-hourglass-half fa-3x text-dark"></i>
                            <div class="ms-3 text-dark">
                                <p class="mb-2" style="white-space: nowrap !important;">Pending Accounts</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup where Status = 'Pending'");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- //////////////  Products ////////////// -->
            <div class="row g-4 mt-2">
                <h4 class="heading">Products</h4>
                <div class="col-sm-6 col-xl-3">
                    <a href="users.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-boxes fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Your Products</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="admin.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-thumbs-up fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Pass Products</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup where Role = 'Admin'");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="tester.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-thumbs-down fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Failed Products</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup where Role = 'Tester'");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    <?php }
    // User Dashborad
    else { ?>

        <div class="container-fluid pt-4 px-4 py-4">
            <!-- //////////////  Products ////////////// -->
            <div class="row g-4 mt-2">
                <h4 class="heading">Products</h4>
                <div class="col-sm-6 col-xl-3">
                    <a href="users.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-boxes fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Your Products</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="admin.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-thumbs-up fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Pass Products</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup where Role = 'Admin'");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="tester.all.php">
                        <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-thumbs-down fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Failed Products</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup where Role = 'Tester'");
                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
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