<?php require("includes/config.php"); ?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
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


<section class="bg-light" style=" border-radius:10px; padding:5px; margin:10px 22px">

    <?php
    if ($userDetail['Role'] == "Super Admin") { ?>

        <div class="card bg-danger shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">WELCOME <?php echo $userDetail['userName'] ?></h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Products</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <a href="users.all.php">
                        <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
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
                        <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
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
                        <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
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
                        <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-dark"></i>
                            <!-- <i class="fa-solid fa-users-line"></i> -->
                            <div class="ms-3 text-dark">
                                <p class="mb-2">Users</p>
                                <h6 class="mb-0"><?php echo $row['user_count'] ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row g-4 mt-2">

                <div class="col-sm-6 col-xl-3">
                    <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
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
                    <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-check fa-3x text-dark"></i>
                        <!-- <i class="fa-solid fa-check-to-slot"></i> -->
                        <div class="ms-3 text-dark">
                            <p class="mb-2">Active Accounts</p>
                            <h6 class="mb-0"><?php echo $row['active_account'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="#">
                        <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-hourglass-half fa-3x text-dark"></i>
                            <div class="ms-3 text-dark">
                                <p class="mb-2">Pending Accounts</p>
                                <h6 class="mb-0"><?php echo $row['pending_account'] ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    <?php }
    //  Admin Dashborad
    else if ($userDetail['Role'] == "Admin") { ?>
        <div class="card bg-info shadow-none position-relative overflow-hidden mx-4 my-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">WELCOME <?php echo $userDetail['userName'] ?></h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Products</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <a href="users.all.php">
                        <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">All Users</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup");
                                if (mysqli_num_rows($query) > 0) {
                                    $admin_all_users_row = mysqli_fetch_assoc($query) ?>
                                    <h6 class="mb-0"><?php echo $admin_all_users_row['id'] ?></h6>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <a href="tester.all.php">
                        <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
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
                        <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-dark"></i>
                            <!-- <i class="fa-solid fa-users-line"></i> -->
                            <div class="ms-3 text-dark">
                                <p class="mb-2">Users</p>
                                <h6 class="mb-0"><?php echo $row['user_count'] ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row g-4 mt-2">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-check fa-3x text-dark"></i>
                        <!-- <i class="fa-solid fa-check-to-slot"></i> -->
                        <div class="ms-3 text-dark">
                            <p class="mb-2">Active Accounts</p>
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
                        <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-hourglass-half fa-3x text-dark"></i>
                            <div class="ms-3 text-dark">
                                <p class="mb-2">Pending Accounts</p>
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
        </div>

    <?php }
    //  Tester Dashborad
    else if ($userDetail['Role'] == "Tester") { ?>

        <div class="container-fluid pt-4 px-4 py-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <a href="users.all.php">
                        <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">All Users</p>
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
                        <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user-tie fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Admins</p>
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
                        <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-microscope fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Testers</p>
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
                <div class="col-sm-6 col-xl-3">
                    <a href="user.all.php">
                        <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-dark"></i>
                            <!-- <i class="fa-solid fa-users-line"></i> -->
                            <div class="ms-3 text-dark">
                                <p class="mb-2">Users</p>
                                <?php
                                $query = mysqli_query($conn, "select count(*) as id from signup where Role = 'User'");
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
            <div class="row g-4 mt-2">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-info shadow rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-laptop-medical fa-3x text-dark"></i>
                        <div class="ms-3 text-dark">
                            <p class="mb-2" style="white-space: nowrap !important;">All Laboratories</p>
                            <h6 class="mb-0 ">123</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-info rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-check fa-3x text-dark"></i>
                        <!-- <i class="fa-solid fa-check-to-slot"></i> -->
                        <div class="ms-3 text-dark">
                            <p class="mb-2">Active Accounts</p>
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
                        <div class="bg-info rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-hourglass-half fa-3x text-dark"></i>
                            <div class="ms-3 text-dark">
                                <p class="mb-2">Pending Accounts</p>
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
        </div>

    <?php }
    // User Dashborad
    else { ?>

        <div class="container-fluid pt-4 px-4">
            <h1>Hello</h1>
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