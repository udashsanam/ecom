<?php 
        function get_product($con,$limit,$id,$cat_id)
        {
            $data=array();
            $sql="SELECT * FROM product  WHERE status=1 ";
          
           
            if($id!='')
            {
                $sql.="and id=$id ";
            }
            if($cat_id!='')
            {
                $sql.=" and categories_id='$cat_id' ";
            }
           
            $sql.="order by id asc ";
            if($limit!='')
            {
                $sql.="limit $limit ";
            }

            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                    $data[]=$row;
            }

            return $data;
        }

        function prx($arr)
        {
            echo '<pre>';
            print_r($arr);
            die();
        }
        function pr($arr)
        {
            echo '<pre>';
            print_r($arr);
            
        }
        function get_categories($con,$id)
        {
            $sql="SELECT * from categories ";
            $data=array();

            if($id!='')
            {
                $sql.="WHERE id='$id' ";
            }
          
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                    $data[]=$row;
            }
            

            return $data;
        }

        function get_safe_value($con,$arr)
        {
            if($arr!='')
            {
                $arr=trim($arr);
            }
            $value=mysqli_real_escape_string($con,$arr);

            return $value;
        }
        

        

?>

