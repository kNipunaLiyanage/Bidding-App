<?php

include './DB.php';



$pass_cur = $_POST["currentpassword"];
$pass_1 = $_POST["newpassword"];
$pass_2 = $_POST["newpassword2"];


session_start();


$buyerid = $_SESSION["user_id"];
$buyernameinfull = $_SESSION["nameinfull"];
$buyeremail = $_SESSION["emailz"];
if (!($pass_1 == $pass_2)) {
    echo 'notm';
} else {

    $sqlz = "SELECT * FROM userdetails where emailz='$buyeremail'";
    $result = $conn->query($sqlz);

    if ($result->num_rows > 0) {

        if ($row = $result->fetch_assoc()) {

            $current_pw = $row["passwordz"];

            if ($pass_cur == $current_pw) {
                $sql = "update userdetails set passwordz='$pass_1' where emailz='$buyeremail'";
                if ($conn->query($sql) == TRUE) {
                    echo "ok";
                }
            } else {
                echo 'chk';
            }
        }
    }
}