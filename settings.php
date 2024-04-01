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
if (isset($_COOKIE['error'])) {
    if ($_COOKIE['error'] == 'pwd') {
        ?>
<script>
alert("password is incorrect");
</script>
<?php } else { ?>
<script>
alert("mail is already in use");
</script>
<?php }
    setcookie("error");
}
$users = new UserRep();
$exps = new expRep();
$user = $users->getuser($_SESSION['id']);
$exps_list = $exps->getfields();
$uexp = array_slice($user, 2, 4);
$temp = array();
for ($i = 0; $i < 4; $i++) {
    if ($uexp[$i] == '') {
        array_push($temp, array("experience", 'years'));
    } else {
        array_push($temp, $exps->getnameyears($uexp[$i]));
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='cssobjs/sidebar.css' />
    <link rel='stylesheet' href='cssobjs/new.css' />
    <script src="jsobjs/sidebar.js" type="module" defer></script>
    <script src="jsobjs/change.js" type="module" defer></script>
    <link rel="icon" href="/assets/logo.svg">
    <style>
    .form label .input:valid+span {
        color: gray;
    }
    </style>
    <title>Details</title>
</head>

<body>
    <datalist id="options">
        <?php
        foreach ($exps_list as $exp): ?>
        <option value=" <?= $exp->name ?>" />
        <?php endforeach; ?>
    </datalist>
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
            <a class="link active" title='new post' href='new.php'>
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
        <form class="form" action="change.php" method="post" enctype="multipart/form-data">
            <p class="title">enter your changes </p>
            <p class="message">full Name: </p>
            <label>
                <input placeholder="" type="text" class="input" name='name'>
                <span>
                    <?= $user[0] ?>
                </span>
            </label>
            <p class="message">email: </p>
            <label>
                <input placeholder="" type="text" class="input" name='mail'>
                <span>
                    <?= $user[1] ?>
                </span>
            </label>
            <p class="message">experience :</p>
            <?php for ($i = 0; $i < 4; $i++) { ?>
            <div class="flex">
                <label>
                    <input placeholder="" autocomplete='on' type="text" class="input" list='options'
                        name='req<?= $i ?>'>
                    <span>
                        <?= $temp[$i][0] ?>
                    </span>
                </label>

                <label>
                    <input placeholder="" type="number" min='0' class="input" name='req<?= $i ?>y'>
                    <span>
                        <?= $temp[$i][1] ?>
                    </span>
                </label>
            </div>
            <?php } ?>

            <label>
                <input placeholder="" type="password" class="input" name='npwd'>
                <span>
                    new password
                </span>
            </label>
            <label>
                <input required placeholder="" type="password" class="input" name='pwd'>
                <span>
                    confirm old password
                </span>
            </label>
            <button class="submit">Submit</button>
        </form>
    </div>
    </div>

</body>

</html>