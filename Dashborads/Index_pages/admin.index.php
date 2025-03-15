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
            <!-- ////////////// Admin Laboratories ////////////// -->
            <div class="row g-4 mt-2">
                <h4 class="heading">Laboratory</h4>
                <div class="col-sm-6 col-xl-3">
                    <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-laptop-medical fa-2x text-dark"></i>
                        <div class="ms-3 text-dark">
                            <p class="mb-2" style="white-space: nowrap !important;">All Laboratories</p>
                            <?php
                            $query = mysqli_query($conn, "SELECT count(*) as id 
                            FROM laboratory where admin_id = ". $userDetail['userId'] );
                            $line = mysqli_fetch_assoc($query) ?>
                            <h6 class="mb-0"><?php echo $line['id'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="mycard shadow rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-check fa-2x text-dark"></i>
                        <div class="ms-3 text-dark">
                            <p class="mb-2" style="white-space: nowrap !important;">Active Laboratories</p>
                            <?php
                            $query = mysqli_query($conn, "SELECT count(*) as id 
                            FROM laboratory where `status` = '1' & admin_id = ". $userDetail['userId']);
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
                            FROM laboratory where `status` = '0' & admin_id = ". $userDetail['userId'] );
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