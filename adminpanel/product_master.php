<?php

require('top.inc.php');
if (isset($_GET['type']) && ($_GET['id']) != '') {


    $type = get_safe_value($con, $_GET['type']);
    // status update block
    if ($type == 'status') {
        $id = get_safe_value($con, $_GET['id']);
        $operation = get_safe_value($con, $_GET['operation']);
        if ($operation == "active") {
            $status = '1';
        } else {
            $status = '0';
        }



        $update_status_sql = "UPDATE product SET status='$status' where id='$id'";
        mysqli_query($con, $update_status_sql);
    }
  
    // delete block
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);




        $update_status_sql = "DELETE FROM product WHERE id='$id'";
        mysqli_query($con, $update_status_sql);
    }

    
}
$sql = "SELECT product.*,categories.categories FROM product,categories WHERE product.categories_id=categories.id order by product.id desc"; //here we are using join collect data combing product and categories to know the categories of the 
$res = mysqli_query($con, $sql);  // product means forign key concept 

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Products </h4>
                    <h4 class="box-link"><a href="manage_product.php?type=add">Add Product</a></h4>
                   
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">Serial_no</th>
                                    <th class="avatar">Product_ID</th>
                                    <th>Categories</th>
                                    <th>name</th>
                                    <th>MRP</th>
                                    <th>Price</th>
                                    <th>QTY</th>
                                    <th>Image</th>
                                    <th>Status</th>

                                </tr>

                                <?php $serial = 1;
                             

                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <td><?php echo $serial ?></td>
                                        <td><?php echo $row['id']; ?></td>
                                        <td>
                                            <?php echo $row['categories']; ?>
                                            </td>
                                        <td>
                                            <?php echo $row['name']; ?>
                                            </td>
                                        <td>
                                            <?php echo $row['mrp']; ?>
                                            </td>
                                        <td>
                                            <?php echo $row['price']; ?>
                                            </td>
                                        <td>
                                            <?php echo $row['qty']; ?>
                                            </td>
                                        <td>
                                             <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']; ?>">
                                            </td>
                               
                                        <td>
                                            <?php

                                            if ($row['status'] == 1) {
                                                echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=" . $row['id'] . "';>Active</a> </span> &nbsp";
                                            } else {
                                                echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=" . $row['id'] . "';>Deactive</a>  </span>&nbsp";
                                            }
                                            echo "<span class='badge badge-edit'><a href='manage_product.php?type=edit&id=" . $row['id'] . "';>Edit</a> </span> &nbsp";
                                            echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "';>Delete</a>&nbsp </span>&nbsp";
                                            
                                            ?>
                                        </td>
                                    </tr>
                                <?php $serial++;
                                } ?>

                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require('footer.inc.php');


    ?>
    