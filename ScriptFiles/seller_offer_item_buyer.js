
function OfferItem(cc) {

    var rowid = cc;
    var buyername = $('#buyernameload' + cc).text();
    var buyeremail = $('#buyeremail' + cc).text();
    var amount = $('#biddingprice' + cc).val();
    var itemid = $('#itemidz').val();
    swal({
        title: "Are you sure?",
        text: "You want to offerthis item to " + buyername + " as the highrst bidder for the amount of LKR " + amount + " /=",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
            .then(function(willDelete) {
                if (willDelete) {


                    $.post("phpfiles/seller_offeritem_to_buyer.php",
                            {
                                itemidz: itemid,
                                buyernamez: buyername,
                                buyeremailz: buyeremail,
                                amountz: amount

                            },
                    function(data, status) {
                      
                        if (data == "ok") {


                            swal("Done!Item Offered to Seller..Waiting For Reply!", {
                                icon: "success",
                            });
                            // window.location = "AdminViewOngoingbids.php";

                        } else if (data == "al") {

                            swal("Error!", "This item already offered to buyer..", "error");

                        }

                    });

                } else {

                }
            });

}




