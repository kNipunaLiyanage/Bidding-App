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
$buyeramountpaying = $_POST["amoutbiddingz"];
$itempriceloading = $_POST["itempricez"];


$buyeramountfloat_val = floatval($buyeramountpaying);
$itempriceloadfloat_val = floatval($itempriceloading);

$itempricepercentage = $itempriceloadfloat_val * 20 / 100;

$date = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
$todaydate = $date->format('Y-m-d');
$todaytime = $date->format('H:i:s');
$statuz = "Active";

$sqlz = "SELECT * FROM buyercurrentamountholding where buyerid='$buyer_id' ";
$result = $conn->query($sqlz);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {

        $useramountinvalut = $row["currentamount"];
        $useramountinvalut_floatvalue = floatval($useramountinvalut);
        if ($useramountinvalut_floatvalue > $itempricepercentage) {

            if ($buyeramountfloat_val > $useramountinvalut_floatvalue) {
                echo 'more';
            } else {
                $sql = "SELECT * FROM itemhasabid where buyerid='$buyer_id' and itemid='$itemidload' and status='$statuz'";
                $result2 = $conn->query($sql);
                if ($result2->num_rows > 0) {

                    if ($row2 = $result2->fetch_assoc()) {
                        echo 'already';
                    }
                } else {

                    $sql2 = "insert into `itemhasabid`
            (
             `sellerid`,
             `sellername`,
             `selleremail`,
             `buyerid`,
             `buyername`,
             `buyeremail`,
             `itemid`,
             `itemname`,
             `bidamount`,
             `datez`,
             `timez`,
             `status`)
values (
        '$selleridz',
        '$sellernameinfullz',
        '$selleremailz',
        '$buyer_id',
        '$buyer_name',
        '$buyer_emailz',
        '$itemidload',
        '$itemnameloadz',
        '$buyeramountfloat_val',
        '$todaydate',
        '$todaytime',
        '$statuz');";
                    if ($conn->query($sql2) === TRUE) {


                        $newvalueinvalut = $useramountinvalut_floatvalue - $buyeramountfloat_val;
                        $sql3 = "update buyercurrentamountholding set currentamount='$newvalueinvalut' where buyerid='$buyer_id'";
                        if ($conn->query($sql3) === TRUE) {
                            echo "ok";
                        }
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
        } else {


            echo 'Notenough';
        }
    }
} else {

    echo 'NoAccount';
}



