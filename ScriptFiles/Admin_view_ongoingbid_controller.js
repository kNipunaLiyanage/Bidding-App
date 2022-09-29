function ViewSingleBid(cc) {

    var itemid = cc;
    var expdatez = $('#dd' + cc).text();
    var url = "AdminviewBidSingleDetails.php?itemidz=" + itemid + "&expdate=" + expdatez;

    window.location = url;

}

function ViewSingleBidEnded(cc) {

    var itemid = cc;
    var expdatez = $('#dd' + cc).text();
    var url = "AdminSingelViewEndedBids.php?itemidz=" + itemid + "&expdate=" + expdatez;

    window.location = url;

}

function ViewSingleBidCompleted(cc) {

    var itemid = cc;
    var expdatez = $('#dd' + cc).text();
    var url = "AdminSingleViewCompletedBIDS.php?itemidz=" + itemid + "&expdate=" + expdatez;

    window.location = url;

}



function EndBid(cc) {

    var itemid = cc;
    swal({
        title: "Are you sure?",
        text: "You want to end this bid so the buyers cannot bid this item anymore..!!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
            .then(function(willDelete) {
                if (willDelete) {


                    $.post("../phpfiles/Admin_end_ongoing_Bid.php",
                            {
                                userid: itemid

                            },
                    function(data, status) {

                        if (data == "ok") {


                            swal("Done! Selected item bidding has ended!", {
                                icon: "success",
                            });
                            window.location = "AdminViewOngoingbids.php";

                        } else {

                            swal("Error!", "Something Went Wrong", "error");

                        }

                    });

                } else {

                }
            });

}




