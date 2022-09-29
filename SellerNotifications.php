<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Seller Notifications</title>

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
                                        <a href="SellerDashBoard.php" ><i class="flaticon-dashboard"></i>Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="SellerAddNewItem.php"><i class="flaticon-money"></i>Post New Item</a>
                                    </li>
                                    <li>
                                        <a href="SellerChangePassword.php"><i class="flaticon-settings"></i>Personal Profile </a>
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
                                                <a href="SellerNotifications.php" class="active"><i class="flaticon-alarm"></i>My Alerts(<?php echo $row["total"]; ?>)</a>
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
                        <div class="dash-bid-item dashboard-widget mb-30">
                            <div class="header">
                                <h4 class="title mw-100">My Notifications</h4>
                            </div>

                        </div>

                        <?php
                        include 'phpfiles/DB.php';

                        $sqlzy34 = "SELECT * FROM sellergotnotificationfromuser where selleremail='$emaillog' and statusz='notread'";
                        $query4 = $conn->query($sqlzy34);
                        $increz = 0;
                        foreach ($query4 as $value4) {
                            ?> 
                            <div class="dashboard-widget tab-content">
                                <div class="alert-widget tab-pane show fade active" id="alerts">
                                    <ul>
                                        <li>

                                            <label for="check1">
                                                <h6 class="title"><i class="flaticon-check text-warning"></i>&nbsp;&nbsp;Bid Notifications</h6>
                                                <p><?php echo $value4['notification']; ?></p>

                                                <table>
                                                    <tr>
                                                        <td> <button class="btn btn-sm btn-info" onclick="MessageRead(<?php echo $value4['id']; ?>)">Mark as read</button></td>

                                                    </tr>

                                                </table>
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

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script type="text/javascript" src="ScriptFiles/SellerNotificationController.js"></script>
                    </body>


                    </html>