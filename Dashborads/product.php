<?php require("includes/config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

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

<section class="section-back">
    <!-- City -->
    <?php
    if ($_GET['id'] == "productAdd") { ?>
        <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transform:uppercase">Add Product For Test</h3>
        <!-- <div > -->
        <form action="logics/logic.product_test.php" method="post" enctype="multipart/form-data">
            <div class="container py-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4 w-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="Productname">Product Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Productname" placeholder="Enter Product Name" id="Productname">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="ProductImage">Product Image</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" name="ProductImage" id="ProductImage">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="ProductCategory">Product Category</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="ProductCategory" id="ProductCategory" aria-label="Floating label select example">
                                            <option selected hidden disabled>Select Product Category</option>
                                            <option>Electrical Category</option>
                                            <option>Medical Category</option>
                                            <option>Other Category</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="ProductDescription">Product Description</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="ProductDescription" id="ProductDescription" placeholder="Product Description" rows="3"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="ProductPrice">Product Price</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="ProductPrice" placeholder="Enter Product Price" id="ProductPrice">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="laboratorytype">Laboratory Type</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="laboratorytype" id="laboratorytype" aria-label="Floating label select example">
                                            <option selected hidden disabled>Select Laboratory Type</option>
                                            <?php
                                            $select_Lab_type = mysqli_query($conn, "SELECT laboratory.laboratory_type FROM `laboratorytype` JOIN laboratory on laboratory.laboratory_type = laboratorytype.laboratorytype_id;");
                                                while ($row = mysqli_fetch_assoc($select_Lab_type)) { ?>
                                                    <option><?php echo $row['laboratory_type'] ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="Laboratory">Laboratory</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="Laboratory" id="Laboratory" aria-label="Floating label select example">
                                            <option selected hidden disabled>Select Laboratory</option>
                                            <?php
                                            $select_Lab = mysqli_query($conn, "SELECT laboratory_name FROM `laboratory`;");
                                                while ($row = mysqli_fetch_assoc($select_Lab)) { ?>
                                                    <option><?php echo $row['laboratory_name'] ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input type="submit" value="Add Product" name="add_product" class="btn btn-outline-dark rounded-pill">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- </div> -->

        <!-- Country -->
    <?php } else if ($_GET['id'] == "country") {
    ?>
        <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transform:uppercase">Add Country</h3>
        <!-- <div > -->
        <form action="logics/logic.location.php" method="post" enctype="multipart/form-data">
            <div class="container py-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4 w-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="Cityname">Country Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Countryname" placeholder="Enter Country Name" id="Countryname">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="Regions">Regions</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="Regions" id="Regions" aria-label="Floating label select example">
                                            <option selected hidden disabled>Select Regions</option>
                                            <?php
                                            $query = mysqli_query($conn, "Select * from Regions");
                                            if (mysqli_num_rows($query) > 0) {
                                                while ($row = mysqli_fetch_assoc($query)) { ?>
                                                    <option value="<?php echo $row['id'] ?>">
                                                        <?php echo $row['Region_Name'] ?>
                                                    </option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input type="submit" value="Add Country" name="add_country" class="btn btn-outline-dark rounded-pill">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- </div> -->

        <!-- Province -->
    <?php } else if ($_GET['id'] == "province") { ?>
        <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transform:uppercase">Add Province</h3>
        <!-- <div > -->
        <form action="logics/logic.location.php" method="post" enctype="multipart/form-data">
            <div class="container py-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4 w-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="Provincename">Province Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Provincename" placeholder="Enter Province Name" id="Cityname">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="Country">Country</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="col-sm-12">
                                            <select class="form-select" name="Country" id="Country" aria-label="Floating label select example">
                                                <option selected hidden disabled>Select Country</option>
                                                <?php
                                                $query = mysqli_query($conn, "Select * from countries");
                                                if (mysqli_num_rows($query) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $row['id'] ?>">
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
                                        <input type="submit" value="Add Province" name="add_province" class="btn btn-outline-dark rounded-pill">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- </div> -->
    <?php } else if ($_GET['id'] == "region") { ?>
        <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transform:uppercase">Add Region</h3>
        <!-- <div > -->
        <form action="logics/logic.location.php" method="post" enctype="multipart/form-data">
            <div class="container py-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4 w-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="regionname">Region Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="regionname" placeholder="Enter Region Name" id="regionname">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input type="submit" value="Add Region" name="add_region" class="btn btn-outline-dark rounded-pill">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- </div> -->
    <?php }
    ?>

</section>

<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php require("includes/footer.inc.php"); ?>