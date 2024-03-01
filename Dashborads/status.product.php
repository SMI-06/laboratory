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

    <?php if ($_GET['id'] == "productPending") { ?>
        <h3 class="text-dark text-center text-uppercase mt-3"> products</h3>
        <div class="col-sm-12 col-xl-12">
            <div class=" h-100 p-4 table-scrollable">
                <table class="table table-hover text-dark table-bordered text-center" style="width:100%;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Product Category</th>
                            <th class="text-center">Product Description</th>
                            <th class="text-center">Product Image</th>
                            <th class="text-center">Product Price</th>
                            <th class="text-center">Status</th>
                            <th colspan="3" class="text-center">Action</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php
                        $select = "SELECT * FROM `products` where `status` = 'pending' AND user_id = '$userDetail[userId]'";
                        $res = mysqli_query($conn, $select);
                        if (mysqli_num_rows($res)) {
                            while ($row = mysqli_fetch_assoc($res)) { ?>
                                <tr>
                                    <th><?php echo $row['id'] ?></th>
                                    <td><?php echo $row['productName'] ?></td>
                                    <td><?php echo $row['productCategory'] ?></td>
                                    <td><?php echo $row['productDescription'] ?></td>
                                    <td><img src="assets/img/UserImages/<?php echo $row['productImage'] ?>" width="50px" height="50px" class="rounded-circle" alt="">
                                    </td>
                                    <td><?php echo $row['productPrice'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><a href="user.edit.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-dark rounded-pill"><i class="fas fa-user-edit"></i></a></td>
                                    <td><a class="btn btn-outline-warning rounded-pill"><i class="fas fa-ban"></i></a></td>
                                    <td><a class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>
                                </tr>
                            <?php }
                        } else { ?>
                            <td colspan="17" class="text-center"><i class="far fa-times-circle fa-3x"></i>
                                <h4>No Record Found</h4>
                            </td>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } else if ($_GET['id'] == "productFailed") { ?>
        <h3 class="text-dark text-center text-uppercase mt-3">Fail Products</h3>
        <div class="col-sm-12 col-xl-12">
            <div class=" h-100 p-4 table-scrollable">
                <table class="table table-hover text-dark table-bordered text-center" style="width:100%;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Product Category</th>
                            <th class="text-center">Product Description</th>
                            <th class="text-center">Product Image</th>
                            <th class="text-center">Product Price</th>
                            <th class="text-center">Status</th>
                            <th colspan="3" class="text-center">Action</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php
                        $select = "SELECT * FROM `products` where `status` = 'Failed' AND user_id = '$userDetail[userId]'";
                        $res = mysqli_query($conn, $select);
                        if (mysqli_num_rows($res)) {
                            while ($row = mysqli_fetch_assoc($res)) { ?>
                                <tr>
                                    <th><?php echo $row['id'] ?></th>
                                    <td><?php echo $row['productName'] ?></td>
                                    <td><?php echo $row['productCategory'] ?></td>
                                    <td><?php echo $row['productDescription'] ?></td>
                                    <td><img src="assets/img/UserImages/<?php echo $row['productImage'] ?>" width="50px" height="50px" class="rounded-circle" alt="">
                                    </td>
                                    <td><?php echo $row['productPrice'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><a href="user.edit.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-dark rounded-pill"><i class="fas fa-user-edit"></i></a></td>
                                    <td><a class="btn btn-outline-warning rounded-pill"><i class="fas fa-ban"></i></a></td>
                                    <td><a class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>
                                </tr>
                            <?php }
                        } else { ?>
                            <td colspan="17" class="text-center"><i class="far fa-times-circle fa-3x"></i>
                                <h4>No Record Found</h4>
                            </td>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } else if ($_GET['id'] == "productPass") { ?>
        <h3 class="text-dark text-center text-uppercase mt-3">Pass Products</h3>
        <div class="col-sm-12 col-xl-12">
            <div class=" h-100 p-4 table-scrollable">
                <table class="table table-hover text-dark table-bordered text-center" style="width:100%;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Product Category</th>
                            <th class="text-center">Product Description</th>
                            <th class="text-center">Product Image</th>
                            <th class="text-center">Product Price</th>
                            <th class="text-center">Status</th>
                            <th colspan="3" class="text-center">Action</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php
                        $select = "SELECT * FROM `products` where `status` = 'Pass' AND user_id = '$userDetail[userId]'";
                        $res = mysqli_query($conn, $select);
                        if (mysqli_num_rows($res)) {
                            while ($row = mysqli_fetch_assoc($res)) { ?>
                                <tr>
                                    <th><?php echo $row['id'] ?></th>
                                    <td><?php echo $row['productName'] ?></td>
                                    <td><?php echo $row['productCategory'] ?></td>
                                    <td><?php echo $row['productDescription'] ?></td>
                                    <td><img src="assets/img/UserImages/<?php echo $row['productImage'] ?>" width="50px" height="50px" class="rounded-circle" alt="">
                                    </td>
                                    <td><?php echo $row['productPrice'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><a href="user.edit.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-dark rounded-pill"><i class="fas fa-user-edit"></i></a></td>
                                    <td><a class="btn btn-outline-warning rounded-pill"><i class="fas fa-ban"></i></a></td>
                                    <td><a class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>
                                </tr>
                            <?php }
                        } else { ?>
                            <td colspan="17" class="text-center"><i class="far fa-times-circle fa-3x"></i>
                                <h4>No Record Found</h4>
                            </td>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
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