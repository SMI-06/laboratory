<div class=" h-100 p-4 table-scrollable" style="overflow-x: scroll;">
    <table class="table table-hover text-dark table-bordered text-center" style="width:100%;">
        <thead>
            <tr>
                <?php
                $query = mysqli_query($conn, "SELECT * from products");
                $row = mysqli_fetch_assoc($query);
                $keys = array_keys($row);
                $lastIndex = count($keys) - 1;
                $secondLastIndex = $lastIndex - 1;
                foreach ($row as $column => $value) {
                    if ($column !== $keys[0] && $column !== $keys[$secondLastIndex]) { ?>
                        <th><?php echo $column ?></th>
                <?php }
                }
                ?>
                <th colspan="3" class="text-center">Action</th>
            </tr>

        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT * from products join laboratory on laboratory.laboratory_id = products.lab_id where products.user_id = " . $userDetail['userId']);
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $row['Product_code'] ?></td>
                        <td><?php echo $row['productName'] ?></td>
                        <td><?php echo $row['productCategory'] ?></td>
                        <td><?php echo $row['productDescription'] ?></td>
                        <td><?php echo $row['productPrice'] ?></td>
                        <td><img src="assets/img/productsImages/<?php echo $row['productImage'] ?>" width="50" height="50" alt="Product Image" class="rounded"></td>
                        <td><?php echo $row['status'] ?></td>
                        <td><?php echo $row['laboratory_name'] ?></td>
                        <td><a href="user.edit.php?id=<?php echo $row['Product_code'] ?>" class="btn btn-outline-dark rounded-pill"><i class="fas fa-user-edit"></i></a></td>
                        <td><a class="btn btn-outline-warning rounded-pill" href="user.edit.php?id=<?php echo $row['Product_code'] ?>"><i class="fas fa-ban"></i></a></td>
                        <td><a class="btn btn-outline-danger rounded-pill" href="user.edit.php?id=<?php echo $row['Product_code'] ?>"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
            <?php }
            }
            ?>
        </tbody>
    </table>
</div>