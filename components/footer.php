<style>
    footer {
        /* background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%); */
        overflow: hidden;
    }

    footer hr {
        border-color: rgb(126, 126, 126);
        margin: 0 10px;
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
        font-family: Arial, Helvetica, sans-serif;
        text-transform: capitalize;
        font-size: 0.8em;
        margin-bottom: 0px;
        color: #6b6b6b;

        @media only screen and (max-width: 768px) {
            font-size: 0.6em;
        }
    }

    footer .logoContainer .contact a {
        font-family: Arial, Helvetica, sans-serif;
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
        font-family: Arial, Helvetica, sans-serif;
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
        font-family: Arial, Helvetica, sans-serif;
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
        font-family: Arial, Helvetica, sans-serif;
        color: #333333;
    }

    footer .info a {
        font-family: Arial, Helvetica, sans-serif;
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
        font-family: Arial, Helvetica, sans-serif;
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
        font-family: Arial, Helvetica, sans-serif;
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

    .main {
        background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);
    }

    .main2 {
        height: 2.3px;
        background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%);
    }

    footer .bottomContainer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.0em;

        @media only screen and (max-width: 768px) {
            flex-direction: column;
        }
    }

    footer .bottomContainer p {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 0.9em;
        color: #5e5e5e;
        margin-bottom: 0px;
        color: #fff;

        @media only screen and (max-width: 768px) {
            text-align: center;
            margin-bottom: 1.0em;
        }
    }

    footer .bottomContainer p a {
        /* color: var(--primary-color-dark); */
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1.0em;
        text-transform: uppercase;
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

    /* footer .bottomContainer .social a:hover {
        background-color: var(--secondary-color-dark);
    } */

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

    .icons {
        color: #5bc0de;
        margin-right: 5px;
    }
</style>

<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->