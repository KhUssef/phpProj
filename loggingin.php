<?php
require_once ('class/autoload.php');
session_start();
$users = new UserRep();
$idk = $users->login($_POST["mail"], $_POST["pwd"]);
switch ($idk) {
    case -1:
        setcookie('error', 'mail', time() + 1000);
        header("Location:login.php");
        break;
    case -2:
        setcookie('error', 'pwd', time() + 1000);
        header("Location:login.php");
        break;
    default:
        $_SESSION['id'] = $idk;
        header("Location:home.php");
        break;
}