<?php

include './DB.php';


$distric_load = $_POST["cityname"];
$sqlz = "SELECT * FROM deliverycostfordistrict where districtname='$distric_load'";
$result = $conn->query($sqlz);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {



        $deliverycost = $row["cost"];
        echo $deliverycost;
    }
}
