<?php
// session_start();
require("../includes/config.php");
// Request For Laboratory
if (isset($_REQUEST['send-request'])) {
    $userId = $_REQUEST['userId'];
    $laboratory_name = $_REQUEST['laboratoryName'];
    $laboratory_branch = $_REQUEST['laboratory-branch'];
    $branch_Code = $laboratory_name . "-" . $laboratory_branch;
    $laboratory_address = $_REQUEST['laboratoryaddress'];
    $laboratory_city = $_REQUEST['laboratory-city'];
    $laboratory_country = $_REQUEST['laboratory-country'];
    $laboratory_type = $_REQUEST['laboratorytype'];
    $laboratory_type_write = $_REQUEST['laboratorytypewrite'];

    if (!($laboratory_name && $laboratory_branch && $laboratory_address && $laboratory_city && $laboratory_country)) {
        header('location: ../request.php?id=laboratory');
    } else {
        $query = mysqli_query($conn, "INSERT INTO `laboratory`(`laboratory_branch_number`,`laboratory_name`, `laboratory_address`, `laboratory_type`,`laboratory_type_custom`, `laboratory_city`, `laboratory_country`,`admin_id`) VALUES ('$branch_Code' ,'$laboratory_name','$laboratory_address','$laboratory_type','$laboratory_type_write','$laboratory_city','$laboratory_country',$userId)");
        if ($laboratory_type_write !== "") {
            $query1 = mysqli_query($conn, "INSERT INTO `laboratorytype`(`Laboratory_Type`) VALUES ('$laboratory_type_write')");
        }
        // var_dump($query);
        header('location: ../checking.status.php?id=laboratory');
    }
}
