<?php

include './DB.php';



$itemID = $_POST["itemID"];



$sql = "update orderdetails set statusorder='Done' where oderid='$itemID'";
if ($conn->query($sql) === TRUE) {

    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}