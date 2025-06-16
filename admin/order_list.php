<?php
session_start();
require_once "../config/common.php";
require_once "../_actions/order_action.php";

if(!$_SESSION["user"]){
    header("Location: login.php?auth=fail");
    exit();
}

$datas = allorders();

?>

<?php include "layout/header.php"; ?>
        <!-- Start Content Area -->
        <section style="margin-top: 50px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-9 ms-auto">
                        <a href="cat_add.php" class="btn btn-success mb-3"><i class="fa-solid fa-plus me-2"></i>New Category</a>
                        <div class="card">
                            <div class="card-body">
                                <table class="table tabel-striped table-bordered text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th style="width: 15%;">Name</th>
                                        <th>Total_price</th>
                                        <th>Order_date</th>
                                        <th>Action</th>

                                    </tr>
                                    <?php foreach($datas as $idx=>$data): ?>
                                        <tr>
                                            <td><?php echo ++$idx ?>.</td>
                                            <td><?php echo escape($data->name) ?></td>
                                            <td><?php echo escape($data->total_price) ?></td>
                                            <td><?php echo escape(date("d-m-Y",strtotime($data->order_date))) ?></td>
                                            <td>
                                                <a href="order_detail.php?id=<?php echo $data->id ?>" class="btn btn-outline-secondary">View</a>
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