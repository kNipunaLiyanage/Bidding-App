<?php

include './DB.php';
session_start();
$upload_path = 'proofpayment_buyer/';

$amount = $_POST["amountpaying"];


$buyer_id = $_SESSION["user_id"];
$buyer_name = $_SESSION["nameinfull"];
$buyer_emailz = $_SESSION["emailz"];



$today_date = date("Y/m/d");
date_default_timezone_set('Asia/Kolkata');
$today_time = date("h:i:sa");




$file_name = $_FILES['thumbimage']['name'];
$file_size = $_FILES['thumbimage']['size'];
$file_tmp = $_FILES['thumbimage']['tmp_name'];
$file_type = $_FILES['thumbimage']['type'];
//$file_ext = strtolower(end(explode('.', $_FILES['thumbimage']['name'])));
$status = "Pending";

if ($amount == '') {
    echo 'empty';
} else {

    try {
        $filenewz = $buyer_name . $file_name;
        move_uploaded_file($file_tmp, "proofpayment_buyer/" . $filenewz);

        $fileekepatheka = "proofpayment_buyer/" . $filenewz;

        $sql = "INSERT INTO `buyerpaymentforvalult`
            (
             `datez`,
             `timez`,
             `amountz`,
             `buyerid`,
             `buyername`,
             `buyeremail`,
             `prooflocation`,
             `statuspayment`)
VALUES (
        '$today_date',
        '$today_time',
        '$amount',
        '$buyer_id',
        '$buyer_name',
        '$buyer_emailz',
        '$fileekepatheka',
        '$status');";
        if ($conn->query($sql) === TRUE) {

            echo "ok";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}



