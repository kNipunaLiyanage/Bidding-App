<header>
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrapper">
                <ul class="customer-support">
                    <li>
                        <a href="#0" class="mr-3"><i class="fas fa-phone-alt"></i><span class="ml-2 d-none d-sm-inline-block">Customer Support</span></a>
                    </li>
                    <li>
                        <i class="fas fa-globe"></i>
                        <select name="language" class="select-bar">
                            <option value="en">En</option>

                        </select>
                    </li>
                </ul>
                <?php
                session_start();

                $institutename;
                if (!(isset($_SESSION["use_type"]))) {
                    ?>
                    <ul class = "cart-button-area">

                        <li>
                            <a href = "SignIn.php" class = "user-button"><i class = "flaticon-user"></i></a>
                        </li>
                    </ul>
                    <?php
                } else {
                    $institutename = $_SESSION["use_type"];
                    if ($institutename == "Buyer") {
                        ?>
                        <ul class = "cart-button-area">

                            <li>
                                <a href = "BuyerDashboard.php" class = "user-button"><i class = "flaticon-user"></i></a>
                            </li>
                        </ul>
                        <?php
                    } else if ($institutename == "Seller") {
                        ?>
                        <ul class = "cart-button-area">

                            <li>
                                <a href = "SellerDashBoard.php" class = "user-button"><i class = "flaticon-user"></i></a>
                            </li>
                        </ul>
                        <?php
                    } else {
                        
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="index.php">
                        <img src="assets/images/logo/logo2.png" alt="logo">
                    </a>
                </div>
                <ul class="menu ml-auto">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="auction.php">Auction</a>
                    </li>

                    <li>
                        <a href="Aboutus.php">About us</a>
                    </li>
                    <li>
                        <a href="#0">Register</a>
                        <ul class="submenu">
                            <li>
                                <a href="SignUpSeller.php">As Seller</a>
                            </li>
                            <li>
                                <a href="SignUpBuyer.php">As Buyer</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="ContactUs.php">Contact</a>
                    </li>
                    <?php
                    if ((isset($_SESSION["user_id"]))) {
                        ?>

                        <li>
                            <a onclick="logoutUser()">Log Out</a>
                        </li>
                        <?php
                    }
                    ?>



                </ul>

                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
                            function logoutUser() {
                                var k = "g";
                                $.post("phpfiles/userlogout.php",
                                        {
                                            pw: k

                                        },
                                function(data, status) {
                                    
                                    if (data == "ok") {


                                        swal("Logout...!", {
                                            icon: "success",
                                        });
                                        window.location = "SignIn.php";


                                    }

                                });

                            }
</script>