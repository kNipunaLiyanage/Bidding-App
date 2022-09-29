<!doctype html>
<html lang="en">


    <head>

        <meta charset="utf-8" />
        <title>Dashboard | SBIDU</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>
    <?php
    session_start();
    $institutename = $_SESSION["admin_id"];


    if (!(isset($institutename))) {
        header('Location:AdminLogin.php');
    } else {
        ?>

        <body data-sidebar="dark">

            <!-- <body data-layout="horizontal" data-topbar="colored"> -->

            <!-- Begin page -->
            <div id="layout-wrapper">


                <header id="page-topbar">
                    <div class="navbar-header">
                        <div class="d-flex">
                            <!-- LOGO -->
                            <div class="navbar-brand-box">
                                <a href="AdminHome.php" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="" alt="" height="60">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="" alt="" height="60">
                                    </span>
                                </a>

                                <a href="AdminHome.php" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="" alt="" height="60">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="" alt="" height="60">
                                    </span>
                                </a>
                            </div>

                            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                                <i class="mdi mdi-menu"></i>
                            </button>


                        </div>

                        <div class="d-flex">

                            <!-- App Search-->


                            <div class="dropdown d-none d-lg-inline-block">
                                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                    <i class="mdi mdi-fullscreen font-size-24"></i>
                                </button>
                            </div>




                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="assets/images/users/user-4.jpg"
                                         alt="Header Avatar">
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="AdminLogin.php"><i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i> Logout</a>
                                </div>
                            </div>








                        </div>
                    </div>
                </header>
                <!-- ========== Left Sidebar Start ========== -->
                <?php
                include './leftsidebar.php';
                ?>
                <!-- Left Sidebar End -->



                <!-- ============================================================== -->
                <!-- Start right Content here -->
                <!-- ============================================================== -->
                <div class="main-content">
                    <div class="page-content">
                        <div class="container-fluid">

                            <!-- start page title -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="page-title-box">
                                        <h4>Dashboard</h4>
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">IConic handcrafters</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <?php
                                    $totalsell = 0;
                                    $totalsell2 = 0;
                                    $totdeliverysell = 0;
                                    include '../phpfiles/DB.php';
                                    $sqlzy345 = "SELECT * FROM adminvalut";
                                    $query45 = $conn->query($sqlzy345);
                                    foreach ($query45 as $value45) {

                                        $costofyou = $value45['yourcost'];
                                        $costofitem = $value45['itemselledcost'];
                                        $costofdelivery = $value45['deliverycost'];
                                        $float_value_of_cost = floatval($costofyou);
                                        $float_value_of_deliver = floatval($costofdelivery);
                                        $float_value_of_item = floatval($costofitem);
                                        $totalsell = $totalsell + $float_value_of_cost;
                                        $totalsell2 = $totalsell2 + $float_value_of_item;
                                        $totdeliverysell = $totdeliverysell + $float_value_of_deliver;
                                    }
                                    ?>
                                    <div class="state-information d-none d-sm-block">
                                        <div class="state-graph">
                                            <div id="header-chart-1"></div>
                                            <div class="info">Earned LKR <?php echo $totalsell; ?>/=</div>
                                        </div>

                                        <?php
                                        $sqlz = "SELECT count(*) as total from sellerpostitem";
                                        $countz;
                                        $result = $conn->query($sqlz);

                                        if ($result->num_rows > 0) {

                                            if ($row = $result->fetch_assoc()) {
                                                $countz = $row["total"];
                                                ;
                                            }
                                        }
                                        ?>
                                        <div class="state-graph">
                                            <div id="header-chart-2"></div>
                                            <div class="info"> Total <?php echo $countz; ?> Items</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->

                            <div class="row">
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card mini-stat bg-primary">
                                        <div class="card-body mini-stat-img">
                                            <div class="mini-stat-icon">
                                                <i class="mdi mdi-cube-outline float-end"></i>
                                            </div>
                                            <div class="text-white">
                                                <?php
                                                include '../phpfiles/DB.php';
                                                $sqlz2 = "SELECT count(*) as total from orderdetails";
                                                $countz2;
                                                $result2 = $conn->query($sqlz2);

                                                if ($result2->num_rows > 0) {

                                                    if ($row2 = $result2->fetch_assoc()) {
                                                        $countz2 = $row2["total"];
                                                    }
                                                }
                                                ?>
                                                <h6 class="text-uppercase mb-3 font-size-16 text-white">Orders</h6>
                                                <h2 class="mb-4 text-white"><?php echo $countz2; ?></h2>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card mini-stat bg-primary">
                                        <div class="card-body mini-stat-img">
                                            <div class="mini-stat-icon">
                                                <i class="mdi mdi-buffer float-end"></i>
                                            </div>
                                            <div class="text-white">
                                                <h6 class="text-uppercase mb-3 font-size-16 text-white">Transactions</h6>
                                                <h2 class="mb-4 text-white"> LKR  <?php echo $totalsell2; ?></h2>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card mini-stat bg-primary">
                                        <div class="card-body mini-stat-img">
                                            <div class="mini-stat-icon">
                                                <i class="mdi mdi-tag-text-outline float-end"></i>
                                            </div>
                                            <div class="text-white">
                                                <h6 class="text-uppercase mb-3 font-size-16 text-white">Delivery Costs</h6>
                                                <h2 class="mb-4 text-white">LKR <?php echo $totdeliverysell; ?></h2>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card mini-stat bg-primary">
                                        <div class="card-body mini-stat-img">
                                            <div class="mini-stat-icon">
                                                <i class="mdi mdi-briefcase-check float-end"></i>
                                            </div>
                                            <div class="text-white">
                                                <?php
                                                include '../phpfiles/DB.php';
                                                $sqlz2e = "SELECT count(*) as total from sellerpostitem";
                                                $countz2e;
                                                $result2e = $conn->query($sqlz2e);

                                                if ($result2e->num_rows > 0) {

                                                    if ($row2e = $result2e->fetch_assoc()) {
                                                        $countz2e = $row2e["total"];
                                                    }
                                                }
                                                ?>
                                                <h6 class="text-uppercase mb-3 font-size-16 text-white">Posted Items</h6>
                                                <h2 class="mb-4 text-white"><?php echo $countz2e; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->


                            <!-- end row -->


                            <!-- end row -->

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Latest User Details</h4>

                                            <div class="table-responsive">
                                                <table class="table align-middle table-centered table-vertical table-nowrap">

                                                    <tbody>

                                                        <?php
                                                        include '../phpfiles/DB.php';





                                                        // $sqlzy34 = "SELECT * FROM userdetails where userstatus='Pending' ORDER BY id DESC";
                                                        $sqlzy34 = "SELECT * FROM userdetails  ORDER BY id DESC ";
                                                        $query4 = $conn->query($sqlzy34);
                                                        $increz = 0;
                                                        foreach ($query4 as $value4) {
                                                            $usertype = $value4['usertype'];
                                                            ?>
                                                            <tr>
                                                                <?php
                                                                if ($usertype == "Buyer") {
                                                                    ?>
                                                                    <td>
                                                                        <img src="../customicons/customer.png" alt="user-image" class="avatar-xs rounded-circle me-2" /> <?php echo $value4['nameinfull']; ?>
                                                                    </td>
                                                                    <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Buyer</td>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <td>
                                                                        <img src="../customicons/seller.png" alt="user-image" class="avatar-xs rounded-circle me-2" /> <?php echo $value4['nameinfull']; ?>
                                                                    </td>
                                                                    <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Seller</td>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <td><?php echo $value4['addressz']; ?></td>
                                                                <td>
                                                                    <?php echo $value4['cityz']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value4['contactnumber']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value4['emailz']; ?>
                                                                </td>

                                                                <td>
                                                                    <button type="button" onclick="DeleteUserRequest(<?php echo $value4['id']; ?>)" class="btn btn-danger waves-effect waves-light">Remove</button>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- end row -->


                        </div>
                        <!-- container-fluid -->
                    </div>
                    <!-- End Page-content -->

                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="mt-5 text-center">

                                   © <script>document.write(new Date().getFullYear())</script> Iconic Handcrafters <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Nipuna Liyanage.</span>
                        
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>            
                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->

            <!-- Right Sidebar -->

            <!-- /Right-bar -->

            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>

            <!-- JAVASCRIPT -->
            <script src="assets/libs/jquery/jquery.min.js"></script>
            <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/libs/metismenu/metisMenu.min.js"></script>
            <script src="assets/libs/simplebar/simplebar.min.js"></script>
            <script src="assets/libs/node-waves/waves.min.js"></script>
            <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

            <!--Morris Chart-->
            <script src="assets/libs/morris.js/morris.min.js"></script>
            <script src="assets/libs/raphael/raphael.min.js"></script>

            <script src="assets/js/pages/dashboard.init.js"></script>
            <script src="assets/js/app.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
            <script type="text/javascript" src="../ScriptFiles/AdminHomeController.js"></script>

        </body>
        <?php
    }
    ?>

</html>