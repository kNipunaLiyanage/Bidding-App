<?php

include './DB.php';
session_start();



$buyer_id = $_SESSION["user_id"];
$buyer_name = $_SESSION["nameinfull"];
$buyer_emailz = $_SESSION["emailz"];


$itemidload = $_POST["itempostidz"];
$itemnameloadz = $_POST["itemnamez"];
$selleridz = $_POST["selleridz"];
$selleremailz = $_POST["selleremailz"];
$sellernameinfullz = $_POST["sellernamez"];
$message_send = $_POST["mes"];


$date = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
$todaydate = $date->format('Y-m-d');
$todaytime = $date->format('H:i:s');
$statuz = "NotRead";

$sql = "insert into `messages_buyer_to_seller`
            (
             `buyerid`,
             `buyeremail`,
             `buyername`,
             `sellerid`,
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
        '$selleridz',
        '$sellernameinfullz',
        '$selleremailz',
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

