<?php require("includes/config.php"); ?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
}
$title = "Lab Automation | All Users"
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
        <h3 class="text-dark text-center text-uppercase">All Users</h3>
        <div class="col-sm-12 col-xl-12">
            <div class="h-100 p-4 table-scrollable" style="overflow-x: scroll;">
                <table class="table table-hover text-center text-dark table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <?php
                            $selectColumn = "SELECT * FROM signup";
                            $res = mysqli_query($conn, $selectColumn);
                            if (mysqli_num_rows($res) > 0) {
                                $row = mysqli_fetch_assoc($res);
                                foreach ($row as $Column => $value) { ?>
                                    <th><?php echo $Column ?></th>
                                <?php }  ?>
                                <th class="text-center">Send Mail</th>
                                <th colspan="3" class="text-center">Action</th>
                            <?php }
                            ?>
                        </tr>

                    </thead>
                    <tbody>

                        <?php
                        $select = "SELECT * FROM signup";
                        $res = mysqli_query($conn, $select);
                        if (mysqli_num_rows($res)) {
                            while ($row = mysqli_fetch_assoc($res)) { ?>
                                <tr>
                                    <th><?php echo $row['id'] ?></th>
                                    <td><?php echo $row['userName'] ?></td>
                                    <td><?php echo $row['userEmail'] ?></td>
                                    <td><?php echo $row['userFullName'] ?></td>
                                    <td><img src="assets/img/UserImages/<?php echo $row['userimage'] ?>" width="50px" height="50px" class="rounded-circle" alt="">
                                    </td>
                                    <td><?php echo $row['userCNIC'] ?></td>
                                    <td><?php echo $row['userPhone'] ?></td>
                                    <td><?php echo $row['userReligion'] ?></td>
                                    <td><?php echo $row['userGender'] ?></td>
                                    <td><?php echo $row['userCity'] ?></td>
                                    <td><?php echo $row['userCountry'] ?></td>
                                    <td><?php echo $row['userAddress'] ?></td>
                                    <td><?php echo $row['userPassword'] ?></td>
                                    <td><?php echo $row['Role'] ?></td>
                                    <td><?php echo $row['Status'] ?></td>
                                    <td><a href="mail.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-info rounded-pill"><i class="fas fa-paper-plane"></i></a></td>
                                    <td><a href="user.edit.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-dark rounded-pill"><i class="fas fa-user-edit"></i></a></td>
                                    <td><a href="user.disable.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-warning rounded-pill"><i class="fas fa-ban"></i></a></td>
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
    </div>
</section>
<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php require("includes/footer.inc.php"); ?>