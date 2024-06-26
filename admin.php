<!DOCTYPE html>
<html lang="en">
<?php
require_once ('class/autoload.php');
session_start();
if (isset($_COOKIE['id']) || !isset($_SESSION['id'])) {
    header("Location:login.php");
}
$users = new UserRep();
$user = $users->getuser($_SESSION['id']);
$jobs = new jobRep();
$exps = new expRep();
if ($user[6] != 'admin') {
    header('Location:home.php');
}
$userlist = $users->getusers();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='cssobjs/sidebar.css' />
    <link rel='stylesheet' href='cssobjs/applicants.css' />
    <style>
    .actioncard {
        background-color: red;
    }
    </style>
    <script src="jsobjs/sidebar.js" type="module" defer></script>
    <title>admin Dashboard</title>
    <link rel="icon" href="/assets/logo.svg">

</head>

<body>
    <nav class='sidebar'>
        <div class="sidebar-header">
            <a class="logo-wrapper">
                <img src="./assets/logo.svg" alt="Logo">
                <h2 class="hidden">LOGO</h2>
            </a>
            <button class="toggle-btn">
                <img src="./assets/expand.svg" alt="expand button">
            </button>
        </div>


        <div class="sidebar-links">
            <a class="link" href='home.php'>
                <img src="./assets/home.svg" alt="">
                <span class="hidden">Home</span>
            </a>
            <a class="link" title='History' href='history.php'>
                <img src="./assets/history.svg" alt="history">
                <span class="hidden">History</span>
            </a>
            <a class="link" title='new post' href='new.php'>
                <img src="./assets/new.svg" alt="new post">
                <span class="hidden">New Post</span>
            </a>
            <a class="link" title='Messages' href='messages.php'>
                <img src="./assets/message.svg" alt="messages">
                <span class="hidden">contact us</span>
            </a>
            <?php if ($user[6] == 'admin') { ?>
            <a class="link active" title='Admin Dashboard' href='messages.php'>
                <img src="./assets/admin.svg" alt="messages">
                <span class="hidden">admin dash</span>
            </a>
            <?php } ?>
            </li>
        </div>
        <div class="sidebar-bottom">
            <div class="sidebar-links">
                <a class="link" title='Settings' href='settings.php'>
                    <img src="./assets/settings.svg" alt="">
                    <span class="hidden">Settings</span>
                </a>
            </div>

            <div class="user-profile">
                <div class="user-avatar" title='logout' id="settings">
                    <img src="./assets/default.jpg" alt="">
                </div>
                <div class="user-details hidden">
                    <p class="username">
                        <?= $user[0] ?>
                    </p>
                    <p class="user-email">
                        <?= $user[1] ?>
                    </p>
                </div>
            </div>
        </div>
    </nav>
    <div class="main">
        <?php foreach ($userlist as $app): ?>
        <div class="card">
            <div class="infocard">
                <h1 class="titlecard">
                    <?= $app->fullName ?>
                </h1>
                <p>
                </p>
                <p class='description'>
                    <?= $app->email ?><br>Password:
                    <?= $app->pwd ?><br>Type:
                    <?= $app->type ?>
                </p>
                <p class="tagcard">experience : #
                    <?php if ($app->exp1 != 0) {
                            echo ($exps->getexp($app->exp1) . " years #");
                        } ?>
                    <?php if ($app->exp2 != 0) {
                            echo ($exps->getexp($app->exp2) . " years #");
                        } ?>
                    <?php if ($app->exp3 != 0) {
                            echo ($exps->getexp($app->exp3) . " years #");
                        } ?>
                    <?php if ($app->exp4 != 0) {
                            echo ($exps->getexp($app->exp4) . " years");
                        } ?>
                </p>
                <a href='delete.php?id=<?= $app->id ?>'> <button type="button" class="actioncard ">delete
                    </button></a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>

</html>