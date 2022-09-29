function Makepayment(cc) {

    var itemid = cc;

    var pro_name = $("#product_name").html();
    var amount = $("#itemcost").html();
    var deliveryamount = $("#costofdelivery").html();
    var totalcost = $("#totalvalue").html();

    var recname = $('#recname').val();
    var rectele = $('#rectele').val();
    var recaddress = $('#recaddress').val();

    var crdno = $('#crdno').val();
    var expdate = $('#expdate').val();
    var cvn = $('#cvn').val();
    var districtz = $('#valuesz').val();
    if (recname == "" || rectele == "" || recaddress == "" || crdno == "" || expdate == "" || cvn == "") {

        swal("Error!", "Please Fill all details to confirm the payment..!", "error");
    } else if(districtz == "Select"){
        
        swal("Error!", "Select Valid District..!", "error");
    }else {


        swal({
            title: "Are you sure?",
            text: "You want to purchase " + pro_name + " For LKR " + totalcost + " /= ? You Need to pay " + deliveryamount + " as the delivery charge.We donot keep any card details and records",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then(function(willDelete) {
                    if (willDelete) {

                        $.post("phpfiles/buyerfinalpayment.php",
                                {
                                    itemID: itemid,
                                    pro_namez: pro_name,
                                    amountz: amount,
                                    deliveryamountz: deliveryamount,
                                    totalcostz: totalcost,
                                    recnamez: recname,
                                    rectelez: rectele,
                                    recaddressz: recaddress,
                                    districtzz: districtz

                                },
                        function(data, status) {

                            if (data == "ok") {
                                swal("Payment Complete...!Waiting item to deliver to you!", {
                                    icon: "success",
                                });

                                var url = "buyer_myorders.php";
                                window.location = url;

                            } else {

                                swal("Error!", "" + data, "error");

                            }

                        });




                    } else {

                    }
                });

    }
}