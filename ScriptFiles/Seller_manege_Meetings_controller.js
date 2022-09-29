function AcceptMeeting(vv) {



    var userid = vv;




    $.post("phpfiles/seller_accept_meeting.php",
            {
                userid: userid

            },
    function(data, status) {

        if (data == "ok") {


            swal("Done!", "Meeting Accepted...!", "success");
            var url = "Seller_View_meetings.php";
            window.location = url;

        } else {

            swal("Error!", "Something Went Wrong", "error");

        }

    });

}
function RemovetMeeting(vv) {



    var userid = vv;




    $.post("phpfiles/seller_remove_meeting.php",
            {
                userid: userid

            },
    function(data, status) {

        if (data == "ok") {


            swal("Done!", "Meeting Removed...!", "success");
            var url = "Seller_View_meetings.php";
            window.location = url;

        } else {

            swal("Error!", "Something Went Wrong", "error");

        }

    });

}