<?php

include './DB.php';


$itemID = $_POST["itemID"];
session_start();


$buyerid = $_SESSION["user_id"];
$buyernameinfull = $_SESSION["nameinfull"];
$buyeremail = $_SESSION["emailz"];

$sqlz = "SELECT * FROM itemhasabid where buyerid='$buyerid' and itemid='$itemID'";
$result = $conn->query($sqlz);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {



        $bidded_amount = $row["bidamount"];
        $bidded_date = $row["datez"];
        $bidded_time = $row["timez"];
        $float_value_of_amount_buyer = floatval($bidded_amount);
        $date_timez = $row["datez"] . " " . $row["timez"];

        $date = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
        $todaytime = $date->format('H:i:s');


        date_default_timezone_set('Asia/Kolkata');
        $datetime1 = new DateTime();
        $datetime2 = new DateTime($date_timez);
        $interval = $datetime2->diff($datetime1);
        $hours = $interval->format('%h hours');
        if ($hours < 1) {
            $sql = "update buyercurrentamountholding set currentamount=currentamount+'$bidded_amount' where buyeremail='$buyeremail'";
            $sql2 = "delete from itemhasabid where buyerid='$buyerid' and itemid='$itemID'";
            if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
                echo "ok";
            }
        } else {
            echo 'time';
        }
    }
}

