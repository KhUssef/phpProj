<!DOCTYPE html>
<html lang="en">
<?php
require_once ('class/autoload.php');
session_start();
if (isset($_COOKIE['id']) || !isset($_SESSION['id'])) {
    header("Location:login.php");
}
$users = new UserRep();
$exps = new expRep();
$user = $users->getuser($_SESSION['id']);
$exps_list = $exps->getfields();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='cssobjs/sidebar.css' />
    <link rel='stylesheet' href='cssobjs/new.css' />
    <script src="jsobjs/sidebar.js" type="module" defer></script>
    <script src="jsobjs/new.js" type="module" defer></script>
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
        <form class="form" action="create.php" method="post" enctype="multipart/form-data">
            <p class="message">All fields are required. </p>
            <label>
                <input required placeholder="" type="text" class="input" name='name'>
                <span>Name</span>
            </label>
            <label>
                <input required placeholder="" type="number" class="input" name='price'>
                <span>price</span>
            </label>
            <div class="flex">
                <label>
                    <input required placeholder="" autocomplete='on' type="text" class="input" list='options'
                        name='req1'>
                    <span>requirement 1</span>
                </label>

                <label>
                    <input required placeholder="" type="number" min='0' class="input" name='req1y'>
                    <span>years</span>
                </label>
            </div>
            <div class="flex">
                <label>
                    <input required="" placeholder="" autocomplete='on' type="text" class="input" list='options'
                        name='req2'>
                    <span>requirement 2</span>
                </label>

                <label>
                    <input required placeholder="" type="number" min='0' class="input" name='req2y'>
                    <span>years</span>
                </label>
            </div>
            <textarea id='description' placeholder="Description" class="input" name='desc'></textarea>
            <input type="file" name='file' id="real-file" hidden="hidden" accept='.txt' />
            <button type="button" id="custom-button">CHOOSE A FILE</button>
            <span id="custom-text">No file chosen, yet.</span>
            <button class="submit">Submit</button>
        </form>
    </div>
    </div>

</body>

</html>