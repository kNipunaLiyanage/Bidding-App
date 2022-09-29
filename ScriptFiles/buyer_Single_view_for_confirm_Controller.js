function ViewSingleProducttoConfirm(cc) {

    var itemid = cc;

    var url = "buyersingleviewItemForConfirm.php?itemidz=" + itemid;

    window.location = url;

}


function RemoveProductPurchase(cc) {

    var itemid = cc;

    var itemprice = $('#biddingamountbyyou').val();
    var itemname = $('#itemnamezloadz').val();
    var sellerid = $('#selleridz').text();
    var sellemail = $('#selleremailz').text();


    swal({
        title: "Are you sure?",
        text: "You want to Cancel Offer to " + itemname + " For LKR " + itemprice + " /= ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
            .then(function(willDelete) {
                if (willDelete) {

                    $.post("phpfiles/buyercancelOrder.php",
                            {
                                itemID: itemid,
                                itempricez: itemprice,
                                itemnamez: itemname,
                                selleridz: sellerid,
                                sellemailz: sellemail

                            },
                    function(data, status) {

                        if (data == "ok") {

                            swal("Done!Order Cancelled!", {
                                icon: "success",
                            });
                            var url = "BuyerDashboard.php";
                            window.location = url;

                        } else {

                            swal("Error!", "" + data, "error");

                        }

                    });




                } else {

                }
            });

}

function ConfirmProductPurchase(cc) {

    var itemid = cc;
    var itemprice = $('#biddingamountbyyou').val();
    var itemname = $('#itemnamezloadz').val();


    swal({
        title: "Are you sure?",
        text: "You want to purchase " + itemname + " For LKR " + itemprice + " /= ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
            .then(function(willDelete) {
                if (willDelete) {

                    $.post("phpfiles/GoTOorderSession.php",
                            {
                                itemID: itemid,
                                itempricez: itemprice,
                                itemnamez: itemname

                            },
                    function(data, status) {

                        if (data == "ok") {

                            
                            var url = "buyerMakepayment.php";
                            window.location = url;

                        } else {

                            swal("Error!", "" + data, "error");

                        }

                    });




                } else {

                }
            });

}