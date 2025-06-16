<?php
session_start();
require_once "../config/common.php";
require_once "../_actions/product_action.php";


if(!$_SESSION["user"]){
        header("Location: login.php?auth=fail");
        exit();
}

if(!isset($_GET["required"])){
    unset($_SESSION["datas"]);
}

$categories = allcategories();
$data = getproduct($_GET['id']);


?>

<?php include "layout/header.php";?>
        <!-- Start Content Area -->
        <section style="margin-top: 50px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-9 ms-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Product</h3>
                            </div>
                            <div class="card-body">
                                <form action="../_actions/product_update.php" method="post" class="m-4 forms" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="<?php echo  $_SESSION['_token'] ?>">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                    <div class="form-group mb-3">
                                        <label for="name" class="mb-2">Name</label>
                                        <span class="small text-danger">* <?php echo isset($_SESSION["nameerr"]) ? $_SESSION["nameerr"] : "";unset($_SESSION["nameerr"]); ?></span>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name..." value="<?php echo $data->name ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description" class="mb-2">Description</label>
                                        <span class="small text-danger">* <?php echo isset($_SESSION["descerr"]) ? $_SESSION["descerr"] : "";unset($_SESSION["descerr"]); ?></span>
                                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="description..."><?php echo $data->description ?></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="category" class="mb-2">Categories</label>
                                        <span class="small text-danger">* <?php echo isset($_SESSION["cat_iderr"]) ? $_SESSION["cat_iderr"] : "";unset($_SESSION["cat_iderr"]); ?></span>
                                        <select name="category_id" id="category" class="form-control">
                                            <option selected disabled>Choose Category</option>
                                            <?php foreach($categories as $category): ?>
                                                <option value="<?php echo $category->id ?>" <?php if($category->id == $data->category_id){ echo "selected"; } ?>><?php echo $category->name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="quant" class="mb-2">Quantity</label>
                                        <span class="small text-danger">* <?php echo isset($_SESSION["quanterr"]) ? $_SESSION["quanterr"] : "";unset($_SESSION["quanterr"]); ?></span>
                                        <input type="number" name="quantity" id="quant" class="form-control" placeholder="Quantity..." value="<?php echo $data->quantity ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="price" class="mb-2">Price</label>
                                        <span class="small text-danger">* <?php echo isset($_SESSION["priceerr"]) ? $_SESSION["priceerr"] : "";unset($_SESSION["priceerr"]); ?></span>
                                        <input type="number" name="price" id="price" class="form-control" placeholder="Price..." value="<?php echo $data->price ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="image" class="mb-2">Image</label>
                                        <span class="small text-danger">* <?php echo isset($_SESSION["imageerr"]) ? $_SESSION["imageerr"] : "";unset($_SESSION["imageerr"]); ?></span>
                                        <input type="file" name="image" id="image" class="form-control" placeholder="Image...">
                                    </div>
                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secondary me-2">Back</a>    
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