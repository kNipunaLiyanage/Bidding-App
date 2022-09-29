function AdminLogin() {

    var cutomer = document.getElementById("username-admin").value;
    var email = document.getElementById("userpassword-pw").value;




    if (cutomer == "" || email == "") {

        swal("Error!", "Please Fill All Details...!", "error");
    } else {

        $.post("../phpfiles/Admin_login.php",
                {
                    uname: cutomer,
                    pw: email

                },
        function(data, status) {

            if (data == "ok") {


                swal("Login Sucess...!", {
                    icon: "success",
                });
                window.location = "AdminHome.php";


            } else if (data == "acc") {


                swal("Error!", "Invalid Login Details...!", "error");



            }
            else if (data == "Invalid") {


                swal("Error!", "Invalid Login Details...!", "error");



            }

        });


    }
    return false;
}

