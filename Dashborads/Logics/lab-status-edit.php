<?php
require("../includes/config.php");
if(isset($_REQUEST["status-btn"])){
    $lab_id = $_REQUEST["lab_id"];
    echo $lab_id;

    $status = $_REQUEST["lab-status"];
    $query = mysqli_query($conn,"UPDATE `laboratory` SET `status` = '$status' WHERE `laboratory`.`laboratory_id` = $lab_id");
    header("location:../show.laboratory.php?id=RFL");
}

?>