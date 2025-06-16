<?php
session_start();
require_once "../config/common.php";
require_once "../_actions/order_action.php";

if(!$_SESSION["user"]){
    header("Location: login.php?auth=fail");
    exit();
}

$data = getorder($_GET["id"]);

?>

<?php include "layout/header.php"; ?>
        <!-- Start Content Area -->
        <section style="margin-top: 50px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-9 ms-auto">
                        <div class="row">
                                <div class="col-sm-4 col-md-6 card p-4 m-2 shadow">
                                    <div class="card-title">
                                        <h3>Order Detail</h3>
                                    </div>
                                    <div class="card-body ps-4">
                                        <span class="fw-bold me-2">1. Product Name -</span><span><?php echo $data->name ?></span>
                                        <hr>
                                        <span class="fw-bold me-2">2. Quantity -</span><span><?php echo $data->quantity ?></span>
                                        <hr>
                                        <span class="fw-bold me-2">3. Order_date -</span><span><?php echo $data->order_date ?></span>
                                    </div>
                                    <div class="card-footer pt-3">
                                        <a href="order_list.php" class="btn btn-secondary me-2">Back</a>    

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content Area -->

    <!-- Start Footer Section -->
<?php include "layout/footer.php"; ?>