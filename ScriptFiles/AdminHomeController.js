function AcceptUserRequest(vv) {



    var userid = vv;




    $.post("../phpfiles/Admin_accept_user_request.php",
            {
                userid: userid

            },
    function(data, status) {

        if (data == "ok") {


            swal("Request Accepted...!", {
                icon: "success",
            });
            window.location = "AdminViewActiveBuyers.php";

        } else {

            swal("Error!", "Something Went Wrong", "error");

        }

    });

}

function DeleteUserRequest(vv) {



    var userid = vv;




    $.post("../phpfiles/Admin_delete_user_request.php",
            {
                userid: userid

            },
    function(data, status) {

        if (data == "ok") {


            swal("Request Removed...!", {
                icon: "success",
            });
            window.location = "AdminviewRemovedBuyers.php";

        } else {

            swal("Error!", "Something Went Wrong", "error");

        }

    });

}
