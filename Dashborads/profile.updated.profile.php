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
    .change {
        width: 50px;
        margin-left: 2rem;
        height: 50px;
        display: inline-block;
        position: relative;
        cursor: pointer;
    }

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
                                <?php if ($row['userimage']) { ?>
                                    <label class="change">
                                        <a href="Error.php?pic&userDetails=<?php echo $row['userCNIC'] ?>" class="btn btn-primary" style="position: absolute; right: 0px; top: 50%; transform: translateY(-50%);">
                                            Change
                                        </a>
                                    </label>
                                <?php } else { ?>
                                    <label for="file-upload" class="upload">
                                        <input type="file" onchange="previewImage(event)" id="file-upload" name="userUpdatedProfileImage" class="sr-only">
                                    </label>
                                <?php } ?>
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
                                <label class="mb-0" for="name">User Id</label>
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
                                <?php if ($row['userEmail'] && isset($row['userCNIC'])) { ?>
                                    <div class="input-group">
                                        <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['userName'] ?>" name="userName" placeholder="Enter Your username" id="username">
                                        <a href="Error.php?un&userDetails=<?php echo $row['userCNIC'] ?>" class="btn btn-primary" style="position: absolute; right: 0px; top: 50%; transform: translateY(-50%);">
                                            Change
                                        </a>
                                    </div>
                                <?php } else { ?>
                                    <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['userName'] ?>" name="userName" placeholder="Enter Your username" id="username">
                                <?php } ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mb-0" for="name">User Email</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group"> <?php
                                                            if ($row['userEmail'] && isset($row['userCNIC'])) { ?>
                                        <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['userEmail'] ?>" name="userEmail" placeholder="Enter Your email" id="email">
                                        <a href="Error.php?em&userDetails=<?php echo $row['userCNIC'] ?>" class="btn btn-primary" style="position: absolute; right: 0px; top: 50%; transform: translateY(-50%);">
                                            Change
                                        </a>
                                    <?php } else { ?>
                                        <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['userEmail'] ?>" name="userEmail" placeholder="Enter Your email" id="email">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mb-0" for="name">Full Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" onkeypress="allowOnlyCharacters(event)" name="userFullName" placeholder="Enter Your Full Name" value="<?php echo $row['userFullName'] ?>" id="name">
                                <div id='characterError' class='form-text text-danger' style="display: none;">Enter Alphabet Only</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mb-0" for="Cnic">CNIC</label>
                            </div>
                            <div class="col-sm-9">
                                <?php if ($row['userEmail'] && isset($row['userCNIC'])) { ?>
                                    <div class="input-group">
                                        <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['userCNIC'] ?>" name="userCnic" placeholder="Enter Your CNIC" id="Cnic">
                                        <a href="Error.php?nic&userDetails=<?php echo $row['userCNIC'] ?>" class="btn btn-primary" style="position: absolute; right: 0px; top: 50%; transform: translateY(-50%);">
                                            Change
                                        </a>
                                    </div>
                                <?php } else { ?>
                                    <input type="text" class="form-control" onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['userCNIC'] ?>" name="userCnic" placeholder="Enter Your CNIC" id="Cnic">
                                    <div id='noError' class='form-text text-danger noError' style="display: none;">Enter Number Only</div>
                                <?php } ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mb-0" for="Religion">Religion</label>
                            </div>
                            <div class="col-sm-9">
                                <?php
                                if ($row['userReligion'] == "Islam") { ?>
                                    <select class="form-select" name="userReligion" id="Religion" aria-label="Floating label select example">
                                        <option selected value="Islam">Islam</option>
                                        <option value="Christianity">Christianity</option>
                                        <option value="Hinduism">Hinduism</option>
                                    </select>
                                <?php } elseif ($row['userReligion'] == "Christianity") { ?>
                                    <select class="form-select" name="userReligion" id="Religion" aria-label="Floating label select example">
                                        <option value="Islam">Islam</option>
                                        <option selected value="Christianity">Christianity</option>
                                        <option value="Hinduism">Hinduism</option>
                                    </select>
                                <?php } elseif ($row['userReligion'] == "Hinduism") { ?>
                                    <select class="form-select" name="userReligion" id="Religion" aria-label="Floating label select example">
                                        <option value="Islam">Islam</option>
                                        <option value="Christianity">Christianity</option>
                                        <option selected value="Hinduism">Hinduism</option>
                                    </select>
                                <?php } else { ?> <select class="form-select" name="userReligion" id="Religion" aria-label="Floating label select example">
                                        <option selected disabled>Select Your Religion</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Christianity">Christianity</option>
                                        <option value="Hinduism">Hinduism</option>
                                    </select> <?php } ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mb-0" for="phone">Phone</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['userPhone'] ?>" name="userPhone" placeholder="Enter Phone Number" id="phone">
                                <div id='noError' class='form-text text-danger noError' style="display: none;">Enter Number Only</div>
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
                                <?php
                                if (isset($row['userCNIC'])) {
                                    if ($row['userCity'] == "Lahore"  || $row['userCity'] == "Karachi") { ?>
                                        <select class="form-select" name="userCity" id="city" aria-label="Floating label select example">
                                            <?php $query = mysqli_query($conn, "Select * from cities");
                                            if (mysqli_num_rows($query) > 0) {
                                                while ($Cityrow = mysqli_fetch_assoc($query)) { ?>
                                                    <?php $isSelected = ($Cityrow['city_Name'] == $row['userCity']) ? 'selected' : ''; ?>
                                                    <option value="<?php echo $Cityrow['city_Name']; ?>" <?php echo $isSelected; ?>>
                                                        <?php echo $Cityrow['city_Name']; ?>
                                                    </option>
                                            <?php }
                                            } ?>
                                        </select>
                                    <?php }
                                } else { ?>
                                    <select class="form-select" name="userCity" id="city" aria-label="Floating label select example">
                                        <option disabled selected>Select Your City</option>
                                        <?php $query = mysqli_query($conn, "Select * from cities");
                                        if (mysqli_num_rows($query) > 0) {
                                            while ($Cityrow = mysqli_fetch_assoc($query)) { ?>
                                                <option value="<?php echo $Cityrow['city_Name']; ?>">
                                                    <?php echo $Cityrow['city_Name']; ?>
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                <?php } ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mb-0" for="country">Country</label>
                            </div>
                            <div class="col-sm-9">
                                <?php
                                if (isset($row['userCNIC'])) {
                                    if ($row['userCountry'] == "Pakistan"  || $row['userCountry'] == "China") { ?>
                                        <select class="form-select" name="userCountry" id="country" aria-label="Floating label select example">
                                            <option selected hidden disabled>Select Your Country</option>
                                            <?php
                                            $query = mysqli_query($conn, "Select * from countries");
                                            if (mysqli_num_rows($query) > 0) {
                                                while ($Countryrow = mysqli_fetch_assoc($query)) {
                                                    $isSelected = ($Countryrow['country_Name'] == $row['userCountry']) ? 'selected' : ''; ?>
                                                    <option value="<?php echo $Countryrow['country_Name'] ?>" <?php echo $isSelected; ?>>
                                                        <?php echo $Countryrow['country_Name'] ?>
                                                    </option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    <?php }
                                } else { ?>
                                    <select class="form-select" name="userCountry" id="country" aria-label="Floating label select example">
                                        <option disabled selected>Select Your Country</option>
                                        <?php $query = mysqli_query($conn, "Select * from countries");
                                        if (mysqli_num_rows($query) > 0) {
                                            while ($Countryrow = mysqli_fetch_assoc($query)) { ?>
                                                <option value="<?php echo $Countryrow['country_Name']; ?>">
                                                    <?php echo $Countryrow['country_Name']; ?>
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                <?php } ?>
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
                                <?php
                                if ($row["userCNIC"] !== "") { ?>
                                    <input type="submit" value="Edit" name="editProfile" class="btn btn-outline-dark rounded-pill">
                                <?php } else { ?>
                                    <input type="submit" value="Update Profile Data" name="save" class="btn btn-outline-dark rounded-pill">
                                <?php } ?>
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

<script>
    function allowOnlyCharacters(event) {
        var charCode = event.which || event.keyCode;
        var errorElement = document.getElementById('characterError');

        if (charCode >= 48 && charCode <= 57) {
            event.preventDefault();
            errorElement.style.display = 'block';
        } else {
            errorElement.style.display = 'none';
        }
    }

    function allowOnlyNumbers(event) {
        var charCode = event.which || event.keyCode;
        var errorElement = event.target.parentElement.querySelector('.noError');

        if (charCode < 48 || charCode > 57) {
            event.preventDefault();
            errorElement.style.display = 'block';
        } else {
            errorElement.style.display = 'none';
        }
    }
</script>