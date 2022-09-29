function ChangePasswordAdmin() {

    var currentpassword = document.getElementById("curpassword").value;
    var newpassword = document.getElementById("newpw").value;
    var newpassword2 = document.getElementById("newpw2").value;




    if (currentpassword == "" || newpassword == "" || newpassword2 == "") {

        swal("Error!", "Please Fill All Details...!", "error");
    } else {

        $.post("../phpfiles/admin_change_pw.php",
                {
                    currentpassword: currentpassword,
                    newpassword: newpassword,
                    newpassword2: newpassword2

                },
        function(data, status) {
            if (data == "chk") {


                swal("Error!", "Current Password Not matched...!", "error");


            } else if (data == "notm") {
                swal("oops!", "Passwords are not matched..!", "error");

            } else if (data == "ok") {


                swal("Password Changed Sucessfully...!", {
                    icon: "success",
                });
                window.location = "AdminLogin.php";


            }

        });
    }
}