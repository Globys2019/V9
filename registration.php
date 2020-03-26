<?php
session_start();
require_once "bootstrap.php";
$login = $_POST["login"];
$nick = $_POST["nick"];
$password = $_POST["password"];



if(isset($_POST["reg"])) {

    if($login > null && $nick > null && $password > null){
    $data = ["login"=>$login, "password"=>$password, "nick"=>$nick];
    $user->registrations($data);
    }
    else {
        $_SESSION['alert'] = "Не все поля заполнены!";
    }
}


if(isset($_POST["back"])) {
    header("Location:index.php");
}
require_once "registration.view.php";