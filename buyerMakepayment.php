<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Sbidu - Buyer Home Page</title>

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
                                    $itemid = $_SESSION["itemidloading"];

                                    $item_price = $_SESSION["itempriceloadingz"];
                                    $item_name = $_SESSION["itemnameloadingz"];
                                    $emaillog = $_SESSION["emailz"];
                                    $ename = $_SESSION["nameinfull"];
                                    ?>
                                    <h5 class="title"><a href="#0"><?php echo $ename; ?></a></h5>
                                    <span class="username"><a href="#" class="__cf_email__"><?php echo $emaillog; ?></a></span>
                                </div>
                            </div>
                            <ul class="dashboard-menu">
                                <li>
                                    <a href="BuyerDashboard.php" class="active"><i class="flaticon-dashboard"></i>Dashboard</a>
                                </li>
                                <li>
                                    <a href="buyermakeanPayment.php"><i class="flaticon-money"></i>Add Deposit Amount</a>
                                </li>
                                <li>
                                    <a href="#"><i class="flaticon-settings"></i>Personal Profile </a>
                                </li>
                                <li>
                                    <a href="#"><i class="flaticon-auction"></i>My Bids</a>
                                </li>
                                <li>
                                    <a href="#"><i class="flaticon-best-seller"></i>Winning Bids</a>
                                </li>
                                <li>
                                    <a href="buyerNotification.php"><i class="flaticon-alarm"></i>My Alerts</a>
                                </li>
                                <li>
                                    <a href="#"><i class="flaticon-star"></i>My Favorites</a>
                                </li>
                                <li>
                                    <a href="#"><i class="flaticon-shake-hand"></i>Referrals</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="dash-pro-item mb-30 dashboard-widget">
                                    <div class="header">
                                        <h4 class="title">Order Details</h4>
                                    </div>

                                    <div class="info-value"><i class="flaticon-check text-success"></i> Total will be calculate according to the deliver location you select.</div>
                                    <br>
                                    <ul class="dash-pro-body">
                                        <li>
                                            <div class="info-name">Product Name</div>
                                            <div class="info-value" id="product_name"><?php echo $item_name; ?></div>
                                        </li>
                                        <li>
                                            <div class="info-name">Price</div>
                                            <div class="info-value" id="itemcost"><?php echo $item_price; ?></div>
                                        </li>
                                        <li>
                                            <div class="info-name">Delivery Cost</div>
                                            <div class="info-value" id="costofdelivery"></div>
                                        </li>
                                        <li>
                                            <div class="info-name">Total</div>
                                            <div class="info-value" id="totalvalue"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="dash-pro-item mb-30 dashboard-widget">
                                    <div class="header">
                                        <h4 class="title">Personal Details</h4>
                                    </div>
                                    <ul class="dash-pro-body">
                                        <li>
                                            <div class="info-name">Name</div>
                                            <input type="text" class="form-control" id="recname" placeholder="Reveiver's Name"/>
                                        </li>
                                        <li>
                                            <div class="info-name">Contact</div>
                                            <input type="text" class="form-control" id="rectele" placeholder="Reveiver's Telephone Number"/>
                                        </li>
                                        <li>
                                            <div class="info-name">Address</div>
                                            <input type="text" class="form-control" id="recaddress" placeholder="Reveiver's Address"/>
                                        </li>
                                        <li>
                                            <div class="info-name">Select District</div>
                                            <select onchange="getCity()" id="valuesz" class="form-control">
                                                <option>Select</option>
                                                <?php
                                                include './phpfiles/DB.php';


                                                $sqlzy34 = "SELECT * FROM deliverycostfordistrict";
                                                $query4 = $conn->query($sqlzy34);

                                                foreach ($query4 as $value4) {
                                                    ?>

                                                    <option value="<?php echo $value4['districtname']; ?>" ><?php echo $value4['districtname']; ?></option>

                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="dash-pro-item mb-30 dashboard-widget">

                                    <img style="width: 100%;height: auto;" src="customicons/ggg3.png">
                                    <ul class="dash-pro-body">
                                        <li>
                                            <div class="info-name">Card No</div>
                                            <input type="text" class="form-control" id="crdno" placeholder="eg : XXXX-XXXX-XXXX-XXXX"/>
                                        </li>
                                        <li>
                                            <div class="info-name">Expiry Date</div>
                                            <input type="text" class="form-control" id="expdate" placeholder="mm/yy"/>
                                        </li>
                                        <li>
                                            <div class="info-name">CVN</div>
                                            <input type="text" class="form-control" id="cvn" placeholder="Number Behind the card"/>
                                        </li>
                                        <li>
                                            <button class="btn btn-sm btn-info" onclick="Makepayment(<?php echo $itemid; ?>)">Pay</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 



        <script>


                                                function getCity() {

                                                    var getval = document.getElementById('valuesz').value;

                                                    $.post("phpfiles/loaddeliverycost.php",
                                                            {
                                                                cityname: getval

                                                            },
                                                    function(data, status) {


                                                        $("#costofdelivery").html(data);
                                                        var itemcost = $("#itemcost").html();
                                                        var totz = parseFloat(itemcost) + parseFloat(data);
                                                        $("#totalvalue").html(totz);




                                                    });


                                                }



        </script>
        <script type="text/javascript" src="ScriptFiles/buyermakepayment_controller.js"></script>
    </body>


</html>