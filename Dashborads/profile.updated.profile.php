<?php require("includes/config.php"); ?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
}
$title = "Lab Automation | Profile | Update"
?>

<?php require("includes/header.inc.php"); ?>

<!-- Navbar Start -->
<?php require("components/navbar.php"); ?>
<!-- Navbar End -->

<!-- Sidebar Start -->
<?php require("components/sidebar.php"); ?>
<!-- Sidebar End -->

<style>
    .upload {
        width: 50px;
        /* Set the width as needed */
        height: 50px;
        /* Set the height as needed */
        display: inline-block;
        position: relative;
        cursor: pointer;
    }

    .upload::before {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url("assets/img/upload.png");
        /* Replace with the path to your upload icon */
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    /* Hide the default file input visually */
    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
    }
</style>

<section class="section-back">
<form action="Logics/logic.profile.update.php" method="post" enctype="multipart/form-data">
    <?php if (isset($_GET['userDetails'])) { ?>
        <div class="col-lg-8 m-auto">
            <div class="card mb-4 w-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <!-- <label class="mb-0" for="name">Your Id</label> -->
                            <?php
                            if (isset($row['userimage'])) { ?>
                                <img class="rounded-circle" src="./assets/img/UserImages/<?php echo $row['userimage'] ?>" alt="" style="width: 25%;">
                            <?php } else { ?>
                                <img class="rounded-circle" id="imagePreview" src="./assets/img/user.png" alt="" style="width: 50px;">
                            <?php } ?>
                        </div>
                        <div class="col-sm-9">
                            <label for="file-upload" class="upload">
                                <input type="file" onchange="previewImage(event)" id="file-upload" name="userUpdatedProfileImage" class="sr-only">
                            </label>
                        </div>
                        <script>
                            function previewImage(event) {
                                var reader = new FileReader();
                                reader.onload = function() {
                                    var output = document.getElementById('imagePreview');
                                    output.src = reader.result;
                                };
                                reader.readAsDataURL(event.target.files[0]);
                            }
                        </script>
                        <hr>
                        <div class="col-sm-3">
                            <label class="mb-0" for="name">Your Id</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control" name="userId" value="<?php echo $row['id'] ?>" id="Id">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="name">User Name</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control" name="updateName" value="<?php echo $row['userName'] ?>" id="name">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="name">Full Name</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="userFullName" placeholder="Enter Your Full Name" value="<?php echo $row['userFullName'] ?>" id="name">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="Cnic">CNIC</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $row['userCNIC'] ?>" name="userCnic" placeholder="Enter Your CNIC" id="Cnic">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="Religion">Religion</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-select" name="userReligion" id="Religion" aria-label="Floating label select example">
                                <option selected disabled>Select Your Religion</option>
                                <option value="Islam">Islam</option>
                                <option value="Christianity">Christianity</option>
                                <option value="Hinduism">Hinduism</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="phone">Phone</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $row['userPhone'] ?>" name="userPhone" placeholder="Enter Phone Number" id="phone">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0">Gender</label>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            if ($row['userGender'] == "Male") { ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="userGender" id="Male" value="Male">
                                    <label class="form-check-label" for="Male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="userGender" id="Female" value="Female">
                                    <label class="form-check-label" for="Female">Female</label>
                                </div>
                            <?php } else if ($row['userGender'] == "Female") { ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="userGender" id="Male" value="Male">
                                    <label class="form-check-label" for="Male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="userGender" id="Female" value="Female">
                                    <label class="form-check-label" for="Female">Female</label>
                                </div>
                            <?php } else { ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="userGender" id="Male" value="Male">
                                    <label class="form-check-label" for="Male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="userGender" id="Female" value="Female">
                                    <label class="form-check-label" for="Female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="userGender" id="Custom" value="Custom">
                                    <label class="form-check-label" for="Custom">Custom</label>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="address">Address</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" value="<?php echo $row['userAddress'] ?>" class="form-control" name="userAddress" placeholder="Enter Your Address" id="address">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="city">City</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-select" name="userCity" id="city" aria-label="Floating label select example">
                                <option selected disabled>Select Your City</option>
                                <?php
                                $query = mysqli_query($conn, "Select * from cities");
                                if (mysqli_num_rows($query) > 0) {
                                    while ($Cityrow = mysqli_fetch_assoc($query)) { ?>
                                        <option value="<?php echo $Cityrow['city_Name'] ?>">
                                            <?php echo $Cityrow['city_Name'] ?>
                                        </option>
                                <?php }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="country">Country</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-select" name="userCountry" id="country" aria-label="Floating label select example">
                                <option selected hidden disabled>Select Your Country</option>
                                <?php
                                $query = mysqli_query($conn, "Select * from countries");
                                if (mysqli_num_rows($query) > 0) {
                                    while ($Countryrow = mysqli_fetch_assoc($query)) { ?>
                                        <option value="<?php echo $Countryrow['country_Name'] ?>">
                                            <?php echo $Countryrow['country_Name'] ?>
                                        </option>
                                <?php }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="password">Password</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $row['userPassword'] ?>" name="userPass" placeholder="Enter Phone Number" id="password">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <input type="submit" value="Update Profile Data" name="save" class="btn btn-outline-dark rounded-pill">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    ?>
</form>
</section>

<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php require("includes/footer.inc.php"); ?>