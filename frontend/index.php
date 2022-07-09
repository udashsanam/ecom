<?php require('top.php');?>

        <div class="body__overlay"></div>

        <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>collection 2020</h2>
                                        <h1>New BEER</h1>
                                        <div class="cr__btn">
                                            <a href="cart.php">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.'/slider/fornt-img/beer.png'; ?>" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
       
               
            </div>
        </div>
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <?php   
                                    $data=get_product($con,3,'','');
                                    foreach($data as $list)
                                    {           // start of the for each loop
                            ?>
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product-details.php?id=<?php echo $list['id'];?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']; ?>" alt="product images">
                                        </a>
                                    </div>
                                  
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.html"><?php echo $list['name'];?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize" style="text-decoration: line-through;">$<?php echo $list['mrp']; ?></li>
                                            <li> $<?php echo $list['price']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    } // end of the foreach loop
                            ?>
                            <!-- End Single Category -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
        <!-- Start Product Area -->
        
        <!-- End Product Area -->

<?php require('footer.php');?>
      