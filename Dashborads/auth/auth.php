<?php
session_start();
require("../includes/config.php");
// SIGN Up AUTH

if (isset($_REQUEST['signup'])) {
    $userName = $_REQUEST['userName'];
    $userEmail = $_REQUEST['userEmail'];
    $userPassword = $_REQUEST['userPassword'];
    $userRole = $_REQUEST['role'];

    // echo $userName . " " . $userEmail . " " . $userPassword . " ". $userRole;
    // exit();

    if (!($userName && $userEmail && $userPassword && $userRole)) {
        $error = "Enter Your Details";
        header("Location: ../signup.php?error=" . urlencode($error));
    } else {
        $select = "SELECT * FROM `signup`";
        $res = mysqli_query($conn, $select);
        if (mysqli_num_rows($res) > 0) {
            $record = mysqli_fetch_assoc($res);
            if ($record['userName'] == $userName) {
                $errorUserName = "User Name Already Exists";
                header("Location: ../signup.php?error=" . urlencode($errorUserName));
            } else if ($record['userEmail'] == $userEmail) {
                $errorUserEmail = "Email Already Exists";
                header("Location: ../signup.php?error=" . urlencode($errorUserEmail));
            } else if ($record['userPassword'] == $userPassword) {
                $errorUserPassword = "Password Already Exists";
                header("Location: ../signup.php?error=" . urlencode($errorUserPassword));
            } else {
                if (strlen($userPassword) >= 8) {
                    $insert = "INSERT INTO `signup`(`userName`, `userEmail`,`userPassword`, `Role`,`Status`) VALUES ('$userName','$userEmail','$userPassword','$userRole','Pending')";
                    $res = mysqli_query($conn, $insert);
                    // $_SESSION['userDetails'] = [
                    //     'userId' => $row['id'],
                    //     'userName' => $row['userName'],
                    //     'userEmail' => $row['userEmail'],
                    //     'userCNIC' => $row['userCNIC'],
                    //     'Role' => $row['Role'],
                    // ];
                    // $_SESSION["loginStatus"] = true;
                    // header("location:../../index.php");
                    
                    echo "<script>alert('Sign Up Successful')
                    location.href = '../../index.php';
                    </script>";
                } else {
                    echo "<script>alert('Password Must Be At Least 8 Characters')
                    location.href = '../signup.php';
                    </script>";
                }
            }
        } else {
            if (strlen($userPassword) >= 8) {
                $insert = "INSERT INTO `signup`(`userName`, `userEmail`,`userPassword`, `Role`,`Status`) VALUES ('$userName','$userEmail','$userPassword','$userRole','Pending')";
                $res = mysqli_query($conn, $insert);
                echo "<script>alert('Sign Up Successful')
                location.href = '../../index.php';
                </script>";
            } else {
                echo "<script>alert('Password Must Be At Least 8 Characters')
                location.href = 'signup.php';   
                </script>";
            }
        }
    }
}


/////////////////////////////  Tester Sign Up Auth 

if (isset($_REQUEST['tester_signup'])) {
    $TesterName = $_REQUEST['TesterName'];
    $TesterEmail = $_REQUEST['TesterEmail'];
    $laboratory = $_REQUEST['laboratory'];
    $TesterPassword = $_REQUEST['TesterPassword'];
    if (!($TesterName && $TesterEmail && $laboratory && $TesterPassword)) {
        header("location:http://localhost/labs/Dashborads/signup.php?signUp=tester");
    } else {
        $select = mysqli_query($conn, "SELECT * FROM `signup_tester`");
        if (mysqli_num_rows($select) > 0) {
            while ($row = mysqli_fetch_assoc($select)) {
                if ($TesterEmail ==  $row['TesterEmail']) {
                    $errorUserName = "Tester Email Already Exists";
                    header("Location: ../signup.php?signUp=tester&error=" . urlencode($errorUserName));
                } else if ($TesterName == $row['TesterName']) {
                    $errorUserName = "Tester User Name Already Exists";
                    header("Location: ../signup.php?signUp=tester&error=" . urlencode($errorUserName));
                } else if ($TesterPassword == $row['TesterPassword']) {
                    $errorUserPassword = "Tester Password Already Exists";
                    header("Location: ../signup.php?signUp=tester&error=" . urlencode($errorUserPassword));
                } else {
                    if (strlen($TesterPassword) >= 8) {
                        $insert_Query = "INSERT INTO `signup_tester`(`TesterName`, `TesterEmail`, `TesterPassword`, `Role`,`Laboratory_Id`) VALUES ('$TesterName','$TesterEmail','$TesterPassword','Tester','$laboratory')";
                        $res = mysqli_query($conn, $insert_Query);
                        header('location:../index.php');
                    } else {
                        echo "<script>alert('Password Must Have 8 Characters')</script>";
                    }
                }
            }
        } else {
            if (strlen($TesterPassword) >= 8) {
                $insert_Query = "INSERT INTO `signup_tester`(`TesterName`, `TesterEmail`, `TesterPassword`, `Role`,`Laboratory_Id`) VALUES ('$TesterName','$TesterEmail','$TesterPassword','Tester','$laboratory')";
                $res = mysqli_query($conn, $insert_Query);
            } else {
                echo "<script>alert('Password Must Have 8 Characters')</script>";
            }
        }
    }
}

