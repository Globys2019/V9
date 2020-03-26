<?php
session_start();
require_once "bootstrap.php";
$login = $_POST["login"];
$password = $_POST["password"];


if (isset($_POST['btnOK'])) {
    $user->loginUser($_POST["login"], $_POST["password"]);
    
    if ($_SESSION["auth"]) {
        header("Location:account.php");
    }
}

if (isset($_POST['btnOKE'])) {
    header("Location:registration.php");
}
require_once "index.view.php";
