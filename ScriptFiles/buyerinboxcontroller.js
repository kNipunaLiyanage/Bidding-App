function MessageBuyer(ccl) {
    var messageid = ccl;
    swal("Type your Message to sender:", {
        content: "input",
    }).then(function(value) {


        $.post("phpfiles/sellersendmessagetobuyer.php",
                {
                    messageidz: messageid,
                    mes: value

                },
        function(data, status) {

            if (data == "ok") {

                swal("Done!", "Message Sent to buyer..Check your inbox to reply from buyer", "success");
                var url = "#";
                window.location = url;
            } else {


            }

        });

    });
}
