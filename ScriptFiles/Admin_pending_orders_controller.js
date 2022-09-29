function ViewPendingOrderdetails(cc) {

    var orderid = cc;
    var itemidz = $('#itemidloadz' + cc).val();
    var url = "AdminSingleViewPendingOrderdetails.php?orderid=" + orderid + "&itemidz=" + itemidz;

    window.location = url;

}

function ViewCompletedOrderdetails(cc) {

    var orderid = cc;
    var itemidz = $('#itemidloadz' + cc).val();
    var url = "AdminSingleviewCompletedOrderdetails.php?orderid=" + orderid + "&itemidz=" + itemidz;

    window.location = url;

}


function ConfirmOrder(ss) {


    swal({
        title: "Are you sure?",
        text: "You want to confirm this order?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
            .then(function(willDelete) {
                if (willDelete) {

                    $.post("../phpfiles/Admin_confirm_order.php",
                            {
                                itemID: ss

                            },
                    function(data, status) {

                        if (data == "ok") {
                            swal("Order Complete...!", {
                                icon: "success",
                            });

                            var url = "AdminCompletedOrders.php";
                            window.location = url;

                        } else {

                            swal("Error!", "" + data, "error");

                        }

                    });




                } else {

                }
            });


}



