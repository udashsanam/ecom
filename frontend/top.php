<?php
    require('connect.php');
    require('method.php');
    require('add_to_cart.inc.php');
    $sql="SELECT * FROM categories WHERE status= 1 order by categories asc ";
    $result=mysqli_query($con,$sql);
    $cat_arr=array();
    while($row=mysqli_fetch_assoc($result))
    {
        $cat_arr[]=$row;
    }

    $obj = new add_to_cart();
    $totalproduct=$obj->totalproduct();

?>



<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Jhigu Liquor Store</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">  
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
  
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.'logo/logo.png'; ?>" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php" style="color: black;">Home</a></li>
                 
                                        <li class="drop"><a href="#" style="color: black;">categories</a>
                                            <ul class="dropdown">
                                                <?php 
                                                foreach($cat_arr as $list)
                                                {  ?>
                                                    <li><a href="categories-detail.php?id=<?php echo $list['id'];?> && name=<?php echo $list['categories']?>"><?php echo $list['categories']; ?></a></li>
                                               <?php }?>
                                            </ul>
                                        </li>
                                        
                                        <li><a href="contact_us.php" style="color: black;">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                           
                                            <li><a href="#" style="color: black;">Catergories</a>
                                                <ul>
                                                <?php 
                                                foreach($cat_arr as $list)
                                                {  ?>
                                                    <li><a href="categories-detail.php" style="color: black;"><?php echo $list['categories']; ?></a></li>
                                               <?php }?>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html" style="color: black;">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <!-- <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div> -->
                                    <div class="header__account">
                                        <?php
                                                    if(isset($_SESSION['LOGIN']))
                                                    {
                                                        echo "<a href='logout.php' style='color:black;'>".$_SESSION['NAME']."</i></a>";
                                                    }
                                                    else
                                                    {
                                                        echo "<a href='login.php' style='color:black;'>Login/Register</i></a>";

                                                    }
                                        ?>
                                  
                                    </div>
                                    <div class="header__account">    
                                                <a href='my_order.php' style='color:black;'>My&nbspOrder</i></a>
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <a  href="cart.php"><i class="icon-handbag icons"></i></a>
                                        <a href="#"><span class="htc__qua"><?php echo $totalproduct; ?> </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
                <!-- Start Offset Wrapper -->
                <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <!-- <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="search.php" method="get">
                                    <input placeholder="Search here... " type="text" name="search">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->