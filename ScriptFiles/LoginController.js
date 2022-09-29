function UserLogin() {

    var cutomer = document.getElementById("login-email_log").value;
    var email = document.getElementById("login-pass_log").value;




    if (cutomer == "" || email == "") {

       swal("Error!", "Please Fill All Details...!", "error");
    } else {

        $.post("phpfiles/Login_User.php",
                {
                    uname: cutomer,
                    pw: email

                },
        function(data, status) {

            if (data == "Buyer") {


                swal("Login Sucess...!", {
                    icon: "success",
                });
                window.location = "BuyerDashboard.php";


            } else if (data == "Seller") {


                swal("Login Sucess...!", {
                    icon: "success",
                });
                window.location = "SellerDashBoard.php";


            } else if (data == "Pending") {



                swal("Error!", "Account still not accepted by admin...!", "error");



            } else if (data == "Invalid") {


                swal("Error!", "Invalid login details...!", "error");

            }
            else if (data == "deletez") {


                swal("Error!", "Account has being deleted...!", "error");

            }

        });


    }
    return false;
}

