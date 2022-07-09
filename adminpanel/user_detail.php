<?php

require('top.inc.php');
$id = $_GET['id'];
$sql = "SELECT * FROM users where id = $id ";
$res = mysqli_query($con, $sql);



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
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Date</th>
                                    
                                    

                                </tr>

                                <?php 
                                $sql = "SELECT * FROM users order by id desc";
                                $res = mysqli_query($con, $sql);

                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                        <td><?php echo $row['added_on']; ?></td>
                                       
                                     
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