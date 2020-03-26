<?php
session_start();
require_once "bootstrap.php";

if (!$_SESSION['auth']) {
    header("Location:index.php");
}



if (isset($_POST["down"])) {
    require_once "imageDonload.php";
}

$im = $user->getImage();
$images = $user->getAllImage();

require_once "account.view.php";
