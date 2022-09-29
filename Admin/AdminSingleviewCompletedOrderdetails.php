<!DOCTYPE html>
<html lang="en">



    <head>

        <meta charset="utf-8" />
        <title>Admin Single View Completed Order Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="AdminHome.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="../assets/images/logo/logo223.png" alt="" height="60">
                                </span>
                                <span class="logo-lg">
                                    <img src="../assets/images/logo/logo223.png" alt="" height="60">
                                </span>
                            </a>

                            <a href="AdminHome.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="../assets/images/logo/logo223.png" alt="" height="60">
                                </span>
                                <span class="logo-lg">
                                    <img src="../assets/images/logo/logo223.png" alt="" height="60">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>

                        
                    </div>

                    <div class="d-flex">

                     


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





                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="mdi mdi-spin mdi-cog"></i>
                            </button>
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

            <?php
            $itemid = $_GET["itemidz"];
            $orderid = $_GET["orderid"];

            include '../phpfiles/DB.php';

            $sqlzy34 = "SELECT * FROM sellerpostitem where id='$itemid'";
            $query4 = $conn->query($sqlzy34);
            $increz = 0;
            foreach ($query4 as $value4) {
                ?>
                <div class="main-content">

                    <div class="page-content">
                        <div class="container-fluid">


                            <!-- end row -->
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-3">

                                    <!-- Simple card -->
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="../phpfiles/<?php echo $value4['thumimgpath']; ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Card title</h4>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Thumbnail Image</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- end col -->
                                <div class="col-md-6 col-lg-6 col-xl-3">

                                    <!-- Simple card -->
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="../phpfiles/<?php echo $value4['img2path']; ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Card title</h4>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Image 2</a>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-6 col-xl-3">

                                    <!-- Simple card -->
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="../phpfiles/<?php echo $value4['imag3path']; ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Card title</h4>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Image 3</a>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-6 col-xl-3">

                                    <!-- Simple card -->
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="../phpfiles/<?php echo $value4['img4path']; ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Card title</h4>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Image 4</a>
                                        </div>
                                    </div>

                                </div>

                                <!-- end col -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <h4 class="card-title">Item Details</h4>


                                            <table id="datatable2" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>End Date</th>
                                                        <th>End Time</th>
                                                        <th>District</th>
                                                        <th>Address</th>
                                                        <th>Description</th>
                                                        <th>Week day Check</th>
                                                        <th>Week end check</th>
                                                        <th>Posted Date</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $value4['biddingenddate']; ?></td>
                                                        <td><?php echo $value4['biddingendtime']; ?></td>
                                                        <td><?php echo $value4['districtz']; ?></td>
                                                        <td><?php echo $value4['cityz']; ?></td>
                                                        <td><?php echo $value4['description']; ?></td>
                                                        <td><?php echo $value4['productcheckwd']; ?></td>
                                                        <td><?php echo $value4['productcheckwe']; ?></td>
                                                        <td><?php echo $value4['posteddate']; ?></td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                            $sqlzy345 = "SELECT * FROM orderdetails where oderid='$orderid'";
                                            $query45 = $conn->query($sqlzy345);
                                            foreach ($query45 as $value45) {
                                                ?>
                                                <h4 class="card-title">Order Details</h4>

                                                <p class="card-title-desc">Order Amount<p style="font-size: 15px;color: red;">LKR <?php echo $value45['itemcost']; ?>/=</p>
                                                <p class="card-title-desc">Seller Amount<p style="font-size: 15px;color: red;">LKR <?php echo $value45['selleramount']; ?>/=</p>
                                                <p class="card-title-desc">Your Amount<p style="font-size: 15px;color: red;">LKR <?php echo $value45['admincut']; ?>/=</p>
                                                <p class="card-title-desc">Delivery District<p style="font-size: 15px;color: red;"><?php echo $value45['deliverydistrict']; ?></p>
                                                <p class="card-title-desc">Delivery Cost<p style="font-size: 15px;color: red;">LKR <?php echo $value45['deliverycost']; ?>/=</p>


                                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Refference ID</th>
                                                            <th>Buyer Name</th>
                                                            <th>Buyer Email</th>
                                                            <th>Seller Name</th>
                                                            <th>Seller Email</th>
                                                            <th>Date</th>
                                                            <th>Time</th>
                                                            <th>Address</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>


                                                        <tr>
                                                            <td>ORD<?php echo $value45['orderidgenarated']; ?> </td>
                                                            <td><?php echo $value45['buyername']; ?> </td>
                                                            <td><?php echo $value45['buyeremail']; ?> </td>
                                                            <td><?php echo $value45['sellername']; ?> </td>
                                                            <td><?php echo $value45['selleremail']; ?> </td>
                                                            <td><?php echo $value45['datez']; ?></td>
                                                            <td><?php echo $value45['timez']; ?></td>
                                                            <td><?php echo $value45['deliveryaddreess']; ?></td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end col -->
                                </div>

                                <!-- end row -->

                            </div> <!-- container-fluid -->
                        </div>
                        <!-- End Page-content -->
                        <?php
                    }
                }
                ?>

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                © <script>document.write(new Date().getFullYear())</script> Lexa <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by FabFour.</span>
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

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script type="text/javascript" src="../ScriptFiles/Admin_pending_orders_controller.js"></script>


        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>


</html>