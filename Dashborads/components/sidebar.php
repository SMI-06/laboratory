<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.php" class="navbar-brand mx-4 mb-3 d-block">
            <h1><img src="assets/img/sidebar.png" width="100%" style="position: relative;" alt="logo" class="logo"></h1>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <?php
                if (isset($testerDetails['Role'])  == "Tester") {
                    $query = mysqli_query($conn, "SELECT * FROM `signup_tester` where TesterId = $tester_id");
                    if (mysqli_num_rows($query) > 0) {
                        $row = mysqli_fetch_assoc($query);
                        if (isset($row['Testerimage'])) { ?>
                            <img class="rounded-circle" src="assets/img/testerImages/<?php echo $row['Testerimage'] ?>" alt="" style="width: 40px; height: 40px;">
                        <?php } else { ?>
                            <img class="rounded-circle" src="./assets/img/user.png" alt="" style="width: 40px; height: 40px;">
                        <?php } ?>
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
        <?php } ?>
        <div class="ms-3">
            <h6 class="mb-0"><?php echo $testerDetails['testerName'] ?></h6>
            <span><?php echo $testerDetails['Role'] ?></span>
        </div>
        <?php  } else {
                    $query = mysqli_query($conn, "SELECT * FROM `signup` where id = $id");
                    if (mysqli_num_rows($query) > 0) {
                        $row = mysqli_fetch_assoc($query);
                        if (isset($row['userimage'])) { ?>
                <img class="rounded-circle" src="assets/img/userImages/<?php echo $row['userimage'] ?>" alt="" style="width: 40px; height: 40px;">
            <?php } else { ?>
                <img class="rounded-circle" src="./assets/img/user.png" alt="" style="width: 40px; height: 40px;">
            <?php } ?>
            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
        </div>
    <?php } ?>
    <div class="ms-3">
        <h6 class="mb-0"><?php echo $userDetail['userName'] ?></h6>
        <span><?php echo $userDetail['Role'] ?></span>
    </div>
<?php } ?>
</div>
<div class="navbar-nav w-100">
    <a href="index.php" class="nav-item nav-link "><i class="fa fa-clock me-2"></i><small id="liveTime"></small> </a>
    <a href="index.php" class="nav-item nav-link "><i class="fa fa-home me-2"></i>Home</a>
    <div class="nav-item dropdown">
        <?php

        // Tester 
        if (isset($testerDetails['Role'])  == "Tester") { ?>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"><i class="fab fa-product-hunt me-2"></i>Products</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <!-- <a href="request.php?id=laboratory" class="dropdown-item">Add Products</a> -->
                    <a href="product.php?id=productshow" class="dropdown-item">Show Products</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-hourglass-half me-2"></i>Product Status</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="checking.status.php?id=laboratory" class="dropdown-item">Pending Products</a>
                    <a href="request.php?id=another" class="dropdown-item">Pass Products</a>
                    <a href="request.php?id=another" class="dropdown-item">Fail Products</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-paper-plane"></i>Mail</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <!-- <a href="mail.php" class="dropdown-item">Send Mail</a> -->
                    <a href="mail.php?show_mail_id=show_mail" class="dropdown-item">Sent Mail</a>
                    <a href="mail.php?show_mail_id=show_mail" class="dropdown-item">Show Mails</a>
                </div>
            </div>
        <?php }
        // ADMIN
        else if ($userDetail['Role'] == "admin") { ?>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-pager me-2"></i>Request</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="request.php?id=laboratory" class="dropdown-item">Request For Laboratory</a>
                    <a href="request.php?id=another" class="dropdown-item">Request For Another</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-pager me-2"></i>Status</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="checking.status.php?id=laboratory" class="dropdown-item">Check Status Laboratory</a>
                    <a href="request.php?id=another" class="dropdown-item">Request For Another</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-paper-plane"></i>Mail</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <!-- <a href="mail.php" class="dropdown-item">Send Mail</a> -->
                    <a href="mail.php?show_mail_id=show_mail" class="dropdown-item">Sent Mail</a>
                    <a href="mail.php?show_mail_id=show_mail" class="dropdown-item">Show Mails</a>
                </div>
            </div>
        <?php }
        // SUPER ADMIN
        elseif ($userDetail['Role'] == "super admin") { ?>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-map-marker-alt me-2"></i>Add Location</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="add.location.php?id=city" class="dropdown-item">Add City</a>
                    <a href="add.location.php?id=province" class="dropdown-item">Add Province</a>
                    <a href="add.location.php?id=country" class="dropdown-item">Add Country</a>
                    <a href="add.location.php?id=region" class="dropdown-item">Add Region</a>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-globe-asia me-2"></i>Show Location</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="show.location.php?id=city" class="dropdown-item">Show City</a>
                        <a href="show.location.php?id=province" class="dropdown-item">Show Province</a>
                        <a href="show.location.php?id=country" class="dropdown-item">Show Country</a>
                        <a href="show.location.php?id=region" class="dropdown-item">Show Region</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <?php
                    $query = mysqli_query($conn, "SELECT COUNT(*) as id FROM laboratory WHERE status = 'pending'");
                    $row = mysqli_fetch_assoc($query);
                    echo json_encode(['count' => $row['id']]);
                    ?>
                    <script>
                        function checkPendingRequests() {
                            $.ajax({
                                url: 'sidebar.php', // URL of your PHP file
                                method: 'GET',
                                success: function(data) {
                                    const result = JSON.parse(data);
                                    const count = result.count;

                                    // Check if there are pending requests
                                    if (count > 0) {
                                        $('#noti').text('You have new requests!').show();
                                    } else {
                                        $('#noti').hide();
                                    }
                                }
                            });
                        }

                        // Check every 10 seconds
                        setInterval(checkPendingRequests, 10000);
                    </script>

                    <a href="?seen=true" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-laptop-medical me-2"></i>Laboratory
                            <span id="noti" class="badge bg-danger"></span> <!-- Notification indicator -->
                    </a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="add.laboratory.type.php?id=laboratoryType" class="dropdown-item">Request For Laboratory
                            <?php
                            // echo "<span class='badge bg-danger'>" . $labCount . "</span >";
                            ?>
                        </a>
                        <a href="add.laboratory.type.php?id=laboratoryType" class="dropdown-item">Add Laboratory Type</a>
                        <a href="show.laboratory.type.php?id=laboratoryType" class="dropdown-item">Show Laboratory Type</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-paper-plane"></i>Mail</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <!-- <a href="mail.php" class="dropdown-item">Send Mail</a> -->
                        <a href="mail.php?show_mail_id=show_mail" class="dropdown-item">Show Mails</a>
                    </div>
                </div>
            </div>
        <?php }
        // User 
        elseif ($userDetail['Role'] == "User") { ?>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"><i class="fab fa-product-hunt me-2"></i>Products</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="product.php?id=productAdd" class="dropdown-item">Add Product For Test</a>
                    <a href="product.php?id=productshow" class="dropdown-item">Show Product</a>
                    <!-- <a href="request.php?id=another" class="dropdown-item">Request For Another</a> -->
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-pager me-2"></i>Status</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="status.product.php?id=productPending" class="dropdown-item">Product Status</a>
                    <a href="status.product.php?id=productFailed" class="dropdown-item">Failed Products</a>
                    <a href="status.product.php?id=productPass" class="dropdown-item">Pass Products</a>
                    <!-- <a href="request.php?id=another" class="dropdown-item">Request For Another</a> -->
                </div>
            </div>
            <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-paper-plane"></i>Mail</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="mail.php" class="dropdown-item">Send Mail</a>
                            <a href="mail.php?show_mail_id=show_mail" class="dropdown-item">Sent Mail</a>
                            <a href="mail.php?show_mail_id=show_mail" class="dropdown-item">Show Mails</a>
                        </div>
                    </div> -->
        <?php  }

        ?>
    </div>
</div>
</nav>
</div>