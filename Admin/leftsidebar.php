<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="AdminHome.php" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-box"></i>
                        <span> User </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="AdminViewBuyers.php">Buyer Requests</a></li>
                        <li><a href="AdminViewActiveBuyers.php">Active Buyers</a></li>
                        <li><a href="AdminviewRemovedBuyers.php">Rejected Buyers</a></li>
                        <li><a href="AdminSellerRequests.php">Seller Requests</a></li>
                        <li><a href="AdminViewActiveSellers.php">Active Sellers</a></li>
                        <li><a href="AdminViewRemovedSellers.php">Rejected Sellers</a></li>
                        <li><a href="AdminViewAllActiveUsers.php">All Users</a></li>
                        <li><a href="AdminViewRemovedUsers.php">All Users Removed</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-ab-testing"></i>
                        <span> Category </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="AdminAddNewCategory.php">Add New Category</a></li>
                        <li><a href="AdminViewCategory.php">View Category</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-briefcase-outline"></i>
                        <span>  Items on listing </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="AdminViewPostedBids.php">New Item Requests</a></li>
                        <li><a href="AdminViewOngoingbids.php">On going BIDS</a></li>
                        <li><a href="AdminviewEndedBids.php">Ended BIDS</a></li>
                        <li><a href="AdminviewCompletedBids.php">Completed BIDS</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-storefront-outline"></i>
                        <span> Order Details </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="AdminAddnewDeliveryCost.php">Manage Delivery Cost</a></li>
                        <li><a href="AdminPendingOrders.php">Pending orders</a></li>
                        <li><a href="AdminCompletedOrders.php">Completed Orders</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-cash"></i>
                        <span> Your payments </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="AdminValut.php">Your Sales</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-cash-outline"></i>
                        <span> Delivery details </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="AdminViewbuyerpaymentrequests.php">Buyer deposit Requests</a></li>
                        <li><a href="AdminViewbuyerRegistrationFees.php">Buyer deposit Annual Fee</a></li>
                        <li><a href="AdminViewSellerRegistrationFee.php">Seller deposit Annual Fee</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-cursor-pointer"></i>
                        <span> Account Details </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="AdminEditAccount.php">Change Account Details</a></li>
                        <li><a  onclick="logout()">Logout</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
                            function logout() {
                                var k = "g";
                                $.post("../phpfiles/logoutAdmin.php",
                                        {
                                            pw: k

                                        },
                                function(data, status) {
                                    if (data == "ok") {


                                        swal("Logout...!", {
                                            icon: "success",
                                        });
                                        window.location = "AdminHome.php";


                                    }

                                });

                            }
</script>