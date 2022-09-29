<?php

include './DB.php';
session_start();



$buyer_id = $_SESSION["user_id"];
$buyer_name = $_SESSION["nameinfull"];
$buyer_emailz = $_SESSION["emailz"];


$messageid = $_POST["messageidz"];
$message_send = $_POST["mes"];


$sellername_message;
$selleremail_message;

$sqlz = "SELECT * FROM messages_seller_to_buyer where id='$messageid'";
$result = $conn->query($sqlz);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {



        $sellername_message = $row["sellername"];
        $selleremail_message = $row["selleremail"];
    }
}

$date = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
$todaydate = $date->format('Y-m-d');
$todaytime = $date->format('H:i:s');
$statuz = "NotRead";
$sql = "insert into `messages_buyer_to_seller`
            (
             `buyerid`,
             `buyeremail`,
             `buyername`,
             `sellername`,
             `selleremail`,
             `messagez`,
             `datez`,
             `timez`,
             `statuz`)
values (
        '$buyer_id',
        '$buyer_emailz',
        '$buyer_name',
        '$sellername_message',
        '$selleremail_message',
        '$message_send',
        '$todaydate',
        '$todaytime',
        '$statuz');";

if ($conn->query($sql) === TRUE) {

    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
