<?php 
        // to manage cart 

require('add_to_cart.inc.php');
require('method.php');
require('connect.php');
$pid=get_safe_value($con,$_POST['pid']);
$qty=get_safe_value($con,$_POST['qty']);
$type=get_safe_value($con,$_POST['type']);
$obj = new add_to_cart();

if($type=='add')
{
    $obj->addproduct($pid,$qty);
}
if($type=='update')
{
    $obj->updateproduct($pid,$qty);
}
if($type=='remove'||$type=='checkout_remove')
{
    $obj->removeproduct($pid);
}
$count=$obj->totalproduct();
echo $count;

?>