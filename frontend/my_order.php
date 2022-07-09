<?php 


require('top.php');



?>

  
        <!-- Start Bradcaump area -->
        <!-- <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/4jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">My Order </span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- End Bradcaump area -->
        <!-- wishlist-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            

                                            <tr>
                                                
                                                <th class="product-thumbnail">Order ID</th>
                                                <th class="product-name"><span class="nobr">Address</span></th>
                                                <th class="product-price"><span class="nobr"> Payment Type </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
                                                <th class="product-name"><span class="nobr">Order Date</span></th>
                                                <th class="product-name"><span class="nobr">Order Status</span></th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $data=array();
                                                $user_id=$_SESSION['ID'];
                                                $sql="select order1.*,order_status.name as order_status_str from order1,order_status where user_id='$user_id' and order_status.id=order1.order_status ";
                                                $result=mysqli_query($con,$sql);
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                  
                                                
                                            ?>
                                            <tr>
                                            <td class="product-add-to-cart"><a href="order_detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
                                            <td class="product-name"><?php echo $row['address']; ?></td>
                                            <td class="product-price"><?php echo $row['payment_type']; ?></td>
                                            <td class="product-stock-status"><?php echo $row['payment_status']; ?></td>
                                            <td class="product-name"><?php echo $row['added_on']; ?></td>
                                            <td class="product-name"><?php echo $row['order_status_str']; ?></td>
                                            </tr>
                                                <?php }?>
                                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="wishlist-share">
                                                        <h4 class="wishlist-share-title">NOTE:</h4>
                                                        <div class="social-icon">
                                                            <ul>
                                                                <p>Your all order are listed above click on order id to view detail</p>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->
     
 <?php require('footer.php');?>