function MessageRead(vv) {



    var userid = vv;




    $.post("phpfiles/messagesmarkasread.php",
            {
                userid: userid

            },
    function(data, status) {

        if (data == "ok") {


            swal("Done!", "Message mark as read...!", "success");
            window.location = "SellerNotifications.php";

        } else {

            swal("Error!", "Something Went Wrong", "error");

        }

    });

}