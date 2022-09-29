<?php

include './DB.php';

session_start();


$itemidloadz = $_POST["userid"];


$sql = "update sellergotnotificationfromuser set statusz='Read' where id='$itemidloadz'";

if ($conn->query($sql) === TRUE) {

    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
