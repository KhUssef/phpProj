<?php
require_once ('class/autoload.php');
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:login.php');
}
$jobs = new jobRep();
$job = $jobs->getjobbyid($_GET['id']);
$exps = new expRep();
$apps = new appRep();
$temp = $apps->apply($_GET['id'], $_SESSION['id']);
setcookie('app', $temp, time() + 100);
header("Location:home.php");