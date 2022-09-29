<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Seller Change Password</title>

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/all.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/owl.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
        <link rel="stylesheet" href="assets/css/main.css">

        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    </head>

    <body>
        <!--============= ScrollToTop Section Starts Here =============-->
        <div class="overlayer" id="overlayer">
            <div class="loader">
                <div class="loader-inner"></div>
            </div>
        </div>
        <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
        <div class="overlay"></div>
        <!--============= ScrollToTop Section Ends Here =============-->


        <!--============= Header Section Starts Here =============-->
        <?php
        include './header.php';
        ?>
        <?php
        if (!(isset($_SESSION["user_id"]))) {
            header('Location:SignIn.php');
        } else {
            ?>
            <!--============= Header Section Ends Here =============-->

            <!--============= Cart Section Starts Here =============-->
            <div class="cart-sidebar-area">
                <div class="top-content">
                    <a href="index.php" class="logo">
                        <img src="assets/images/logo/logo223.png" alt="logo">
                    </a>
                    <span class="side-sidebar-close-btn"><i class="fas fa-times"></i></span>
                </div>

            </div>
            <!--============= Cart Section Ends Here =============-->


            <!--============= Hero Section Starts Here =============-->
            <div class="hero-section style-2 pb-lg-400">
                <div class="container">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="BuyerDashboard.php">My Account</a>
                        </li>
                        <li>
                            <span>Dashboard</span>
                        </li>
                    </ul>
                </div>
                <div class="bg_img hero-bg bottom_center" data-background="assets/images/banner/hero-bg.png"></div>
            </div>
            <!--============= Hero Section Ends Here =============-->


            <!--============= Dashboard Section Starts Here =============-->
            <section class="dashboard-section padding-bottom mt--240 mt-lg--325 pos-rel">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-7 col-lg-4">
                            <div class="dashboard-widget mb-30 mb-lg-0">
                                <div class="user">
                                    <div class="thumb-area">
                                        <div class="thumb">
                                            <img src="customicons/customer.png" alt="user">
                                        </div>
                                        <label for="profile-pic" class="profile-pic-edit"><i class="flaticon-pencil"></i></label>

                                    </div>
                                    <div class="content">
                                        <?php
                                        $emaillog = $_SESSION["emailz"];
                                        $ename = $_SESSION["nameinfull"];
                                        ?>
                                        <h5 class="title"><a href="#0"><?php echo $ename; ?></a></h5>
                                        <span class="username"><a href="#" class="__cf_email__"><?php echo $emaillog; ?></a></span>
                                    </div>
                                </div>
                                <ul class="dashboard-menu">
                                    <li>
                                        <a href="SellerDashBoard.php"><i class="flaticon-dashboard"></i>Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="SellerAddNewItem.php"><i class="flaticon-money"></i>Post New Item</a>
                                    </li>
                                    <li>
                                        <a href="SellerChangePassword.php"  class="active"><i class="flaticon-settings"></i>Personal Profile </a>
                                    </li>
                                    <li>
                                        <a href="Sellermyitems.php"><i class="flaticon-auction"></i>My Items on Auction</a>
                                    </li>
                                    <li>
                                        <a href="SellerEndedBIDS.php"><i class="flaticon-auction"></i>Ended BIDS</a>
                                    </li>
                                    <li>
                                        <a href="SellerMyOrders.php"><i class="flaticon-auction"></i>Completed Orders</a>
                                    </li>
                                    <li>
                                        <a href="Seller_View_meetings.php"><i class="flaticon-auction"></i>Meeting Request On Items</a>
                                    </li>
                                    <?php
                                    include 'phpfiles/DB.php';
                                    $sqlz = "SELECT count(*) as total FROM sellergotnotificationfromuser where selleremail='$emaillog' and statusz='notread'";
                                    $result = $conn->query($sqlz);

                                    if ($result->num_rows > 0) {

                                        if ($row = $result->fetch_assoc()) {
                                            ?>
                                            <li>
                                                <a href="SellerNotifications.php"><i class="flaticon-alarm"></i>My Alerts(<?php echo $row["total"]; ?>)</a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <?php
                                    include 'phpfiles/DB.php';
                                    $sqlz4 = "SELECT count(*) as total FROM messages_buyer_to_seller where selleremail='$emaillog' and statuz='NotRead'";
                                    $result4 = $conn->query($sqlz4);

                                    if ($result4->num_rows > 0) {

                                        if ($row4 = $result4->fetch_assoc()) {
                                            ?>
                                            <li>
                                                <a href="SellerInbox.php"><i class="flaticon-alarm"></i>My Inbox(<?php echo $row4["total"]; ?>)</a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <li>
                                        <a href="SellerAddRegistrationFee.php"><i class="flaticon-best-seller"></i>Make Registration Fee</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="dashboard-widget mb-40">
                                <div class="dashboard-title mb-30">
                                    <h5 class="title">My Activity</h5>
                                </div>
                                <div class="row justify-content-center mb-30-none">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="dashboard-item">
                                            <div class="thumb">
                                                <img src="assets/images/dashboard/01.png" alt="dashboard">
                                            </div>
                                            <?php
                                            include 'phpfiles/DB.php';
                                            $sqlzy3455 = "SELECT * FROM buyercurrentamountholding where buyeremail='$emaillog'";
                                            $query455 = $conn->query($sqlzy3455);
                                            $daterem = 0;
                                            foreach ($query455 as $value455) {

                                                $daterem = $value455['currentamount'];
                                                if ($daterem == "") {

                                                    $daterem = 0;
                                                }
                                            }
                                            ?>

                                            <div class="content">
                                                <h2 class="title"><span class="counter"> <?php echo $daterem; ?></span></h2>
                                                <h6 class="info">Your Vault</h6>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="dashboard-item">
                                            <div class="thumb">
                                                <img src="assets/images/dashboard/02.png" alt="dashboard">
                                            </div>
                                            <div class="content">
                                                <h2 class="title"><span class="counter">15</span></h2>
                                                <h6 class="info">Current Bids</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="dashboard-item">
                                            <div class="thumb">
                                                <img src="assets/images/dashboard/03.png" alt="dashboard">
                                            </div>
                                            <div class="content">
                                                <h2 class="title"><span class="counter">115</span></h2>
                                                <h6 class="info">Items Won</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    include 'phpfiles/DB.php';
                                    $sqlzy345 = "SELECT * FROM userexpirydatedetails where useremail='$emaillog'";
                                    $query45 = $conn->query($sqlzy345);
                                    foreach ($query45 as $value45) {

                                        $daterem = $value45['datetorenew'];
                                        date_default_timezone_set('Asia/Kolkata');
                                        $datetime1 = new DateTime();
                                        $datetime2 = new DateTime($daterem);
                                        $interval = $datetime2->diff($datetime1);
                                        $elapsed = $interval->format('%a days %h hours %i minutes');
                                        ?>
                                        <p><i class="flaticon-check text-success"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $elapsed ?> Remaining For Next Payment</p>
                                        <?php
                                    }
                                    ?>
                                    <br>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="dash-pro-item mb-30 dashboard-widget">
                                    <div class="header">
                                        <h4 class="title">Change password</h4>
                                    </div>
                                    <ul class="dash-pro-body">
                                        <li>
                                            <div class="info-name">Typer Current Passwords</div>
                                            <input type="text" class="form-control" id="curpassword" placeholder="Current Password"/>
                                        </li>
                                        <li>
                                            <div class="info-name">New Password</div>
                                            <input type="text" class="form-control" id="newpw" placeholder="New password"/>
                                        </li>
                                        <li>
                                            <div class="info-name">CVN</div>
                                            <input type="text" class="form-control" id="newpw2" placeholder="Confirm Password"/>
                                        </li>
                                        <li>
                                            <button class="btn btn-sm btn-info" onclick="changepw()">Change Password</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!--============= Dashboard Section Ends Here =============-->
            <?php
        }
        ?>

        <!--============= Footer Section Starts Here =============-->
        <?php
        include './footer.php';
        ?>
        <!--============= Footer Section Ends Here =============-->



        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/modernizr-3.6.0.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/waypoints.js"></script>
        <script src="assets/js/nice-select.js"></script>
        <script src="assets/js/counterup.min.js"></script>
        <script src="assets/js/owl.min.js"></script>
        <script src="assets/js/magnific-popup.min.js"></script>
        <script src="assets/js/yscountdown.min.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 

        <script type="text/javascript" src="ScriptFiles/Buyer_change_pw_controller.js"></script>
    </body>


</html>