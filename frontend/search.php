<?php require('top.php');

$name=mysqli_real_escape_string($con,$_GET['search']);
$sql="select * from product where name='$name' OR  description like '$name' ";
$result=mysqli_query($con,$sql);

$check=mysqli_num_rows($result);
if($check>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $data = $row;
    }
    
}


?>

        
    
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/33.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php echo $name;?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    
                        <div class="product__list clearfix mt--30">
                            <?php   
                                 if($check>0)
                                 {
                                    foreach($data as $list)
                                    {           // start of the for each loop
                            ?>
                            <!-- Start Single Category -->
                            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product-details.php?id=<?php echo $list['id'];?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.'product/'.$list['image']; ?>" alt="product images">
                                        </a>
                                    </div>
                                  
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.php?id=<?php echo $list['id']; ?>"><?php echo $list['name'];?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize" style="text-decoration: line-through;">$<?php echo $list['mrp']; ?></li>
                                            <li> $<?php echo $list['price']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }
                                 } else 
                                 {
                                     echo "<h4 style='color:red;'>This Categories Product doesnot exist</h4>";
                                 } // end of the foreach loop
                            ?>
                            <!-- End Single Category -->
                        </div>
                    </div>
                </div>
                            <!-- End Product View -->
                        </div>
                        
                    </div>
                    <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        
      
     
 <?php require('footer.php')?>