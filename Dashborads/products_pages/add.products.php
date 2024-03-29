<form action="logics/logic.product.test.php" method="post" enctype="multipart/form-data">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card mb-4 w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mt-2" for="Productname">Product Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="Productname" placeholder="Enter Product Name" id="Productname">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mt-2" for="ProductImage">Product Image</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="ProductImage" id="ProductImage">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mt-2" for="ProductCategory">Product Category</label>
                            </div>
                            <div class="col-sm-9">
                                <select class="form-select" name="ProductCategory" id="ProductCategory" aria-label="Floating label select example">
                                    <option selected hidden disabled>Select Product Category</option>
                                    <option value="Electrical Category">Electrical Category</option>
                                    <option value="Medical Category">Medical Category</option>
                                    <option value="Other Category">Other Category</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mt-2" for="ProductDescription">Product Description</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="ProductDescription" id="ProductDescription" placeholder="Product Description" rows="3"></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mt-2" for="ProductPrice">Product Price</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="ProductPrice" placeholder="Enter Product Price" id="ProductPrice">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mt-2" for="laboratorytype">Laboratory Type</label>
                            </div>
                            <div class="col-sm-9">
                                <select class="form-select" name="laboratorytype" id="laboratorytype" aria-label="Floating label select example">
                                    <option selected hidden disabled>Select Laboratory Type</option>
                                    <?php
                                    $select_Lab_type = mysqli_query($conn, "SELECT * FROM `laboratorytype`");
                                    while ($row = mysqli_fetch_assoc($select_Lab_type)) { ?>
                                        <option value="<?php echo $row['laboratorytype_id'] ?>"><?php echo $row['Laboratory_Type'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mt-2" for="Laboratory">Laboratory</label>
                            </div>
                            <div class="col-sm-9">
                                <select class="form-select" name="Laboratory" id="Laboratory" aria-label="Floating label select example">
                                    <option selected hidden disabled>Select Laboratory</option>
                                    <?php
                                    $select_Lab = mysqli_query($conn, "SELECT * FROM `laboratory`;");
                                    while ($row = mysqli_fetch_assoc($select_Lab)) { ?>
                                        <option value="<?php echo $row['laboratory_id'] ?>"><?php echo $row['laboratory_name'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <input type="submit" value="Add Product" name="add_product" class="btn btn-outline-dark rounded-pill">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>