<?php require("includes/config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<?php
require("auth/auth.check.php");
if (isset($_SESSION['userDetails'])) {
    $userDetail = $_SESSION['userDetails'];
}
$title = "Lab Automation | Profile | Update"
?>

<?php require("includes/header.inc.php"); ?>

<!-- Navbar Start -->
<?php require("components/navbar.php"); ?>
<!-- Navbar End -->

<!-- Sidebar Start -->
<?php require("components/sidebar.php"); ?>
<!-- Sidebar End -->

<section class="bg-light" style=" border-radius:10px; padding:5px; margin:10px 22px">
    <?php
    if (isset($_GET['show_mail_id']) == "show_mail") {
    ?>
        <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transform:uppercase">Show Mail</h3>
        <?php if ($userDetail['Role'] == "Super Admin") { ?>
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4 table-scrollable" style="overflow-x: scroll;">
                    <table class="table table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="text-center">Mail Id</th>
                                <th class="text-center">Recipient</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Message</th>
                                <th class="text-center">User Name</th>
                                <th colspan="3" class="text-center">Action</th>
                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            $select = "SELECT * FROM `mails` join signup on mails.userId = signup.id;";
                            $res = mysqli_query($conn, $select);
                            if (mysqli_num_rows($res)) {
                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <th><?php echo $row['mail_id'] ?></th>
                                        <td><?php echo $row['recipient'] ?></td>
                                        <td><?php echo $row['subject'] ?></td>
                                        <td><?php echo $row['Message'] ?></td>
                                        <td><?php echo $row['userName'] ?></td>
                                        <td><a class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <td colspan="19" class="text-center"><i class="far fa-times-circle fa-3x"></i>
                                    <h4>No Record Found</h4>
                                </td>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Sent Form -->
        <?php } else if ($userDetail['Role'] == "Admin") { ?>
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4 table-scrollable" style="overflow-x: scroll;">
                    <table class="table table-bordered table-hover text-center" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Message</th>
                                <!-- <th class="text-center">Recipient</th> -->
                                <th colspan="3" class="text-center">Action</th>
                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            // $select = "";
                            $res = mysqli_query($conn, "SELECT * FROM `mails` join signup on mails.userId = signup.id where `userId` = $id");
                            if (mysqli_num_rows($res)) {
                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <th><?php echo $row['mail_id'] ?></th>
                                        <td><?php echo $row['subject'] ?></td>
                                        <td><?php echo $row['Message'] ?></td>
                                        <!-- <td><?php // echo $row['recipient'] ?></td> -->
                                        <td><a class="btn btn-outline-danger rounded-pill"><i class="far fa-trash-alt"></i></a></td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <td colspan="19" class="text-center"><i class="far fa-times-circle fa-3x"></i>
                                    <h4>No Record Found</h4>
                                </td>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php }
    } else {
        if (isset($_GET['id'])) {
            $send_Id = $_GET['id'];
        }
        $select = mysqli_query($conn, "Select * From signup where id = $send_Id");
        $res = mysqli_fetch_assoc($select);
        ?>
        <h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transform:uppercase">Send Mail</h3>
        <!-- <div > -->
        <form action="logics/send.mail.php" method="post" enctype="multipart/form-data">
            <div class="container py-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4 w-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="email">Recipient Email</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input hidden type="text" name="id" class="form-control" value="<?php echo $res['id'] ?>">
                                        <input type="text" readonly class="form-control" name="recipient_email" id="email" value="<?php echo $res['userEmail'] ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="Subject">Subject</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Subject" id="Subject" placeholder="Enter Subject">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="Message">Message</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="Message" id="Message" placeholder="Enter Your Message" rows="5"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input type="submit" value="Send Mail" name="send_mail" class="btn btn-outline-dark rounded-pill">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- </div> -->
    <?php } ?>

</section>

<!-- Footer Start -->
<?php require("components/footer.php"); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php require("includes/footer.inc.php"); ?>