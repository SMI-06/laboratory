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