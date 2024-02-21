<?php 
require("../includes/config.php");
session_start();
if(isset($_SESSION["loginStatus"])){
    session_destroy();
    header("location:../login.php");
} else {
    header("location:../login.php");
}
?>