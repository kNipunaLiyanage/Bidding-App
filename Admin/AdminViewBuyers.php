<!DOCTYPE html>
<html lang="en">


    <head>

        <meta charset="utf-8" />
        <title>Admin View Buyers</title>
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
    <?php
    session_start();
    $institutename = $_SESSION["admin_id"];


    if (!(isset($institutename))) {
        header('Location:AdminLogin.php');
    } else {
        ?>
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

                            <!-- App Search-->
                           


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
                </header> <!-- ========== Left Sidebar Start ========== -->
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
                                        <h4>Data Table</h4>
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sams And Sams</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Buyer</a></li>
                                            <li class="breadcrumb-item active">Buyer Requests</li>
                                        </ol>
                                    </div>
                                </div>

                            </div>
                            <!-- end page title -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <h4 class="card-title">Buyer Requests</h4>


                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Address</th>
                                                        <th>City</th>
                                                        <th>Contact</th>
                                                        <th>Email</th>
                                                        <th>Type</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    include '../phpfiles/DB.php';





                                                    $sqlzy34 = "SELECT * FROM userdetails where usertype='Buyer' and userstatus='Pending'";
                                                    $query4 = $conn->query($sqlzy34);
                                                    $increz = 0;
                                                    foreach ($query4 as $value4) {
                                                        $usertype = $value4['usertype'];
                                                        $usertnamez = $value4['emailz'];
                                                        $sqlzy345 = "SELECT * FROM userexpirydatedetails where useremail='$usertnamez'";
                                                        $query45 = $conn->query($sqlzy345);
                                                        foreach ($query45 as $value45) {

                                                            $daterem = $value45['datetorenew'];
                                                            date_default_timezone_set('Asia/Kolkata');
                                                            $datetime1 = new DateTime();
                                                            $datetime2 = new DateTime($daterem);
                                                            $interval = $datetime2->diff($datetime1);
                                                            $elapsed = $interval->format('%a days %h hours %i minutes');
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <img src="../customicons/customer.png" alt="user-image" class="avatar-xs rounded-circle me-2" /> <?php echo $value4['nameinfull']; ?>
                                                            </td>
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
                                                                <a class="btn btn-info" href="../phpfiles/<?php echo $value4['payemntproof']; ?>"> View Payment receipt</a>
                                                            </td>
                                                            <td>
                                                                <button type="button" onclick="AcceptUserRequest(<?php echo $value4['id']; ?>)" class="btn btn-success waves-effect waves-light">Accept</button>
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
                                <!-- end col -->
                            </div>
                            <!-- end row -->


                            <!-- end row -->

                        </div> <!-- container-fluid -->
                    </div>
                    <!-- End Page-content -->


                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    © <script>document.write(new Date().getFullYear())</script> Sams and Sams <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by FabFour.</span>
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
            <script type="text/javascript" src="../ScriptFiles/AdminHomeController.js"></script>
        </body>
        <?php
    }
    ?>

</html>