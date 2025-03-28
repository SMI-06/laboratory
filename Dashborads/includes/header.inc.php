<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php 
        if(isset($title)){
            echo $title;
        } else {
            echo "Lab Automation";
        }
    ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
    ::-webkit-scrollbar {
        height: 1px;
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        /* width: 10px; */

    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #343a40;
        border-radius: 10px;
        /* width: 10px; */
    
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #343a40;
    }


    /* For Table Scrollbar */
    .table-scrollable::-webkit-scrollbar {
        height: 5px;

    }

    /* Track */
    .table-scrollable::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    .table-scrollable::-webkit-scrollbar-thumb {
        background: #343a40;
        border-radius: 10px;
    }

    /* Handle on hover */
    .table-scrollable::-webkit-scrollbar-thumb:hover {
        background: #343a40;
    }

    .badge {
        top: 20px;
        left: 60px;
        font-size: 12px;
    }

.main-section{
    border-radius:10px; 
    /* padding:10px;  */
    margin:10px 22px;
    background-color: #fff;
}
    .mycard{
        background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);
        position: relative;
        top: 10px;
    }

    .logo{
        position: absolute;
        top: 50;
        left: 50;
    }
    .heading{
        color: #2B7DDF;
        text-decoration: underline;
        position: relative;
        top: 20px;
    }
    .section-back{
        background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);
        border-radius:10px; 
        padding:5px; 
        margin:10px 22px;
    }

</style>

</head>

<body style="overflow-x: hidden;">
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Content Start -->
        <div class="content">