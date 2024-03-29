<div class=" h-100 p-4 table-scrollable" style="overflow-x: hidden;">
    <table class="table table-hover text-dark table-bordered text-center" style="width:100%;">
        <thead>
            <tr>
                <?php
                $query = mysqli_query($conn, "SELECT * from products");
                $row = mysqli_fetch_assoc($query);
                $keys = array_keys($row);
                $lastIndex = count($keys) - 1;
                foreach ($row as $column => $value) {
                    if ($column !== $keys[0]) { ?>
                        <th><?php echo $column ?></th>
                <?php }
                }
                ?>
                <th colspan="3" class="text-center">Test Now</th>
            </tr>

        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT * from products");
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $row['Product_code'] ?></td>
                        <td><?php echo $row['productName'] ?></td>
                        <td><?php echo $row['productCategory'] ?></td>
                        <td><?php echo $row['productDescription'] ?></td>
                        <td><?php echo $row['productPrice'] ?></td>
                        <td><img src="assets/img/productsImages/<?php echo $row['productImage'] ?>" width="50" height="50" alt="Product Image" class="rounded"></td>
                        <td><?php echo $row['user_id'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td><a href="user.edit.php?id=<?php echo $row['Product_code'] ?>" class="btn  rounded-pill"><img src="assets/img/magnifyingGlass.png" width="25" height="25" alt=""></a></td>
                    </tr>
                <?php }
            } else { ?>
                <td colspan="17" class="text-center"><i class="far fa-times-circle fa-3x"></i>
                    <h4>No Record Found</h4>
                </td>
            <?php } ?>
        </tbody>
    </table>
</div>