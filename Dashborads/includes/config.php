<?php
$conn = mysqli_connect("localhost","root","","lab-automation");
try {
    if (!$conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    header("location:404.php");
}
?>