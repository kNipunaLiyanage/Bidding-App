function SubmitABidBuyer(vv) {



    var itempostid = vv;
    var sellerid = $('#selleridz').text();
    var sellername = $('#sellernamez').text();
    var selleremail = $('#selleremailz').text();
    var amoutbidding = $('#buyerbidamount').val();
    var itemprice = $('#itemprice').val();
    var itemname = $('#itemnamez').val();
    if (amoutbidding == "") {
        swal("Error!", "Enter Valid amount to Bid", "error");
    } else {
        $.post("phpfiles/buyer_make_a_bid_for_item.php",
                {
                    itempostidz: itempostid,
                    selleridz: sellerid,
                    sellernamez: sellername,
                    selleremailz: selleremail,
                    amoutbiddingz: amoutbidding,
                    itemnamez: itemname,
                    itempricez: itemprice

                },
        function(data, status) {

            if (data == "NoAccount") {


                swal("Invalid!", "No Amount on your valut...!", "error");
                //   window.location = "AdminViewPostedBids.php";

            } else if (data == "Notenough") {

                swal("Error!", "You Need at least 20 % money in your valut to place a bid", "error");
            }
            else if (data == "already") {

                swal("Error!", "You have already placed a bid for this item..You need to remove that bid before add another bid", "error");
            }
            else if (data == "less") {

                swal("Error!", "Pay a value more than items' Starter price", "error");
            }
            else if (data == "more") {

                swal("Error!", "You Do not have that  money in your valut..", "error");
            }
            else if (data == "ok") {

                swal("Done!", "Bid Added Sucessfully", "success");
                var url = "SingleProductDetails.php?itemidz=" + itempostid;
                window.location = url;
            }

        });
    }
}



function MessageSeller(ccl) {
    var itempostid = ccl;
    var sellerid = $('#selleridz').text();
    var sellername = $('#sellernamez').text();
    var selleremail = $('#selleremailz').text();
    var itemname = $('#itemnamez').val();

    swal("Type Your Message To Seller:", {
        content: "input",
    }).then(function(value) {


        $.post("phpfiles/buyersendmessagetoseller.php",
                {
                    itempostidz: itempostid,
                    selleridz: sellerid,
                    sellernamez: sellername,
                    selleremailz: selleremail,
                    itemnamez: itemname,
                    mes: value

                },
        function(data, status) {

            if (data == "ok") {

                swal("Done!", "Message Sent to selelr..Check your inbox to reply from sellers", "success");
                var url = "#";
                window.location = url;
            } else {


            }

        });

    });
}
function ArrangeMeetingz() {

    var daytype = $('#daysselect').val();
    var message = $('#message-text').val();
    var sellername = $('#sellernamez').text();
    var selleremail = $('#selleremailz').text();
    var mesdate = $('#message-date').val();

    var itemname = $('#itemnamez').val();

    if (message == "" || mesdate == "") {
        swal("Error!", "Enter Valid Details", "error");
    }
    else {

        $.post("phpfiles/buyer_arrange_meeting.php",
                {
                    daytypez: daytype,
                    messagez: message,
                    sellernamez: sellername,
                    selleremailz: selleremail,
                    mesdatez: mesdate,
                    itemnamez: itemname

                },
        function(data, status) {
            if (data == "ok") {

                swal("Done!", "Meeting Arranged Sucessfully", "success");
                var url = "Buyer_My_meetings.php";
                window.location = url;
            }

        });
    }

}


