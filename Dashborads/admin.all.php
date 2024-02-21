<?php require("includes/config.php"); ?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
}
$title = "Lab Automation | All Admins"
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


<div class="container-fluid pt-4 px-4">
    <h3 class="text-dark text-center text-uppercase">All Admins</h3>
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4 table-scrollable" style="overflow-x: scroll;">
            <table class="table table-bordered" style="width:100%;">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">User Name</th>
                        <th class="text-center">User Email</th>
                        <th class="text-center">Full Name</th>
                        <th class="text-center">User Image</th>
                        <th class="text-center">User Cnic</th>
                        <th class="text-center">User Phone</th>
                        <th class="text-center">User Religion</th>
                        <th class="text-center">User Gender</th>
                        <th class="text-center">User City</th>
                        <th class="text-center">User Country</th>
                        <th class="text-center">User Address</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Send Mail</th>
                        <th colspan="3" class="text-center">Action</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    $select = "SELECT * FROM `signup` where Role = 'Admin'";
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
                                <td><?php echo $row['Role'] ?></td>
                                <td><?php echo $row['Status'] ?></td>
                                <td><a href="mail.php?id=<?php echo $row['id']?>" class="btn btn-outline-info rounded-pill"><i class="fas fa-paper-plane"></i></a></td>
                                <td><a href="user.edit.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-dark rounded-pill"><i class="fas fa-user-edit"></i></a></td>
                                <td><a class="btn btn-outline-warning rounded-pill"><i class="fas fa-ban"></i></a></td>
                                <td><a class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <td colspan="19" class="text-center"><i class="far fa-times-circle fa-3x"></i>
                            <h4>No Record Found</h4>
                        </td>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php require("includes/footer.inc.php"); ?>