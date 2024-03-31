<!DOCTYPE html>
<html lang="en">
<?php
require_once ('class/autoload.php');
session_start();
if (isset($_COOKIE["id"])) {
    if ($_COOKIE["id"] == -1) {
        unset($_SESSION['id']);
        setcookie("id");
    } else {
        $_SESSION['id'] = $_COOKIE["id"];
    }

}
if (!isset($_SESSION['id'])) {
    header('Location:login.php');
}
$users = new UserRep();
$user = $users->getuser($_SESSION['id']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='cssobjs/sidebar.css' />
    <link rel='stylesheet' href='cssobjs/new.css' />

    <script src="jsobjs/sidebar.js" type="module" defer></script>
    <title>Details</title>
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
        <form class='card' action="">
            <p>
                fndslnbkfd
            </p>
        </form>
    </div>
    </div>
</head>

<body>

</body>

</html>