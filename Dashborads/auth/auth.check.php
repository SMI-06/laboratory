<?php 
require("../includes/config.php");
session_start();
if(!(isset($_SESSION["loginStatus"]) || isset( $_SESSION['testerDetails'] ))){
    session_destroy();
    header("location:login.php");
}




?>