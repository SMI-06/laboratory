<?php require("includes/config.php"); ?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
    $id = (int) $userDetail['userId'];
}
$title = "Lab Automation | Laboratories"
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
        if ($_GET['id'] == "laboratoryType") { ?>
            <h3 class="text-dark text-center text-uppercase">All Laboratory Type</h3>
            <div class="col-sm-12 col-xl-12">
                <div class=" rounded h-100 p-4 table-scrollable">
                    <table class="table table-hover table-bordered text-dark text-center" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Laboratory Type</th>
                                <th colspan="3">Action</th>
                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            $select = "SELECT * FROM `laboratorytype`";
                            $res = mysqli_query($conn, $select);
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <th><?php echo $row['laboratorytype_id'] ?></th>
                                        <td><?php echo $row['Laboratory_Type'] ?></td>
                                        <td><a href="laboratorytype.edit.php?id=<?php echo $row['laboratorytype_id'] ?>" class="btn btn-outline-dark rounded-pill text-center"><i class="fas fa-pen"></i></a></td>
                                        <td><a href="laboratorytype.disable.php?id=<?php echo $row['laboratorytype_id'] ?>" class="btn btn-outline-warning rounded-pill"><i class="fas fa-ban"></i></a></td>
                                        <td><a href="laboratorytype.delete.php?id=<?php echo $row['laboratorytype_id'] ?>" class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>

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
        <?php } elseif ($_GET['id'] == "RFL") { ?>
            <h3 class="text-dark text-center text-uppercase">Request For Laboratory</h3>
            <div class="col-sm-12 col-xl-12">
                <div class=" rounded h-100 p-4 table-scrollable" style="overflow-x: scroll;">
                    <table class="table table-hover table-bordered text-dark text-center" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Laboratory Name</th>
                                <th>Laboratory Branch</th>
                                <th>Laboratory Adress</th>
                                <th>Laboratory Type</th>
                                <!-- <th>Laboratory Custom Type</th> -->
                                <th>Laboratory City</th>
                                <th>Laboratory Country</th>
                                <th>Admin Id</th>
                                <th>Admin Full Name</th>
                                <th>Date / Time</th>
                                <th>Status</th>
                                <th colspan="3">Action</th>
                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            $select = "SELECT * FROM laboratory
                            JOIN laboratorytype ON laboratory.laboratory_type = laboratorytype.laboratorytype_id
                            JOIN cities ON laboratory.laboratory_city = cities.id
                            JOIN countries ON laboratory.laboratory_country = countries.Country_Id
                            JOIN signup ON laboratory.admin_id = signup.id";
                            $res = mysqli_query($conn, $select);
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <th><?php echo $row['laboratory_id'] ?></th>
                                        <td><?php echo $row['laboratory_name'] ?></td>
                                        <td><?php echo $row['laboratory_branch_number'] ?></td>
                                        <td><?php echo $row['laboratory_address'] ?></td>
                                        <td><?php
                                            if ($row['Laboratory_Type'] === "Other Type") {
                                                echo $row['laboratory_type_custom'];
                                            } else {
                                                echo $row['Laboratory_Type'];
                                            } ?></td>
                                        <td><?php echo $row['city_Name'] ?></td>
                                        <td><?php echo $row['country_Name'] ?></td>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['userFullName'] ?></td>
                                        <td><?php echo $row['Time'] ?></td>
                                        <td><span class="badge 
                                            <?php
                                            echo (($row['status'] === "1") ? "bg-success" : (($row['status'] === "Pending") ? "bg-warning" :
                                                "bg-danger"));
                                            ?> 
                                            mt-1" id="status">
                                                <?php echo (($row['status'] === "1") ? "Approved" : (($row['status'] === "0") ? "Rejected" :
                                                    "Pending")); ?>
                                            </span></td>
                                        <td><a href="laboratory.edit.php?p=LReq&s=pend&a_id=<?php echo $row['id'] ?>&id=<?php echo $row['laboratory_id'] ?>" class="btn btn-outline-dark rounded-pill text-center"><i class="fas fa-pen"></i></a></td>
                                        <td><a href="laboratory.disable.php?id=<?php echo $row['laboratory_id'] ?>" class="btn btn-outline-warning rounded-pill"><i class="fas fa-ban"></i></a></td>
                                        <td><a href="laboratory.delete.php?id=<?php echo $row['laboratory_id'] ?>" class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>

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
            <!-- Admin Wise Laboratories -->
        <?php } elseif ($_GET['id'] == "alab" && $_GET['st'] == "approved") { ?>
            <h3 class="text-dark text-center text-uppercase">Your Laboratory</h3>
            <div class="col-sm-12 col-xl-12">
                <div class=" rounded h-100 p-4 table-scrollable" style="overflow-x: scroll;">
                    <table class="table table-hover table-bordered text-dark text-center" style="width:100%;">
                        <thead>
                            <tr>
                                <th hidden>Id</th>
                                <th>Laboratory Name</th>
                                <th>Laboratory Branch</th>
                                <th>Laboratory Type</th>
                                <th colspan="4">Laboratory Adress</th>
                                <!-- <th>Laboratory Custom Type</th> -->
                                <th hidden>Laboratory City</th>
                                <th hidden>Laboratory Country</th>
                                <th hidden>Admin Id</th>
                                <th hidden>Admin Full Name</th>
                                <th hidden>Date / Time</th>
                                <th>Status</th>
                                <th colspan="3">Action</th>
                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            $select = "SELECT * FROM laboratory
                            JOIN laboratorytype ON laboratory.laboratory_type = laboratorytype.laboratorytype_id
                            JOIN cities ON laboratory.laboratory_city = cities.id
                            JOIN countries ON laboratory.laboratory_country = countries.Country_Id
                            JOIN signup ON laboratory.admin_id = signup.id where admin_id = $id";
                            $res = mysqli_query($conn, $select);
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <th hidden><?php echo $row['laboratory_id'] ?></th>
                                        <td><?php echo $row['laboratory_name'] ?></td>
                                        <td><?php echo $row['laboratory_branch_number'] ?></td>
                                        <td><?php
                                            if ($row['Laboratory_Type'] === "Other Type") {
                                                echo $row['laboratory_type_custom'];
                                            } else {
                                                echo $row['Laboratory_Type'];
                                            } ?></td>
                                        <td colspan="4"><?php echo $row['laboratory_address'] .", ". $row['city_Name'] .", ". $row['country_Name'] ?></td>
                                        <td hidden><?php echo $row['city_Name'] ?></td>
                                        <td hidden><?php echo $row['country_Name'] ?></td>
                                        <td hidden><?php echo $row['id'] ?></td>
                                        <td hidden><?php echo $row['userFullName'] ?></td>
                                        <td hidden><?php echo $row['Time'] ?></td>
                                        <td><span class="badge 
                                            <?php
                                            echo (($row['status'] === "1") ? "bg-success" : (($row['status'] === "Pending") ? "bg-warning" :
                                                "bg-danger"));
                                            ?> 
                                            mt-1" id="status">
                                                <?php echo (($row['status'] === "1") ? "Approved" : (($row['status'] === "0") ? "Rejected" :
                                                    "Pending")); ?>
                                            </span></td>
                                        <td><a href="add.other.details.php?id=<?php echo $row['laboratory_id'] ?>" class="btn btn-outline-dark rounded-pill text-center">More Details </a></td>
                                        <td hidden><a href="laboratory.disable.php?id=<?php echo $row['laboratory_id'] ?>" class="btn btn-outline-warning rounded-pill"><i class="fas fa-ban"></i></a></td>
                                        <td hidden><a href="laboratory.delete.php?id=<?php echo $row['laboratory_id'] ?>" class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>

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