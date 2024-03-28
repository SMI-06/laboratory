<?php
require("../includes/config.php");
if(isset($_REQUEST['editUser'])){
    $id = $_REQUEST['UserId'];
    $userRole = $_REQUEST['UserRole'];
    $userStatus = $_REQUEST['UserStatus'];

    $updatequery = mysqli_query($conn,"UPDATE `signup` SET `Role`='$userRole',`Status`='$userStatus' WHERE `id` = $id"); 

    echo"<script>alert('Role & Status Updated')</script>";
    header('location: ../users.all.php ');

}   elseif (isset($_REQUEST['editTester'])) {
    $TesterId = $_REQUEST['TesterId'];
    $testerStatus = $_REQUEST['testerStatus'];
    $updatequery = mysqli_query($conn,"UPDATE `signup_tester` SET `Status`='$testerStatus' WHERE `TesterId` = $TesterId"); 

    echo"<script>alert('Status Updated')</script>";
    header('location: ../tester.all.php ');
}

?>