<?php require("includes/config.php"); ?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
}
$title = "Lab Automation | All Tester"
?>

<?php require("includes/header.inc.php"); ?>

<!-- Navbar Start -->
<?php require("components/navbar.php"); ?>
<!-- Navbar End -->

<!-- Sidebar Start -->
<?php require("components/sidebar.php"); ?>
<!-- Sidebar End -->

<section class="bg-light" style=" border-radius:10px; padding:5px; margin:10px 22px">
    <div class="container-fluid pt-4 px-4">

        <?php
        if ($_GET['id'] == "laboratory") { ?>
            <h3 class="text-dark text-center text-uppercase">Status Check</h3>
            <div class="col-sm-12 col-xl-12">
                <div class=" rounded h-100 p-4 table-scrollable" style="overflow-x: scroll;">
                    <table class="table table-hover" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Laboratory Id</th>
                                <th>Laboratory Name</th>
                                <th>Laboratory Address</th>
                                <th>Laboratory Type</th>
                                <th>Laboratory City</th>
                                <th>Laboratory Country</th>
                                <th>Status</th>
                                <th>User</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $res = mysqli_query($conn, "SELECT * FROM `laboratory` join laboratorytype ON laboratorytype.laboratorytype_id = laboratory.laboratory_type JOIN cities on cities.id = laboratory.laboratory_city JOIN countries ON countries.Country_Id = laboratory.laboratory_country JOIN signup ON signup.id = laboratory.user_id order by laboratory.laboratory_id asc");
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    if ($row['user_id'] == $userDetail['userId']) {
                            ?>
                                        <tr>
                                            <th><?php echo $row['laboratory_id'] ?></th>
                                            <td><?php echo $row['laboratory_name'] ?></td>
                                            <td><?php echo $row['laboratory_address'] ?></td>
                                            <td>
                                                <?php
                                                if ($row['Laboratory_Type'] === "Other Type") {
                                                    echo $row['laboratory_type_custom'];
                                                } else {
                                                    echo $row['Laboratory_Type'];
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $row['city_Name'] ?></td>
                                            <td><?php echo $row['country_Name'] ?></td>
                                            <td><span class="badge bg-warning mt-1"><?php echo $row['status'] ?> </span></td>
                                            <td><?php echo $row['userName'] ?></td>
                                            <td><a href="#?id=<?php echo $row['laboratory_id'] ?>" class="btn btn-outline-danger rounded-pill "><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php } else { ?>
                                        <td colspan="17" class="text-center"><i class="far fa-times-circle fa-3x"></i>
                                            <h4>No Request Pending</h4>
                                        </td>
                                <?php }
                                }
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
        <?php } ?>
    </div>
</section>
<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php require("includes/footer.inc.php");
?>