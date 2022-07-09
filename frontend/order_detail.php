<?php 


require('top.php');
$order_id=get_safe_value($con,$_GET['id']);
$uid=$_SESSION['ID'];



?>

  
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/4jpg) no-repeat scroll center center / cover ;">
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
        </div>
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
                                                
                                                <th class="product-thumbnail">Product Name</th>
                                                <th class="product-name"><span class="nobr">Product Image</span></th>
                                                <th class="product-price"><span class="nobr"> Quantity </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Price </span></th>
                                                <th class="product-name"><span class="nobr">Total Price</span></th>
                                                
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $data=array();
                                                $user_id=$_SESSION['ID'];
                                                $sql="select distinct(order_detail.id),order_detail.*,product.name,product.image,product.price from order_detail,product,order1 where order_detail.order_id='$order_id' and order1.user_id='$uid' and product.id=order_detail.product_id";
                                                $result=mysqli_query($con,$sql);
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                              
                                                
                                            ?>
                                            <tr>
                                            <td class="product-add-to-cart"><?php echo $row['name']; ?></a></td>
                                            <td class="product-thumbnail"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'];?>"></td>
                                            <td class="product-price"><?php echo $row['qty']; ?></td>
                                            <td class="product-stock-status"><?php echo $row['price']; ?></td>
                                            <td class="product-name"><?php echo $row['qty']*$row['price']; ?></td>
                                            
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