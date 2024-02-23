<style>

footer {
    background-image: linear-gradient(45deg, #f5f5f5, #f3f3f3);
    overflow: hidden;
}

footer hr {
    border-color: rgb(126, 126, 126);
}

footer .logoContainer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

footer .logoContainer .logo img {
    height: 30px;

    @media only screen and (max-width: 768px) {
        height: 20px;
    }
}

footer .logoContainer .contact {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5em;
}

footer .logoContainer .contact svg {
    fill: var(--secondary-color-dark);

    @media only screen and (max-width: 768px) {
        width: 25px;
        height: 25px;
    }
}

footer .logoContainer .contact span {
    font-family: 'outfit';
    text-transform: capitalize;
    font-size: 0.8em;
    margin-bottom: 0px;
    color: #6b6b6b;

    @media only screen and (max-width: 768px) {
        font-size: 0.6em;
    }
}

footer .logoContainer .contact a {
    font-family: 'outfit';
    font-size: 1.2em;
    color: #333333;

    @media only screen and (max-width: 768px) {
        font-size: 0.9em;
    }
}

footer .logoContainer .contact a:hover {
    color: var(--primary-color-dark);
}

footer h2 {
    font-family: 'outfit';
    text-transform: capitalize;
    font-size: 1.5em;
    color: #333333;
    margin-bottom: 0.8em;

    @media only screen and (max-width: 768px) {
        text-align: center;
        font-size: 1.3em;
        margin-bottom: 1.0em;
        margin-top: 2.0em;
    }
}

footer .links {
    display: flex;
    gap: 0.5em;
    flex-direction: column;

    @media only screen and (max-width: 768px) {
        gap: 0.8em;
    }
}

footer .links a {
    text-transform: capitalize;
    font-family: 'poppins';
    color: #b9b9b9;
    font-weight: bold;

    @media only screen and (max-width: 768px) {
        text-align: center;
        font-size: 0.9em;
    }
}

footer .links a:hover {
    color: var(--primary-color-dark);
    padding-left: 0.8em;

    @media only screen and (max-width: 768px) {
        padding-left: 0em;
        font-size: 1.0em;
    }
}

footer .info {
    gap: 0.5em;
}

footer .info .title {
    display: flex;
    align-items: center;
    font-size: 1.4em;
    gap: 0.3em;

    @media only screen and (max-width: 768px) {
        justify-content: center;
        font-size: 1.3em;
    }
}

footer .info .title i {
    color: var(--primary-color-dark);
}

footer .info .title span {
    font-family: 'outfit';
    color: #333333;
}

footer .info a {
    font-family: 'poppins';
    font-size: 0.9em;
    color: #b9b9b9;

    @media only screen and (max-width: 768px) {
        text-align: center;
    }
}

footer .info a:hover {
    color: var(--primary-color-dark);
}

footer label {
    font-family: 'outfit';
    margin-top: 1.5em;
    margin-bottom: 0.8em;

    @media only screen and (max-width: 768px) {
        text-align: center;
        width: 100%;
    }
}

footer .emailBox {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.0em;
}

footer .emailBox input {
    padding: 15px 20px;
    font-size: 0.9em;
    font-family: 'outfit';
    border-radius: 8px 0 0 8px;
    border: 1px solid lightgrey;
    outline: none;
    flex-grow: 1;
    width: 100%;
    color: #868686;
}

footer .emailBox input:focus {
    border-color: var(--secondary-color-dark);
}

footer .emailBox button {
    outline: none;
    border: none;
    padding: 0 15px;
    height: 54px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 0 8px 8px 0;
    background-color: var(--secondary-color-dark);
}

footer .emailBox button:hover {
    background-color: var(--primary-color-dark);
}

footer .emailBox button i {
    color: #fff;
    font-size: 1.3em;
    margin-bottom: 0px;
    transform: rotate(-45deg);
}

footer .bottomContainer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-bottom: 1.0em;

    @media only screen and (max-width: 768px) {
        flex-direction: column;
    }
}

footer .bottomContainer p {
    font-family: 'poppins';
    font-size: 0.9em;
    color: #5e5e5e;
    margin-bottom: 0px;

    @media only screen and (max-width: 768px) {
        text-align: center;
        margin-bottom: 1.0em;
    }
}

footer .bottomContainer p a {
    color: var(--primary-color-dark);
    font-weight: bold;
    font-family: 'outfit';
    font-size: 1.0em;
}

footer .bottomContainer .social {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1.0em;
}

