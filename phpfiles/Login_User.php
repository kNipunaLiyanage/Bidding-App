<?php

include './DB.php';



$emailz = $_POST["uname"];
$passwordz = $_POST["pw"];

$sqlz = "SELECT * FROM userdetails where emailz='$emailz' and passwordz='$passwordz'";
$result = $conn->query($sqlz);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {



        $usertrypez = $row["usertype"];
        $userstats = $row["userstatus"];

        if ($userstats == "Pending") {
            echo "Pending";
        } else if ($userstats == "Delete") {
            echo "deletez";
        } else if ($userstats == "Active") {


            if ($usertrypez == "Buyer") {

                session_start();
                $buyerid = $row["id"];
                $buyernameinfull = $row["nameinfull"];
                $buyeremail = $row["emailz"];
                $buyercity = $row["cityz"];
                $buy_type = $row["usertype"];
                
                
                $_SESSION["user_id"] = $buyerid;
                $_SESSION["nameinfull"] = $buyernameinfull;
                $_SESSION["emailz"] = $buyeremail;
                $_SESSION["city"] = $buyercity;
                $_SESSION["use_type"] = $buy_type;
                echo "Buyer";
            } else {
                session_start();
                $buyerid = $row["id"];
                $buyernameinfull = $row["nameinfull"];
                $buyeremail = $row["emailz"];
                $buyercity = $row["cityz"];
                $buy_type = $row["usertype"];
                
                $_SESSION["user_id"] = $buyerid;
                $_SESSION["nameinfull"] = $buyernameinfull;
                $_SESSION["emailz"] = $buyeremail;
                $_SESSION["city"] = $buyercity;
                $_SESSION["use_type"] = $buy_type;
                echo "Seller";
            }
        }
    }
} else {
    echo "Invalid";
}