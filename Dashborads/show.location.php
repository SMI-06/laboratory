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

<section class="section-back">
    <div class="container-fluid pt-4 px-4">

        <?php
        if ($_GET['id'] == "region") { ?>
            <h3 class="text-dark text-center text-uppercase">All Region</h3>
            <div class="col-sm-12 col-xl-12">
                <div class=" rounded h-100 p-4 table-scrollable">
                    <table class="table table-hover table-bordered text-dark text-center" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Region Name</th>
                                <th colspan="3">Action</th>
                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            $select = "SELECT * FROM `regions`";
                            $res = mysqli_query($conn, $select);
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <th><?php echo $row['id'] ?></th>
                                        <td><?php echo $row['Region_Name'] ?></td>
                                        <td><a href="country.edit.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-dark rounded-pill text-center"><i class="fas fa-pen"></i></a></td>
                                        <td><a href="country.disable.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-warning rounded-pill"><i class="fas fa-ban"></i></a></td>
                                        <td><a href="country.delete.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>

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
        <?php } elseif ($_GET['id'] == "city") {
            // echo $_GET['id']; exit();
        ?>
            <h3 class="text-dark text-center text-uppercase">All City</h3>
            <div class="col-sm-12 col-xl-12">
                <div class=" rounded h-100 p-4 table-scrollable" style="overflow-x: scroll;">
                    <table class="table table-hover table-bordered text-dark text-center" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>City Name</th>
                                <th>Province Name</th>
                                <th>Country Name</th>
                                <th colspan="3">Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $select = "SELECT * FROM cities JOIN countries ON countries.Country_Id = cities.Country_Id JOIN province ON province.province_Id = cities.Province_Id;";
                            $res = mysqli_query($conn, $select);
                            // print_r($query); exit();
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <th><?php echo $row['id'] ?></th>
                                        <td><?php echo $row['city_Name'] ?></td>
                                        <td><?php echo $row['province_Name'] ?></td>
                                        <td><?php echo $row['country_Name'] ?></td>
                                        <td><a href="city.edit.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-dark rounded-pill text-center"><i class="fas fa-pen"></i></a></td>
                                        <td><a href="city.disable.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-warning rounded-pill"><i class="fas fa-ban"></i></a></td>
                                        <td><a href="user.delete.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>

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
        <?php } elseif ($_GET['id'] == "province") { ?>
            <h3 class="text-dark text-center text-uppercase">All Province</h3>
            <div class="col-sm-12 col-xl-12">
                <div class=" rounded h-100 p-4 table-scrollable" style="overflow-x: scroll;">
                    <table class="table table-hover table-bordered text-dark text-center" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Province Name</th>
                                <th>Country Name</th>
                                <th colspan="3">Action</th>
                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            $select = "SELECT * FROM `province` join countries on countries.Country_Id = province.Country_Id";
                            $res = mysqli_query($conn, $select);
                            if (mysqli_num_rows($res)) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    // print_r($row);
                            ?>
                                    <tr>
                                        <th><?php echo $row['province_Id'] ?></th>
                                        <td><?php echo $row['province_Name'] ?></td>
                                        <td><?php echo $row['country_Name'] ?></td>
                                        <td><a href="province.edit.php?id=<?php echo $row['province_Id'] ?>" class="btn btn-outline-dark rounded-pill text-center"><i class="fas fa-pen"></i></a></td>
                                        <td><a href="province.disable.php?id=<?php echo $row['province_Id'] ?>" class="btn btn-outline-warning rounded-pill"><i class="fas fa-ban"></i></a></td>
                                        <td><a href="province.delete.php?id=<?php echo $row['province_Id'] ?>" class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>

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
        <?php } elseif ($_GET['id'] == "country") { ?>
            <h3 class="text-dark text-center text-uppercase">All Country</h3>
            <div class="col-sm-12 col-xl-12">
                <div class=" rounded h-100 p-4 table-scrollable" style="overflow-x: scroll;">
                    <table class="table table-hover table-bordered text-dark text-center" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Country Name</th>
                                <th>Region</th>
                                <th colspan="3">Action</th>
                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            $select = "SELECT * FROM `countries` join regions on regions.id = countries.regions_id";
                            $res = mysqli_query($conn, $select);
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <th><?php echo $row['Country_Id'] ?></th>
                                        <td><?php echo $row['country_Name'] ?></td>
                                        <td><?php echo $row['Region_Name'] ?></td>
                                        <td><a href="country.edit.php?id=<?php echo $row['Country_Id'] ?>" class="btn btn-outline-dark rounded-pill text-center"><i class="fas fa-pen"></i></a></td>
                                        <td><a href="country.disable.php?id=<?php echo $row['Country_Id'] ?>" class="btn btn-outline-warning rounded-pill"><i class="fas fa-ban"></i></a></td>
                                        <td><a href="country.delete.php?id=<?php echo $row['Country_Id'] ?>" class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>

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