<?php
    session_start();
    require_once "../config/common.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            height: 100vh;
            background-color: #f4f4f4;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .forms {
            width: 500px;
            
        }

        .form-control::placeholder{
            font-size: 13px;
            color: #8b8b8b;
        }

        .links {
            font-size: 14px;
        }

        .links:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
        <div class="container" style="width: 600px;">
            <div class="card shadow py-3">
                <h3 class="text-center">Login Form</h3>
            <?php if(isset($_GET["required"])):?>
                <div class="alert alert-warning my-2 mx-3"><i class="fa-solid fa-warning"></i> Enter Email and Password</div>
            <?php elseif(isset($_GET["register"])):?>
                <div class="alert alert-warning my-2 mx-3"><i class="fa-solid fa-warning"></i>Your email not register.Please, sign in.</div>
            <?php elseif(isset($_GET["incorrect"])):?>
                <div class="alert alert-danger my-2 mx-3"><i class="fa-solid fa-warning "></i>Incorrect your password!!!</div>
            <?php endif ?>
            <div class="d-flex justify-content-center ">
                <form action="../_actions/login.php" method="post" class="m-4 forms">
                    <input type="hidden" name="_token" value="<?php echo $_SESSION['_token'] ?>">
                    <div class="form-group mb-3">
                        <label for="email" class="mb-2">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email...">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="mb-2">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password...">
                    </div>
                    <div class="form-group d-flex justify-content-end">    
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <a href="register.php" class="nav-link text-primary mb-2 links">Register with us</a>
                </form>
            </div>
            </div>
            
        </div>
    
    <script src="dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>