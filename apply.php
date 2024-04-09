<?php
require_once ('class/autoload.php');
session_start();
if (isset($_COOKIE['id']) || !isset($_SESSION['id'])) {
    header("Location:login.php");
}
$jobs = new jobRep();
$job = $jobs->getjobbyid($_GET['id']);
$exps = new expRep();
$apps = new appRep();
$temp = $apps->apply($_SESSION['id'], $_GET['id']);
setcookie('app', $temp, time() + 100);
header("Location:home.php");