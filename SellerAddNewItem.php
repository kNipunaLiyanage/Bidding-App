<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Seller Add New Item</title>

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
                            <span>Add new bidding item</span>
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
                                        <a href="SellerAddNewItem.php"  class="active"><i class="flaticon-money"></i>Post New Item</a>
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
                                    <h5 class="title">Make a new Bidding Item</h5>
                                </div>
                                <div class="row justify-content-center mb-30-none">
                                    <form class="login-form" method="POST" action="phpfiles/Seller_post_item.php" enctype="multipart/form-data"  id="form">

                                        <p><i class="flaticon-check text-success"></i>&nbsp;&nbsp;&nbsp;&nbsp;You must add 4 images of Product</p>
                                        <p><i class="flaticon-check text-success"></i>&nbsp;&nbsp;&nbsp;&nbsp;You must provide least bidding amount</p>
                                        <p><i class="flaticon-check text-success"></i>&nbsp;&nbsp;&nbsp;&nbsp;You must tell how the buyer can check your items</p>
                                        <label for="login-email">Category Name</label>
                                        <div class="form-group mb-30">
                                            <select name="categoryiyem" class="form-control">
                                                <option>None</option>
                                                <?php
                                                include './phpfiles/DB.php';


                                                $sqlzy34 = "SELECT * FROM categories where status='Active'";
                                                $query4 = $conn->query($sqlzy34);

                                                foreach ($query4 as $value4) {
                                                    ?>
                                                    <option value="<?php echo $value4['categoryname']; ?>"><?php echo $value4['categoryname']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>


                                        <label for="login-email">Product  Name</label>
                                        <div class="form-group mb-30">
                                            <input type="text" id="proname" name="proname" class="form-control">
                                        </div>
                                        <label for="login-email">Bidding End Date</label>
                                        <div class="form-group mb-30">
                                            <input type="date"  name="biddingenddate" class="form-control">
                                        </div>
                                        <label for="login-email">Bidding End Time</label>
                                        <div class="form-group mb-30">
                                            <input type="time"    id="timeInput" name="biddingendtime" class="form-control">
                                        </div>
                                        <label for="login-email">Least Bidding Price(Enter by LKR)</label>
                                        <div class="form-group mb-30">
                                            <input type="text"  name="leastbiddingprice" class="form-control">
                                        </div>
                                        <label for="login-email">Contact Number</label>
                                        <div class="form-group mb-30">
                                            <input type="text"  name="contactz" class="form-control">
                                        </div>
                                        <label for="login-email">District</label>
                                        <div class="form-group mb-30">
                                            <input type="text"  name="district" class="form-control">
                                        </div>
                                        <label for="login-email">Address</label>
                                        <div class="form-group mb-30">
                                            <input type="text"  name="cityz" class="form-control">
                                        </div>
                                        <label for="login-email">Product Checking dates and time</label>
                                        <div class="form-group mb-30">
                                            <input type="text"  name="dateandtimeweekdays" placeholder="Week days" class="form-control">
                                        </div>
                                        <div class="form-group mb-30">
                                            <input type="text"  name="dateandtimeweekends" placeholder="Week Ends" class="form-control">
                                        </div>
                                        <label for="login-email">Complete Description of Product</label>
                                        <div class="form-group mb-30">
                                            <textarea   name="productdescription"  style="height: 300px;" class="form-control"></textarea>
                                        </div>

                                        <label for="login-email">Thumbnail Image</label>
                                        <div class="form-group mb-30">

                                            <input type='file' onchange="readURL(this);" accept="image/*" name="thumbimage"  placeholder="Thumbnail Image" class="form-control-file"/>
                                        </div>
                                        <div class="form-group mb-30">
                                            <img style="display: none;border: 2px solid black;width: 80px;height: 80px;" id="blah"  alt="Thumbnail Image" />   
                                        </div>
                                        <label for="login-email">Image 2</label>
                                        <div class="form-group mb-30">
                                            <input type='file' onchange="readURL2(this);" accept="image/*" name="imagez2" class="form-control-file"/>
                                        </div>
                                        <div class="form-group mb-30">
                                            <img style="display: none;border: 2px solid black;width: 80px;height: 80px;" id="blah2"  alt="Image 2" />   
                                        </div>

                                        <label for="login-email">Image 3</label>
                                        <div class="form-group mb-30">
                                            <input type='file' onchange="readURL3(this);" accept="image/*" name="imagez3" class="form-control-file"/>
                                        </div>
                                        <div class="form-group mb-30">
                                            <img style="display: none;border: 2px solid black;width: 80px;height: 80px;" id="blah3"  alt="Image 3" />   
                                        </div>
                                        <label for="login-email">Image 4</label>
                                        <div class="form-group mb-30">
                                            <input type='file' onchange="readURL4(this);" accept="image/*" name="imagez4" class="form-control-file"/>
                                        </div>
                                        <div class="form-group mb-30">
                                            <img style="display: none;border: 2px solid black;width: 80px;height: 80px;" id="blah4"  alt="Image 4" />   
                                        </div>
                                        <div class="form-group mb-0">
                                            <button type="submit" onclick="" class="custom-button">Make Request</button>
                                        </div>
                                    </form>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script>

                                            function readURL(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        $('#blah')
                                                                .attr('src', e.target.result)
                                                                .width(100)
                                                                .height(100);
                                                    };
                                                    reader.readAsDataURL(input.files[0]);
                                                    document.getElementById("blah").style.display = "block";
                                                }
                                            }
                                            function readURL2(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        $('#blah2')
                                                                .attr('src', e.target.result)
                                                                .width(100)
                                                                .height(100);
                                                    };
                                                    reader.readAsDataURL(input.files[0]);
                                                    document.getElementById("blah2").style.display = "block";
                                                }
                                            }
                                            function readURL3(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        $('#blah3')
                                                                .attr('src', e.target.result)
                                                                .width(100)
                                                                .height(100);
                                                    };
                                                    reader.readAsDataURL(input.files[0]);
                                                    document.getElementById("blah3").style.display = "block";
                                                }
                                            }
                                            function readURL4(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        $('#blah4')
                                                                .attr('src', e.target.result)
                                                                .width(100)
                                                                .height(100);
                                                    };
                                                    reader.readAsDataURL(input.files[0]);
                                                    document.getElementById("blah4").style.display = "block";
                                                }
                                            }

        </script>
        <script>
            $("#form").on('submit', (function(e) {


                e.preventDefault();
                $.ajax({
                    url: "phpfiles/Seller_post_item.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function()
                    {
                        //$("#preview").fadeOut();
                        //  $("#err").fadeOut();
                    },
                    success: function(data)
                    {

                        if (data == 'empty') {

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Please Fill All Details!'
                            });
                        } else if (data == 'ok') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Your Bidding item has send to admin aproovals....!',
                                showConfirmButton: true,
                                timer: 1500
                            });
                            window.location = "SellerAddNewItem.php";
                        }

                        else
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Some thing went wrong pleast complete all the requirements!'
                            });
                        }
                    },
                    error: function(e)
                    {
                        $("#err").html(e).fadeIn();
                    }
                });
            }));
            $("#form").bind('ajax:complete', function() {

                Swal.fire({
                    icon: 'success',
                    title: 'Your Bidding item has send to admin aproovals....!',
                    showConfirmButton: true,
                    timer: 1500
                });
            });
        </script>

    </body>


</html>