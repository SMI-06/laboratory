<style>
    .map {
        width: 100%;
        background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);
        box-shadow: -5px 0 10px -1px gray, 10px 0 10px -5px gray;
        position: relative;
        /* left: 25%; */
        padding: 5px;
        margin: 10px;
        border-radius: 30px;
    }

    .circle-map {
        width: 170px;
        height: 50px;
        position: relative;
        top: 20px;
        left: 44%;
        z-index: 1;
        border-radius: 20px;
        background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);
    }

    .circle-map>p {
        position: relative;
        top: 1px;
        z-index: 111;
        left: 20px;
        color: #fff;
        text-transform: uppercase;
        font-size: 30px;
    }
</style>
<div class="container">
    <div class="circle-map">
        <p>Location</p>
    </div>
    <div class="map">
        <div class="container mt-3 mb-3">
            <div class="row">
                <div class="col-md-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3619.6245927592363!2d67.1617998105634!3d24.87666814451757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb339d4e68dde47%3A0xafa4086358fcb2dd!2sSMI%20Softs!5e0!3m2!1sen!2s!4v1708611544022!5m2!1sen!2s" width="100%" height="450" style=" border-radius:30px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>