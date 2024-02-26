<div class="sidebar pe-4 pb-3" >
    <nav class="navbar bg-light navbar-light">
        <a href="index.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><?php echo $userDetail['Role'] ?></h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">

                <?php
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
        </div>
        <div class="navbar-nav w-100">
            <a href="index.php" class="nav-item nav-link "><i class="fa fa-home me-2"></i>Home</a>
            <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div> -->
            <!-- <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a> -->
            <!-- <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a> -->
            <!-- <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a> -->
            <!-- <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a> -->
            <div class="nav-item dropdown">
                <?php
                // ADMIN
                if ($userDetail['Role'] == "Admin") { ?>
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
                elseif ($userDetail['Role'] == "Super Admin") { ?>
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
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop-medical me-2"></i>Laboratory</a>
                            <div class="dropdown-menu bg-transparent border-0">
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
                <?php } ?>
            </div>
        </div>
    </nav>
</div>