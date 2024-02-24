<style>
    .heading {
        color: #2B7DDF;
        text-align: center;
        text-transform: uppercase;
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
        color: #fff;
        text-transform: uppercase;
        font-size: 30px;
    }

    .circle-contact {
        width: 200px;
        height: 50px;
        position: relative;
        top: 10px;
        left: 43%;
        z-index: 1;
        border-radius: 20px;
        background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);
    }

    .circle-contact>p {
        position: relative;
        top: 1px;
        z-index: 111;
        left: 20px;
        color: #fff;
        text-transform: uppercase;
        font-size: 30px;
    }

    .contact {
        width: 40rem;
        text-align: center;
        position: relative;
        left: 8%;
        /* top: 10px; */
        /* border-top-right-radius: 25%;
        border-bottom-left-radius: 25%;
        border-bottom-right-radius: 5%; */
        background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);
        box-shadow: -5px 0 10px -1px gray, 10px 0 10px -5px gray;
    }

    .address {
        width: 22rem;
        height: 92%;
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

    .button-submit {
        /* height: 50px; */
        /* margin-top: 50px; */
        /* padding: 15px 30px; */
        width: 150%;
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

    .label {
        color: #FBFBFB;
        font-size: 20px;
        text-decoration: underline;
    }

    .text {
        color: #FBFBFB;
        font-size: 20px;
        /* text-decoration:underline; */
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="circle-contact">
                <p>Contact Us</p>
            </div>
            <div class="card contact">
                <div class="card-body ">
                    <p class="card-text">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label label">Your Name</label>
                            <input type="text" name="your_name" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label label">Email Address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label label">Your Message</label>
                            <textarea name="message" id="message" class="form-control" rows="6"></textarea>
                        </div>

                        <button type="submit" class="button-submit btn w-100">Submit</button>
                    </form>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="circle">
                <p>Details</p>
            </div>
            <div class="card address">
                <div class="card-body ">
                    <p class="card-text">
                    <div class="p-3 text"><span class="address-heading"> Email</span>: <br> <i class="fas fa-at icons"></i> smi.aptech@gmail.com</div>
                    <div class="p-3 text"><span class="address-heading"> Contact #</span>: <br><i class="fas fa-mobile-alt icons"></i> +92 333-024-0594 <br> <i class="fas fa-mobile-alt icons"></i> +92 321-024-7722</div>
                    <div class="p-3 text"><span class="address-heading"> Address</span>: <br> <i class="fas fa-map-pin icons"></i> MC 1335(A) Green Town, <br> Shah Faisal Colony, Karachi, Pakistan</div>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>