function ActiveRemoved(vv) {



    var userid = vv;




    $.post("../phpfiles/Admin_active_category.php",
            {
                userid: userid

            },
    function(data, status) {

        if (data == "ok") {


            swal("Done!", "Category Activated...!", "success");
            window.location = "AdminViewCategory.php";

        } else {

            swal("Error!", "Something Went Wrong", "error");

        }

    });

}

function Removecategory(vv) {



    var userid = vv;




    $.post("../phpfiles/Admin_remove_category.php",
            {
                userid: userid

            },
    function(data, status) {

        if (data == "ok") {


            swal("Done!", "Category deleted...!", "success");
            window.location = "AdminViewCategory.php";

        } else {

            swal("Error!", "Something Went Wrong", "error");

        }

    });

}