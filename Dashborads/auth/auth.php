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
        header("Location: ./signup.php?error=" . urlencode($error));
    } else {
        $select = "SELECT * FROM `signup`";
        $res = mysqli_query($conn, $select);
        if (mysqli_num_rows($res) > 0) {
            $record = mysqli_fetch_assoc($res);
            if ($record['userName'] == $userName) {
                $errorUserName = "User Name Already Exists";
                header("Location: ./signup.php?error=" . urlencode($errorUserName));
            } else if ($record['userEmail'] == $userEmail) {
                $errorUserEmail = "Email Already Exists";
                header("Location: ./signup.php?error=" . urlencode($errorUserEmail));
            } else if ($record['userPassword'] == $userPassword) {
                $errorUserPassword = "Password Already Exists";
                header("Location: ./signup.php?error=" . urlencode($errorUserPassword));
            } else {
                if (strlen($userPassword) >= 8) {
                    $_SESSION['userDetails'] = [
                        'userId' => $row['id'],
                        'userName' => $row['userName'],
                        'userEmail' => $row['userEmail'],
                        'userCNIC' => $row['userCNIC'],
                        'Role' => $row['Role'],
                    ];
                    $_SESSION["loginStatus"] = true;
                    header("location:../index.php");
                    $insert = "INSERT INTO `signup`(`userName`, `userEmail`,`userPassword`, `Role`,`Status`) VALUES ('$userName','$userEmail','$userPassword','$userRole','Pending')";
                    $res = mysqli_query($conn, $insert);
                    echo "<script>alert('Sign Up Successful')
                    location.href = '../index.php';
                    </script>";
                } else {
                    echo "<script>alert('Password Must Be At Least 8 Characters')
                    location.href = '../signup.php';
                    </script>";
                }
            }
        } else {
            if (strlen($userPassword) >= 8) {
                $_SESSION['userDetails'] = [
                    'userId' => $row['id'],
                    'userName' => $row['userName'],
                    'userEmail' => $row['userEmail'],
                    'userCNIC' => $row['userCNIC'],
                    'Role' => $row['Role'],
                ];
                $_SESSION["loginStatus"] = true;
                header("location:../index.php");
                $insert = "INSERT INTO `signup`(`userName`, `userEmail`,`userPassword`, `Role`,`Status`) VALUES ('$userName','$userEmail','$userPassword','$userRole','Pending')";
                $res = mysqli_query($conn, $insert);
                echo "<script>alert('Sign Up Successful')
                location.href = '../index.php';
                </script>";
            } else {
                echo "<script>alert('Password Must Be At Least 8 Characters')
                location.href = 'signup.php';   
                </script>";
            }
        }
    }
}


// Login Auth

if (isset($_REQUEST['signIn'])) {
    $userEmail = $_REQUEST['userEmail'];
    $userPassword = $_REQUEST['userPassword'];
    // echo $userEmail . " " . $userPassword; exit();

    if (!($userEmail && $userPassword)) {
        $error = "Enter Your Details";
        header("Location: ./index.php?error=" . urlencode($error));
    } else {
        $select = "SELECT * FROM signup";
        $res = mysqli_query($conn, $select);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                //  Admin login Section
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
                            header("location:../index.php");
                        } else {

                            echo "Password Wrong";
                        }
                    } else {
                        echo "Email Wrong";
                    }
                } else if ($row['Role'] == "Admin") {
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
                            header("location:../index.php");
                        } else {

                            echo "Password Wrong";
                        }
                    } else {
                        echo "Email Wrong";
                    }
                } else if ($row['Role'] == "Tester") {
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
                            header("location:../index.php");
                        } else {
                            header("location:../login.php");
                            echo "Password Wrong";
                        }
                    } else {
                        header("location:../login.php");
                        echo "Email Wrong";
                    }
                } else {
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
                            header("location:../index.php");
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
            echo "0 Record";
        }
    }
}
