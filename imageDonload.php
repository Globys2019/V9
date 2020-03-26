<?php
session_start();
require_once "bootstrap.php";

if (isset($_POST["down"])) {
    
    $fName = $_FILES["file"]["name"] ?? "";
    $fSize = $_FILES["file"]["size"] ?? "";
    $fTmp = $_FILES["file"]["tmp_name"] ?? "";
    $fType = $_FILES["file"]["type"] ?? "";
    $fError = $_FILES["file"]["error"] ?? "";

    $arrayI = explode('.', $fName);
    $extI = strtolower(end($arrayI));
    $nameI = $arrayI[0];
    $nameI .= rand(1, 100000);
    $extensionI = ["jpg", "png", "jpeg", "webp", "gif"];
    $nameImg = $nameI . "." . $extI;
    $image = $nameImg;
    if (in_array($extI, $extensionI)) {
        if ($fSize <= 50000000) {
            if ($fError == 0) {
                $newnameI = $nameI . "." . $extI;
                if (move_uploaded_file($fTmp, "img/{$newnameI}")) {
                    $user->uploadImage($image);
                }
            }
        }
    }
}
if (isset($_POST["out"])) {
    $user->logout();
    header("Location:index.php");
}

header("Location: account.php");