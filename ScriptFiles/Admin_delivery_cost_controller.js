function AddnewDeliveryCost() {


    var disname = $('#disname').val();
    var delcost = $('#delcost').val();
    if (disname == "" || delcost == "") {
        swal("Error!", "Please Fill All Feilds", "error");

    } else {


        $.post("../phpfiles/Admin_add_new_delivery_cost.php",
                {
                    disnamez: disname,
                    delcostz: delcost

                },
        function(data, status) {
            if (data == "ok") {


                swal("Done!", "Data Saved...!", "success");
                window.location = "AdminAddnewDeliveryCost.php";
            } else if (data == "al") {

                swal("Error!", "District Name Already Exists..!", "error");
            }

        });
    }


}

function DeleteCost(vv) {



    var userid = vv;
    $.post("../phpfiles/Admin_remove_delivery_details.php",
            {
                rowidz: userid

            },
    function(data, status) {

        if (data == "ok") {


            swal("Done!", "Data removed...!", "success");
            window.location = "AdminAddnewDeliveryCost.php";
        } else {

            swal("Error!", "Something Went Wrong", "error");
        }

    });
}