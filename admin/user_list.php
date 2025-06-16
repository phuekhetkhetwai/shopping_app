<?php
session_start();
require_once "../config/common.php";
require_once "../_actions/user_action.php";

if(!$_SESSION["user"]){
    header("Location: login.php?auth=fail");
    exit();
}

$datas = allusers();

?>

<?php include "layout/header.php"; ?>
<!-- Start Content Area -->
<section style="margin-top: 50px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-9 ms-auto">
                        <a href="user_add.php" class="btn btn-success mb-3"><i class="fa-solid fa-plus me-2"></i>New User</a>
                        <div class="card">
                            <div class="card-body">
                                <table class="table tabel-striped table-bordered text-center">
                                    <tr>
                                        <th></th>
                                        <th>No.</th>
                                        <th style="width: 15%;">Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                    <?php foreach($datas as $idx=>$data): ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo ++$idx ?>.</td>
                                            <td><?php echo escape($data->name) ?></td>
                                            <td><?php echo escape($data->email) ?></td>
                                            <td><?php echo escape($data->address) ?></td>
                                            <td><?php echo escape($data->phone) ?></td>
                                            <td>
                                                <a href="../_actions/user_delete.php?id=<?php echo $data->id ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa-solid fa-trash-alt px-2"></i></a>  
                                            </td>

                                        </tr>
                                    <?php endforeach ?>    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content Area -->

    <!-- Start Footer Section -->
<?php include "layout/footer.php"; ?>