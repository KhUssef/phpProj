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
$joblist = $jobs->getjobbymaster($_SESSION['id']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="cssobjs/history.css" />
    <link rel='stylesheet' href='cssobjs/sidebar.css' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/logo.svg">
    <style>
    .sidebar {
        height: 100vh;
    }
    </style>
    <title>History</title>
    <script src='jsobjs/sidebar.js' type="module" defer></script>
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
            <a class="link active" title='History' href='history.php'>
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
            <a class="link" title='Admin Dashboard' href='admin.php'>
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
                    <p title='<?= $user[0] ?>' class="username">
                        <?= $user[0] ?>
                    </p>
                    <p title='<?= $user[1] ?>' class="user-email">
                        <?= $user[1] ?>
                    </p>
                </div>
            </div>
        </div>
    </nav>
    <div class='main'>
        <ul>
            <?php
            foreach ($joblist as $job):
                ?>
            <li>
                <div class="card">
                    <div class="headercard <?= $job->state ?>card">
                        <h1>
                            <?= $job->state ?>
                        </h1>
                    </div>
                    <div class="infocard">
                        <p class="titlecard">
                            <?= $job->name ?>
                        </p>
                        <p>
                        <h4>Price : </h4>
                        <?= $job->price ?>
                        <h4> $</h4>
                        </p>
                        <p>
                            <?= $jobs->formatdesc($job->description) ?>
                        </p>
                    </div>
                    <div class="footercard">
                        <p class="tagcard">#
                            <?= $exps->getexpname($job->req1) ?> #
                            <?= $exps->getexpname($job->req2) ?>
                        </p>
                        <a href='jobdetails.php?id=<?= $job->id ?>'><button type="button" class="actioncard">Details
                            </button></a>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>