<?php

require('top.inc.php');
if (isset($_GET['type']) && ($_GET['id']) != '') {


    $type = get_safe_value($con, $_GET['type']);


    // delete block
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $update_status_sql = "DELETE FROM order1 WHERE id='$id'";
        mysqli_query($con, $update_status_sql);
    }
}
$sql = "SELECT * FROM users order by id desc";
$res = mysqli_query($con, $sql);



?>

<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Order Master </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">

                            <thead>


                                <tr>
                                    
                                    <th class="product-thumbnail">Order ID</th>
                                    <th class="product-name"><span class="nobr">Address</span></th>
                                    <th class="product-price"><span class="nobr"> Payment Type </span></th>
                                    <th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
                                    <th class="product-name"><span class="nobr">Order Date</span></th>
                                    <th class="product-name"><span class="nobr">Order Status</span></th>
                                    <th class="product-name"><span class="nobr">User Id</span></th>
                                    <th class="product-name"><span class="nobr">Action</span></th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data = array();
                                
                                $sql = "select order1.*,order_status.name as order_status_str from order1,order_status where order_status.id=order1.order_status ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                    <tr>
                                        <td class="product-add-to-cart"><a href="order_master_detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
                                        <td class="product-name"><?php echo $row['address']; ?></td>
                                        <td class="product-price"><?php echo $row['payment_type']; ?></td>
                                        <td class="product-stock-status"><?php echo $row['payment_status']; ?></td>
                                        <td class="product-name"><?php echo $row['added_on']; ?></td>
                                        <td class="product-name"><?php echo $row['order_status_str']; ?></td>
                                        <td class="product-name"><a href="user_detail.php?id=<?php echo $row['user_id']; ?>"><?php echo $row['user_id']; ?></a></td>
                                        <td><?php
                                            echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "';>Delete</a>&nbsp </span>&nbsp";

                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>

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