<?php
require("../includes/config.php");
if(isset($_REQUEST['add-laboratory-type'])){
    $laboratorytype = $_REQUEST['laboratorytype'] . " Type";
    // echo $laboratorytype; exit();
    $query = mysqli_query($conn,"INSERT INTO laboratorytype (`Laboratory_Type`) VALUES ('$laboratorytype')"); 
    header('location: ../show.laboratory.type.php?id=laboratoryType');

}
?>