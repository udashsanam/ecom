<?php

require('top.inc.php');
$categories_value = '';
$msg = '';

if (isset($_GET['type']) || $_GET['id'] != '') 
{
    $type = get_safe_value($con, $_GET['type']);
    // add block
    if ($_GET['type'] == 'add') 
    {

        if (isset($_POST['submit'])) 
        {
            $categories = $_POST['categories']; // retriving value using post method
            $sql="SELECT * FROM categories WHERE categories='$categories';";
            $res=mysqli_query($con,$sql);
            $check=mysqli_num_rows($res);
            if($check>0)
            {
                $msg="Categories Already Exists";
                
            }
            else
            {
                         // adding into database
               $sql = "INSERT INTO categories (categories,status) VALUES ('$categories',1)";
               mysqli_query($con, $sql);
               header('location:categories.php');
               die();
            }
          
        }
    }
    // edit block
    if ($type == 'edit') 
    {
        $id = get_safe_value($con, $_GET['id']);   // retriving id of categories form get method 
        $sql = "SELECT * FROM categories WHERE id='$id'";
        $res = mysqli_query($con, $sql);
        $check = mysqli_num_rows($res);
        if ($check > 0) 
        {
            $row = mysqli_fetch_assoc($res);
            $categories_value = $row['categories']; // takeing value to display in the categories box 
            if (isset($_POST['submit'])) 
            {
                $categories = get_safe_value($con,$_POST['categories']); // retriving value using post method
                $sql="SELECT * FROM categories WHERE categories='$categories';";
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
                            $msg = " Categorie Already Exist";
                        }

                    }       
                    
                }
                 if($msg=='') 
                {
                    // adding into database
                    $sql = "UPDATE  categories SET categories='$categories' WHERE id='$id'";
                    mysqli_query($con, $sql);
                    header('location:categories.php');
                    die();
                }
            }
        } 
      
    }
}
else 
{
    header('location:categories.php');
    die();
}


?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                    <form method="POST">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Categories</label>
                                <input type="text" id="categories" placeholder="Enter Categories Name" class="form-control" name="categories" <?php if ($type == 'edit') { echo "value='$categories_value'";} ?>required>
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