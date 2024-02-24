<style>
    .heading .tagline {
        color: #5bc0de;
        font-size: 20px;
        text-align: center;
        position: relative;
        left: 32%;
    }
    .mycard{
        background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);
        border-radius: 10px !important;
        color: #fff;
    }
</style>

<section class="our-team bg-white">
    <div class="container">
        <div class="inner-title heading">
            <h2>Meet our Team</h2>
            <span class="tagline">Take a look at our innovative and experiance team</span>
        </div>
        <div class="row team-member">
            <?php for ($i=0; $i < 4 ; $i++) {?> 
                <div class="col-md-3 col-sm-6">
                <div class="user-card mycard">
                    <div class="userar">
                        <img class="teammempic" alt="" src="assets/images/team/team-memb1.jpg">
                    </div>
                    <div class="detfs">
                        <p>Muhammad Ibraheem<i> - MD</i></p>
                        <ul class="position-relative left">
                            <li><a href="#" class="navicon"><i class="fab fa-facebook-f fa-lg"></i></a></li>
                            <li><a href="#"  class="navicon"><i class="fab fa-twitter fa-lg"></i></a></li>
                            <li><a href="#"  class="navicon"><i class="fab fa-github fa-lg"></i></a></li>
                        </ul>
                        <br>
                        <p>3+ Years of Experiance in PHP with good innovative Ideas</p>

                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</section>