///////////////////////////// Login Auth

if (isset($_REQUEST['signIn'])) {
    $userEmail = $_REQUEST['userEmail'];
    $userPassword = $_REQUEST['userPassword'];
    // echo $userEmail . " " . $userPassword; exit();

    if (!($userEmail && $userPassword)) {
        $error = "Enter Your Login Details";
        header("Location: ../login.php?error=" . urlencode($error));
    } else {
        $select_signup = "SELECT * FROM signup";
        if ($select_signup) {
            $res = mysqli_query($conn, $select_signup);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    // Super Admin login Section
                    if ($row['Role'] == "Super Admin") {
                        if ($row['userEmail'] == $userEmail) {
                            if ($row['userPassword'] == $userPassword) {
                                $_SESSION['userDetails'] = [
                                    'userId' => $row['id'],
                                    'userName' => $row['userName'],
                                    'userEmail' => $row['userEmail'],
                                    'userCNIC' => $row['userCNIC'],
                                    'Role' => $row['Role'],
                                ];
                                $_SESSION["loginStatus"] = true;
                                header("location:../../index.php");
                            } else {

                                echo "Password Wrong";
                            }
                        } else {
                            echo "Email Wrong";
                        }
                    }
                    // Admin Login Section
                    else if ($row['Role'] == "admin") {
                        if ($row['userEmail'] == $userEmail) {
                            if ($row['userPassword'] == $userPassword) {
                                $_SESSION['userDetails'] = [
                                    'userId' => $row['id'],
                                    'userName' => $row['userName'],
                                    'userEmail' => $row['userEmail'],
                                    'userCNIC' => $row['userCNIC'],
                                    'Role' => $row['Role'],
                                ];
                                $_SESSION["loginStatus"] = true;
                                header("location:../../index.php");
                            } else {

                                echo "Password Wrong";
                            }
                        } else {
                            echo "Email Wrong";
                        }
                    }
                    // User Login Section
                    else {
                        if ($row['userEmail'] == $userEmail) {
                            if ($row['userPassword'] == $userPassword) {
                                $_SESSION['userDetails'] = [
                                    'userId' => $row['id'],
                                    'userName' => $row['userName'],
                                    'userEmail' => $row['userEmail'],
                                    'userCNIC' => $row['userCNIC'],
                                    'Role' => $row['Role'],
                                ];
                                $_SESSION["loginStatus"] = true;
                                header("location:../../index.php");
                            } else {
                                header("location:../login.php");
                                echo "Password Wrong";
                            }
                        } else {
                            header("location:../login.php");
                            echo "Email Wrong";
                        }
                    }
                }
            } else {
                header("location:../login.php");
            }
        }
    }
}

////////////////////////// Tester Login Auth
if (isset($_REQUEST['testerSignIn'])) {
    $testerEmail = $_REQUEST['testerEmail'];
    $testerPassword = $_REQUEST['testerPassword'];
    // echo $userEmail . " " . $userPassword; exit();

    if (!($testerEmail && $testerPassword)) {
        $error = "Enter Your Login Details";
        header("Location: ../login.php?signUp=tester&error=" . urlencode($error));
    } else {
        $signup_tester = "SELECT * FROM signup_tester";
        $res = mysqli_query($conn, $signup_tester);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                // Tester login Section
                if ($row['Role'] == "Tester") {
                    if ($row['TesterEmail'] == $testerEmail) {
                        if ($row['TesterPassword'] == $testerPassword) {
                            $_SESSION['testerDetails'] = [
                                'testerCode' => $row['Code'],
                                'testerId' => $row['TesterId'],
                                'testerName' => $row['TesterName'],
                                'testerEmail' => $row['TesterEmail'],
                                'testerCNIC' => $row['TesterCNIC'],
                                'Role' => $row['Role'],
                            ];
                            $_SESSION["testerLoginStatus"] = true;
                            header("location:../../index.php");
                        } else {

                            echo "Password Wrong";
                        }
                    } else {
                        echo "Email Wrong";
                    }
                }
            }
        } else {
            echo "0 Record";
        }
    }
}


?>
