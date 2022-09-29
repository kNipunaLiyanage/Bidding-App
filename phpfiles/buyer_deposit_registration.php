<?php

include './DB.php';
session_start();
$upload_path = 'registerpayment/';


$buyer_id = $_SESSION["user_id"];
$buyer_name = $_SESSION["nameinfull"];
$buyer_emailz = $_SESSION["emailz"];



$today_date = date("Y/m/d");
date_default_timezone_set('Asia/Kolkata');
$today_time = date("h:i");

$remdate = date('Y/m/d', strtotime('+365 day'));




$file_name = $_FILES['thumbimage']['name'];
$file_size = $_FILES['thumbimage']['size'];
$file_tmp = $_FILES['thumbimage']['tmp_name'];
$file_type = $_FILES['thumbimage']['type'];



try {
    $filenewz = $buyer_name . $file_name;
    move_uploaded_file($file_tmp, "registerpayment/" . $filenewz);

    $fileekepatheka = "registerpayment/" . $filenewz;

    $sql = "update userexpirydatedetails set payementslip='$fileekepatheka',datetorenew='$remdate',dateregistered='$today_date' where useremail='$buyer_emailz'";
    if ($conn->query($sql) === TRUE) {

        echo "ok";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}




