<?php

include './DB.php';



$useid = $_POST["userid"];



$sql = "update buyerpaymentforvalult set statuspayment='Delete' where id='$useid'";
if ($conn->query($sql) === TRUE) {

    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}