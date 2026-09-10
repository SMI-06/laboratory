<?php require("includes/config.php"); ?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
}
if (isset($_GET['id'])) {
    $add_lab_detail_id = $_GET['id'];
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
    .style {
        color: white;
        gap: 10px;
    }
</style>

<section class="main-section section-back">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active style" style="margin-right: 5px;" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#laboratory-details"
                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Laboratory Details</button>
            <button class="nav-link style" id="nav-profile-tab" style="margin-right: 5px;"  data-bs-toggle="tab" data-bs-target="#add-test"
                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Add Test</button>
            <button class="nav-link style" id="nav-contact-tab" style="margin-right: 5px;" data-bs-toggle="tab" data-bs-target="#add-emp"
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Add Employee</button>
            <button class="nav-link style" id="nav-contact-tab" style="margin-right: 5px;" data-bs-toggle="tab" data-bs-target="#add-assets"
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Add Assets</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="laboratory-details" role="tabpanel" aria-labelledby="nav-home-tab">
            <section class="bg-light" style=" border-radius:10px; padding:5px; margin:10px 22px">
                <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transfoFrm:uppercase">
                    Laboratory Details</h3>
                <!-- <div > -->
                <form action="Logics/logic.request.php" method="post" enctype="multipart/form-data">
                    <div class="container py-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-4 w-100">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratoryname">Laboratory Name</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" hidden class="form-control" name="userId"
                                                    value="<?php echo $userDetail['userId'] ?>" id="userId">
                                                <input type="text" class="form-control" name="laboratoryName"
                                                    placeholder="Enter Laboratory Name" id="laboratoryname">
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratoryname">Branch Number</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="laboratory-branch"
                                                        id="laboratory-branch"
                                                        aria-label="Floating label select example">
                                                        <option selected hidden disabled>Select Branch</option>
                                                        <option value="01">Branch No 01</option>
                                                        <option value="02">Branch No 02</option>
                                                        <option value="03">Branch No 03</option>
                                                        <option value="04">Branch No 04</option>
                                                        <option value="05">Branch No 05</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratorytype">Laboratory Type</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="form-select" name="laboratorytype" id="laboratorytype"
                                                    aria-label="Floating label select example"
                                                    onchange="changeLabType()">
                                                    <option selected hidden disabled>Select Laboratory Type</option>
                                                    <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM laboratorytype");
                                                    if (mysqli_num_rows($query) > 0) {
                                                        while ($row = mysqli_fetch_assoc($query)) { ?>
                                                            <option value="<?php echo $row['laboratorytype_id'] ?>">
                                                                <?php echo $row['Laboratory_Type'] ?>
                                                            </option>
                                                        <?php }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3 labelLabCustomType d-none">
                                                <label class="mt-2" for="laboratorytypewrite"
                                                    style="white-space: nowrap !important;">
                                                    If we don't have? Laboratory Type</label>
                                            </div>
                                            <div class="col-sm-3 labCustomType d-none">
                                                <input type="text" class="form-control" name="laboratorytypewrite"
                                                    placeholder="Please Type Here" id="laboratorytypewrite" value="">
                                            </div>
                                        </div>

                                        <script>
                                            function changeLabType() {
                                                let valueLabType = document.querySelector("#laboratorytype").value;
                                                if (valueLabType === "00001") {
                                                    document.querySelector(".labCustomType").classList.remove("d-none");
                                                    document.querySelector(".labCustomType input").setAttribute("required", "required");
                                                    document.querySelector(".labelLabCustomType").classList.remove("d-none");
                                                } else {
                                                    document.querySelector(".labCustomType").classList.add("d-none");
                                                    document.querySelector(".labCustomType input").removeAttribute("required");
                                                    document.querySelector(".labelLabCustomType").classList.add("d-none");

                                                }
                                            }
                                        </script>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratoryaddress">Laboratory Address</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="laboratoryaddress"
                                                    placeholder="Enter Laboratory Address" id="laboratoryaddress">
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="laboratory-city"
                                                        id="laboratory-city" aria-label="Floating label select example">
                                                        <option selected hidden disabled>Select Laboratory City</option>
                                                        <?php
                                                        $query = mysqli_query($conn, "Select * from cities");
                                                        if (mysqli_num_rows($query) > 0) {
                                                            while ($row = mysqli_fetch_assoc($query)) { ?>
                                                                <option value="<?php echo $row['id'] ?>">
                                                                    <?php echo $row['city_Name'] ?>
                                                                </option>
                                                            <?php }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="laboratory-country"
                                                        id="laboratorytype" aria-label="Floating label select example">
                                                        <option selected hidden disabled>Select Laboratory Country
                                                        </option>
                                                        <?php
                                                        $query = mysqli_query($conn, "Select * from countries");
                                                        if (mysqli_num_rows($query) > 0) {
                                                            while ($row = mysqli_fetch_assoc($query)) { ?>
                                                                <option value="<?php echo $row['Country_Id'] ?>">
                                                                    <?php echo $row['country_Name'] ?>
                                                                </option>
                                                            <?php }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <input type="submit" value="Send Request" name="send-request"
                                                    class="btn btn-outline-dark rounded-pill">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- </div> -->
            </section>
        </div>
        <div class="tab-pane fade" id="add-test" role="tabpanel" aria-labelledby="nav-profile-tab">
            <section class="bg-light" style=" border-radius:10px; padding:5px; margin:10px 22px">
                <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transfoFrm:uppercase">
                    Add Test</h3>
                <!-- <div > -->
                <form action="Logics/logic.request.php" method="post" enctype="multipart/form-data">
                    <div class="container py-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-4 w-100">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratoryname">Test Name</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" hidden class="form-control" name="userId"
                                                    value="<?php echo $userDetail['userId'] ?>" id="userId">
                                                <input type="text" class="form-control" name="testname"
                                                    placeholder="Enter Test Name" id="testname">
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratoryname">Branch Number</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="laboratory-branch"
                                                        id="laboratory-branch"
                                                        aria-label="Floating label select example">
                                                        <option selected hidden disabled>Select Branch</option>
                                                        <option value="01">Branch No 01</option>
                                                        <option value="02">Branch No 02</option>
                                                        <option value="03">Branch No 03</option>
                                                        <option value="04">Branch No 04</option>
                                                        <option value="05">Branch No 05</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="testtype">Test Type</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="form-select" name="testtype" id="testtype"
                                                    aria-label="Floating label select example"
                                                    onchange="changeLabType()">
                                                    <option selected hidden disabled>Select Laboratory Type</option>
                                                    <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM laboratorytype");
                                                    if (mysqli_num_rows($query) > 0) {
                                                        while ($row = mysqli_fetch_assoc($query)) { ?>
                                                            <option value="<?php echo $row['laboratorytype_id'] ?>">
                                                                <?php echo $row['Laboratory_Type'] ?>
                                                            </option>
                                                    <?php }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3 labelLabCustomType d-none">
                                                <label class="mt-2" for="laboratorytypewrite"
                                                    style="white-space: nowrap !important;">
                                                    If we don't have? Laboratory Type</label>
                                            </div>
                                            <div class="col-sm-3 labCustomType d-none">
                                                <input type="text" class="form-control" name="laboratorytypewrite"
                                                    placeholder="Please Type Here" id="laboratorytypewrite" value="">
                                            </div>
                                        </div>

                                        <script>
                                            function changeLabType() {
                                                let valueLabType = document.querySelector("#testtype").value;
                                                if (valueLabType === "00001") {
                                                    document.querySelector(".labCustomType").classList.remove("d-none");
                                                    document.querySelector(".labCustomType input").setAttribute("required", "required");
                                                    document.querySelector(".labelLabCustomType").classList.remove("d-none");
                                                } else {
                                                    document.querySelector(".labCustomType").classList.add("d-none");
                                                    document.querySelector(".labCustomType input").removeAttribute("required");
                                                    document.querySelector(".labelLabCustomType").classList.add("d-none");

                                                }
                                            }
                                        </script>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratoryaddress">Laboratory Address</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="laboratoryaddress"
                                                    placeholder="Enter Laboratory Address" id="laboratoryaddress">
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="laboratory-city"
                                                        id="laboratory-city" aria-label="Floating label select example">
                                                        <option selected hidden disabled>Select Laboratory City</option>
                                                        <?php
                                                        $query = mysqli_query($conn, "Select * from cities");
                                                        if (mysqli_num_rows($query) > 0) {
                                                            while ($row = mysqli_fetch_assoc($query)) { ?>
                                                                <option value="<?php echo $row['id'] ?>">
                                                                    <?php echo $row['city_Name'] ?>
                                                                </option>
                                                            <?php }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="laboratory-country"
                                                        id="laboratorytype" aria-label="Floating label select example">
                                                        <option selected hidden disabled>Select Laboratory Country
                                                        </option>
                                                        <?php
                                                        $query = mysqli_query($conn, "Select * from countries");
                                                        if (mysqli_num_rows($query) > 0) {
                                                            while ($row = mysqli_fetch_assoc($query)) { ?>
                                                                <option value="<?php echo $row['Country_Id'] ?>">
                                                                    <?php echo $row['country_Name'] ?>
                                                                </option>
                                                            <?php }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <input type="submit" value="Send Request" name="send-request"
                                                    class="btn btn-outline-dark rounded-pill">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- </div> -->
            </section>
        </div>
        <div class="tab-pane fade" id="add-emp" role="tabpanel" aria-labelledby="nav-contact-tab">
            <section class="bg-light" style=" border-radius:10px; padding:5px; margin:10px 22px">
                <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transfoFrm:uppercase">
                    Add Employee</h3>
                <!-- <div > -->
                <form action="Logics/logic.request.php" method="post" enctype="multipart/form-data">
                    <div class="container py-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-4 w-100">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratoryname">Laboratory Name</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" hidden class="form-control" name="userId"
                                                    value="<?php echo $userDetail['userId'] ?>" id="userId">
                                                <input type="text" class="form-control" name="laboratoryName"
                                                    placeholder="Enter Laboratory Name" id="laboratoryname">
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratoryname">Branch Number</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="laboratory-branch"
                                                        id="laboratory-branch"
                                                        aria-label="Floating label select example">
                                                        <option selected hidden disabled>Select Branch</option>
                                                        <option value="01">Branch No 01</option>
                                                        <option value="02">Branch No 02</option>
                                                        <option value="03">Branch No 03</option>
                                                        <option value="04">Branch No 04</option>
                                                        <option value="05">Branch No 05</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratorytype">Laboratory Type</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="form-select" name="laboratorytype" id="laboratorytype"
                                                    aria-label="Floating label select example"
                                                    onchange="changeLabType()">
                                                    <option selected hidden disabled>Select Laboratory Type</option>
                                                    <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM laboratorytype");
                                                    if (mysqli_num_rows($query) > 0) {
                                                        while ($row = mysqli_fetch_assoc($query)) { ?>
                                                            <option value="<?php echo $row['laboratorytype_id'] ?>">
                                                                <?php echo $row['Laboratory_Type'] ?>
                                                            </option>
                                                        <?php }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3 labelLabCustomType d-none">
                                                <label class="mt-2" for="laboratorytypewrite"
                                                    style="white-space: nowrap !important;">
                                                    If we don't have? Laboratory Type</label>
                                            </div>
                                            <div class="col-sm-3 labCustomType d-none">
                                                <input type="text" class="form-control" name="laboratorytypewrite"
                                                    placeholder="Please Type Here" id="laboratorytypewrite" value="">
                                            </div>
                                        </div>

                                        <script>
                                            function changeLabType() {
                                                let valueLabType = document.querySelector("#laboratorytype").value;
                                                if (valueLabType === "00001") {
                                                    document.querySelector(".labCustomType").classList.remove("d-none");
                                                    document.querySelector(".labCustomType input").setAttribute("required", "required");
                                                    document.querySelector(".labelLabCustomType").classList.remove("d-none");
                                                } else {
                                                    document.querySelector(".labCustomType").classList.add("d-none");
                                                    document.querySelector(".labCustomType input").removeAttribute("required");
                                                    document.querySelector(".labelLabCustomType").classList.add("d-none");

                                                }
                                            }
                                        </script>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratoryaddress">Laboratory Address</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="laboratoryaddress"
                                                    placeholder="Enter Laboratory Address" id="laboratoryaddress">
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="laboratory-city"
                                                        id="laboratory-city" aria-label="Floating label select example">
                                                        <option selected hidden disabled>Select Laboratory City</option>
                                                        <?php
                                                        $query = mysqli_query($conn, "Select * from cities");
                                                        if (mysqli_num_rows($query) > 0) {
                                                            while ($row = mysqli_fetch_assoc($query)) { ?>
                                                                <option value="<?php echo $row['id'] ?>">
                                                                    <?php echo $row['city_Name'] ?>
                                                                </option>
                                                            <?php }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="laboratory-country"
                                                        id="laboratorytype" aria-label="Floating label select example">
                                                        <option selected hidden disabled>Select Laboratory Country
                                                        </option>
                                                        <?php
                                                        $query = mysqli_query($conn, "Select * from countries");
                                                        if (mysqli_num_rows($query) > 0) {
                                                            while ($row = mysqli_fetch_assoc($query)) { ?>
                                                                <option value="<?php echo $row['Country_Id'] ?>">
                                                                    <?php echo $row['country_Name'] ?>
                                                                </option>
                                                            <?php }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <input type="submit" value="Send Request" name="send-request"
                                                    class="btn btn-outline-dark rounded-pill">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- </div> -->
            </section>
        </div>
        <div class="tab-pane fade" id="add-assets" role="tabpanel" aria-labelledby="nav-contact-tab">
            <section class="bg-light" style=" border-radius:10px; padding:5px; margin:10px 22px">
                <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transfoFrm:uppercase">
                    Add Assets</h3>
                <!-- <div > -->
                <form action="Logics/logic.request.php" method="post" enctype="multipart/form-data">
                    <div class="container py-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-4 w-100">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratoryname">Laboratory Name</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" hidden class="form-control" name="userId"
                                                    value="<?php echo $userDetail['userId'] ?>" id="userId">
                                                <input type="text" class="form-control" name="laboratoryName"
                                                    placeholder="Enter Laboratory Name" id="laboratoryname">
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratoryname">Branch Number</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="laboratory-branch"
                                                        id="laboratory-branch"
                                                        aria-label="Floating label select example">
                                                        <option selected hidden disabled>Select Branch</option>
                                                        <option value="01">Branch No 01</option>
                                                        <option value="02">Branch No 02</option>
                                                        <option value="03">Branch No 03</option>
                                                        <option value="04">Branch No 04</option>
                                                        <option value="05">Branch No 05</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratorytype">Laboratory Type</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="form-select" name="laboratorytype" id="laboratorytype"
                                                    aria-label="Floating label select example"
                                                    onchange="changeLabType()">
                                                    <option selected hidden disabled>Select Laboratory Type</option>
                                                    <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM laboratorytype");
                                                    if (mysqli_num_rows($query) > 0) {
                                                        while ($row = mysqli_fetch_assoc($query)) { ?>
                                                            <option value="<?php echo $row['laboratorytype_id'] ?>">
                                                                <?php echo $row['Laboratory_Type'] ?>
                                                            </option>
                                                        <?php }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3 labelLabCustomType d-none">
                                                <label class="mt-2" for="laboratorytypewrite"
                                                    style="white-space: nowrap !important;">
                                                    If we don't have? Laboratory Type</label>
                                            </div>
                                            <div class="col-sm-3 labCustomType d-none">
                                                <input type="text" class="form-control" name="laboratorytypewrite"
                                                    placeholder="Please Type Here" id="laboratorytypewrite" value="">
                                            </div>
                                        </div>

                                        <script>
                                            function changeLabType() {
                                                let valueLabType = document.querySelector("#laboratorytype").value;
                                                if (valueLabType === "00001") {
                                                    document.querySelector(".labCustomType").classList.remove("d-none");
                                                    document.querySelector(".labCustomType input").setAttribute("required", "required");
                                                    document.querySelector(".labelLabCustomType").classList.remove("d-none");
                                                } else {
                                                    document.querySelector(".labCustomType").classList.add("d-none");
                                                    document.querySelector(".labCustomType input").removeAttribute("required");
                                                    document.querySelector(".labelLabCustomType").classList.add("d-none");

                                                }
                                            }
                                        </script>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="mt-2" for="laboratoryaddress">Laboratory Address</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="laboratoryaddress"
                                                    placeholder="Enter Laboratory Address" id="laboratoryaddress">
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="laboratory-city"
                                                        id="laboratory-city" aria-label="Floating label select example">
                                                        <option selected hidden disabled>Select Laboratory City</option>
                                                        <?php
                                                        $query = mysqli_query($conn, "Select * from cities");
                                                        if (mysqli_num_rows($query) > 0) {
                                                            while ($row = mysqli_fetch_assoc($query)) { ?>
                                                                <option value="<?php echo $row['id'] ?>">
                                                                    <?php echo $row['city_Name'] ?>
                                                                </option>
                                                            <?php }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="laboratory-country"
                                                        id="laboratorytype" aria-label="Floating label select example">
                                                        <option selected hidden disabled>Select Laboratory Country
                                                        </option>
                                                        <?php
                                                        $query = mysqli_query($conn, "Select * from countries");
                                                        if (mysqli_num_rows($query) > 0) {
                                                            while ($row = mysqli_fetch_assoc($query)) { ?>
                                                                <option value="<?php echo $row['Country_Id'] ?>">
                                                                    <?php echo $row['country_Name'] ?>
                                                                </option>
                                                            <?php }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <input type="submit" value="Send Request" name="send-request"
                                                    class="btn btn-outline-dark rounded-pill">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- </div> -->
            </section>
        </div>
    </div>
</section>


<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<?php require("includes/footer.inc.php"); ?>