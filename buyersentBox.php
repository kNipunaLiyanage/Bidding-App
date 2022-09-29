<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Sbidu - Buyer Sentbox</title>

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
        <!--============= Header Section Ends Here =============-->
        <?php
        if (!(isset($_SESSION["user_id"]))) {
            header('Location:SignIn.php');
        } else {
            ?>
            <!--============= Cart Section Starts Here =============-->

            <!--============= Cart Section Ends Here =============-->


            <!--============= Hero Section Starts Here =============-->
            <div class="hero-section style-2 pb-lg-400">
                <div class="container">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="#0">My Account</a>
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
                                        <a href="BuyerDashboard.php"><i class="flaticon-dashboard"></i>Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="buyermakeanPayment.php"><i class="flaticon-money"></i>Add Deposit Amount</a>
                                    </li>
                                    <li>
                                        <a href="BuyerChangepasswrod.php"><i class="flaticon-settings"></i>Personal Profile </a>
                                    </li>
                                    <li>
                                        <a href="buyerBiddedBids.php"><i class="flaticon-auction"></i>My Bids</a>
                                    </li>
                                    <li>
                                        <a href="buyerWinningBids.php"><i class="flaticon-best-seller"></i>Winning Bids</a>
                                    </li>
                                    <?php
                                    include 'phpfiles/DB.php';
                                    $sqlz = "SELECT count(*) as total FROM usergotnotificationfromseller where buyeremail='$emaillog' and stats='notread'";
                                    $result = $conn->query($sqlz);

                                    if ($result->num_rows > 0) {

                                        if ($row = $result->fetch_assoc()) {
                                            ?>
                                            <li>
                                                <a href="buyerNotification.php"><i class="flaticon-alarm"></i>My Alerts(<?php echo $row["total"]; ?>)</a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <li>
                                        <a href="Buyer_My_meetings.php"><i class="flaticon-alarm"></i>Meeting Details</a>
                                    </li>

                                    <?php
                                    include 'phpfiles/DB.php';
                                    $sqlz2 = "SELECT count(*) as total FROM messages_seller_to_buyer where buyeremail='$emaillog' and status='NotRead'";
                                    $result2 = $conn->query($sqlz2);

                                    if ($result2->num_rows > 0) {

                                        if ($row2 = $result2->fetch_assoc()) {
                                            ?>
                                            <li>

                                                <a href="buyerinbox.php"><i class="flaticon-alarm"></i>Message From Sellers(<?php echo $row2["total"]; ?>)</a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <li>
                                        <a href="buyersentBox.php"  class="active"><i class="flaticon-alarm"></i>Sent box</a>
                                    </li>
                                    <li>
                                        <a href="buyer_myorders.php"><i class="flaticon-star"></i>My Orders</a>
                                    </li>
                                    <li>
                                        <a href="BuyerAddnewRegistrationPayment.php"><i class="flaticon-star"></i>Make registration fee</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="dash-bid-item dashboard-widget mb-30">
                                <div class="header">
                                    <h4 class="title mw-100">My Sent Messages</h4>
                                </div>

                            </div>

                            <?php
                            include 'phpfiles/DB.php';

                            $sqlzy34 = "SELECT * FROM messages_buyer_to_seller where buyeremail='$emaillog' ORDER BY id DESC";
                            $query4 = $conn->query($sqlzy34);
                            $increz = 0;
                            foreach ($query4 as $value4) {
                                ?> 
                                <div class="dashboard-widget tab-content">
                                    <div class="alert-widget tab-pane show fade active" id="alerts">
                                        <ul>
                                            <li>

                                                <label for="check1">
                                                    <h6 class="title"><i class="flaticon-check text-warning"></i>&nbsp;&nbsp;To : <?php echo $value4['sellername']; ?> on <?php echo $value4['datez']; ?> at <?php echo $value4['timez']; ?> </h6>
                                                    <p><?php echo $value4['messagez']; ?> </p>


                                                </label>


                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <br>
                                <?php
                            }
                            ?>
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
                    <script type="text/javascript" src="ScriptFiles/bbinbox_controller.js"></script>
                    </body>


                    </html>