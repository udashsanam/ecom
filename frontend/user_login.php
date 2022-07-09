<?php
    require('connect.php');
    require('method.php');
    $email=get_safe_value($con,$_POST['email']);
    $password=get_safe_value($con,$_POST['password']);
    $added_on=date('y-m-d h:i:s');

$user_check=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email' and password='$password' "));

$result=mysqli_query($con,"select * from users where email='$email' ");
if($user_check>0)
{
    $row=mysqli_fetch_assoc($result);
   echo "valid";
   $_SESSION['LOGIN']='yes';
   $_SESSION['ID']=$row['id'];
   $_SESSION['NAME']=$row['name'];

}
else 
{
    echo "invalid";
}



?>