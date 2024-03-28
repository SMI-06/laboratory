<?php
require("includes/config.php");
?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
} elseif (isset($_SESSION['testerDetails'])) {
    $userDetail = $_SESSION['testerDetails'];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // echo $id; exit();
} elseif (isset($_GET['testerId'])) {
    $testerId = $_GET['testerId'];
}
$title = "Lab Automation | All Users "
?>

<?php require("includes/header.inc.php"); ?>

<!-- Navbar Start -->
<?php require("components/navbar.php"); ?>
<!-- Navbar End -->

<!-- Sidebar Start -->
<?php require("components/sidebar.php"); ?>
<!-- Sidebar End -->

<section class="section-back">
    <div class="container-fluid pt-4 px-4">
        <?php
        if (isset($testerDetails)) {
            echo "Tester Details";
        } elseif (isset($userDetail)) {
            // echo "Admin Details";
            if ($testerId) {
                // echo "Hello Tester"; 
        ?>
                <div class="col-sm-10 col-xl-10 offset-1">
                    <h3 class="text-dark text-center text-uppercase">Edit Tester</h3>
                    <div class="rounded h-100 p-4">
                        <form method="post" action="logics/logic.edit.user.php">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM signup_tester WHERE `TesterId` = $testerId");

                            if (mysqli_num_rows($query)) {
                                while ($row = mysqli_fetch_assoc($query)) {;
                                    // print_r($testerId);

                            ?>
                                    <div class="row mb-3">
                                        <label for="testerCode" class="col-sm-2 col-form-label text-light">Tester Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly name="testerCode" class="form-control" value="<?php echo $row['Code'] ?>" id="testerCode">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="TesterName" class="col-sm-2 col-form-label text-light">Tester Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" hidden name="TesterId" class="form-control" value="<?php echo $row['TesterId'] ?>" id="TesterId">
                                            <input type="text" readonly name="UserName" class="form-control" value="<?php echo $row['TesterName'] ?>" id="UserName">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="TesterEmail" class="col-sm-2 col-form-label text-light">Tester Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly value="<?php echo $row['TesterEmail'] ?>" name="TesterEmail" class="form-control" id="TesterEmail">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="TesterFullName" class="col-sm-2 col-form-label text-light" style="white-space: nowrap !important;">Tester Full Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly value="<?php echo $row['TesterFullName'] ?>" name="TesterFullName" class="form-control" id="TesterFullName">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="TesterCNIC" class="col-sm-2 col-form-label text-light">Tester CNIC</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly value="<?php echo $row['TesterCNIC'] ?>" name="TesterCNIC" class="form-control" id="TesterCNIC">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="TesterPhone" class="col-sm-2 col-form-label text-light">Tester Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly name="TesterPhone" class="form-control" id="TesterPhone" value="<?php echo $row['TesterPhone'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="UserReligion" class="col-sm-2 col-form-label text-light">Tester Religion</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly name="TesterReligion" class="form-control" id="TesterReligion" value="<?php echo $row['TesterReligion'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="TesterGender" class="col-sm-2 col-form-label text-light">Tester Gender</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly name="TesterGender" class="form-control" id="TesterGender" value="<?php echo $row['TesterGender'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="TesterAddress" class="col-sm-2 col-form-label text-light">Tester Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly name="TesterAddress" class="form-control" id="TesterAddress" value="<?php echo $row['TesterAddress'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="TesterCity" class="col-sm-2 col-form-label text-light">Tester City</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly name="TesterCity" class="form-control" id="TesterCity" value="<?php echo $row['TesterCity'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="TesterCountry" class="col-sm-2 col-form-label text-light">Tester Country</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly name="TesterCountry" class="form-control" id="TesterCountry" value="<?php echo $row['TesterCountry'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="TesterRole" class="col-sm-2 col-form-label text-light">Role</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly name="TesterRole" class="form-control" id="TesterRole" value="<?php echo $row['Role'] ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <h4>Educational Details</h4>
                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <label for="TesterEducation" class="col-sm-2 col-form-label text-light">Education</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly name="TesterEducation" class="form-control" id="TesterEducation" value="<?php echo $row['Education'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="TesterCountry" class="col-sm-2 col-form-label text-light">Subject</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly name="TesterSubject" class="form-control" id="TesterSubject" value="<?php echo $row['Subject'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="TesterCountry" class="col-sm-2 col-form-label text-light">Institute</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly name="TesterInstitute" class="form-control" id="TesterInstitute" value="<?php echo $row['Institute'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="TesterCountry" class="col-sm-2 col-form-label text-light">Latest Degree</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly name="Latest Degree" class="form-control" id="Latest Degree" value="<?php echo $row['Latest Degree'] ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <h4>Tester Status</h4>
                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <label for="UserStatus" class="col-sm-2 col-form-label text-light">Tester Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="testerStatus" id="testerStatus" aria-label="Floating label select example">
                                                <option selected disabled hidden><?php echo $row['Status'] ?></option>
                                                <option value="Active">Active</option>
                                                <option value="InActive">In Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" name="editTester" class="btn btn-dark  rounded-pill py-2 w-100 mt-4">Save Changes</button>
                            <?php }
                            } ?>
                        </form>
                    </div>
                </div>
        <?php    }
        }
        ?>


        <!-- <h3 class="text-dark text-center text-uppercase">Edit User</h3>
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <form method="post" action="logics/logic.edit.user.php">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    // echo $id; exit();
                }
                $query = mysqli_query($conn, "SELECT * FROM signup WHERE `id` = $id");

                if (mysqli_num_rows($query)) {
                    while ($row = mysqli_fetch_assoc($query)) {;
                        print_r($id);

                ?>
                        <div class="row mb-3">
                            <label for="UserName" class="col-sm-2 col-form-label">User Name</label>
                            <div class="col-sm-10">
                                <input type="text" readonly name="UserId" class="form-control" value="<?php echo $row['id'] ?>" id="UserId">
                                <input type="text" readonly name="UserName" class="form-control" value="<?php echo $row['userName'] ?>" id="UserName">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="UserEmail" class="col-sm-2 col-form-label">User Email</label>
                            <div class="col-sm-10">
                                <input type="text" readonly value="<?php echo $row['userEmail'] ?>" name="UserEmail" class="form-control" id="UserEmail">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="UserFullName" class="col-sm-2 col-form-label">User Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" readonly value="<?php echo $row['userFullName'] ?>" name="UserFullName" class="form-control" id="UserFullName">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="UserCNIC" class="col-sm-2 col-form-label">User CNIC</label>
                            <div class="col-sm-10">
                                <input type="text" readonly value="<?php echo $row['userCNIC'] ?>" name="UserCNIC" class="form-control" id="UserCNIC">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="UserPhone" class="col-sm-2 col-form-label">User Phone</label>
                            <div class="col-sm-10">
                                <input type="text" readonly name="UserPhone" class="form-control" id="UserPhone" value="<?php echo $row['userPhone'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="UserReligion" class="col-sm-2 col-form-label">User Religion</label>
                            <div class="col-sm-10">
                                <input type="text" readonly name="UserReligion" class="form-control" id="UserReligion" value="<?php echo $row['userReligion'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="UserGender" class="col-sm-2 col-form-label">User Gender</label>
                            <div class="col-sm-10">
                                <input type="text" readonly name="UserGender" class="form-control" id="UserGender" value="<?php echo $row['userGender'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="UserAddress" class="col-sm-2 col-form-label">User Address</label>
                            <div class="col-sm-10">
                                <input type="text" readonly name="UserAddress" class="form-control" id="UserAddress" value="<?php echo $row['userAddress'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="UserCity" class="col-sm-2 col-form-label">User City</label>
                            <div class="col-sm-10">
                                <input type="text" readonly name="UserCity" class="form-control" id="UserCity" value="<?php echo $row['userCity'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="UserCountry" class="col-sm-2 col-form-label">User Country</label>
                            <div class="col-sm-10">
                                <input type="text" readonly name="UserCountry" class="form-control" id="UserCountry" value="<?php echo $row['userCountry'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="UserRole" class="col-sm-2 col-form-label">User Role</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="UserRole" id="UserRole" aria-label="Floating label select example">
                                    <option selected disabled hidden><?php echo $row['Role'] ?></option>
                                    <option value="Admin">Admin</option>
                                    <option value="Tester">Tester</option>
                                    <option value="Employee">Employee</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="UserStatus" class="col-sm-2 col-form-label">User Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="UserStatus" id="UserStatus" aria-label="Floating label select example">
                                    <option selected disabled hidden><?php echo $row['Status'] ?></option>
                                    <option value="Active">Active</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="editUser" class="btn btn-dark  rounded-pill py-2 w-100 mt-4">Edit User</button>
                <?php }
                } ?>
            </form>
        </div>
    </div> -->
    </div>
</section>

<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php require("includes/footer.inc.php"); ?>