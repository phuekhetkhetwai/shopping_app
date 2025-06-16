<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- fav icon -->
    <link rel="icon" href="dist/img/fav/favicon.png" sizes="16x16">
    <!-- bootstrap css1 js1 -->
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <!-- fontawsome css1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- jquery ui css1 js1 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.1/themes/base/jquery-ui.min.css"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="dist/css/style.css">
</head>

<body>

    <!-- Start Navbar -->
    <div class="wrappers">
        <nav class="navbar navbar-expand-md navbar-light">
            <button type="button" class="navbar-toggler ms-auto mb-2" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="nav" class="">
                <div class="container-fluid">
                    <div class="row">
                        <!-- start left side bar -->
                        <div class="col-lg-2 col-md-3 fixed-top vh-100 overflow-auto leftsidebars">
                            <ul class="navbar-nav flex-column mt-4">

                                <li class="nav-item nav-categories">Main</li>
                                <li class="nav-item"><a href="index.php" class="nav-link text-white p-3 mb-2 sidebarlinks currents"><i class="fa-brands fa-product-hunt me-3"></i></i>Products</a></li>
                                <li class="nav-item"><a href="category.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fa-solid fa-list me-3"></i></i>Categories</a></li>
                                <li class="nav-item"><a href="user_list.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fa-solid fa-users me-3"></i>Users</a></li>
                                <li class="nav-item"><a href="order_list.php" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fa-solid fa-table me-3"></i>Orders</a></li>

                            </ul>
                        </div>

                        <!-- end left side bar -->

                        <!-- start top side bar -->

                        <div class="col-lg-10 col-md-9 fixed-top ms-auto topnavbars">
                            <div class="row">
                                <div class="navbar navbar-expand navbar-light bg-white shadow">
                                    <?php
                                        $link = $_SERVER["PHP_SELF"];
                                        $link_arr = explode("/",$link);
                                        $page = end($link_arr);
                                    ?>
                                    <!-- start quick search -->
                                    <form action="<?php echo $page ?>" method="POST" class="me-auto">
                                        <input type="hidden" name="_token" value="<?php echo  $_SESSION['_token'] ?>">

                                        <div class="input-group">
                                            <input type="text" name="search" id="search"
                                                class="form-control border-0 shadow-none"
                                                placeholder="Search Something...">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa-solid fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- end quick search -->

                                    <!-- start notify & user account -->
                                    <ul class="navbar-nav me-5">

                                        <!-- user account -->
                                        <li class="nav-item dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle"
                                                data-bs-toggle="dropdown">
                                                <span class="text-dark me-2">Admin</span>
                                                <img src="dist/img/user.png" class="rounded-circle" width="25"
                                                    alt="user1">
                                            </a>
                                            <div class="dropdown-menu">
                                                <a href="../_actions/logout.php
                                                " class="dropdown-item"><i class="fa-solid fa-arrow-right-from-bracket text-muted me-2"></i>Logout</a>
                                            </div>
                                        </li>
                                        <!-- user account -->

                                    </ul>
                                    <!-- end notify & user account -->

                                    <!-- start mobile close btn -->
                                    <button type="button" class="close-btns" data-bs-toggle="collapse"
                                        data-bs-target="#nav">
                                        <i class="fa-solid fa-times"></i>
                                    </button>
                                    <!-- end mobile close btn -->

                                </div>
                            </div>
                        </div>

                        <!-- end top side bar -->
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- End Navbar -->