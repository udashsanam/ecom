<?php 
require('connection.inc.php');
require('function.inc.php');
$msg='';
if(isset($_POST['submit']))
 {   $username= $_POST['username'];
    $fullname= $_POST['fullname'];
    $type= $_POST['type'];
    $password= $_POST['password'];
    $contact = $_POST['contact'];
    
     //getting all the username for checking username avaiability 
    $sql = "select username from admin_users where username = '$username' ";
    echo $sql;
    $row= array();
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($res);
    if($row==null)
    {
        $sql = " INSERT INTO admin_users(username,password,name,contact, type) VALUES ('$username', '$password','$fullname', '$contact' , '$type' ) ";
       mysqli_query($con,$sql);
        header('location:login.php');
        die();
        
    }
    else
    {
       $msg="User name Already exists ";
    }
   
    
     

}



?>
<!doctype html>
<html class="no-js" lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form method="POST">
                  <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Full Name" required>
                     </div>
                     

                     <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="username" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password"class="form-control" placeholder="Password" required>
                     </div>
                     <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="type" >
                            <option selected>Choose the type of user type</option>
                            <option value="master_user">Master</option>
                            <option value="order_handler"> Order handler </option>
                            <option value="comment_handler"> Comment handler</option>
                            <option value="product_handler">Product Handler </option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Contact</label>
                        <input type="number" name="contact" class="form-control" placeholder="Contact" required>
                     </div>
                     <button  style="background-color:red;" type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Register</button> <br> <br>
               </form>

             
               <div class="field_error"><?php echo $msg; ?></div>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>