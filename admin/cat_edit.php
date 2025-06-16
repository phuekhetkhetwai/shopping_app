
<?php
session_start();
require_once "../config/common.php";
require_once "../_actions/category_action.php";

if(!$_SESSION["user"]){
    header("Location: login.php?auth=fail");
    exit();
}

$data = getcategory($_GET["id"]);

?>

<?php include "layout/header.php";?>
        <!-- Start Content Area -->
        <section style="margin-top: 50px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-9 ms-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3>Add Category</h3>
                            </div>
                            <div class="card-body">
                                <form action="../_actions/category_update.php" method="post" class="m-4 forms">
                                    <input type="hidden" name="_token" value="<?php echo  $_SESSION['_token'] ?>">
                                    <input type="hidden" name="id" value="<?php echo  $_GET['id'] ?>">
                                    <div class="form-group mb-3">
                                        <label for="name" class="mb-2">Name</label>
                                        <span class="small text-danger">* <?php echo isset($_SESSION["nameerr"]) ? $_SESSION["nameerr"] : "";unset($_SESSION["nameerr"]); ?></span>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name..." value="<?php echo $data->name; ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description" class="mb-2">Description</label>
                                        <span class="small text-danger">* <?php echo isset($_SESSION["descerr"]) ? $_SESSION["descerr"] : "";unset($_SESSION["descerr"]); ?></span>
                                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="description..."><?php echo $data->description; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <a href="category.php" class="btn btn-secondary me-2">Back</a>    
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content Area -->

    <!-- Start Footer Section -->
<?php include "layout/footer.php"; ?>