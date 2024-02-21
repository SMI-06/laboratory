<?php
require("../includes/config.php");
// Add Region
if (isset($_REQUEST['add_region'])) {
    $regionName = $_REQUEST['regionname'];
    if ($regionName == "") {
        header('location: ../add.location.php?id=region');
    } else {
        $query = mysqli_query($conn, "INSERT INTO `regions`(`Region_Name`) VALUES ('$regionName')");
        // print_r($query);
        header('location: ../show.location.php?id=region');
    }
}
// Add Country
if (isset($_REQUEST['add_country'])) {
    $CountryName = $_REQUEST['Countryname'];
    $Regions = $_REQUEST['Regions'];
    // echo $CountryName . " " . $Regions; exit();
    if (!($CountryName && $Regions)) {
        header('location: ../add.location.php?id=country');
    } else {
        $query = mysqli_query($conn, "INSERT INTO `countries`(`country_Name`, `regions_id`) VALUES ('$CountryName','$Regions')");
        // print_r($query);
        header('location: ../show.location.php?id=country');
    }
}
// Add province
if (isset($_REQUEST['add_province'])) {
    $ProvinceName = $_REQUEST['Provincename'];
    $Country = $_REQUEST['Country'];
    // echo $Provincename . " " . $Country; exit();
    if (!($ProvinceName && $Country)) {
        header('location: ../add.location.php?id=province');
    } else {
        $query = mysqli_query($conn, "INSERT INTO `province`(`province_Name`, `Country_Id`) VALUES ('$ProvinceName','$Country')");
        // print_r($query);
        header('location: ../show.location.php?id=province');
    }
}
// Add City
elseif (isset($_REQUEST['add_city'])) {
    $CityName = $_REQUEST['Cityname'];
    $Province = $_REQUEST['Province'];
    $Country = $_REQUEST['Country'];
    // echo $Cityname . " " .$Province . " " . $Country; exit();
    if (!($CityName && $Province && $Country)) {
        header('location: ../add.location.php?id=city');
    } else {
        $query = mysqli_query($conn, "INSERT INTO `cities`(`city_Name`, `Province_Id`, `Country_Id`) VALUES ('$CityName','$Province','$Country')");
        // print_r($query);
        header('location: ../show.location.php?id=city');
    }
}
