function AcceptUserRequestDeposit(vv) {



    var rowid = vv;

    var userid = $('#buyerid' + vv).val();
    var useremail = $('#buyemai' + vv).text();
    var usenameinfull = $('#buynamez' + vv).text();
    var amountpay = $('#buyamountz' + vv).text();




    $.post("../phpfiles/admin_accept_buyer_deposit.php",
            {
                rowidz: rowid,
                userid: userid,
                useremailz: useremail,
                usernameinfullz: usenameinfull,
                amountpayz: amountpay

            },
    function(data, status) {
        if (data == "ok") {


            swal("Done!", "Request accepted...!", "success");
            window.location = "AdminViewbuyerpaymentrequests.php";

        } else {

            swal("Error!", "Something Went Wrong", "error");

        }

    });




}

function DeleteUserRequestDeposit(vv) {



    var userid = vv;




    $.post("../phpfiles/admin_remove_buyer_deposit.php",
            {
                userid: userid

            },
    function(data, status) {

        if (data == "ok") {


            swal("Done!", "Request deleted...!", "success");

        } else {

            swal("Error!", "Something Went Wrong", "error");

        }

    });

}
