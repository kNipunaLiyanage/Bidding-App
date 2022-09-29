<?php

$itemidloading = $_POST["itemID"];
$itempriceloadingz = $_POST["itempricez"];
$itemnameloadingz = $_POST["itemnamez"];

session_start();
$_SESSION["itemidloading"] = $itemidloading;
$_SESSION["itempriceloadingz"] = $itempriceloadingz;
$_SESSION["itemnameloadingz"] = $itemnameloadingz;

echo 'ok';
