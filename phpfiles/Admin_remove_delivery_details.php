<?php

include '../phpfiles/DB.php';



$district_id = $_POST["rowidz"];
$sql = "delete from deliverycostfordistrict where id='$district_id'";
if ($conn->query($sql) === TRUE) {

    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
