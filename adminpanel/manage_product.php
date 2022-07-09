<?php

require('top.inc.php');


$msg = '';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc='';
$description='';
$meta_title='';
$meta_desc='';
$meta_keyword='';
$selected='';
$image_required="required";

if (isset($_GET['type']) || $_GET['id'] != '') 
{
    $type = get_safe_value($con, $_GET['type']);
    // add block
    if ($_GET['type'] == 'add') 
    {

        if (isset($_POST['submit'])) 
        {
            $categories_id=get_safe_value($con,$_POST['categories']); // retriving value using post method
            
            if($_FILES['image']['type']!='' && $_FILES['image']['type']!='image/png'||$_FILES['image']['type']!='image/jpg'|| $_FILES['image']['type']!='image/jpeg')
            {
                $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image); 
            }
            else
            {
                $msg="please Select only jpeg or png or jpg formate image";
        
            }
           
            $name=get_safe_value($con,$_POST['name']);
            $mrp=get_safe_value($con,$_POST['mrp']);
            $price=get_safe_value($con,$_POST['price']);
            $qty=get_safe_value($con,$_POST['qty']);
            $short_desc=get_safe_value($con,$_POST['short_desc']);
            $description=get_safe_value($con,$_POST['description']);
            $meta_title=get_safe_value($con,$_POST['meta_title']);
            $meta_desc=get_safe_value($con,$_POST['meta_desc']);
            $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
            // checking the redundancy of the same name product
            $sql="SELECT * FROM product WHERE name='$name';";
            $res=mysqli_query($con,$sql);
            $check=mysqli_num_rows($res);
            if($check>0)
            {
                $msg="Product Already Exists";
                
            }
            else if($msg=='')
            {
              
                //   adding into database
               $sql = "INSERT INTO product  (categories_id,name,mrp,price,qty,image,short_desc,description,meta_title,meta_desc,meta_keyword,status)VALUES ('$categories_id','$name','$mrp','$price','$qty','$image','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1)";
               mysqli_query($con, $sql);
               header('location:product_master.php');
               die();
            }
          
        }
    }
    // edit block
    if ($type == 'edit') 
    {   
       $id=get_safe_value($con,$_GET['id']);
       $sql="SELECT * FROM product WHERE id='$id'";
       $res=mysqli_query($con,$sql);
       $check=mysqli_num_rows($res);
       if($check>0)
       {
            $row=mysqli_fetch_assoc($res);
            $name=$row['name'];
            $mrp=$row['mrp'];
            $price=$row['price'];
            $qty=$row['qty'];
            $short_desc=$row['short_desc'];
            $description=$row['description'];
            $meta_title=$row['meta_title'];
            $meta_desc=$row['meta_desc'];
            $meta_keyword=$row['meta_keyword'];
          
            if(isset($_POST['submit']))
            {
                $categories_id=get_safe_value($con,$_POST['categories']); // retriving value using post method
                $name=get_safe_value($con,$_POST['name']);
                $mrp=get_safe_value($con,$_POST['mrp']);
                $price=get_safe_value($con,$_POST['price']);
                $qty=get_safe_value($con,$_POST['qty']);
                $short_desc=get_safe_value($con,$_POST['short_desc']);
                $description=get_safe_value($con,$_POST['description']);
                $meta_title=get_safe_value($con,$_POST['meta_title']);
                $meta_desc=get_safe_value($con,$_POST['meta_desc']);
                $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
                $temp=$_FILES['image']['tmp_name'];
                if($temp!='')  // if image is added during update 
               {
                if($_FILES['image']['type']!='' && $_FILES['image']['type']!='image/png'||$_FILES['image']['type']!='image/jpg'|| $_FILES['image']['type']!='image/jpeg')
                {
                    // image validation 

                    $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image); 
                    
                }
                else
                {
                    $msg="please Select only jpeg or png or jpg formate image";
                
                }
                
               }
                // checking the redundancy of the same name product
                $sql="SELECT * FROM product WHERE name='$name';";
                $res=mysqli_query($con,$sql);
                $check=mysqli_num_rows($res);
                if ($check > 0) 
                {
                    if(isset($_GET['id'])&& $_GET['id']!='')
                    {
                        $getData=mysqli_fetch_assoc($res);
                        if($id==$getData['id'])
                        {
                                
                        }
                        else
                        {
                            $msg = " Product Already Exist";
                        }

                    }       
                    
                }
                 if($msg=='') 
                {
                   //   adding into database
                   $sql = "UPDATE product SET id='$id',categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',image='$image',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',status=1,meta_keyword='$meta_keyword' WHERE id='$id'";
                   mysqli_query($con,$sql);
                   header('location:product_master.php');
                   die();
                }
               
              
            }
          

            
            
       }
       else
       {
           header('location:product_master.php');
           die();
       }

    }
   
}
else 
{
    header('location:product_master.php');
    die();
}


?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header"><strong>Product</strong><small> Form</small></div>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Categories</label>
                                <select class=" form-control" name="categories" >
                                   
                                    <?php
                                        $sql="SELECT id,categories from categories order by categories asc ";
                                        $res=mysqli_query($con,$sql);
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            echo "<option value=".$row['id'].$selected.">".$row['categories']."</option>";
                                        }   
                                            
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label"> Product Name</label>
                                <input type="text"  placeholder="Enter Product Name" class="form-control" name="name" required value="<?php if($type='edit'){echo $name;} ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">MRP</label>
                                <input type="text" placeholder="Enter Marked Price" class="form-control" name="mrp" required value="<?php if($type='edit'){echo $mrp;} ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Selling Price</label>
                                <input type="text"  placeholder="Enter The price" class="form-control" name="price" required value="<?php if($type='edit'){echo $price;} ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">QTY</label>
                                <input type="text"  placeholder="Enter The Quantuty" class="form-control" name="qty" required value="<?php if($type='edit'){echo $qty;} ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Image</label>
                                <input type="file"  class="form-control" name="image" <?php if($type=='add'){echo $image_required;}?> >
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Short Description</label>
                                <textarea type="text"  placeholder="Please enter product short description" class="form-control" name="short_desc" required><?php echo $short_desc?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label"> Description</label>
                                <textarea type="text"  placeholder="Please Enter Product description" class="form-control" name="description" required><?php echo $description;?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label"> Meta Title</label>
                                <textarea type="text"  placeholder="Please Enter Meta Title" class="form-control" name="meta_title" ><?php echo $meta_title;?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label"> Meta Description</label>
                                <textarea type="text"  placeholder="Please Enter Meta description" class="form-control" name="meta_desc"><?php echo $meta_desc;?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label"> Meta Keyword</label>
                                <textarea type="text"  placeholder="Please Enter meta keyword" class="form-control" name="meta_keyword" required><?php echo $meta_keyword?></textarea>
                            </div>
                            


                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount" name="submit">Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg; ?></div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('footer.inc.php');


?>