footer .bottomContainer .social a {
    padding: 10px;
    color: #fff;
    background-color: #222222;
    width: 40px;
    height: 40px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;

    @media only screen and (max-width: 768px) {
        width: 30px;
        height: 30px;
        font-size: 0.8em;
    }
}

footer .bottomContainer .social a:hover {
    background-color: var(--secondary-color-dark);
}

@media only screen and (max-width: 768px) {
    header nav::after {
        content: '';
        position: absolute;
        z-index: -1;
        top: -23px;
        height: 120%;
        width: 100%;
        transform: rotateY(180deg);
        border-radius: 0 0 20px 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        background-color: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(5px);
    }

    .blogSection .blogContainer .profileInfo .status span::after {
        display: none;
    }

}
</style>


<footer class="pt-3">
    <div class="container py-3">
                <div class="logoContainer">
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo.svg" alt="">
                    </a>
                    <div class="contact">
                        <div class="icon">
                            <svg width="33" height="33" viewBox="0 0 33 33" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1999_295)">
                                    <path d="M26.0808 20.4417C25.4052 19.7383 24.5903 19.3622 23.7267 19.3622C22.87 19.3622 22.0481 19.7313 21.3447 20.4348L19.1438 22.6287C18.9627 22.5312 18.7816 22.4407 18.6075 22.3501C18.3568 22.2248 18.12 22.1063 17.918 21.981C15.8564 20.6716 13.9828 18.9652 12.1859 16.7573C11.3153 15.6569 10.7302 14.7305 10.3054 13.7903C10.8765 13.2679 11.4058 12.7247 11.9212 12.2023C12.1162 12.0073 12.3113 11.8053 12.5063 11.6103C13.9689 10.1477 13.9689 8.25321 12.5063 6.79058L10.6049 4.88917C10.3889 4.67326 10.1661 4.45038 9.95713 4.22751C9.53923 3.79569 9.10045 3.34993 8.64773 2.93204C7.97214 2.26341 7.16421 1.9082 6.3145 1.9082C5.46478 1.9082 4.64293 2.26341 3.94644 2.93204C3.93947 2.939 3.93947 2.939 3.93251 2.94597L1.56445 5.33492C0.672947 6.22643 0.164512 7.31295 0.0530735 8.57359C-0.114084 10.6073 0.484896 12.5018 0.944577 13.7415C2.07289 16.7852 3.75839 19.606 6.27271 22.6287C9.32332 26.2713 12.9938 29.1478 17.1867 31.1746C18.7886 31.9338 20.9268 32.8323 23.3158 32.9855C23.462 32.9924 23.6152 32.9994 23.7545 32.9994C25.3634 32.9994 26.7146 32.4213 27.7733 31.2721C27.7802 31.2582 27.7942 31.2512 27.8011 31.2373C28.1633 30.7985 28.5812 30.4015 29.02 29.9767C29.3195 29.6911 29.6259 29.3916 29.9254 29.0782C30.6149 28.3608 30.9771 27.525 30.9771 26.6683C30.9771 25.8047 30.608 24.9759 29.9045 24.2794L26.0808 20.4417ZM28.5742 27.7758C28.5673 27.7758 28.5673 27.7827 28.5742 27.7758C28.3026 28.0683 28.024 28.3329 27.7245 28.6255C27.2718 29.0573 26.8121 29.51 26.3803 30.0184C25.6768 30.7707 24.848 31.1259 23.7615 31.1259C23.657 31.1259 23.5456 31.1259 23.4411 31.1189C21.3726 30.9866 19.4503 30.1786 18.0085 29.4891C14.0664 27.5807 10.6049 24.8714 7.72837 21.4377C5.35334 18.5752 3.76535 15.9285 2.71366 13.0868C2.06592 11.3526 1.82912 10.0014 1.93359 8.72682C2.00324 7.91193 2.31666 7.23633 2.89474 6.65825L5.26976 4.28323C5.61104 3.96284 5.97322 3.78872 6.32843 3.78872C6.76721 3.78872 7.12242 4.05339 7.3453 4.27626C7.35226 4.28323 7.35923 4.29019 7.36619 4.29716C7.79105 4.69415 8.19501 5.10508 8.61987 5.54387C8.83578 5.76675 9.05866 5.98962 9.28153 6.21946L11.1829 8.12087C11.9212 8.85915 11.9212 9.54171 11.1829 10.28C10.981 10.482 10.7859 10.6839 10.584 10.879C9.99891 11.4779 9.44173 12.0351 8.83578 12.5784C8.82185 12.5923 8.80792 12.5993 8.80096 12.6132C8.20198 13.2122 8.31342 13.7972 8.43878 14.1942C8.44575 14.2151 8.45271 14.236 8.45968 14.2569C8.95418 15.4549 9.65067 16.5832 10.7093 17.9274L10.7163 17.9344C12.6386 20.3024 14.6654 22.1481 16.9011 23.562C17.1867 23.7431 17.4792 23.8894 17.7578 24.0287C18.0085 24.154 18.2453 24.2724 18.4473 24.3978C18.4752 24.4117 18.503 24.4326 18.5309 24.4465C18.7677 24.5649 18.9906 24.6207 19.2204 24.6207C19.7985 24.6207 20.1607 24.2585 20.2791 24.1401L22.6611 21.7581C22.8979 21.5213 23.274 21.2357 23.7128 21.2357C24.1446 21.2357 24.4998 21.5074 24.7157 21.7442C24.7227 21.7511 24.7227 21.7511 24.7296 21.7581L28.5673 25.5958C29.2847 26.3062 29.2847 27.0375 28.5742 27.7758Z"></path>
                                    <path d="M17.8345 7.85011C19.6593 8.15656 21.3169 9.02021 22.6403 10.3435C23.9636 11.6669 24.8203 13.3245 25.1337 15.1493C25.2103 15.609 25.6073 15.9294 26.06 15.9294C26.1157 15.9294 26.1645 15.9224 26.2202 15.9154C26.7356 15.8319 27.0769 15.3443 26.9933 14.8289C26.6172 12.621 25.5725 10.6082 23.9775 9.01324C22.3826 7.41829 20.3697 6.37355 18.1618 5.99745C17.6464 5.91387 17.1659 6.25515 17.0753 6.76359C16.9848 7.27202 17.3191 7.76653 17.8345 7.85011Z"></path>
                                    <path d="M32.9619 14.557C32.3421 10.9213 30.6287 7.61301 27.996 4.98029C25.3633 2.34757 22.055 0.634209 18.4193 0.0143347C17.9108 -0.0762086 17.4303 0.272035 17.3397 0.780471C17.2562 1.29587 17.5974 1.77645 18.1128 1.86699C21.3585 2.41722 24.3185 3.95645 26.6727 6.30362C29.0268 8.65774 30.5591 11.6178 31.1093 14.8634C31.1859 15.3231 31.5829 15.6435 32.0356 15.6435C32.0913 15.6435 32.1401 15.6365 32.1958 15.6296C32.7042 15.553 33.0525 15.0654 32.9619 14.557Z"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="d-flex flex-column">
                            <span>call any way</span>
                            <a href="tel:2-965-871-8617">2-965-871-8617</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container py-3">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="d-flex flex-column info">
                            <div class="title">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>address</span>
                            </div>
                            <a href="#">House 168/170, Avenue 01, Mirpur DOHS,
                                Dhaka Bangladesh</a>
                        </div>
                        <br>
                        <div class="d-flex flex-column info">
                            <div class="title">
                                <i class="fa-solid fa-paper-plane"></i>
                                <span>say hello</span>
                            </div>
                            <a href="#">ifo@example.com</a>
                            <a href="#">info@support.com</a>
                        </div>
                        <label>See Our New updates</label>
                        <form action="" class="emailBox shadow">
                            <input type="email" placeholder="Email here..." maxlength="40" required="">
                            <button><i class="fa-solid fa-arrow-right"></i></button>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <h2>our solution</h2>
                        <div class="links">
                            <a href="#">web development</a>
                            <a href="#">mobile development</a>
                            <a href="#">cloud services</a>
                            <a href="#">networking connectivity</a>
                            <a href="#">data analytics</a>
                            <a href="#">software development</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <h2>company</h2>
                        <div class="links">
                            <a href="#">about us</a>
                            <a href="how-we-work.html">how we work</a>
                            <a href="#">news &amp; article</a>
                            <a href="#">out team</a>
                            <a href="#">all portfolio</a>
                            <a href="pricing.html">pricing plan</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <h2>resources</h2>
                        <div class="links">
                            <a href="#">support area</a>
                            <a href="#">support policy</a>
                            <a href="#">terms &amp; conditions</a>
                            <a href="#">privacy policy</a>
                            <a href="#">career</a>
                            <a href="#">pricing plan</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container bottomContainer">
                <p>©Copyright 2023 <a href="index.html">VisiBooster</a> | Design By AR Assignments</p>
                <div class="social">
                    <a href="#" class="shadow"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="shadow"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="shadow"><i class="fa-brands fa-pinterest-p"></i></a>
                    <a href="#" class="shadow"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
    </footer>