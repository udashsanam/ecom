<?php require('top.php');
    $product_id=mysqli_real_escape_string($con,$_GET['id']);
    $sql="SELECT * FROM product WHERE id= '$product_id' ";
    $result=mysqli_query($con,$sql);
    $check=mysqli_num_rows($result);
  
    
if($product_id>0 && $check>0)   // if id is other rather then number the redirect to index.php
{
    $get_product=get_product($con,'',$product_id,'');
    // prx($get_product);
    $cat_id=$get_product['0']['categories_id'];
    $get_categories=get_categories($con,$cat_id);
    $cat_name=$get_categories['0']['categories'];
    $pdt_name=$get_product['0']['name'];
    $pdt_desc=$get_product['0']['description'];
    $pdt_short_desc=$get_product['0']['short_desc'];
    $pdt_mrp=$get_product['0']['mrp'];
    $pdt_price=$get_product['0']['price'];
}
else
{ ?>
 <script>
    window.location.href="index.php";
 </script>
<?php
}

   
 
    
?>

        <div class="body__overlay"></div>
        <!-- Start Bradcaump area -->
        <!-- <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url() no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href="categories-detail.php?id=<?php echo $cat_id;?> && name=<?php echo $cat_name;?>"><?php echo $get_categories['0']['categories'];?></a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php echo $pdt_name; ?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image'];?>" alt="full-image">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2 ><?php echo $pdt_name; ?></h2>
                                <ul  class="pro__prize">
                                    <li style="text-decoration: line-through;" class="old__prize">$<?php echo $pdt_mrp; ?></li>
                                    <li>$<?php echo $pdt_price; ?></li>
                                </ul>
                                <p class="pro__info"><?php echo $pdt_short_desc; ?></p>
                                    <div class="ht__pro__desc">
                                     <div class="sin__desc">
                                        <p><span>Availability:</span> In Stock</p>
                                     </div>
                                     <div class="sin__desc align--left">
                                        <p><span>Qty:</span>
                                        <select id='qty'>
                                                <option value=1>1</option>
                                                <option value=2>2</option>
                                                <option value=3>3</option>
                                                <option value=4>4</option>
                                                <option value=5>5</option>
                                                <option value=6>6</option>
                                                <option value=7>7</option>
                                                <option value=8>8</option>
                                                <option value=9>9</option>
                                                <option value=10>10</option>
                                            </select>
                                        </p>
                                       
                                     </div>
                                     <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href=><?php echo $cat_name; ?></a></li>
                                        </ul>
                                     </div>
                                 
                                    </div>
                                        <br>
                                    <div class="cr__btn">
                                            <a href="javascript:void(0)" onclick="manage_cart_function(<?php echo $product_id;?>,'add')">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">Description </a></li>
                        </ul>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <p><?php echo $pdt_desc;?></p>
                                    
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
     
        
 <?php require('footer.php');?>