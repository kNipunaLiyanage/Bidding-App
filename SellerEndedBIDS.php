<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Seller | Bids on auction</title>

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

            <!--============= Cart Section Ends Here =============-->


            <!--============= Hero Section Starts Here =============-->
            <div class="hero-section style-2 pb-lg-400">
                <div class="container">

                </div>
                <div class="bg_img hero-bg bottom_center" data-background="assets/images/banner/hero-bg.png"></div>
            </div>
            <!--============= Hero Section Ends Here =============-->


            <!--============= Dashboard Section Starts Here =============-->
            <section class="dashboard-section padding-bottom mt--240 mt-lg--440 pos-rel">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-7 col-lg-4">
                            <div class="dashboard-widget mb-30 mb-lg-0 sticky-menu">
                                <div class="user">
                                    <div class="thumb-area">
                                        <div class="thumb">
                                            <img src="assets/images/dashboard/user.png" alt="user">
                                        </div>
                                        <label for="profile-pic" class="profile-pic-edit"><i class="flaticon-pencil"></i></label>
                                        <input type="file" id="profile-pic" class="d-none">
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
                                        <a href="SellerEndedBIDS.php" class="active"><i class="flaticon-auction"></i>Ended BIDS</a>
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
                            <div class="dash-bid-item dashboard-widget mb-40-60">
                                <div class="header">
                                    <h4 class="title">My Ended Bids</h4>
                                    <span class="notify"><i class="flaticon-alarm"></i> Manage Notifications</span>
                                </div>

                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="upcoming">
                                    <div class="row mb-30-none justify-content-center">
                                        <?php
                                        include 'phpfiles/DB.php';



                                        $selleridload = $_SESSION["user_id"];
                                        $sellernameload = $_SESSION["nameinfull"];
                                        $selleremailload = $_SESSION["emailz"];


                                        $sqlzy34 = "SELECT * FROM sellerpostitem where sellerid='$selleridload' and status='END'";
                                        $query4 = $conn->query($sqlzy34);
                                        $increz = 0;
                                        foreach ($query4 as $value4) {
                                            ?>  
                                            <div class="col-sm-10 col-md-6">
                                                <div class="auction-item-2">
                                                    <div class="auction-thumb">
                                                        <a href="#"><img src="phpfiles/<?php echo $value4['thumimgpath']; ?>" alt="product"></a>
                                                        <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                                        <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                                    </div>
                                                    <div class="auction-content">
                                                        <h6 class="title">
                                                            <a href="#0"><?php echo $value4['proname']; ?></a>
                                                        </h6>
                                                        <div class="bid-area">
                                                            <div class="bid-amount">
                                                                <div class="icon">
                                                                    <i class="flaticon-auction"></i>
                                                                </div>
                                                                <div class="amount-content">
                                                                    <div class="current">Starting Price</div>
                                                                    <div class="amount">LKR <?php echo $value4['biddingleastprice']; ?></div>
                                                                </div>
                                                            </div>
                                                            <div class="bid-amount">
                                                                <div class="icon">
                                                                    <i class="flaticon-money"></i>
                                                                </div>
                                                                <div class="amount-content">
                                                                    <div class="current">District</div>
                                                                    <div class="amount"><?php echo $value4['districtz']; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="text-center">
                                                            <button  class="custom-button" onclick="ViewSingleProductSellerENDED(<?php echo $value4['id']; ?>)" >View Bidders</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>  



                                    </div>
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
        <script type="text/javascript" src="ScriptFiles/Seller_My_Items_controller.js"></script>
    </body>


</html>