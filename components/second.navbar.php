<style>
    .button-signin {
        /* height: 50px; */
        /* margin-top: 50px; */
        /* padding: 15px 30px; */
        width: 150%;
        text-align: center;
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        border-radius: 10px;
        display: block;
        border: 0px;
        font-weight: 700;
        box-shadow: 0px 0px 14px -7px #f09819;
        background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);
        cursor: pointer;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-signin:hover {
        background-position: right center;
        /* change the direction of the change here */
        color: #fff;
        text-decoration: none;
    }

    .button-signin:active {
        transform: scale(0.95);
    }
</style>
    <div id="nav-head" class="header-nav bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 no-padding col-sm-12 nav-img">
                    <img src="assets/images/logo.png" alt="">   
                    <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                </div>
                <div id="menu" class="col-lg-8 col-md-9 d-none d-md-block  nav-item" style="padding-left:16%;">
                    <ul>
                        <li ><a class="text-info navlinks" href="index.php">Home</a></li>
                        <li><a class="text-info navlinks" href="about_us.php">About Us</a></li>
                        <!-- <li><a href="services.html">Services</a></li> -->
                        <li><a class="text-info navlinks" href="">Gallery</a></li>
                        <li><a class="text-info navlinks" href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-2 col-lg-2 d-none d-lg-block appoint" style="padding-left:10%;">
                    <a href="Dashborads/login.php" class="button-signin btn">Sign In</a>
                </div>
            </div>

        </div>
    </div>

</header>