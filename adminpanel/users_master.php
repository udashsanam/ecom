<?php

require('top.inc.php');
if (isset($_GET['type']) && ($_GET['id']) != '') 
{


    $type = get_safe_value($con, $_GET['type']);


    // delete block
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $update_status_sql = "DELETE FROM users WHERE id='$id'";
        mysqli_query($con, $update_status_sql);
    }
}
$sql = "SELECT * FROM users order by id desc";
$res = mysqli_query($con, $sql);



?>

<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">User Master </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">Serial_no</th>
                                    <th class="avatar">ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Date</th>
                                    
                                    <th>Action</th>

                                </tr>

                                <?php $serial = 1;
                                $sql = "SELECT * FROM users order by id desc";
                                $res = mysqli_query($con, $sql);

                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <td><?php echo $serial ?></td>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                        <td><?php echo $row['added_on']; ?></td>
                                       
                                        <td><?php
                                            echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "';>Delete</a>&nbsp </span>&nbsp";

                                            ?>
                                        </td>
                                    </tr>
                                <?php $serial++;
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