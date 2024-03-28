<?php
$query = mysqli_query($conn, "SELECT * from products where user_id = " . $userDetail['userId']);
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?php echo $row['Product_code'] ?></td>
            <td><?php echo $row['productName'] ?></td>
            <td><?php echo $row['productCategory'] ?></td>
            <td><?php echo $row['productDescription'] ?></td>
            <td><?php echo $row['productPrice'] ?></td>
            <td><?php echo $row['productImage'] ?></td>
            <td><?php echo $row['status'] ?></td>
            <td><a href="user.edit.php?id=<?php echo $row['Product_code'] ?>" class="btn btn-outline-dark rounded-pill"><i class="fas fa-user-edit"></i></a></td>
            <td><a class="btn btn-outline-warning rounded-pill" href="user.edit.php?id=<?php echo $row['Product_code'] ?>"><i class="fas fa-ban"></i></a></td>
            <td><a class="btn btn-outline-danger rounded-pill" href="user.edit.php?id=<?php echo $row['Product_code'] ?>"><i class="far fa-trash-alt"></i></a></td>
        </tr>
<?php }
}
?>