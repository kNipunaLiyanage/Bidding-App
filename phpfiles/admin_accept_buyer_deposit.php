<?php

include './DB.php';



$rowid = $_POST["rowidz"];
$useid = $_POST["userid"];
$useemai = $_POST["useremailz"];
$usernameful = $_POST["usernameinfullz"];
$payamount = $_POST["amountpayz"];




$sqlz = "SELECT * FROM buyercurrentamountholding where buyerid='$useid'";
$result = $conn->query($sqlz);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {

        $amountcurrentholding = $row["currentamount"];
        $float_value_currentamount = floatval($amountcurrentholding);
        $float_value_payamount = floatval($payamount);

        $newamount = $float_value_currentamount + $float_value_payamount;

        $sql = "update buyercurrentamountholding set currentamount='$newamount' where buyerid='$useid'";
        if ($conn->query($sql) === TRUE) {
            $sql2 = "update buyerpaymentforvalult set statuspayment='Accept' where id='$rowid'";
            if ($conn->query($sql2) === TRUE) {

                echo "ok";
            } else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    $sql = "INSERT INTO `buyercurrentamountholding`
            (
             `buyerid`,
             `buyeremail`,
             `buyernameinfull`,
             `currentamount`)
VALUES (
        '$useid',
        '$useemai',
        '$usernameful',
        '$payamount');";
    if ($conn->query($sql) === TRUE) {
        $sql2 = "update buyerpaymentforvalult set statuspayment='Accept' where id='$rowid'";
        if ($conn->query($sql2) === TRUE) {

            echo "ok";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



