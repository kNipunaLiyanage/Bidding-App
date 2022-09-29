<?php

include './DB.php';
session_start();
$upload_path = 'categoryImgs/';

$catename = $_POST["categoryname"];









$file_name = $_FILES['thumbimage']['name'];
$file_size = $_FILES['thumbimage']['size'];
$file_tmp = $_FILES['thumbimage']['tmp_name'];
$file_type = $_FILES['thumbimage']['type'];
//$file_ext = strtolower(end(explode('.', $_FILES['thumbimage']['name'])));
$status = "Pending";

if ($catename == '') {
    echo 'empty';
} else {

    try {
        $filenewz = $buyer_name . $file_name;
        move_uploaded_file($file_tmp, "categoryImgs/" . $filenewz);

        $fileekepatheka = "categoryImgs/" . $filenewz;

        $sql = "insert into `biddingforyou`.`categories`
            (
             `categoryname`,
             `categoryimagefile`,
             `status`)
values (
        '$catename',
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



