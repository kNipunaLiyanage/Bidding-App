<?php

include './DB.php';

session_start();

$upload_path = 'registerpayment/';
$nameinfull = $_POST["login-nameinfull"];
$addressz = $_POST["login-address"];
$cityz = $_POST["login-city"];
$contacts = $_POST["login-contact"];
$emaiaddress = $_POST["login-email"];
$passwordz1 = $_POST["login-pass1"];
$passwordz2 = $_POST["login-pass2"];
$stast = "Pending";
$digit_count = strlen($contacts);
///////////////////////////////////////
//$ciphering = "AES-128-CTR";
//$iv_length = openssl_cipher_iv_length($ciphering);
//$options = 0;
//$encryption_iv = '1234567891011121';
//
//$encryption_key = "Sam&Sam-FabFour";
//$encryption = openssl_encrypt($passwordz1, $ciphering, $encryption_key, $options, $encryption_iv);
//////////////////////////////////////////////////
//$en_password = $encryption;

$ustype = "Buyer";
if ($nameinfull == "" || $addressz == "" || $cityz == "" || $contacts == "" || $emaiaddress == "" || $passwordz1 == "" || $passwordz2 == "") {
    echo 'empty';
} else if (!($passwordz1 == $passwordz2)) {
    echo 'notm';
} else if ($digit_count > 10 || $digit_count < 10) {
    echo 'phone';
} else {

    $today_date = date("Y/m/d");
    date_default_timezone_set('Asia/Kolkata');
    $today_time = date("h:i");




    $file_name = $_FILES['thumbimage']['name'];
    $file_size = $_FILES['thumbimage']['size'];
    $file_tmp = $_FILES['thumbimage']['tmp_name'];
    $file_type = $_FILES['thumbimage']['type'];

    $filenewz = $nameinfull . $file_name;
    move_uploaded_file($file_tmp, "registerpayment/" . $filenewz);

    $fileekepatheka = "registerpayment/" . $filenewz;
    $biddingenddatetime = $today_date . " " . $today_time;

    $sqlz = "SELECT * FROM userdetails where emailz='$emaiaddress'";
    $result = $conn->query($sqlz);
    $remdate = date('Y/m/d', strtotime('+365 day'));
    if ($result->num_rows > 0) {
        echo "al";
    } else {

        $sql = "insert into `biddingforyou`.`userdetails`
            (
             `nameinfull`,
             `addressz`,
             `cityz`,
             `contactnumber`,
             `emailz`,
             `passwordz`,
             `usertype`,
             `userstatus`,
             `regdate`,
             `regtime`,
             `payemntproof`)
values (
        '$nameinfull',
        '$addressz',
        '$cityz',
        '$contacts',
        '$emaiaddress',
        '$passwordz1',
        '$ustype',
        '$stast',
        '$today_date',
        '$biddingenddatetime',
        '$fileekepatheka');";


        $sql2 = "insert into `userexpirydatedetails`
            (
             `username`,
             `useremail`,
             `dateregistered`,
             `datetorenew`,
             `payementslip`)
values (
        '$nameinfull',
        '$emaiaddress',
        '$today_date',
        '$remdate',
        '$fileekepatheka');";
        if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {

            echo "ok";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}