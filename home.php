<?php
require_once ('class/autoload.php');
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:login.php');
}
$users = new UserRep();
$user = $users->getuser($_SESSION['id']);
$jobs = new jobRep();
$exps = new expRep();
if (count($_GET) == 0) {
    $joblist = $jobs->getjobs();
    $filters = array_slice($user, 2, 4);
    for ($i = 0; $i < count($filters); $i++) {
        $filters[$i] = $exps->getexp($filters[$i]);
    }
} else {
    $filters = array_slice($_GET, 1, count($_GET));
    $joblist = $jobs->getjobswfilter($filters);
}
$exps_list = $exps->getfields();
$i = 0;
if (isset($_COOKIE['app'])) {
    if ($_COOKIE['app'] == 'true') {
        ?>
<script>
alert('application sent successfully');
</script>
<?php
    } else {
        ?>
<script>
alert('ypu already applied for this position');
</script>
<?php
    }
    setcookie('app');
}
if (isset($_COOKIE['remove'])) {
    if ($_COOKIE['remove'] == 'true') {
        ?>
<script>
alert('job deleted');
</script>
<?php
    } else {
        ?>
<script>
alert('you cant delete this job');
</script>
<?php
    }
    setcookie('remove');
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="cssobjs/home.css" />
    <link rel='stylesheet' href='cssobjs/sidebar.css' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/logo.svg">
    <style>
    .sidebar {
        height: 90vh;
    }
    </style>
    <title>tanit</title>
    <script src="./jsobjs/home.js" type="module" defer></script>
    <script src='jsobjs/sidebar.js' type="module" defer></script>
</head>

<body>
    <header>
        <div class="search">
            <input type="text" id='addfilter' class="search__input" placeholder="add filters" list='options'>
            <datalist id="options">
                <option value="description : idktbh" />
                <option value="price : >5 and <500" />
                <?php
                foreach ($exps_list as $exp): ?>
                <option value=" <?= $exp->name ?> :>1 or <=10" />
                <?php endforeach; ?>
            </datalist>
            <button class="search__button">
                <img class="search__icon" src="assets/add.svg" alt="add">
            </button>
        </div>
        <div id='filters'>
            <?php for ($i = 0; $i < count($filters); $i++) { ?>
            <button class="noselect filter" title="<?= $filters[$i] ?>"><span class="text">
                    <?= substr($filters[$i], 0, 11) ?>
                </span><span class="icon"><img src="assets/ico.svg" alt=""></span></button>
            <?php } ?>
        </div>
        <button class="cta">
            <span>search</span>
            <svg width="15px" height="10px" viewBox="0 0 13 10">
                <path d="M1,5 L11,5"></path>
                <polyline points="8 1 12 5 8 9"></polyline>
            </svg>
        </button>
    </header>
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
            <a class="link active" href='home.php'>
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