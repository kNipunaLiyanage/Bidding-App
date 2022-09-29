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



        if ($usertrypez == "Admin") {

            session_start();
            $buyerid = $row["id"];
            $buyernameinfull = $row["nameinfull"];
            $buyeremail = $row["emailz"];
            $buyercity = $row["cityz"];
            $buy_type = $row["usertype"];


            $_SESSION["admin_id"] = $buyerid;
            $_SESSION["adminnameinfull"] = $buyernameinfull;
            $_SESSION["adminemailz"] = $buyeremail;
            $_SESSION["admincity"] = $buyercity;
            $_SESSION["adminuse_type"] = $buy_type;
            echo "ok";
        } else {

            echo "acc";
        }
    }
} else {
    echo "Invalid";
}