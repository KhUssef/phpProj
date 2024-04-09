<?php

require_once ('class/autoload.php');
session_start();
if (isset($_COOKIE['id']) || !isset($_SESSION['id'])) {
    header("Location:login.php");
}
$users = new UserRep();
$exps = new expRep();
if ($_FILES["file"]["size"] != 0) {
    $file = fopen($_FILES["file"]["tmp_name"], "r");
    $contents = fread($file, $_FILES["file"]["size"]);
    fclose($file);
    $_POST['desc'] = $contents;
}

$id1 = $exps->new($_POST["req1"], $_POST["req1y"]);
$id2 = $exps->new($_POST["req2"], $_POST["req2y"]);
$jobs = new JobRep();
$jobs->new($_POST["name"], $_POST["price"], $_POST['desc'], $id1, $id2, $_SESSION['id']);
header('Location:home.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>