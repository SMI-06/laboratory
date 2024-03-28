<?php require("includes/config.php"); ?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
}
if (isset($_SESSION['testerDetails'])) {
    $testerDetail = $_SESSION['testerDetails'];
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

<style>
    .table-scrollable::-webkit-scrollbar {
        height: 5px;

    }

    /* Track */
    .table-scrollable::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    .table-scrollable::-webkit-scrollbar-thumb {
        background: #343a40;
        border-radius: 10px;
    }

    /* Handle on hover */
    .table-scrollable::-webkit-scrollbar-thumb:hover {
        background: #343a40;
    }
</style>

<section class="section-back">
    <div class="container-fluid pt-4 px-4">
        <h3 class="text-dark text-center text-uppercase">All Testers</h3>
        <div class="col-sm-12 col-xl-12">
            <div class=" h-100 p-4 table-scrollable" style="overflow-x: scroll;">
                <table class="table table-hover text-dark table-bordered text-center" style="width:100%;">
                    <thead>
                        <tr>
                            <?php
                            $selectColumn = "SELECT * FROM signup_tester";
                            $res = mysqli_query($conn, $selectColumn);
                            if (mysqli_num_rows($res) > 0) {
                                $row = mysqli_fetch_assoc($res);
                                foreach ($row as $Column => $value) { ?>
                                    <th><?php echo $Column ?></th>
                                <?php }  ?>
                                <th colspan="3" class="text-center">Action</th>
                            <?php }
                            ?>
                        </tr>

                    </thead>
                    <tbody>

                        <?php
                        $select = "SELECT *,signup_tester.Role as TesterRole,signup_tester.Status as TesterStatus FROM `signup_tester`join signup on signup.id = signup_tester.Admin_Id  ";
                        $res = mysqli_query($conn, $select);
                        if (mysqli_num_rows($res)) {
                            while ($row = mysqli_fetch_assoc($res)) { ?>
                                <tr>
                                    <th><?php echo $row['TesterId'] ?></th>
                                    <td><?php echo $row['Code'] ?></td>
                                    <td><?php echo $row['TesterName'] ?></td>
                                    <td><?php echo $row['TesterEmail'] ?></td>
                                    <td><?php echo $row['TesterFullName'] ?></td>
                                    <td><img src="assets/img/UserImages/<?php echo $row['Testerimage'] ?>" width="50px" height="50px" class="rounded-circle" alt="">
                                    </td>
                                    <td><?php echo $row['TesterCNIC'] ?></td>
                                    <td><?php echo $row['TesterPhone'] ?></td>
                                    <td><?php echo $row['TesterReligion'] ?></td>
                                    <td><?php echo $row['TesterGender'] ?></td>
                                    <td><?php echo $row['TesterCity'] ?></td>
                                    <td><?php echo $row['TesterCountry'] ?></td>
                                    <td><?php echo $row['TesterAddress'] ?></td>
                                    <td><?php echo $row['Education'] ?></td>
                                    <td><?php echo $row['Subject'] ?></td>
                                    <td><?php echo $row['Institute'] ?></td>
                                    <td><?php echo $row['Latest Degree'] ?></td>
                                    <td><?php echo $row['TesterPassword'] ?></td>
                                    <td><?php echo $row['TesterRole'] ?></td>
                                    <td><?php echo $row['Admin_Id'] ?></td>
                                    <td><?php echo $row['Laboratory_Id'] ?></td>
                                    <td><?php echo $row['TesterStatus'] ?></td>
                                    <td><?php echo $row['updatedProfile_At'] ?></td>
                                    <td><a href="edit.php?testerId=<?php echo $row['TesterId'] ?>" class="btn btn-outline-dark rounded-pill"><i class="fas fa-user-edit"></i></a></td>
                                    <td><a href="disable.php?testerId=<?php echo $row['TesterId'] ?>" class="btn btn-outline-warning rounded-pill"><i class="fas fa-ban"></i></a></td>
                                    <td><a href="delete.php?testerId=<?php echo $row['TesterId'] ?>" class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>
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
    </div>
</section>
<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php require("includes/footer.inc.php"); ?>