<?php
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
}
if (isset($_GET['a_id'])) {
    $a_Id = $_GET['a_id'];
}
if (isset($_GET['p'])) {
    $lab_req = $_GET['p'];
}
if (isset($_GET['s'])) {
    $status = $_GET['s'];
}
?>

<h3 class="text-dark text-center" style="margin-top: 20px; margin-left:20px; text-transform:uppercase">Request For Laboratory</h3>
<form action="Logics/lab-status-edit.php" method="post" enctype="multipart/form-data">
    <?php
    $select = mysqli_query($conn, "SELECT * FROM laboratory
    JOIN signup on laboratory.admin_id = signup.id
    JOIN countries on laboratory.laboratory_country = countries.Country_Id
    JOIN laboratorytype on laboratory.laboratory_type = laboratorytype.laboratorytype_id
    JOIN cities on laboratory.laboratory_city = cities.id 
    where admin_id = 00002 && laboratory.status = 'Pending';");
    while ($row = mysqli_fetch_assoc($select)) {
        $time_date = strtotime($row['Time']); ?>
        <div class="col-lg-8 m-auto">
            <div class="card mb-4 w-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="name">Owner Id</label>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo $a_Id ?>" name="userName" placeholder="Enter Your username" id="username">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="mb-0" for="name">Owner Name</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['userFullName'] ?>" name="userName" placeholder="Enter Your username" id="username">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-sm-3">
                            <label class="mb-0" for="name">Owner Phone</label>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['userPhone'] ?>" name="userName" placeholder="Enter Your username" id="username">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="mb-0" for="name">Owner Email</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['userEmail'] ?>" name="userName" placeholder="Enter Your username" id="username">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="name">Laboratory Id</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" readonly onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['laboratory_id'] ?>" name="lab_id" placeholder="Enter Your username" id="username">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="name">Laboratory Name</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['laboratory_name'] ?>" name="userName" placeholder="Enter Your username" id="username">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="name">Laboratory Branch</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['laboratory_branch_number'] ?>" name="userName" placeholder="Enter Your username" id="username">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="name">Laboratory Address</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['laboratory_address'] . ", " . $row['city_Name'] . ", " . $row['country_Name'] ?>" name="userName" placeholder="Enter Your username" id="username">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="name">Laboratory Type</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo $row['Laboratory_Type'] ?>" name="userName" placeholder="Enter Your username" id="username">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="name">Request Date</label>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo date('Y-m-d', $time_date) ?>" name="userName" placeholder="Enter Your username" id="username">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="mb-0" for="name">Request Time</label>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" class="form-control" disabled onkeypress="allowOnlyNumbers(event)" value="<?php echo date('H:i:s', $time_date) ?>" name="userName" placeholder="Enter Your username" id="username">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-0" for="lab-status">Laboratory Status</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" disabled checked type="radio" name="lab-status" id="Pending" value="Pending">
                                <label class="form-check-label" for="Pending">Pending</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="lab-status" id="Active" value="1">
                                <label class="form-check-label" for="Active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="lab-status" id="Rejected" value="0">
                                <label class="form-check-label" for="Rejected">Rejected</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <?php
                            if ($status === "pend") { ?>
                                <input type="submit" value="Save" name="status-btn" class="btn btn-outline-dark rounded-pill">
                            <?php } else { ?>
                                <input type="submit" value="Update" name="status-btn" class="btn btn-outline-dark rounded-pill">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    ?>
</form>