<!DOCTYPE html>
<html lang="en">



    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Sams and Sams - Home</title>

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


        <!--============= Banner Section Starts Here =============-->
        <section class="banner-section-2 bg_img" data-background="assets/images/banner/banner-bg-2.png">
            <div class="container">
                <div class="row align-items-center justify-content-between align-items-center">
                    <div class="col-lg-6 col-xl-6">
                        <div class="banner-content cl-white">

                            <h1 class="title"><span class="d-xl-block">Hot Deal</span> For You</h1>
                            <p>
                                We’re constantly bringing new properties market so keep visiting our website that you don’t miss out on the next opportunity.
                            </p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 d-none d-lg-block">
                        <div class="banner-thumb">
                            <img src="assets/images/banner/banner-2.png" alt="banner">
                        </div>
                    </div>                
                </div>
            </div>
            <div class="banner-shape-2 d-none d-lg-block">
                <img src="assets/css/img/banner-shape-2.png" alt="css">
            </div>
        </section>
        <!--============= Banner Section Ends Here =============-->


        <!--============= Hightlight Slider Section Starts Here =============-->
        <div class="browse-slider-section mt--140">
            <div class="container">
                <div class="section-header-2 mb-4">
                    <div class="left">
                        <h6 class="title cl-white cl-lg-black pl-0">Browse the highlights</h6>
                    </div>
                    <div class="slider-nav">
                        <a href="#0" class="bro-prev"><i class="flaticon-left-arrow"></i></a>
                        <a href="#0" class="bro-next active"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
                <div class="m--15">
                    <div class="browse-slider owl-theme owl-carousel">
                        <?php
                        include 'phpfiles/DB.php';
                        $sqlzy34 = "SELECT * FROM categories where status='Active'";
                        $query4 = $conn->query($sqlzy34);
                        $increz = 0;
                        foreach ($query4 as $value4) {
                            ?>
                            <a class="browse-item" onclick="loadSearch(<?php echo $value4['id']; ?>)">
                                <img src="phpfiles/<?php echo $value4['categoryimagefile']; ?>" alt="auction">
                                <span class="info" id="inz<?php echo $value4['id']; ?>"><?php echo $value4['categoryname']; ?></span>
                            </a>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!--============= Hightlight Slider Section Ends Here =============-->


        <!--============= Feture Auction Section Starts Here =============-->
        <section class="feature-auction-section padding-bottom padding-top bg_img" id="fff" data-background="assets/images/auction/featured/featured-bg-1.jpg">
            <div class="container">
                <div class="section-header">
                    <h2 class="title">Latest Items</h2>
                    <p>Bid and win great deals,Our auction process is simple, efficient, and transparent.</p>
                </div>
                <div class="row justify-content-center mb-30-none">


                    <?php
                    include 'phpfiles/DB.php';
                    $sqlzy347 = "SELECT * FROM sellerpostitem where status='Accept' ORDER BY id DESC LIMIT 3";
                    $query47 = $conn->query($sqlzy347);
                    $increz = 0;
                    foreach ($query47 as $value47) {
                        ?>


                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <div class="auction-item-2">
                                <div class="auction-thumb">
                                    <a href="#"><img src="phpfiles/<?php echo $value47['thumimgpath']; ?>" alt="jewelry"></a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="##"><?php echo $value47['proname']; ?></a>
                                    </h6>
                                    <div class="bid-area">
                                        <div class="bid-amount">
                                            <div class="icon">
                                                <i class="flaticon-auction"></i>
                                            </div>
                                            <div class="amount-content">
                                                <div class="current">Starting Price</div>
                                                <div class="amount">LKR <?php echo $value47['biddingleastprice']; ?></div>
                                            </div>
                                        </div>
                                        <div class="bid-amount">
                                            <div class="icon">
                                                <i class="flaticon-money"></i>
                                            </div>
                                            <div class="amount-content">
                                                <div class="current">District</div>
                                                <div class="amount"><?php echo $value47['districtz']; ?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button href="#0" class="custom-button" onclick="ViewSingleProduct(<?php echo $value47['id']; ?>)">Submit a bid</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
                <div class="load-wrapper">
                    <a href="#0" class="normal-button">See All Auction</a>
                </div>
            </div>
        </section>
        <!--============= Feture Auction Section Ends Here =============-->


        <!--============= Upcoming Auction Section Starts Here =============-->

        <!--============= Upcoming Auction Section Ends Here =============-->


        <!--============= How Section Starts Here =============-->
        <section class="how-video-section pos-rel">
            <div class="popular-bg bg_img" data-background="assets/images/auction/popular/popular-bg.png"></div>
            <div class="how-video-shape bg_img d-none d-md-block" data-background="assets/css/img/how-video.png"></div>
            <div class="container">

                <div class="how-wrapper section-bg shadow-style">
                    <div class="section-header text-lg-left">
                        <h2 class="title">How it works</h2>
                        <p>Easy 3 steps to win</p>
                    </div>
                    <div class="row justify-content-center mb--40">
                        <div class="col-md-6 col-lg-4">
                            <div class="how-item">
                                <div class="how-thumb">
                                    <img src="assets/images/how/how1.png" alt="how">
                                </div>
                                <div class="how-content">
                                    <h4 class="title">Sign Up</h4>
                                    <p>No Credit Card Required</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="how-item">
                                <div class="how-thumb">
                                    <img src="assets/images/how/how2.png" alt="how">
                                </div>
                                <div class="how-content">
                                    <h4 class="title">Bid</h4>
                                    <p>Bidding is free Only pay if you win</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="how-item">
                                <div class="how-thumb">
                                    <img src="assets/images/how/how3.png" alt="how">
                                </div>
                                <div class="how-content">
                                    <h4 class="title">Win</h4>
                                    <p>Fun - Excitement - Great deals</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--============= How Section Ends Here =============-->


        <!--============= Call In Section Starts Here =============-->
        <section class="call-in-section padding-top">
            <div class="container">
                <div class="call-wrapper cl-white bg_img" data-background="assets/images/call-in/call-bg.png">
                    <div class="section-header">
                        <h3 class="title">Register for Free & Start Bidding Now!</h3>
                        <p>From cars to diamonds to iPhones, we have it all.</p>
                    </div>
                    <a href="SignUpBuyer.php" class="custom-button white">Register</a>
                </div>
            </div>
        </section>
        <!--============= Call In Section Ends Here =============-->


        <!--============= Client Section Starts Here =============-->

        <!--============= Client Section Ends Here =============-->


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
        <script type="text/javascript" src="ScriptFiles/Auction_controller.js"></script>
        <script>
                                        function loadSearch(cc) {

                                            var itemid = cc;
                                            var catoz = $('#inz' + cc).html();
                                            var url = "SearchAuction.php?catotype=" + catoz;

                                            window.location = url;

                                        }

        </script>
    </body>


</html>