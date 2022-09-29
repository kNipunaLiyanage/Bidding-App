<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Seller Sign Up</title>

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
        <div class="hero-section">
            <div class="container">

            </div>
            <div class="bg_img hero-bg bottom_center" data-background="assets/images/banner/hero-bg.png"></div>
        </div>
        <!--============= Hero Section Ends Here =============-->


        <!--============= Account Section Starts Here =============-->
        <section class="account-section padding-bottom">
            <div class="container">
                <div class="account-wrapper mt--100 mt-lg--440">
                    <div class="left-side">
                        <div class="section-header">
                            <h2 class="title">SIGN UP</h2>
                            <p>We're happy you're here as Seller!</p>
                            <p><i class="flaticon-check text-success"></i>&nbsp;&nbsp;&nbsp;&nbsp;You Can Pay Any of these bank and upload the payment slip here.</p>
                            <p><i class="flaticon-check text-success"></i>&nbsp;&nbsp;&nbsp;&nbsp;Please Pay Exact amount of registration fee.<b><a href="paymentDetails.php">View Our payment details</a></b></p>
                            <img src="customicons/logo_banks_srilanka.jpg">
                        </div>

                        <form class="login-form" class="login-form" action="phpfiles/create_account_Seller.php" enctype="multipart/form-data"  id="form">
                            <div class="form-group mb-30">
                                <label for="login-email"><i class="far fa-user"></i></label>
                                <input type="text" name="login-nameinfull" placeholder="Name in Full">
                            </div>
                            <div class="form-group mb-30">
                                <label for="login-email"><i class="far fa-address-book"></i></i></label>
                                <input type="text" name="login-address" placeholder="Address">
                            </div>
                            <div class="form-group mb-30">
                                <label for="login-email"><i class="far fa-id-badge"></i></label>
                                <input type="text" name="login-city" placeholder="City">
                            </div>
                            <div class="form-group mb-30">
                                <label for="login-email"><i class="fas fa-fax"></i></label>
                                <input type="text" name="login-contact" placeholder="Contact Number">
                            </div>
                            <div class="form-group mb-30">
                                <label for="login-email"><i class="far fa-envelope"></i></label>
                                <input type="text" name="login-email" placeholder="Email Address">
                            </div>
                            <div class="form-group mb-30">
                                <label for="login-pass"><i class="fas fa-lock"></i></label>
                                <input type="password" name="login-pass1" placeholder="Enter Password">
                                <span class="pass-type"><i class="fas fa-eye"></i></span>
                            </div>
                            <div class="form-group mb-30">
                                <label for="login-pass"><i class="fas fa-lock"></i></label>
                                <input type="password" name="login-pass2" placeholder="Confirm Password">
                                <span class="pass-type"><i class="fas fa-eye"></i></span>
                            </div>

                            <div class="form-group mb-30">
                                <label for="login-email">Select payment Slip</label>
                                <div class="form-group mb-30">

                                    <input type='file' onchange="readURL(this);" accept="image/*" name="thumbimage"  placeholder="Thumbnail Image"/>
                                </div>

                            </div>
                            <div class="form-group mb-30">




                                <img style="display: none;border: 2px solid black;" id="blah"  alt="Thumbnail Image" />   



                            </div>

                            <div class="form-group mb-0">
                                <button type="submit"   class="custom-button">Create Account</button>
                            </div>
                        </form>


                    </div>
                    <div class="right-side cl-white">
                        <div class="section-header mb-0">
                            <h3 class="title mt-0">ALREADY HAVE AN ACCOUNT?</h3>
                            <p>Log in and go to your Dashboard.</p>
                            <a href="SignIn.php" class="custom-button transparent">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--============= Account Section Ends Here =============-->


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
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                reader.onload = function(e) {
                                                    $('#blah')
                                                            .attr('src', e.target.result)
                                                            .width(500)
                                                            .height(300);
                                                };
                                                reader.readAsDataURL(input.files[0]);
                                                document.getElementById("blah").style.display = "block";
                                            }
                                        }
        </script>
        <script>
            $("#form").on('submit', (function(e) {


                e.preventDefault();
                $.ajax({
                    url: "phpfiles/create_account_Seller.php",
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

                            swal("Error", "Please Fill All feilds to continue...!", "error");
                        } else if (data == "notm") {
                            swal("oops!", "Passwords are not matched..!", "error");

                        } else if (data == "phone") {
                            swal("oops!", "Please enter 10 digit phone number.!", "error");
                        } else if (data == "al") {
                            swal("Error!", "This email is Already Registered...!", "error");
                        }

                        else
                        {
                            swal("Done! Your Account Pending in approvation by admin!", {
                                icon: "success",
                            });
                            window.location = "SignIn.php";
                        }
                    },
                    error: function(e)
                    {
                        $("#err").html(e).fadeIn();
                    }
                });
            }));
            $("#form").bind('ajax:complete', function() {

                swal("Done", "Your Payment Has send TO Admin Aproovals....!", "sucess");



            });
        </script>

    </body>


</html>