<?php
// date_default_timezone_set('Asia/Karachi');
$id = 0;
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
    $id = (int) $userDetail['userId'];
} else if (isset($_SESSION['testerDetails'])) {
    $testerDetails = $_SESSION['testerDetails'];
    $tester_id = (int) $testerDetails['testerId'];
}
?>

<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" style="background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <div class="navbar-nav align-items-center ms-auto">
        <?php
        if (isset($testerDetails['Role']) == "Tester") {
            $select = mysqli_query($conn, "Select * from signup_tester");
            $row = mysqli_fetch_assoc($select);
            if ($row["Status"] == "Pending") {
            } else {
        ?>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-envelope me-lg-2"></i>
                        <span class="position-absolute left-0 translate-middle badge text-dark ">
                            99+
                        </span>
                        <span class="d-none d-lg-inline-flex">Message</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="./assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all message</a>
                    </div>
                </div>
                <!-- Message End  -->

                <!-- Notificatin Start -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-bell me-lg-2"></i>
                        <span class="position-absolute left-0 translate-middle badge text-dark ">
                            <?php
                            $select = mysqli_query($conn, "SELECT count(*) as count FROM `notification` where User_Id =" . $tester_id);
                            $row = mysqli_fetch_assoc($select);
                            echo $row['count']
                            ?>
                        </span>
                        <span class="d-none d-lg-inline-flex">
                            Notification
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0" style="max-height: 250px; overflow-y: auto;">
                        <a href="#" class="btn"><span class="bg-info text-white p-1 rounded-3 shadow d-inline-block">See All Notifictaion</span> </a>

                        <!-- <hr class="dropdown-divider"> -->
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">
                                <?php
                                $select = mysqli_query($conn, "SELECT * FROM `notification` join signup on notification.User_Id = signup.id where User_Id = " . $tester_id . " ORDER BY `notification`.`notificationTime` DESC");
                                if (mysqli_num_rows($select) > 0) {
                                    while ($row = mysqli_fetch_assoc($select)) { ?>
                                        <!-- <hr class="dropdown-divider"> -->
                                        <a href="#" class="dropdown-item d-flex justify-content-center">
                                            <h6 class="fw-normal mb-0"><?php echo $row['Topic'] . " | <br> By " . $row['userName'] . "| <br> "; ?></h6>
                                            <!-- <small id="liveTime"></small> -->
                                            <small>
                                                <?php
                                                date_default_timezone_set('Asia/Karachi');
                                                $notificationTime = strtotime($row['notificationTime']);
                                                $currentTime = time();
                                                $timeDiff = $currentTime - $notificationTime;

                                                if ($timeDiff < 60) {
                                                    echo "Just now";
                                                } elseif ($timeDiff < 3600) {
                                                    $minutes = floor($timeDiff / 60);
                                                    echo $minutes . " minutes ago";
                                                } else {
                                                    $hours = floor($timeDiff / 3600);
                                                    echo $hours . " hours ago";
                                                }
                                                ?>
                                            </small>
                                            <small><?php // echo $row['notificationdate'] 
                                                    ?></small>
                                        </a>

                                <?php }
                                } ?>
                            </h6>
                        </a>
                    </div>
                </div>
                <!-- Notificatin End -->
            <?php }
        } else { ?>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-envelope me-lg-2"></i>
                    <span class="position-absolute left-0 translate-middle badge text-dark ">
                        99+
                    </span>
                    <span class="d-none d-lg-inline-flex">Message</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="./assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                <small>15 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item text-center">See all message</a>
                </div>
            </div>
            <!-- Message End  -->

            <!-- Notificatin Start -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-bell me-lg-2"></i>
                    <span class="position-absolute left-0 translate-middle badge text-dark ">
                        <?php
                        $select = mysqli_query($conn, "SELECT count(*) as count FROM `notification` where User_Id = " . $id);
                        $row = mysqli_fetch_assoc($select);
                        echo $row['count']
                        ?>
                    </span>
                    <span class="d-none d-lg-inline-flex">
                        Notification
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0" style="max-height: 250px; overflow-y: auto;">
                    <a href="#" class="btn"><span class="bg-info text-white p-1 rounded-3 shadow d-inline-block">See All Notifictaion</span> </a>

                    <!-- <hr class="dropdown-divider"> -->
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">
                            <?php
                            $select = mysqli_query($conn, "SELECT * FROM `notification` join signup on notification.User_Id = signup.id join laboratory on notification.laboratory_Id = laboratory. where User_Id = " . $id . " ORDER BY `notification`.`notificationTime` DESC");
                            if (mysqli_num_rows($select) > 0) {
                                while ($row = mysqli_fetch_assoc($select)) { ?>
                                    <hr class="dropdown-divider">
                                    <a href="#" class="dropdown-item d-flex justify-content-center">
                                        <h6 class="fw-normal mb-0"><?php echo $row['Topic'] . " | By " . $row['userName'] . " | " . $row['laboratory_Id'] ." "; ?></h6>
                                        <!-- <small id="liveTime"></small> -->
                                        <small class="d-flex justify-content-around">
                                            <?php
                                            date_default_timezone_set('Asia/Karachi');
                                            $notificationTime = strtotime($row['notificationTime']);
                                            $currentTime = time();
                                            $timeDiff = $currentTime - $notificationTime;

                                            if ($timeDiff < 60) {
                                                echo " <br> Just now";
                                            } elseif ($timeDiff < 3600) {
                                                $minutes = floor($timeDiff / 60);
                                                echo " <br> " . $minutes . " minutes ago";
                                            } else {
                                                $hours = floor($timeDiff / 3600);
                                                echo " <br> " . $hours . " hours ago";
                                            }
                                            ?>
                                        </small>
                                        <small><?php // echo $row['notificationdate'] 
                                                ?></small>
                                    </a>

                            <?php }
                            } ?>
                        </h6>
                    </a>
                </div>
            </div>
            <!-- Notificatin End -->
        <?php } ?>

        <!-- Profile Start-->
        <div class="nav-item dropdown">
            <?php
            if (isset($testerDetails['Role']) == "Tester") {
                $query = mysqli_query($conn, "SELECT * FROM `signup_tester` where TesterId = $tester_id");
                if (mysqli_num_rows($query) > 0) {
                    $row = mysqli_fetch_assoc($query); ?>
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <?php if (isset($row['Testerimage'])) { ?>
                            <img class="rounded-circle" src="assets/img/testerImages/<?php echo $row['Testerimage'] ?>" alt="" style="width: 40px; height: 40px;">
                        <?php } else { ?>
                            <img class="rounded-circle" src="assets/img/testerImages/user.png" alt="" style="width: 40px; height: 40px;">
                    <?php }
                    } ?>
                    <span class="d-none d-lg-inline-flex"><?php echo $testerDetails['testerName'] ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <?php $select = mysqli_query($conn, "Select * from signup_tester");
                        $row = mysqli_fetch_assoc($select);
                        if ($row["Code"] !== "") { ?>
                            <a href="profile.php?P_id=tester" class="dropdown-item">My Profile</a>
                        <?php }
                        if ($row['Status'] == "Pending") { ?>
                            <a href="auth/auth.logout.php" class="dropdown-item">Log Out</a>
                    </div>
                <?php } else { ?>
                    <a href="../index.php" class="dropdown-item">Wesbite</a>
                    <a href="#" class="dropdown-item">Settings</a>
                    <a href="auth/auth.logout.php" class="dropdown-item">Log Out</a>
                <?php } ?>

                <?php
            }
            //  For Other Users ADMIN & USERS Login
            else {
                $query = mysqli_query($conn, "SELECT * FROM `signup` where id = $id");
                if (mysqli_num_rows($query) > 0) {
                    $row = mysqli_fetch_assoc($query); ?>
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <?php if (isset($row['userimage'])) { ?>
                            <img class="rounded-circle" src="assets/img/UserImages/<?php echo $row['userimage'] ?>" alt="" style="width: 40px; height: 40px;">
                        <?php } else { ?>
                            <img class="rounded-circle" src="./assets/img/user.png" alt="" style="width: 40px; height: 40px;">
                    <?php }
                    } ?>
                    <span class="d-none d-lg-inline-flex"><?php echo $userDetail['userName'] ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="profile.php" class="dropdown-item">My Profile</a>
                        <a href="../index.php" class="dropdown-item">Wesbite</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="auth/auth.logout.php" class="dropdown-item">Log Out</a>
                    </div>
                <?php } ?>
        </div>
        <!-- Profile End-->
    </div>
</nav>
<!-- Navbar End -->