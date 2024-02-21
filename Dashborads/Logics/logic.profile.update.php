<?php
session_start();
require("../includes/config.php");

if(isset($_REQUEST['save'])){
    $userId = $_REQUEST['userId'];
    // echo $userId; exit();
    $userImage = $_FILES['userImage'];
    $userImageName = $userImage['name'];
    $ImageTmpName = $userImage['tmp_name'];
    $Imagepath = '../assets/img/UserImages/'. $userImage['name'];
    $uploadImage = move_uploaded_file($ImageTmpName, $Imagepath);
    // var_dump($uploadImage); exit();
    if($uploadImage){
        $userFullName = $_REQUEST['userFullName'];
        $userCnic = $_REQUEST['userCnic'];
        $userReligion = $_REQUEST['userReligion'];
        $userPhone = $_REQUEST['userPhone'];
        $userGender = $_REQUEST['userGender'];
        $userAddress = $_REQUEST['userAddress'];
        $userCity = $_REQUEST['userCity'];
        $userCountry = $_REQUEST['userCountry'];
        $userPass = $_REQUEST['userPass'];

        if(!($userFullName && $userCnic && $userReligion && $userPhone && $userGender && $userAddress && $userCity && $userCountry)){
            echo"<script>alert('Enter All Fields')</script>";
        }else{
            $profileData = "UPDATE `signup` SET `userFullName`='$userFullName',`userimage`='$userImageName',`userCNIC`='$userCnic',`userPhone`='$userPhone',`userReligion`='$userReligion',`userGender`='$userGender',`userCity`='$userCity',`userCountry`='$userCountry',`userAddress`='$userAddress',`userPassword`='$userPass' WHERE `id` = $userId";
            // var_dump($profileData); exit();
            $res = mysqli_query($conn,$profileData);
            echo"<script>alert('Profile Updated')
            location.href = '../profile.php'
            </script>";
        }
    }else{
        echo"<script>alert('Please Upload A Image')</script>";
    }
}