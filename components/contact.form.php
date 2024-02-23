<style>
    .heading {
        color: #2B7DDF;
        text-align: center;
        text-transform: uppercase;
    }

    .divider {
        position: relative;
        left: 38%;
        width: 25%;
        height: 0.5%;
        background-color: #2B7DDF;
    }

    .divider-address {
        position: relative;
        left: 32%;
        width: 38%;
        height: 0.5%;
        background-color: #2B7DDF;
    }

    .circle {
        width: 150px;
        height: 50px;
        position: relative;
        top: 20px;
        left: 40%;
        z-index: 1;
        border-radius: 20px;
        background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);
    }

    .circle>p {
        position: relative;
        top: 1px;
        z-index: 111;
        left: 20px;
        color: #000;
        text-transform: uppercase;
        font-size: 30px;
    }

    .address {
        width: 22rem;
        text-align: center;
        position: relative;
        left: 27%;
        /* top: 10px; */
        border-top-right-radius: 25%;
        border-bottom-left-radius: 25%;
        border-bottom-right-radius: 5%;
        background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);
        box-shadow: -5px 0 10px -1px gray, 10px 0 10px -5px gray;
    }

    .address-heading {
        color: white !important;
        font-size: 22px;
        text-decoration: underline;
    }

    .icons {
        color: white !important;
        margin-right: 5px;
        font-size: 20px;
    }

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

<div class="row contact-rooo no-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="heading">Contact Us</h3>
                <div class="divider">
                    <hr>
                </div>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Your Name</label>
                        <input type="text" name="your_name" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Your Message</label>
                        <textarea name="message" id="" class="form-control" rows="6"></textarea>
                    </div>

                    <button type="submit" class="button-signin btn w-100">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <!-- <h3 class="heading">Other Details</h3>
                <div class="divider-address">
                    <hr>
                </div> -->
                <div class="circle">
                    <p>Details</p>
                </div>
                <div class="container">
                    <div class="row gx-5">
                        <div class="card address">
                            <div class="card-body ">
                                <p class="card-text">
                                <div class="p-3 "><span class="address-heading"> Email</span>: <br> <i class="fas fa-at icons"></i> smi.aptech@gmail.com</div>
                                <div class="p-3 "><span class="address-heading"> Contact Number</span>: <br><i class="fas fa-mobile-alt icons"></i> +92 333-024-0594 <br> <i class="fas fa-mobile-alt icons"></i> +92 321-024-7722</div>
                                <div class="p-3 "><span class="address-heading"> Address</span>: <br> <i class="fas fa-map-pin icons"></i> MC 1335(A) Green Town, <br> Shah Faisal Colony, Karachi, Pakistan</div>
                                </p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>
                        <!-- <div class="col address">
                            <div class="p-3 "><span class="address-heading"> Email</span>: <br> <i class="fas fa-at icons"></i> smi.aptech@gmail.com</div>
                            <div class="p-3 "><span class="address-heading"> Contact Number</span>: <br><i class="fas fa-mobile-alt icons"></i> +92 333-024-0594 <br> <i class="fas fa-mobile-alt icons"></i> +92 321-024-7722</div>
                            <div class="p-3 "><span class="address-heading"> Address</span>: <br> <i class="fas fa-map-pin icons"></i> MC 1335(A) Green Town, <br> Shah Faisal Colony, Karachi, Pakistan</div>
                        </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>