<?php
session_start();
require("../includes/config.php");

if (isset($_REQUEST['save'])) {
    $userId = $_REQUEST['userId'];
    // echo $userId; exit();
    $userImage = $_FILES['userImage'];
    $userImageName = $userImage['name'];
    $ImageTmpName = $userImage['tmp_name'];
    $Imagepath = '../assets/img/UserImages/' . $userImage['name'];
    $uploadImage = move_uploaded_file($ImageTmpName, $Imagepath);
    // var_dump($uploadImage); exit();
    if ($uploadImage) {
        $userFullName = $_REQUEST['userFullName'];
        $userCnic = $_REQUEST['userCnic'];
        $userReligion = $_REQUEST['userReligion'];
        $userPhone = $_REQUEST['userPhone'];
        $userGender = $_REQUEST['userGender'];
        $userAddress = $_REQUEST['userAddress'];
        $userCity = $_REQUEST['userCity'];
        $userCountry = $_REQUEST['userCountry'];
        $userPass = $_REQUEST['userPass'];

        if (!($userFullName && $userCnic && $userReligion && $userPhone && $userGender && $userAddress && $userCity && $userCountry)) {
            echo "<script>alert('Enter All Fields')</script>";
        } else {
            $profileData = "UPDATE `signup` SET `userFullName`='$userFullName',`userimage`='$userImageName',`userCNIC`='$userCnic',`userPhone`='$userPhone',`userReligion`='$userReligion',`userGender`='$userGender',`userCity`='$userCity',`userCountry`='$userCountry',`userAddress`='$userAddress',`userPassword`='$userPass' WHERE `id` = $userId";
            // var_dump($profileData); exit();
            $res = mysqli_query($conn, $profileData);
            echo "<script>alert('Profile Updated')
            location.href = '../profile.php'
            </script>";
        }
    } else {
        echo "<script>alert('Please Upload A Image')</script>";
    }
}

// Tester Update Profile

if (isset($_REQUEST['tester_profile_save'])) {
    $testerImage = $_FILES['testerImage'];
    $ImageTmpName = $testerImage['tmp_name'];
    $Imagepath = '../assets/img/testerImages/' . $testerImage['name'];
    $uploadImage = move_uploaded_file($ImageTmpName, $Imagepath);
    if ($uploadImage) {
        $AttachYourLatestDegree = $_FILES['AttachYourLatestDegree'];
        $AttachYourLatestDegreeImageTmpName = $AttachYourLatestDegree['tmp_name'];
        $AttachYourLatestDegreeImagepath = '../assets/img/testerImages/testerDegreeImages/' . $AttachYourLatestDegree['name'];
        $uploadDegreeImage = move_uploaded_file($AttachYourLatestDegreeImageTmpName, $AttachYourLatestDegreeImagepath);
        if ($uploadDegreeImage) {
            $testerFullName = $_REQUEST['testerFullName'];
            $testerCNIC = $_REQUEST['testerCnic'];
            $testerReligion = $_REQUEST['testerReligion'];
            $testerPhone = $_REQUEST['testerPhone'];
            $testerGender = $_REQUEST['testerGender'];
            $testerAddress = $_REQUEST['testerAddress'];
            $testerCity = $_REQUEST['testerCity'];
            $testerCountry = $_REQUEST['testerCountry'];
            $testerEducation = $_REQUEST['testerEducation'];
            $testerSubject = $_REQUEST['testerSubject'];
            $testerInstitute = $_REQUEST['testerInstitute'];
            $testerPassword = $_REQUEST['testerPass'];
            if (!($testerFullName && $testerCNIC && $testerReligion && $testerPhone && $testerGender && $testerAddress && $testerCity && $testerCountry && $testerEducation && $testerSubject && $testerInstitute && $AttachYourLatestDegree)) {
                echo "<script>alert('Filled The Record')</script>";
            } else {
                echo "Done";
            }
        }else{
            echo "<script>alert('Upload The Degree Image')</script>";
        }
    } else {
        echo "<script>alert('Upload The Image')</script>";
    }
}
