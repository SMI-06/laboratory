<?php 
require("includes/config.php");
session_start();
if(!isset($_SESSION["loginStatus"])){
    header("location:login.php");
}
?>