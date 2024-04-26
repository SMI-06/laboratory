<?php
require("includes/config.php");
?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
}
$title = "Lab Automation | All Users "
?>

<?php require("includes/header.inc.php"); ?>

<!-- Navbar Start -->
<?php require("components/navbar.php"); ?>
<!-- Navbar End -->

<!-- Sidebar Start -->
<?php require("components/sidebar.php"); ?>
<!-- Sidebar End -->

<div class="container-fluid pt-4 px-4">
    <h3 class="text-dark text-center text-uppercase">Edit User</h3>
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <form method="post" action="logics/logic.edit.user.php">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    // echo $id; exit();
                }
                $query = mysqli_query($conn, "SELECT * FROM signup WHERE `id` = $id");
                
                if(mysqli_num_rows($query)){
                    while($row = mysqli_fetch_assoc($query)){;
                ?>
                <div class="row mb-3">
                    <label for="UserName" class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-sm-10">
                        <input type="text" hidden readonly name="UserId" class="form-control" value="<?php echo $row['id'] ?>" id="UserId">
                        <input type="text" readonly name="UserName" class="form-control" value="<?php echo $row['userName'] ?>" id="UserName">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="UserEmail" class="col-sm-2 col-form-label">User Email</label>
                    <div class="col-sm-10">
                        <input type="text" readonly value="<?php echo $row['userEmail'] ?>" name="UserEmail" class="form-control" id="UserEmail">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="UserFullName" class="col-sm-2 col-form-label">User Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" readonly value="<?php echo $row['userFullName'] ?>" name="UserFullName" class="form-control" id="UserFullName">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="UserCNIC" class="col-sm-2 col-form-label">User CNIC</label>
                    <div class="col-sm-10">
                        <input type="text" readonly value="<?php echo $row['userCNIC'] ?>" name="UserCNIC" class="form-control" id="UserCNIC">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="UserPhone"  class="col-sm-2 col-form-label">User Phone</label>
                    <div class="col-sm-10">
                        <input type="text" readonly name="UserPhone" class="form-control" id="UserPhone" value="<?php echo $row['userPhone'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="UserReligion" class="col-sm-2 col-form-label">User Religion</label>
                    <div class="col-sm-10">
                        <input type="text" readonly name="UserReligion" class="form-control" id="UserReligion" value="<?php echo $row['userReligion'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="UserGender" class="col-sm-2 col-form-label">User Gender</label>
                    <div class="col-sm-10">
                        <input type="text" readonly name="UserGender" class="form-control" id="UserGender" value="<?php echo $row['userGender'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="UserAddress" class="col-sm-2 col-form-label">User Address</label>
                    <div class="col-sm-10">
                        <input type="text" readonly name="UserAddress" class="form-control" id="UserAddress" value="<?php echo $row['userAddress'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="UserCity" class="col-sm-2 col-form-label">User City</label>
                    <div class="col-sm-10">
                        <input type="text" readonly name="UserCity" class="form-control" id="UserCity" value="<?php echo $row['userCity'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="UserCountry" class="col-sm-2 col-form-label">User Country</label>
                    <div class="col-sm-10">
                        <input type="text" readonly name="UserCountry" class="form-control" id="UserCountry" value="<?php echo $row['userCountry'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="UserRole" class="col-sm-2 col-form-label">User Role</label>
                    <div class="col-sm-10">
                    <select class="form-select" name="UserRole" id="UserRole" aria-label="Floating label select example">
                            <option selected disabled hidden><?php echo $row['Role'] ?></option>
                            <option value="Admin">Admin</option>
                            <option value="Employee">Employee</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="UserStatus" class="col-sm-2 col-form-label">User Status</label>
                    <div class="col-sm-10">
                    <select class="form-select" name="UserStatus" id="UserStatus" aria-label="Floating label select example">
                            <option selected disabled hidden><?php echo $row['Status'] ?></option>
                            <option value="Active">Active</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="editUser" class="btn btn-dark  rounded-pill py-2 w-100 mt-4">Edit User</button>
                <?php } } ?>
            </form>
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