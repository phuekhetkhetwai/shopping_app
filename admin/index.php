<?php
    session_start();
    require_once "../config/common.php";
    require_once "../_actions/product_action.php";

    if(!$_SESSION["user"]){
        header("Location: login.php?auth=fail");
        exit();
    }

    $datas = allproducts();
?>
    <?php include "layout/header.php"; ?>
        <!-- Start Content Area -->
        <section style="margin-top: 50px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-9 ms-auto">
                        <a href="product_add.php" class="btn btn-success mb-3"><i class="fa-solid fa-plus me-2"></i>New Product</a>
                        <div class="card">
                            <div class="card-body">
                                <table class="table tabel-striped table-bordered">
                                    <tr>
                                        <th>No.</th>
                                        <th style="width: 15%;">name</th>
                                        <th>description</th>
                                        <th>category</th>
                                        <th>quantity</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                    <?php foreach($datas as $idx=>$data): ?>
                                        <tr>
                                            <td><?php echo ++$idx ?>.</td>
                                            <td><?php echo escape($data->name) ?></td>
                                            <td><?php echo strlen($data->description) > 100 ? escape(substr($data->description,0 , 100)) . " ..." : escape($data->description) ?></td>
                                            <td><?php echo escape($data->cat_name) ?></td>
                                            <td><?php echo escape($data->quantity) ?></td>
                                            <td><?php echo escape($data->price) ?></td>
                                            
                                            <td>
                                                <a href="product_edit.php?id=<?php echo $data->id ?>"><i class="fa-solid fa-pen"></i></a>
                                                <a href="../_actions/product_delete.php?id=<?php echo $data->id ?>" class="text-danger ms-3" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa-solid fa-trash-alt"></i></a>

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