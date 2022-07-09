<?php
    require('connect.php');
    require('method.php');
    $name=get_safe_value($con,$_POST['name']);
    $email=get_safe_value($con,$_POST['email']);
    $mobile=get_safe_value($con,$_POST['mobile']);
    $password=get_safe_value($con,$_POST['password']);
    $added_on=date('y-m-d h:i:s');

$user_check=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email' "));

$result='';

if($user_check>0)
{
    echo "present";
}
else 
{
    mysqli_query($con,"insert into users (name,email,mobile,password,added_on) values ('$name','$email','$mobile','$password','$added_on')");
    echo "insert";
}

?>