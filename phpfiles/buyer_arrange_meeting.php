<?php

include './DB.php';
session_start();

$buyerid = $_SESSION["user_id"];
$buyernameinfull = $_SESSION["nameinfull"];
$buyeremail = $_SESSION["emailz"];


$daytype = $_POST["daytypez"];
$message_type = $_POST["messagez"];
$sellename = $_POST["sellernamez"];
$selleremail = $_POST["selleremailz"];
$datemessage = $_POST["mesdatez"];
$itemname = $_POST["itemnamez"];

$status = "Pending";

$rand = rand(0, 2555);
$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
$length = 4;
for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}
$randomidz = "MEET" . $randomString . $rand;

$sql = "insert into `buyerarrangemeetings`
            (
             `datez`,
             `sellername`,
             `selleremail`,
             `buyeremail`,
             `buyername`,
             `messagedatetype`,
             `message`,
             `satus`,
             `idgenarated`,
             `pronamez`)
values (
        '$datemessage',
        '$sellename',
        '$selleremail',
        '$buyeremail',
        '$buyernameinfull',
        '$daytype',
        '$message_type',
        '$status',
        '$randomidz',
        '$itemname');";

if ($conn->query($sql) === TRUE) {

    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}