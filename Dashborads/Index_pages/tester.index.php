<?php
// require("../includes/config.php");

$select = mysqli_query($conn, "Select * from signup_tester");
$row = mysqli_fetch_assoc($select);
if ($row['Status'] === "Pending") { ?>
    <div class="container-fluid px-4">
        <!-- //////////////  Showing Messages ////////////// -->
        <div class="row g-4 mt-2">
            <div class="col-sm-12 col-xl-12">
                <div class="shadow rounded d-flex align-items-center justify-content-center p-4">
                    <i class="fas fa-times fa-3x text-warning"></i>
                    <div class="ms-3">
                        <h3 class="mb-2 text-warning mt-2">Please Wait For Your Approval</h3>
                    </div>
                    <div style="position:relative; left:23%; display:flex; justify-content: space-around; gap:10px; margin-top:15px">
                        <p class="text-dark "> Status: </p>
                        <p class="text-light"> <?php echo $row['Status'] ?> </p>
                    </div>
                </div>
            </div>
        </div>
    <?php } else if ($row['TesterCNIC'] === "") { ?>
        <div class="row g-4 mt-2">
            <div class="col-sm-6 col-xl-6 offset-3">
                <div class=" shadow rounded  p-4">
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-exclamation-triangle fa-3x text-warning"></i>
                        <!-- <i class="fas fa-times "></i> -->
                        <div class="ms-3">
                            <h3 class="mb-2 text-warning mt-2">Please Add Your Further Details</h3>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex align-items-center justify-content-center" style=" display:flex; justify-content: space-around; gap:10px; margin-top:15px">
                        <p class="text-dark "> For Add Your Details: </p>
                        <a href="profile.update.php?testerId=<?php echo $testerDetails['testerId'] ?>">
                            <p class="text-danger"> <u> Click Here </u> </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {
    $query = mysqli_query($conn, "SELECT 
                    SUM(CASE WHEN role = 'admin' THEN 1 ELSE 0 END) AS admin_count, 
                    -- SUM(CASE WHEN role = 'Tester' THEN 1 ELSE 0 END) AS tester_count, 
                    SUM(CASE WHEN role = 'User' THEN 1 ELSE 0 END) AS user_count, 
                    SUM(CASE WHEN status = 'Active' THEN 1 ELSE 0 END) AS active_account, 
                    SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending_account 
                    FROM signup;");
    $row = mysqli_fetch_assoc($query) ?>
        <div class="container-fluid px-4">
            <div class="row mt-5">
                <div class="col-sm-6 col-xl-6">
                    <div class="shadow rounded d-flex align-items-center justify-content-center p-4">
                        <!-- <i class="fas fa-columns fa-3x text-warning"></i> -->
                        <div class="ms-3">
                            <h3 class="mb-2 mt-2 welcome">Welcome To Dashboard</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-6">
                    <div class="shadow rounded d-flex align-items-center justify-content-center p-4">
                        <!-- <i class="fas fa-columns fa-3x text-warning"></i> -->
                        <div class="ms-3">
                            <h3 class="mb-2 name mt-2"><?php echo "Name: " . $testerDetails['testerName'] ?> | <?php echo "Code: " . $testerDetails['testerCode'] ?> </h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //////////////  Products ////////////// -->
            <div class="row g-4 mt-1">
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


?>