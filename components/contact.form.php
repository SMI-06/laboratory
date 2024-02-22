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
    .address{
        text-align: center;
    }
    .address-heading{
        color: #5bc0de;
        font-size: 22px;
        text-decoration: underline;
    }
    .icons{
        color: #5bc0de;
        margin-right: 5px;
        font-size: 20px;
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
                <h3 class="heading">Other Details</h3>
                <div class="divider-address">
                    <hr>
                </div>
                <div class="container overflow-hidden">
                    <div class="row gx-5">
                        <div class="col address">
                            <div class="p-3 "><span class="address-heading"> Email</span>: <br> <i class="fas fa-at icons"></i> smi.aptech@gmail.com</div>
                            <div class="p-3 "><span class="address-heading"> Contact Number</span>: <br><i class="fas fa-mobile-alt icons"></i> +92 333-024-0594 | +92 321-024-7722</div>
                            <div class="p-3 "><span class="address-heading"> Address</span>: <br> <i class="fas fa-map-pin icons"></i> MC 1335(A) Green Town, Shah Faisal Colony, Karachi</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>