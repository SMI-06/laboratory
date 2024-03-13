<?php 
require "includes/config.php";
require("includes/header.inc.php"); 
?>

<?php
session_start();
if (isset($_SESSION["loginStatus"])) {
    header("location:index.php");
}
// if(isset($_GET['signUp'])){
//     $tester_id = $_GET['signUp'];
// }
?>

<!-- Sign Up Start -->
<div class="container-fluid" style="background-image: linear-gradient(45deg, #2B7DDF 0%, #5bc0de 51%, #2B7DDF 100%); position:absolute; top:0; left:0">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <form action="auth/auth.php" method="post">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">

                    <!--  ///////////////////  TESTER SIGNUP  \\\\\\\\\\\\\\\\\\\     -->

                    <?php if (isset($_GET['signUp']) == "tester") { ?>
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <h3>Sign Up For Tester</h3>
                        </div>
                        <div class="error" id="error">
                            <?php
                            if (isset($_GET["error"])) {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong> ' . $_GET["error"] . '
                        <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                            } ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" placeholder="Tester Name" name="TesterName">
                            <label for="floatingText">Tester name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Tester Email" name="TesterEmail">
                            <label for="floatingInput">Tester Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select p-2" id="floatingSelect" aria-label="Floating label select example" name="laboratory">
                                <option selected hidden>Select Laboratory</option>
                                <!-- <option>Dow</option> -->
                                <?php
                                $select_lab = mysqli_query($conn, "Select * from laboratory");
                                if (mysqli_num_rows($select_lab) > 0) {
                                    while ($row = mysqli_fetch_assoc($select_lab)) { ?>
                                        <option value="<?php echo $row['laboratory_id'] ?>"><?php echo $row['laboratory_name'] ?></option>
                                <?php }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="TesterPassword">
                            <label for="floatingPassword">Tester Password</label>
                        </div>
                        <button type="submit" name="tester_signup" class="btn btn-dark py-3 w-100 mb-4">Sign Up</button>

                    <?php } else { ?>

                        <!--  ///////////////////  OTHER SIGNUP  \\\\\\\\\\\\\\\\\\\     -->

                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <h3>Sign Up</h3>
                        </div>
                        <div class="error" id="error">
                            <?php
                            if (isset($_GET["error"])) {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong> ' . $_GET["error"] . '
                        <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                            } ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" placeholder="User Name" name="userName">
                            <label for="floatingText">User name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="userEmail">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="userPassword">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-4">
                            <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="role" id="btnradio1" autocomplete="off" value="admin">
                                <label class="btn btn-outline-dark" for="btnradio1">Admin</label>
                                <!-- <a href="tester.signup.php" class="btn btn-outline-dark"> -->
                                <!-- <input type="radio" class="btn-check" name="role" id="btnradio2" autocomplete="off" value="Tester"> -->
                                <!-- <label class="btn btn-outline-dark" for="btnradio2">Tester</label> -->
                                <input type="radio" class="btn-check" name="role" id="btnradio3" autocomplete="off" value="User">
                                <label class="btn btn-outline-dark" for="btnradio3">User</label>
                            </div>
                        </div>
                        <button type="submit" name="signup" class="btn btn-dark py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Wanna Tester?</p>
                        <p class="text-center mb-0"><a href="signup.php?signUp=tester">Sign up For Tester</a></p>
                    <?php } ?>



                    <!-- <p class="text-center mb-0">Already have an Account? <a href="./login.php">Sign In</a></p> -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Sign Up End -->

<?php require("includes/footer.inc.php"); ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>