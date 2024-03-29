<?php
// session_start();
require("../includes/config.php");
// Request For Laboratory
if (isset($_REQUEST['send-request'])) {
    $userId = $_REQUEST['userId'];
    $laboratory_name = $_REQUEST['laboratoryName'];
    $laboratory_address = $_REQUEST['laboratoryaddress'];
    $laboratory_city = $_REQUEST['laboratory-city'];
    $laboratory_country = $_REQUEST['laboratory-country'];
    $laboratory_type = $_REQUEST['laboratorytype'];
    $laboratory_type_write = $_REQUEST['laboratorytypewrite'];

    if (!($laboratory_name && $laboratory_address && $laboratory_city && $laboratory_country)) {
        header('location: ../request.php?id=laboratory');
    } else {
        $query = mysqli_query($conn, "INSERT INTO `laboratory`(`laboratory_name`, `laboratory_address`, `laboratory_type`,`laboratory_type_custom`, `laboratory_city`, `laboratory_country`,`user_id`) VALUES ('$laboratory_name','$laboratory_address','$laboratory_type','$laboratory_type_write','$laboratory_city','$laboratory_country',$userId)");
        // var_dump($query);
        header('location: ../checking.status.php?id=laboratory');
    }
}


// if ($laboratory_type === 00000) {
//     if ($laboratory_type_write != "") {
//         $query = mysqli_query($conn, "INSERT INTO `laboratory`(`laboratory_name`, `laboratory_address`, `laboratory_type`,`laboratory_type_custom`, `laboratory_city`, `laboratory_country`,`user_id`) VALUES ('$laboratory_name','$laboratory_address','$laboratory_type','$laboratory_type_write','$laboratory_city','$laboratory_country',$userId)");
//         var_dump($query);
//         // header('location: ../checking.status.php?id=laboratory');
//     } else { }}


// $lab_name = mysqli_query($conn, "Select * from laboratory");
// if (mysqli_num_rows($lab_name) > 0) {
//     while ($row = mysqli_fetch_assoc($lab_name)) {
//         if ($row['laboratory_name'] == $laboratory_name) {
//             echo "<script>alert('Laboratory Name Already Exists')
//             </script>";
//             header("location: ../request.php?id=laboratory");
//         }
//     }
// } else {}