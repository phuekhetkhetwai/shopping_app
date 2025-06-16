<?php

session_start();
require_once "../config/common.php";

if(!$_SESSION["user"]){
    header("Location: login.php?auth=fail");
    exit();
    }

if(!isset($_GET["required"])){
    unset($_SESSION["datas"]);
}
?>

<?php include "layout/header.php";?>
        <!-- Start Content Area -->
        <section style="margin-top: 50px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-9 ms-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3>Add User</h3>
                            </div>
                            <div class="card-body">
                                <form action="../_actions/user_add.php" method="post" class="m-4 forms">
                                    <input type="hidden" name="_token" value="<?php echo  $_SESSION['_token'] ?>">
                                    <div class="form-group mb-3">
                                        <label for="name" class="mb-2">Name</label>
                                        <span class="small text-danger">* <?php echo isset($_SESSION["nameerr"]) ? $_SESSION["nameerr"] : "";unset($_SESSION["nameerr"]); ?></span>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name..." value="<?php echo isset($_SESSION["datas"]["name"]) ?  $_SESSION["datas"]["name"] : ""; ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description" class="mb-2">Email</label>
                                        <span class="small text-danger">* <?php echo isset($_SESSION["emailerr"]) ? $_SESSION["emailerr"] : "";unset($_SESSION["emailerr"]); ?></span>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email..." value="<?php echo isset($_SESSION["datas"]["email"]) ?  $_SESSION["datas"]["email"] : ""; ?>">
                                        
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description" class="mb-2">Password</label>
                                        <span class="small text-danger">* <?php echo isset($_SESSION["passerr"]) ? $_SESSION["passerr"] : "";unset($_SESSION["passerr"]); ?></span>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password..." value="<?php echo isset($_SESSION["datas"]["password"]) ?  $_SESSION["datas"]["password"] : ""; ?>">

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description" class="mb-2">Address</label>
                                        <span class="small text-danger">* <?php echo isset($_SESSION["adderr"]) ? $_SESSION["adderr"] : "";unset($_SESSION["adderr"]); ?></span>
                                        <textarea name="address" id="address" class="form-control" rows="5" placeholder="Address..."><?php echo isset($_SESSION["datas"]["address"]) ?  $_SESSION["datas"]["address"] : ""; ?></textarea>

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description" class="mb-2">Phone</label>
                                        <span class="small text-danger">* <?php echo isset($_SESSION["pherr"]) ? $_SESSION["pherr"] : "";unset($_SESSION["pherr"]); ?></span>
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone..." value="<?php echo isset($_SESSION["datas"]["phone"]) ?  $_SESSION["datas"]["phone"] : ""; ?>">
                                    </div>
                                    <div class="form-group">
                                        <a href="user_list.php" class="btn btn-secondary me-2">Back</a>    
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