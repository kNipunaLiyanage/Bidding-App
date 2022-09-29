 <?php

include './DB.php';
session_start();

$sellerid = $_SESSION["user_id"];
$sellernameinfull = $_SESSION["nameinfull"];
$selleremail = $_SESSION["emailz"];


$upload_path = 'biddingitems/';

$catoname = $_POST["categoryiyem"];
$productname = $_POST["proname"];
$biddingenddate = $_POST["biddingenddate"];
$biddingendtime = $_POST["biddingendtime"];
$leastprice = $_POST["leastbiddingprice"];
$cintact = $_POST["contactz"];
$district = $_POST["district"];
$city = $_POST["cityz"];
$productcheck_weekdays = $_POST["dateandtimeweekdays"];
$productcheck_weekends = $_POST["dateandtimeweekends"];
$productdescription = $_POST["productdescription"];

$biddingenddatetime = $biddingenddate . " " . $biddingendtime;

$today_date = date("Y/m/d");
$status = 'Pending';

$digits = 3;
$numberrand = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
try {
//    if ($catoname == 'None' || $productname = '' || $biddingenddate = '' || $biddingendtime = '' || $leastprice = '' || $cintact = '' || $district = 'None' || $city = 'None' || $productcheck_weekdays = '' || $productcheck_weekends = '' || $productdescription = '') {
//        echo 'empty';
//    } else {
    $file_name = $_FILES['thumbimage']['name'];
    $file_size = $_FILES['thumbimage']['size'];
    $file_tmp = $_FILES['thumbimage']['tmp_name'];
    $file_type = $_FILES['thumbimage']['type'];
    $filenewz = $sellernameinfull . $numberrand . $file_name;
    move_uploaded_file($file_tmp, "biddingitems/" . $filenewz);
    $fileekepatheka = "biddingitems/" . $filenewz;

    $file_name2 = $_FILES['imagez2']['name'];
    $file_size2 = $_FILES['imagez2']['size'];
    $file_tmp2 = $_FILES['imagez2']['tmp_name'];
    $file_type2 = $_FILES['imagez2']['type'];
    $filenewz2 = $sellernameinfull . $numberrand . $file_name2;
    move_uploaded_file($file_tmp2, "biddingitems/" . $filenewz2);
    $fileekepatheka2 = "biddingitems/" . $filenewz2;

    $file_name3 = $_FILES['imagez3']['name'];
    $file_size3 = $_FILES['imagez3']['size'];
    $file_tmp3 = $_FILES['imagez3']['tmp_name'];
    $file_type3 = $_FILES['imagez3']['type'];
    $filenewz3 = $sellernameinfull . $numberrand . $file_name3;
    move_uploaded_file($file_tmp3, "biddingitems/" . $filenewz3);
    $fileekepatheka3 = "biddingitems/" . $filenewz3;

    $file_name4 = $_FILES['imagez4']['name'];
    $file_size4 = $_FILES['imagez4']['size'];
    $file_tmp4 = $_FILES['imagez4']['tmp_name'];
    $file_type4 = $_FILES['imagez4']['type'];
    $filenewz4 = $sellernameinfull . $numberrand . $file_name4;
    move_uploaded_file($file_tmp4, "biddingitems/" . $filenewz4);
    $fileekepatheka4 = "biddingitems/" . $filenewz4;

    $sql = "insert into `biddingforyou`.`sellerpostitem`
            (
             `sellerid`,
             `sellername`,
             `selleremail`,
             `catoname`,
             `proname`,
             `biddingenddate`,
             `biddingendtime`,
             `biddingleastprice`,
             `contactno`,
             `districtz`,
             `cityz`,
             `productcheckwd`,
             `productcheckwe`,
             `description`,
             `thumimgpath`,
             `img2path`,
             `imag3path`,
             `img4path`,
             `posteddate`,
             `status`)
values (
        '$sellerid',
        '$sellernameinfull',
        '$selleremail',
        '$catoname',
        '$productname',
        '$biddingenddate',
        '$biddingenddatetime',
        '$leastprice',
        '$cintact',
        '$district',
        '$city',
        '$productcheck_weekdays',
        '$productcheck_weekends',
        '$productdescription',
        '$fileekepatheka',
        '$fileekepatheka2',
        '$fileekepatheka3',
        '$fileekepatheka4',
        '$today_date',
        '$status');";
    if ($conn->query($sql) === TRUE) {

        echo "ok";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //}
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}