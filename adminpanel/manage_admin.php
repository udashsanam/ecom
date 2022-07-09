<?php 
require('top.inc.php');
if (isset($_GET['type']) && ($_GET['id']) != '') 
{


    $type = get_safe_value($con, $_GET['type']);


    // delete block
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $update_status_sql = "DELETE FROM admin_users WHERE id='$id'";
        mysqli_query($con, $update_status_sql);
    }
}


?>


<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">User Detail </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="avatar">ID</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Mobile</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                    
                                    

                                </tr>

                                <?php 
                                $sql = "SELECT * FROM admin_users order by id desc";
                                $res = mysqli_query($con, $sql);

                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['contact']; ?></td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td><?php
                                            echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "';>Delete</a>&nbsp </span>&nbsp";

                                            ?>
                                        </td>
                                       
                                     
                                    </tr>
                                <?php 
                                } ?>

                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php

require('footer.inc.php');
?>