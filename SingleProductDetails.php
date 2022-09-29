<!DOCTYPE html>
<html lang="en">



    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Singel product</title>

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
        <div class="hero-section style-2">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#0">Pages</a>
                    </li>
                    <li>
                        <span>Product single view</span>
                    </li>
                </ul>
            </div>
            <div class="bg_img hero-bg bottom_center" data-background="assets/images/banner/hero-bg.png"></div>
        </div>
        <!--============= Hero Section Ends Here =============-->
        <?php
        $itemid = $_GET["itemidz"];

        include './phpfiles/DB.php';

        $sqlzy34 = "SELECT * FROM sellerpostitem where id='$itemid'";
        $query4 = $conn->query($sqlzy34);
        $increz = 0;
        foreach ($query4 as $value4) {
            ?>

            <!--============= Product Details Section Starts Here =============-->
            <section class="product-details padding-bottom mt--240 mt-lg--440">
                <div class="container">
                    <div class="product-details-slider-top-wrapper">
                        <div class="product-details-slider owl-theme owl-carousel" id="sync1">
                            <div class="slide-top-item">
                                <div class="slide-inner">
                                    <img src="phpfiles/<?php echo $value4['thumimgpath']; ?>" alt="product">
                                </div>
                            </div>
                            <div class="slide-top-item">
                                <div class="slide-inner">
                                    <img src="phpfiles/<?php echo $value4['img2path']; ?>" alt="product">
                                </div>
                            </div>
                            <div class="slide-top-item">
                                <div class="slide-inner">
                                    <img src="phpfiles/<?php echo $value4['imag3path']; ?>" alt="product">
                                </div>
                            </div>
                            <div class="slide-top-item">
                                <div class="slide-inner">
                                    <img src="phpfiles/<?php echo $value4['img4path']; ?>" alt="product">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="product-details-slider-wrapper">
                        <div class="product-bottom-slider owl-theme owl-carousel" id="sync2">
                            <div class="slide-bottom-item">
                                <div class="slide-inner">
                                    <img src="phpfiles/<?php echo $value4['thumimgpath']; ?>" alt="product">
                                </div>
                            </div>
                            <div class="slide-bottom-item">
                                <div class="slide-inner">
                                    <img src="phpfiles/<?php echo $value4['img2path']; ?>" alt="product">
                                </div>
                            </div>
                            <div class="slide-bottom-item">
                                <div class="slide-inner">
                                    <img src="phpfiles/<?php echo $value4['imag3path']; ?>" alt="product">
                                </div>
                            </div>
                            <div class="slide-bottom-item">
                                <div class="slide-inner">
                                    <img src="phpfiles/<?php echo $value4['img4path']; ?>" alt="product">
                                </div>
                            </div>

                        </div>
                        <span class="det-prev det-nav">
                            <i class="fas fa-angle-left"></i>
                        </span>
                        <span class="det-next det-nav active">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </div>
                    <div class="row mt-40-60-80">
                        <div class="col-lg-8">
                            <div class="product-details-content">
                                <div class="product-details-header">
                                    <h2 class="title"><?php echo $value4['proname']; ?></h2>

                                </div>
                                <ul class="price-table mb-30">
                                    <li class="header">
                                        <h5 class="current">Bidding starting price</h5>
                                        <h3 class="price">LKR <?php echo $value4['biddingleastprice']; ?> /=</h3>
                                        <input id="itemprice" type="hidden" style="display: none;" value="<?php echo $value4['biddingleastprice']; ?>">
                                        <input id="itemnamez" type="hidden" style="display: none;" value="<?php echo $value4['proname']; ?>">
                                        <input id="seller_id" type="hidden" style="display: none;" value="<?php echo $value4['proname']; ?>">
                                        <input id="seller_email" type="hidden" style="display: none;" value="<?php echo $value4['proname']; ?>">
                                    </li>
                                    <?php
                                    


                                    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
                                        $tyz = $_SESSION['use_type'];
                                        if ($tyz === "Buyer") {
                                            ?>

                                            <li>
                                                <span class="details">Make an appointment with seller</span>
                                                <!--                                                <a href="#0" class="custom-button yellow btn-sm">Make appointment</a>-->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Make An Meeting </button>
                                            </li>
                                            <li>
                                                <span class="details">Message seller</span>
                                                <button href="#0" class="btn btn-primary" onclick="MessageSeller(<?php echo $value4['id']; ?>)">Message Seller</button>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>

                                <?php
                                if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
                                    $tyz = $_SESSION['use_type'];
                                    if ($tyz === "Buyer") {
                                        ?>
                                        <div class="product-bid-area">
                                            <form class="product-bid-form">
                                                <div class="search-icon">
                                                    <img src="assets/images/product/search-icon.png" alt="product">
                                                </div>
                                                <input type="text" id="buyerbidamount" placeholder="Enter you bid amount">
                                                <button type="button" class="custom-button" onclick="SubmitABidBuyer(<?php echo $value4['id']; ?>)">Submit a bid</button>
                                            </form>
                                        </div>

                                        <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="product-sidebar-area">
                                <div class="product-single-sidebar mb-3">
                                    <h6 class="title">This Auction Ends in:</h6>
                                    <p style="font-size: 15px;"><b>  <?php echo $value4['biddingenddate']; ?> at <?php echo $value4['biddingendtime']; ?></b> </p>
                                    
                                </div>
                                <a href="customicons/QUESTIONS.docx" class="cart-link">View Shipping, Payment & Auction Policies</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-tab-menu-area mb-40-60 mt-70-100">
                    <div class="container">
                        <ul class="product-tab-menu nav nav-tabs">
                            <li>
                                <a href="#details" class="active" data-toggle="tab">
                                    <div class="thumb">
                                        <img src="assets/images/product/tab1.png" alt="product">
                                    </div>
                                    <div class="content">Description</div>
                                </a>
                            </li>
                            <li>
                                <a href="#delevery" data-toggle="tab">
                                    <div class="thumb">
                                        <img src="assets/images/product/tab2.png" alt="product">
                                    </div>
                                    <div class="content">Delivery Options</div>
                                </a>
                            </li>
                            <li>
                                <a href="#history" data-toggle="tab">
                                    <div class="thumb">
                                        <img src="assets/images/product/tab3.png" alt="product">
                                    </div>
                                    <div class="content">Bid History</div>
                                </a>
                            </li>
                            <li>
                                <a href="#questions" data-toggle="tab">
                                    <div class="thumb">
                                        <img src="assets/images/product/tab4.png" alt="product">
                                    </div>
                                    <div class="content">Questions </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="details">
                            <div class="tab-details-content">
                                <div class="header-area">
                                    <h3 class="title"><?php echo $value4['proname']; ?></h3>
                                    <div class="item">
                                        <table class="product-info-table">
                                            <tbody>
                                                <tr>
                                                    <th>Seller Name</th>
                                                    <td id="selleridz" style="display: none;"><?php echo $value4['sellerid']; ?></td>
                                                    <td id="sellernamez"><?php echo $value4['sellername']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Seller Email</th>
                                                    <td id="selleremailz"><?php echo $value4['selleremail']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Bidding End Date</th>
                                                    <td><?php echo $value4['biddingenddate']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Bidding End Time</th>
                                                    <td><?php echo $value4['biddingendtime']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>District</th>
                                                    <td><?php echo $value4['districtz']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td><?php echo $value4['cityz']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Can check on week days</th>
                                                    <td><?php echo $value4['productcheckwd']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Can check on week ends</th>
                                                    <td><?php echo $value4['productcheckwe']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="item">
                                        <h5 class="subtitle">Description About Item</h5>
                                        <p><?php echo $value4['description']; ?></p>                                

                                    </div>
                                    <p><h5 class="subtitle"><i class="flaticon-check text-danger"></i> &nbspImportant Messages Read this carefully</h5></p>
                                   <div class="item">

                                        <p>BUYER is responsible for all  fees at time of pick-up and the condition of product. See above under IMPORTANT PICK-UP TIMES for specific requirements for this asset, but generally assets must be returned within 5 days after received.</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="delevery">
                            <div class="shipping-wrapper">
                                <div class="item">
                                    <h5 class="title">shipping</h5>
                                    <div class="table-wrapper">
                                        <table class="shipping-table">
                                            <thead>
                                                <tr>
                                                    <th>Available delivery methods </th>
                                                    <th>Online Payment</th>
                                                </tr>
                                            </thead>
                                            
                                        </table>
                                    </div>
                                </div>
                                <div class="item">
                                    <h5 class="title">Notes</h5>
                                    <p>Delivery chargers may be change according to the shipping address.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="history">
                            <div class="history-wrapper">
                                <div class="item">
                                    <h5 class="title">Bid History</h5>
                                    <div class="history-table-area">
                                        <table class="history-table">
                                            <thead>
                                                <tr>
                                                    <th>Bidder</th>
                                                    <th>date</th>
                                                    <th>time</th>
                                                    <th>unit price</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sqlzy345 = "SELECT * FROM itemhasabid where itemid='$itemid' and status='Active' ORDER BY bidamount DESC";
                                                $query45 = $conn->query($sqlzy345);
                                                foreach ($query45 as $value45) {
                                                    ?>
                                                    <tr>
                                                        <td data-history="bidder">
                                                            <div class="user-info">
                                                                <div class="thumb">
                                                                    <img src="customicons/customer.png" alt="Seller">
                                                                </div>
                                                                <div class="content">
                                                                    <?php echo $value45['buyername']; ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td data-history="date"><?php echo $value45['datez']; ?></td>
                                                        <td data-history="time"><?php echo $value45['timez']; ?></td>
                                                        <td data-history="unit price">LKR <?php echo $value45['bidamount']; ?> /=</td>
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
                </div>
            </div>
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Meeting Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Select:</label>
                                <select id="daysselect">
                                    <option>Week Days</option>
                                    <option>Week Ends</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Select Date</label>
                                <input class="form-control" id="message-date" type="date"/>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Type Your Message:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="ArrangeMeetingz()">Arrange Meeting</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <!--============= Product Details Section Ends Here =============-->


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
    <script type="text/javascript" src="ScriptFiles/Single_product_details_controller.js"></script>
</body>


</html>