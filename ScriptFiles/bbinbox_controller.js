function MessageSeller(ccl) {
    var messageid = ccl;
    swal("Type your Message to sender:", {
        content: "input",
    }).then(function(value) {


        $.post("phpfiles/buyersendmessagetosellerz.php",
                {
                    messageidz: messageid,
                    mes: value

                },
        function(data, status) {

            if (data == "ok") {

                swal("Done!", "Message Sent to Seller..Check your inbox to reply from Seller", "success");
                var url = "#";
                window.location = url;
            } else {


            }

        });

    });
}
