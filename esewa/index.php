<?php
require('setting.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <title>Puchase Merchant</title>
</head>

<body>
    <div class="card" style="width: 400px;">
        <img src="esewa.jpg" alt="image" class="card-img-top">
        <div class="card-body">
            <div class="card-title">
                Purchase Merchantw
            </div>
            <div class="car-text">
                Use this merchat for your enjoy ment and many more
            </div>
            <form action="<?php echo $epay_url; ?>" method="POST">
                <input value="100" name="tAmt" type="hidden">
                <input value="90" name="amt" type="hidden">
                <input value="5" name="txAmt" type="hidden">
                <input value="2" name="psc" type="hidden">
                <input value="3" name="pdc" type="hidden">
                <input value="<?php $merchant_code; ?>" name="scd" type="hidden">
                <input value="<?php echo $pid?>" name="pid" type="hidden">
                <input value="<?php echo $success_url;?>" type="hidden" name="su">
                <input value="<?php echo $failed_url; ?>" type="hidden" name="fu">
                <input value="Pay with esewa" type="submit" class="btn-primary">
            </form>

        </div>
    </div>






    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>