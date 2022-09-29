<?php

include './DB.php';



$itemID = $_POST["itemID"];
$pro_namez = $_POST["pro_namez"];
$amountz = $_POST["amountz"];
$deliveryamountz = $_POST["deliveryamountz"];
$totalcostz = $_POST["totalcostz"];
$recnamez = $_POST["recnamez"];
$rectelez = $_POST["rectelez"];
$recaddressz = $_POST["recaddressz"];
$districtzz = $_POST["districtzz"];

session_start();


$buyerid = $_SESSION["user_id"];
$buyernameinfull = $_SESSION["nameinfull"];
$buyeremail = $_SESSION["emailz"];

$seller_id_load;
$seller_name_load;
$seller_email_load;

$float_value_of_amount = floatval($amountz);
$admins_cut = $float_value_of_amount * 2 / 100;
$seller_amount = $float_value_of_amount - $admins_cut;


$date = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
$todaydate = $date->format('Y-m-d');
$todaytime = $date->format('H:i:s');
$statuz = "Pending";

$characters = '123456789';
$charactersLength = strlen($characters);
$length = 5;
$randomString = '';
for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}

$orderidgen = "ORD" + $randomString;
//load seller details
$sqlz = "SELECT * FROM sellerpostitem where id='$itemID'";
$result = $conn->query($sqlz);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {
        $seller_id_load = $row["sellerid"];
        $seller_name_load = $row["sellername"];
        $seller_email_load = $row["selleremail"];
    }
}
$sql = "insert into `orderdetails`
            (
             `buyername`,
             `buyerid`,
             `buyeremail`,
             `itemid`,
             `sellerid`,
             `sellername`,
             `selleremail`,
             `itemcost`,
             `selleramount`,
             `admincut`,
             `deliverycost`,
             `orderidgenarated`,
             `datez`,
             `timez`,
             `statusorder`,
             `deliveryaddreess`,
             `deliverydistrict`)
values (
        '$buyernameinfull',
        '$buyerid',
        '$buyeremail',
        '$itemID',
        '$seller_id_load',
        '$seller_name_load',
        '$seller_email_load',
        '$amountz',
        '$seller_amount',
        '$admins_cut',
        '$deliveryamountz',
        '$orderidgen',
        '$todaydate',
        '$todaytime',
        '$statuz',
        '$recaddressz',
        '$districtzz');";

$sqlsecond = "insert into `adminvalut`
            (
             `itemid`,
             `itemname`,
             `itemselledcost`,
             `deliverycost`,
             `yourcost`)
values (
        '$itemID',
        '$pro_namez',
        '$amountz',
        '$deliveryamountz',
        '$admins_cut');";

$sqlthird = "update usergotnotificationfromseller set stats='read' where itemid='$itemID' and buyeremail='$buyeremail' and selleremail='$seller_email_load'";
if ($conn->query($sql) === TRUE && $conn->query($sqlsecond) === TRUE && $conn->query($sqlthird) === TRUE) {

    $sqlzy34 = "SELECT * FROM itemhasabid where itemid='$itemID' and buyeremail<>'$buyeremail'";
    $query4 = $conn->query($sqlzy34);

    foreach ($query4 as $value4) {

        $buyeremailloadtoupdate = $value4['buyeremail'];
        $buyeramounttoupdate = $value4['bidamount'];
        $float_value_of_buyer = floatval($buyeramounttoupdate);

        $sqlfourth = "update buyercurrentamountholding set currentamount=currentamount+'$float_value_of_buyer' where buyeremail='$buyeremailloadtoupdate'";
        if ($conn->query($sqlfourth) === TRUE) {
            
        }
    }
    $sqlfifth = "update itemhasabid set status='Ended' where itemid='$itemID'";
    $sqlsixth = "update sellerpostitem set status='Complete' where id='$itemID'";
    $sqltenth = "update itemhasabid set status='Win' where itemid='$itemID' and buyeremail='$buyeremail'";

    $notz = "Your Item " . $pro_namez . " has been sucessfully purchased by " . $buyernameinfull . " for " . $amountz . ".";
    $msgnoti = "notread";
    $sqleighth = "INSERT INTO `biddingforyou`.`sellergotnotificationfromuser`
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
        '$seller_id_load',
        '$seller_email_load',
        '$itemID',
        '$notz',
        '$msgnoti');";


    if ($conn->query($sqlfifth) === TRUE && $conn->query($sqlsixth) === TRUE && $conn->query($sqleighth) === TRUE && $conn->query($sqltenth) === TRUE) {
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}









