<?php
require_once ('class/autoload.php');
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:login.php');
}
$jobs = new jobRep();
$job = $jobs->getjobbyid($_GET['id']);
$users = new UserRep();
$user = $users->getuser($_SESSION['id']);
if ($user[6] != 'admin' and ($job->master != $id)) {
    setcookie('remove', 'false', time() + 100);
    header('Location:home.php');
} else {
    $apps = new appRep();
    $apps->remove($_GET['id']);
    $jobs->remove($_GET['id']);
    setcookie('remove', 'true', time() + 100);
    header('Location:home.php');
}
var_dump($user);