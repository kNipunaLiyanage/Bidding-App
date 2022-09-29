<?php

include '../phpfiles/DB.php';



$district_name = $_POST["disnamez"];
$del_cost = $_POST["delcostz"];
$del_stat = "Active";


$sqlz = "SELECT * FROM deliverycostfordistrict where districtname='$district_name'";
$result = $conn->query($sqlz);
if ($result->num_rows > 0) {
    echo "al";
} else {
    $sql = "INSERT INTO `deliverycostfordistrict`
            (
             `districtname`,
             `cost`,
             `status`)
VALUES (
        '$district_name',
        '$del_cost',
        '$del_stat');";

    if ($conn->query($sql) === TRUE) {

        echo "ok";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
