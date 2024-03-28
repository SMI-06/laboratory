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
    $testerId = $_REQUEST['testerId'];
    $testerUserName = $_REQUEST['UserName'];
    // testerId
    $testerImage = $_FILES['testerImage'];
    $ImageTmpName = $testerImage['tmp_name'];
    // $testerImageName = $testerImage['name'];
    $Imagepath = '../assets/img/testerImages/' . $testerImage['name'];
    $uploadImage = move_uploaded_file($ImageTmpName, $Imagepath);
    if ($uploadImage) {
        $AttachYourLatestDegree = $_FILES['AttachYourLatestDegree'];
        $AttachYourLatestDegreeImageTmpName = $AttachYourLatestDegree['tmp_name'];
        $AttachYourLatestDegreeImagepath = '../assets/img/testerImages/testerDegreeImages/' . $AttachYourLatestDegree['name'];
        $uploadDegreeImage = move_uploaded_file($AttachYourLatestDegreeImageTmpName, $AttachYourLatestDegreeImagepath);
        if ($uploadDegreeImage) {
            $testerNameCode = str_split($testerUserName);
            $testerCode = $testerNameCode[2] ."-". $testerId;
            // echo $testerCode;exit();
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
                $selectAdminId =  mysqli_query($conn, "SELECT laboratory.user_id, signup_tester.TesterId FROM signup_tester join laboratory on laboratory.laboratory_id = signup_tester.Laboratory_Id;");
                // $res = mysqli_query($conn,$selectAdminId);
                if (mysqli_num_rows($selectAdminId) > 0) {
                    $row = mysqli_fetch_assoc($selectAdminId);
                    $admin_Id = $row["user_id"];
                }

                // /////////////////// Testing point testing krni hai.............

                $query = "UPDATE `signup_tester` SET `Code` = '$testerCode' , `TesterFullName`='$testerFullName',`Testerimage`='".$testerImage['name']."',`TesterCNIC`='$testerCNIC',`TesterPhone`='$testerPhone',`TesterReligion`='$testerReligion',`TesterGender`='$testerGender',`TesterCity`='$testerCity',`TesterCountry`='$testerCountry',`TesterAddress`='$testerAddress',`Education`='$testerEducation',`Subject`='$testerSubject',`Institute`='$testerInstitute',`Latest Degree`='".$AttachYourLatestDegree['name']."', `Admin_Id`='$admin_Id' WHERE `TesterId` = $testerId";
                
                
                var_dump($query); 
                                // exit();
                $insert_tester = mysqli_query($conn, $query);
                var_dump($insert_tester); 
                                exit();
                // /////////////////////////////

                $insert_tester = mysqli_query($conn, "INSERT INTO `signup_tester`(`TesterFullName`, `Testerimage`, `TesterCNIC`, `TesterPhone`, `TesterReligion`, `TesterGender`, `TesterCity`, `TesterCountry`, `TesterAddress`, `Education`, `Subject`, `Institute`, `Latest Degree`, `Admin_Id`) VALUES ('$testerFullName','$testerImage[name]','$testerCNIC','$testerPhone','$testerReligion','$testerGender','$testerCity','$testerCountry','$testerAddress','$testerEducation','$testerSubject','$testerInstitute','$AttachYourLatestDegree[name]','$admin_Id')");
                print_r($insert_tester);
                exit();
            }
        } else {
            echo "<script>alert('Upload The Degree Image')</script>";
        }
    } else {
        echo "<script>alert('Upload The Image')</script>";
    }
}
