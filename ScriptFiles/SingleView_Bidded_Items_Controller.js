
function RemoveProductBid(cc) {

    var itemid = cc;

    var itemprice = $('#yourpricebid').val();
    var itemname = $('#itemnamezloadzzz').val();


    swal({
        title: "Are you sure?",
        text: "You want to Cancel BID to " + itemname + " that you bid LKR " + itemprice + " /= ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
            .then(function(willDelete) {
                if (willDelete) {

                    $.post("phpfiles/buyercancelBID.php",
                            {
                                itemID: itemid

                            },
                    function(data, status) {

                        if (data == "ok") {

                            swal("Done!Bid Cancelled!", {
                                icon: "success",
                            });
                            var url = "BuyerDashboard.php";
                            window.location = url;

                        } else if (data == "time") {
                            swal("Error!", "Time Limit Exceed..You Only can cancel your bid after bidding later than 1 hour", "error");
                        } else {

                            swal("Error!", "" + data, "error");

                        }

                    });




                } else {

                }
            });

}