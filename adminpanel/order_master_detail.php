<?php

require('top.inc.php');
$order_id = get_safe_value($con, $_GET['id']);

if (isset($_POST['submit']))
 {
     $update_order_status=$_POST['update_order_status'];
        $sql="update order1 set order_status='$update_order_status' where id='$order_id' ";
        mysqli_query($con,$sql);
}

?>

<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Order Master Detail</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>


                                <tr>

                                    <th class="product-thumbnail">Product Name</th>
                                    <th class="product-name"><span class="nobr">Product Image</span></th>
                                    <th class="product-price"><span class="nobr"> Quantity </span></th>
                                    <th class="product-stock-stauts"><span class="nobr"> Price </span></th>
                                    <th class="product-name"><span class="nobr">Total Price</span></th>
                                    


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                              
                                $sql = "select distinct(order_detail.id),order_detail.*,product.name,product.image,product.price from order_detail,product where order_detail.order_id='$order_id'  and order_detail.product_id=product.id";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                    <tr>
                                        <td class="product-add-to-cart"><?php echo $row['name']; ?></a></td>
                                        <td class="product-thumbnail"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . 'product/'.$row['image']; ?>"></td>
                                        <td class="product-price"><?php echo $row['qty']; ?></td>
                                        <td class="product-stock-status"><?php echo $row['price']; ?></td>
                                        <td class="product-name"><?php echo $row['qty'] * $row['price']; ?></td>
                                       

                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                        <?php
                        $sql = "select order1.address,order1.city,order_status.name as order_status_str from order1,order_status where order1.id='$order_id' and order1.order_status=order_status.id ";

                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $area = $row['address'];
                        $city = $row['city'];
                        $status = $row['order_status_str'];

                        ?>
                        <div id="order address">
                            <strong> Address :</strong>
                            <?php echo $area . "," . $city; ?>
                            <br> <br>
                            <strong>Order Status :</strong>
                            <?php echo $status; ?>
                            <div>
                                <form method="POST">
                                    <select class="form-control" name="update_order_status">
                                        <option>Select Status</option>
                                        <?php
                                        $sql = "SELECT * from order_status order by id asc ";
                                        $res = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_assoc($res)) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                        <?php }

                                        ?>
                                    </select>
                                    <input type="submit" name="submit" class="form-control"/>
                                        </form>
                                
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require('footer.inc.php');


    ?>