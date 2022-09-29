<?php

include './DB.php';

session_start();


$itemidloadz = $_POST["itemidz"];
$buyernameloadz = $_POST["buyernamez"];
$buyeremailloadz = $_POST["buyeremailz"];
$amountloadz = $_POST["amountz"];


$seller_id = $_SESSION["user_id"];
$seller_name = $_SESSION["nameinfull"];
$seller_email = $_SESSION["emailz"];



date_default_timezone_set('Asia/Kolkata');
$today_date = date("Y/m/d h:i");

date_default_timezone_set('Asia/Kolkata');
$datetime = new DateTime('tomorrow');
$tommorowdatetime = $datetime->format('Y/m/d H:i');

$status = "waiting";

$sqlz = "SELECT * FROM sellerofferitemtobuyer where itemid='$itemidloadz'";
$result = $conn->query($sqlz);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {
        echo 'al';
    }
} else {


    try {


        $sql = "insert into `sellerofferitemtobuyer`
            (`buyername`,
             `buyeremail`,
             `sellername`,
             `selleremail`,
             `sellerid`,
             `itemid`,
             `amount`,
             `offereddate`,
             `expiredate`,
             `statusz`)
values ('$buyernameloadz',
        '$buyeremailloadz',
        '$seller_name',
        '$seller_email',
        '$seller_id',
        '$itemidloadz',
        '$amountloadz',
        '$today_date',
        '$tommorowdatetime',
        '$status');";
        if ($conn->query($sql) === TRUE) {
            $notification = "You have Won  new item.Confirm the item purchase before ";
            $stat2 = "notread";
            $sql2 = "INSERT INTO `usergotnotificationfromseller`
            (
             `sellerid`,
             `sellername`,
             `selleremail`,
             `buyeremail`,
             `itemid`,
             `notification`,
             `expiredatez`,
             `stats`)
VALUES (
        '$seller_id',
        '$seller_name',
        '$seller_email',
        '$buyeremailloadz',
        '$itemidloadz',
        '$notification',
        '$tommorowdatetime',
        '$stat2');";


            if ($conn->query($sql2) === TRUE) {
                $stat3 = "offeredtobuyer";
                $sql3xx = "update sellerpostitem set status='$stat3' where id='$itemidloadz'";
                if ($conn->query($sql3xx) == TRUE) {
                    echo "ok";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}