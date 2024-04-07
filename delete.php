<?php
require_once ('class/autoload.php');
session_start();
$users = new UserRep();
if (!isset($_SESSION['id']) || !isset($_GET['id'])) {
    header("Location:home.php");
} else {
    $user = $users->getuser($_SESSION['id']);
    if ($user[6] != 'admin') {
        header('Location:home.php');
    } else {
        $users->delete($_GET['id']);
        if ($_SESSION['id'] == $_GET['id']) {
            setcookie("id", -1, time() + 100);
        }
        header('Location:home.php');
    }
}