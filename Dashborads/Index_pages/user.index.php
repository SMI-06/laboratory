<?php 
// require("../includes/config.php"); ?>

<div class="container-fluid pt-4 px-4 py-4">
                <!-- //////////////  Products ////////////// -->
                <div class="row g-4 mt-2">
                    <h4 class="heading">Products</h4>
                    <div class="col-sm-6 col-xl-3">
                        <a href="product.php?id=productshow">
                            <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fas fa-boxes fa-3x text-dark"></i>
                                <div class="ms-3">
                                    <p class="mb-2 text-dark">Your Products</p>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT count(*) as id from products WHERE user_id =". $userDetail['userId']);
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
                                    $query = mysqli_query($conn, "select count(*) as id from products where status = 'Pass' & user_id =". $userDetail['userId']);
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
                                    $query = mysqli_query($conn,"select count(*) as id from products where status = 'Fail' & user_id =". $userDetail['userId']);
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