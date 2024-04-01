<?php
var_dump($_POST);
require_once ('class/autoload.php');
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:login.php');
}
$users = new UserRep();
$user = $users->getuser($_SESSION['id']);
$temp = $users->login($user[1], trim($_POST['pwd']));
$exps = new expRep();
if ($temp == -2) {
    setcookie('error', 'pwd', time() + 100);
    header('Location:settings.php');
} else {
    $reqs = array();
    for ($i = 0; $i < 4; $i++) {
        if (trim($_POST["req$i"]) != '') {
            array_push($reqs, $exps->new(trim($_POST["req{$i}"]), trim($_POST["req{$i}y"])));
        }
    }
    $temp = ($users->change($temp, trim($_POST['mail']), $_POST['name'], $_POST['npwd'], $reqs));
    if ($temp == -1) {
        setcookie('error', 'mail', time() + 100);
        header('Location:settings.php');
    }

}