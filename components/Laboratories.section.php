<style>
    .heading {
        color: #2B7DDF !important;
        font-weight: 300;
        font-size: 40px;
    }

    span {
        color: #5bc0de;
        /* text-align: center !important; */
        position: relative;
        left: 39.5%;
    }

    .mycard {
        background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);
        border-radius: 4px;
        color: white;
    }

    .mycard h5 {
        font-size: 24px;
    }

    .button-submit {
        position: relative;
        left: 25%;
        width: 50%;
        text-align: center;
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: #000;
        border-radius: 10px;
        display: block;
        border: 0px;
        font-weight: 700;
        box-shadow: 0px 0px 14px -7px #f09819;
        background-image: linear-gradient(45deg, #FBFBFB 0%, #5bc0de 51%, #FBFBFB 100%);
        cursor: pointer;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-submit:hover {
        background-position: right center;
        /* change the direction of the change here */
        color: #000;
        text-decoration: none;
    }

    .button-submit:active {
        transform: scale(0.95);
    }
</style>

<section class="key-features ky2 department">
    <div class="container">
        <div class="inner-title">

            <h2 class="heading">Our Laboratories</h2>
            <span>Take a look at some of our Laboratories</span>
        </div>

        <div class="row">

            <?php
            require 'includes/config.php';
            $show_lab = mysqli_query($conn, 'SELECT * FROM `laboratory`
            JOIN laboratorytype ON laboratory.laboratory_type = laboratorytype.laboratorytype_id where `status` = "1"');
            if (mysqli_num_rows($show_lab) > 0) {
                while ($row = mysqli_fetch_assoc($show_lab)) { ?>
                    <div class="col-md-4 col-sm-6 ">
                        <div class="single-key mycard">
                            <i class="fas fa-heartbeat"></i>
                            <h5>"<?php echo $row['laboratory_name'] ?>"</h5>
                            <p><?php
                                if ($row['Laboratory_Type'] == "Other Type") {
                                    echo $row['laboratory_type_custom'];
                                } else {
                                    echo $row['Laboratory_Type'];
                                }
                                ?></p>
                            <p><?php
                                    $parts = explode("-", $row['laboratory_branch_number']);
                                    $branch_no = "Branch - ".$parts[2]; 
                                    echo $branch_no;
                                ?></p>
                            <a href="Lab.detail.php?id=<?php echo $row['laboratory_id']?>&br=<?php echo $row['laboratory_branch_number']?>" class="button-submit btn mt-4">Read More</a>
                        </div>
                    </div>
            <?php    }
            }
            ?>
        </div>

</section>