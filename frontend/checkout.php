<?php
require('top.php');
$total_price=0;
if ((!isset($_SESSION['cart'])) || count($_SESSION['cart']) == 0) { ?>
    <script>
        window.location.href = "index.php";
    </script>
<?php }
  
    foreach ($_SESSION['cart'] as $key => $val)
    {
        $product_id = $key;
        $product_arr = get_product($con, '', $product_id, '');
        $price = $product_arr['0']['price'];
        $qty = $val['qty'];
        $total_price += $price * $qty;
    }
      

if(isset($_POST['submit']))
{
        $area=get_safe_value($con,$_POST['area']);
        $street=get_safe_value($con,$_POST['street']);
        $city=get_safe_value($con,$_POST['city']);
        $payment_type=get_safe_value($con,$_POST['payment_type']);
        $user_id=$_SESSION['ID'];
        $total=$total_price;
        $payment_status='pending';
        $ordr_id=mysqli_insert_id($con);
        if($payment_type=='COD')
        {
            $payment_status='success'; // it is on the basis of cash on delivery 
        }
        else{
            ?>
            <script>
                window.location.href="esewa.php?";
            </script>

            <?php
        }

        
        $order_status=1;
        $added_on=date('y-m-d h:i:s');

        $sql="INSERT INTO order1 (user_id,address,city,payment_type,total_price,order_status,payment_status,added_on) VALUES ('$user_id','$street','$city','$payment_type','$total','$order_status','$payment_status','$added_on') ";
        mysqli_query($con,$sql);

        // retriving the order id to insert into order detail table

        $order_id=mysqli_insert_id($con);

        foreach ($_SESSION['cart'] as $key => $val)
        {
            $product_id = $key;
            $product_arr = get_product($con, '', $product_id, '');
            $price = $product_arr['0']['price'];
            $qty = $val['qty'];
            
            $sql="insert into order_detail (order_id,product_id,qty,price,added_on) values ('$order_id','$product_id','$qty','$price','$added_on')";
            mysqli_query($con,$sql);
        }
        unset($_SESSION['cart']);
 ?>
        <script>
        window.location.href = "thank_you.php";
    </script>
        
<?php
}



?>



<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <?php
                            $accrodin_class = 'accordion__title';
                            if (!isset($_SESSION['LOGIN'])) {
                                $accrodin_class = 'accordion__hide';
                            ?>
                                <div class="accordion__title">
                                    Checkout Method
                                </div>
                                <div class="accordion__body">
                                    <div class="accordion__body__form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <div class="col-xs-12">
                                                        <form id="login-form" method="post">
                                                            <div class="single-contact-form">
                                                                <div class="contact-box name">
                                                                    <input type="text" name="login_email" id="login_email" placeholder="Your Email*" style="width:100%">
                                                                </div>
                                                                <span class="field_error" id="login_email_error"> </span>
                                                            </div>
                                                            <div class="single-contact-form">
                                                                <div class="contact-box name">
                                                                    <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
                                                                </div>
                                                                <span class="field_error" id="login_password_error"> </span>
                                                            </div>

                                                            <div class="contact-btn">
                                                                <button type="button" onclick="user_login()" class="fv-btn">Login</button>
                                                            </div>
                                                        </form>
                                                        <div class="form-output login_msg">
                                                            <p class="form-messege field_error"></p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <div class="col-xs-12">
                                                        <form id="register-form" action="#" method="post">
                                                            <div class="single-contact-form">
                                                                <div class="contact-box name">
                                                                    <input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">
                                                                </div>
                                                                <span class="field_error" id="name_error"> </span>
                                                            </div>
                                                            <div class="single-contact-form">
                                                                <div class="contact-box name">
                                                                    <input type="text" name="email" id="email" placeholder="Your Email*" style="width:100%">
                                                                </div>
                                                                <span class="field_error" id="email_error"> </span>
                                                            </div>
                                                            <div class="single-contact-form">
                                                                <div class="contact-box name">
                                                                    <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" style="width:100%">
                                                                </div>
                                                                <span class="field_error" id="mobile_error"> </span>
                                                            </div>
                                                            <div class="single-contact-form">
                                                                <div class="contact-box name">
                                                                    <input type="password" name="password" id="password" placeholder="Your Password*" style="width:100%">
                                                                </div>
                                                                <span class="field_error" id="password_error"> </span>
                                                            </div>
                                                            <div class="contact-btn">
                                                                <button type="button" onclick="user_register()" class="fv-btn">Register</button>
                                                            </div>
                                                        </form>
                                                        <div class="form-output register_msg">
                                                            <p class="form-messege field_error"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            
                            <div class="<?php echo $accrodin_class; ?>">
                                Address Information and Payment method
                            </div>

                            <div class="accordion__body">
                                <div class="bilinfo">

                                    <div class="row">
                                        <form method="post">
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input type="text" placeholder="Street Address" name="street" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input type="text" placeholder="Area" name="area" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-input">
                                                <input type="text" placeholder="City/State" name="city" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-input">     
                                                COD <input type="radio" name="payment_type" value="COD" required> &nbsp &nbsp
                                                ESEWA <input type="radio" name="payment_type" value="esewa" required>
                                            </div>
                                        </div>
                                        <br> <br>
                                        <div class="single-method">
                                        &nbsp &nbsp <input type="submit" name="submit" class="submit_checkout" required>
                                        </div>
                                        </form>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <?php
                    $subtotal = 0;
                    $ordertotal = 0;
                    $tax = 0;
                    foreach ($_SESSION['cart'] as $key => $val) {
                        $product_id = $key;
                        $product_arr = get_product($con, '', $product_id, '');
                        $pname = $product_arr['0']['name'];
                        $price = $product_arr['0']['price'];
                        $image = $product_arr['0']['image'];
                        $qty = $val['qty']; ?>
                        <div class="order-details__item">
                            <div class="single-item">
                                <div class="single-item__thumb">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $image; ?>" alt="ordered item">
                                </div>
                                <div class="single-item__content">
                                    <a href="product-details.php?id=<?php echo $key; ?>"><?php echo $pname; ?></a>
                                    <span class="price"><?php echo $price * $qty; ?></span>
                                </div>
                                <div class="single-item__remove">
                                    <a href="javascript:void(0)" onclick="manage_cart_function(<?php echo $key; ?>,'checkout_remove')"><i class="zmdi zmdi-delete"></i></a>
                                </div>
                            </div>

                        </div>
                    <?php $subtotal += $price * $qty;
                        $tax += ($price * $qty) * 0.13;
                        $ordertotal += $subtotal + $tax;
                    }   ?>
                    <div class="order-details__count">
                        <div class="order-details__count__single">
                            <h5>sub total</h5>
                            <span class="price">$<?php echo $subtotal; ?></span>
                        </div>
                        <div class="order-details__count__single">
                            <h5>Tax</h5>
                            <span class="price">$<?php echo $tax; ?></span>
                        </div>
                    </div>
                    <div class="ordre-details__total">
                        <h5>Order total</h5>
                        <span class="price">$<?php echo $ordertotal; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->

<?php
require('footer.php');


?>