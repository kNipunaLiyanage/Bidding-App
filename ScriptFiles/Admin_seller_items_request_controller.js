function AcceptSellerItem(vv) {



    var userid = vv;




    $.post("../phpfiles/admin_accept_seller_bid.php",
            {
                userid: userid

            },
    function(data, status) {

        if (data == "ok") {


            swal("Done!", "Item Request Accepted...!", "success");
            window.location = "AdminViewPostedBids.php";

        } else {

            swal("Error!", "Something Went Wrong", "error");

        }

    });

}

function DeleteSellerItem(vv) {



    var userid = vv;




    $.post("../phpfiles/admin_remove_seller_bid.php",
            {
                userid: userid

            },
    function(data, status) {

        if (data == "ok") {


            swal("Done!", "Request deleted...!", "success");
            window.location = "AdminViewPostedBids.php";

        } else {

            swal("Error!", "Something Went Wrong", "error");

        }

    });

}