
function signupBuyer() {
    var para1 = document.getElementById("login-nameinfull").value;
    var para2 = document.getElementById("login-address").value;
    var para3 = document.getElementById("login-city").value;
    var para4 = document.getElementById("login-email").value;
    var para5 = document.getElementById("login-pass1").value;
    var para6 = document.getElementById("login-pass2").value;
    var para7 = document.getElementById("login-contact").value;

    var teletxtcount = para7.length;
    if (para1 == "" || para2 == "" || para3 == "" || para4 == "" || para5 == "" || para6 == "" || para7 == "") {

        swal("oops!", "Please fill all details to continue..!", "error");
    } else if (!(para5 == para6)) {

        swal("oops!", "Passwords are not matched..!", "error");
    } else if (!(teletxtcount == 10)) {

        swal("oops!", "Please enter 10 digit phone number.!", "error");
    }

    else {

        $.post("phpfiles/create_account_Buyer.php",
                {
                    para1: para1,
                    para2: para2,
                    para3: para3,
                    para4: para4,
                    para5: para5,
                    para7: para7

                },
        function(data, status) {

            if (data == "ok") {


                swal("Done!", "Account Registration Sent for admin...!", "success");
                setInterval(gotoLogin(), 3400000);

            } else if (data == "Already") {

                swal("Error!", "This email is Already Registered...!", "error");

            }

        });


    }
}


function gotoLogin() {


    window.location = "SignIn.php";
}

   