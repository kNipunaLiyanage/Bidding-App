<?php

include './DB.php';
session_start();



$seller_id = $_SESSION["user_id"];
$seller_name = $_SESSION["nameinfull"];
$seller_emailz = $_SESSION["emailz"];

$messageid = $_POST["messageidz"];
$message_send = $_POST["mes"];


$buyername_message;
$buyeremail_message;

$sqlz = "SELECT * FROM messages_buyer_to_seller where id='$messageid'";
$result = $conn->query($sqlz);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {



        $buyername_message = $row["buyername"];
        $buyeremail_message = $row["buyeremail"];
    }
}



$date = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
$todaydate = $date->format('Y-m-d');
$todaytime = $date->format('H:i:s');
$statuz = "NotRead";


$sql = "INSERT INTO `messages_seller_to_buyer`
            (
             `sellername`,
             `selleremail`,
             `buyername`,
             `buyeremail`,
             `messagez`,
             `status`,
             `datez`,
             `timez`)
VALUES (
        '$seller_name',
        '$seller_emailz',
        '$buyername_message',
        '$buyeremail_message',
        '$message_send',
        '$statuz','$todaydate','$todaytime');";
if ($conn->query($sql) === TRUE) {

    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
