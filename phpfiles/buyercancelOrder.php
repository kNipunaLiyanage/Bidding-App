<?php

include "./DB.php";


$itemID = $_POST["itemID"];
$pro_price = $_POST["itempricez"];
$pro_name = $_POST["itemnamez"];
$id_seller = $_POST["selleridz"];
$email_seller = $_POST["sellemailz"];


session_start();


$buyerid = $_SESSION["user_id"];
$buyernameinfull = $_SESSION["nameinfull"];
$buyeremail = $_SESSION["emailz"];

$buyeramount_as;



$sqlz = "SELECT * FROM itemhasabid where itemid='$itemID' and buyeremail='$buyeremail'";
$result = $conn->query($sqlz);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {
        $buyeramount_as = $row["bidamount"];
    }
}
$float_value_of_amount_buyer = floatval($buyeramount_as);
$sql_query_2 = "update buyercurrentamountholding set currentamount=currentamount+'$float_value_of_amount_buyer' where buyeremail='$buyeremail'";
$sql_query_3 = "update usergotnotificationfromseller set stats='Read' where itemid='$itemID' and buyeremail='$buyeremail'";
$sql_query_5 = "update sellerpostitem set status='END' where id='$itemID'";
$sql_query_20 = "delete from sellerofferitemtobuyer where buyeremail='$buyeremail' and itemid='$itemID'";



$notz2 = "Your item " . $pro_name . " has being cancel by buyer " . $buyernameinfull . " for " . $pro_price . ".Please offer this item to another buyer in your item Bidding list in ENded Items.";
$msgnoti2 = "notread";
$sql_query_4 = "INSERT INTO `sellergotnotificationfromuser`
            (
             `buyerid`,
             `buyername`,
             `buyeremail`,
             `sellerid`,
             `selleremail`,
             `itemid`,
             `notification`,
             `statusz`)
VALUES (
        '$buyerid',
        '$buyernameinfull',
        '$buyeremail',
        '$id_seller',
        '$email_seller',
        '$itemID',
        '$notz2',
        '$msgnoti2');";

$sql_query = "delete from itemhasabid where itemid='$itemID' and buyeremail='$buyeremail' ";

if ($conn->query($sql_query_2) === TRUE && $conn->query($sql_query_3) === TRUE && $conn->query($sql_query_4) === TRUE && $conn->query($sql_query) === TRUE && $conn->query($sql_query_20) === TRUE) {
    echo "ok";
} else {
    echo "Error: " . $sqlz . "<br>" . $conn->error;
}




