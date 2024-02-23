<style>
    .heading{
        color: #2B7DDF;
        font-weight: 300;
    }
    .tagline{
        color: #5bc0de;
    }
</style>

<section class="key-features bg-white department">
    <div class="container">
        <div class="inner-title">

            <h2 class="heading">Our Services</h2>
            <p class="tagline">Take a look at some of our key features</p>
        </div>

        <div class="row">
            <?php for ($i = 0; $i < 3; $i++) {  ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-key cards rounded">
                        <i class="fas fa-heartbeat"></i>
                        <h5 class="text-white">Cardiology</h5>
                        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.</p>
                    </div>
                </div>
            <?php } ?>
        </div>






    </div>

</section>