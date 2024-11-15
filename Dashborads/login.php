<?php require("includes/header.inc.php"); ?>

<?php
session_start();
if (isset($_SESSION["loginStatus"])) {
    header("location:index.php");
}
?>

<!-- Sign In Start -->
<div class="container-fluid" style="width: 100%; background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%); position:absolute; top:0; left:0">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-5 p-sm-5 my-4 mx-3">
                <!-- Tester Login -->
                <?php if (isset($_GET['signUp']) == "tester") { ?>
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <h3>Tester Sign In</h3>
                    </div>
                    <div class="error" id="error">
                        <?php
                        if (isset($_GET["error"])) {
                            $error = $_GET["error"];
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong> ' . $error . '
                        <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                        } ?>
                    </div>
                    <form action="auth/auth.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="testerEmail" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div>
                            <?php
                            if (isset($_GET["incorrectEmail"])) {
                                $incorrectEmail = $_GET["incorrectEmail"];
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Oops!</strong> ' . $incorrectEmail . '
                                    <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                            }
                            ?>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="testerPassword" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div>
                            <?php
                            if (isset($_GET["incorrectPassword"])) {
                                $incorrectPassword = $_GET["incorrectPassword"];
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Oops!</strong> ' . $incorrectPassword . '
                                    <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                            }
                            ?>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-start">
                                <a href="login.php" class="text-dark">Sign In User</a>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <a href="forgot_password.php" class="text-dark">Forgot Password</a>
                            </div>
                        </div>
                            <button type="submit" name="testerSignIn" class="btn btn-dark  rounded-pill py-3 w-100 mb-4">Sign In</button>
                            <p class="text-center mb-0">Don't have an Account? <a href="./signup.php?signUp=tester">Sign Up</a></p>
                    </form>
                <?php } else {  ?>
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <h3>Sign In</h3>
                    </div>
                    <div class="error" id="error">
                        <?php
                        if (isset($_GET["error"])) {
                            $error = $_GET["error"];
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong> ' . $error . '
                        <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                        } ?>
                    </div>
                    <form action="auth/auth.php" method="post">
                        <div class="form-floating mb-1">
                            <input type="text" name="userEmail" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">User Name / Email address</label>
                        </div>
                        <div>
                            <?php
                            if (isset($_GET["incorrectEmail"])) {
                                $er = $_GET["incorrectEmail"];
                                echo " <div id='emailHelp' class='form-text text-danger mb-3'>$er.</div>";
                            }
                            ?>
                        </div>
                        <div class="form-floating mb-1 mt-3">
                            <input type="password" name="userPassword" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div>
                            <?php
                            if (isset($_GET["incorrectPassword"])) {
                                $er = $_GET["incorrectPassword"];
                                echo " <div id='emailHelp' class='form-text text-danger mb-3'>$er.</div>";
                            }
                            ?>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <div class="d-flex justify-content-start">
                                <a href="login.php?signUp=tester" class="text-dark">Sign In Tester</a>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <a href="forgot_password.php" class="text-dark">Forgot Password</a>
                            </div>
                        </div>
                        <button type="submit" name="signIn" class="btn btn-dark  rounded-pill py-3 w-100 mb-3">Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="./signup.php">Sign Up</a></p>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Sign In End -->

<?php require("includes/footer.inc.php"); ?>