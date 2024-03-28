<?php require("includes/config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
} elseif (isset($_SESSION['testerDetails'])) {
    $testerDetail = $_SESSION['testerDetails'];
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
        <form action="logics/logic.product.test.php" method="post" enctype="multipart/form-data">
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-10 offset-1">
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
                                            <option value="Electrical Category">Electrical Category</option>
                                            <option value="Medical Category">Medical Category</option>
                                            <option value="Other Category">Other Category</option>
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
                                            $select_Lab_type = mysqli_query($conn, "SELECT * FROM `laboratorytype`");
                                            while ($row = mysqli_fetch_assoc($select_Lab_type)) { ?>
                                                <option value="<?php echo $row['laboratorytype_id'] ?>"><?php echo $row['Laboratory_Type'] ?></option>
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
                                            $select_Lab = mysqli_query($conn, "SELECT * FROM `laboratory`;");
                                            while ($row = mysqli_fetch_assoc($select_Lab)) { ?>
                                                <option value="<?php echo $row['laboratory_id'] ?>"><?php echo $row['laboratory_name'] ?></option>
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
    <?php } else if ($_GET['id'] == "productshow") { ?>
        <h3 class="text-dark text-center text-uppercase mt-3"> products</h3>
        <div class="col-sm-12 col-xl-12">
            <div class=" h-100 p-4 table-scrollable" style="overflow-x: scroll;">
                <table class="table table-hover text-dark table-bordered text-center" style="width:100%;">
                    <thead>
                        <tr>
                            <?php
                            $query = mysqli_query($conn, "SELECT * from products");
                            $row = mysqli_fetch_assoc($query);
                            $keys = array_keys($row);
                            $lastIndex = count($keys) - 1;
                            $secondLastIndex = $lastIndex - 1;
                            foreach ($row as $column => $value) {
                                if ($column !== $keys[0] && $column !== $keys[$secondLastIndex]) { ?>
                                    <th><?php echo $column ?></th>
                            <?php }
                            }
                            ?>
                            <th colspan="3" class="text-center">Action</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php
                        if ($userDetail["Role"] == "User") {
                            require('products.all.php');
                        } elseif ($testerDetail) {
                            echo "Tester Query";
                        }
                        else { ?>
                            <td colspan="17" class="text-center"><i class="far fa-times-circle fa-3x"></i>
                                <h4>No Record Found</h4>
                            </td>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>

</section>

<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php require("includes/footer.inc.php"); ?>