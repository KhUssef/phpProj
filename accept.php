<?php
require_once ('class/autoload.php');
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:login.php');
} else {
    if (!isset($_GET["jid"]) or !isset($_GET['uid'])) {
        header("Location:home.php");
    } else {
        $jobs = new jobRep();
        $job = $jobs->getjobbyid($_GET["jid"]);
        if ($job->master != $_SESSION["id"]) {
            header("Location:home.php");
        } else {
            $jobs->done($job->id, $_GET["uid"]);
            header("Location:home.php");
        }
    }
}