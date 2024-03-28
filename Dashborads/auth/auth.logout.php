<?php 
require("../includes/config.php");
session_start();
if(isset($_SESSION["loginStatus"])){
    session_destroy();
    header("location:../login.php");
} elseif(isset($_SESSION["testerLoginStatus"])) {
    session_destroy();
    header("location:../login.php?signUp=tester");
}
?>