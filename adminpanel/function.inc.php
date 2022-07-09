<?php
function pr($arr)
{
    echo '<pre>';
    print_r($arr);
}
function prx($arr)
{
    echo '<pre>';
    print_r($arr);
    die();
}
function get_safe_value($con,$str)
{   if($str!='')
    {
        $str=trim($str);
        return mysqli_real_escape_string($con,$str);
    }
   
}
function check_redundancy($con,$str)
    {
        
        $sql="SELECT * FROM categories WHERE id='$str'";
        $res=mysqli_query($con,$sql);
        $check=mysqli_num_rows($res);
        if($check>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }



?>