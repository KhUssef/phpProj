<?php
    require_once('class/autoload.php');
    session_start();
    if(isset($_COOKIE["id"])){
        if($_COOKIE["id"]==-1){
            unset($_SESSION['id']);
            setcookie("id");
        }else{
            $_SESSION['id'] = $_COOKIE["id"];
        }

    }
    if(!isset($_SESSION['id'])){
        header('Location:login.php');
    }
    $users = new UserRep();
    $user = $users->getuser($_SESSION['id']);
    $user = array('idk', 'idk');
    $jobs = new jobRep();
    $joblist = $jobs->getjobs();
    $exps = new expRep();
    $exps_list = $exps->getfields();
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
    <title>tanit</title>
    <script src="./home.js" type="module" defer></script>
</head>

<body>
    <header>
        <div class="search">
            <input type="text" id='addfilter' class="search__input" placeholder="add filters" list='options'>
            <datalist id="options">
                <option value="description : 'idktbh'" />
                <option value="price : >10 || <12" />
                <?php
        foreach($exps_list as $exp):?>
                <option value=" <?=$exp->name?> :>10 && <=11" />
                <?php endforeach;?>
            </datalist>
            <button class="search__button">
                <img class="search__icon" src="assets/add.svg" alt="add">
            </button>
        </div>
        <div id='filters'>
            <button class="noselect filter"><span class="text">lol</span><span class="icon"><img src="assets/ico.svg"
                        alt=""></span></button>

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
            <a class="link" title='Notifications' href='notification.php'>
                <img src="./assets/notification.svg" alt="notifications">
                <span class="hidden">Notifications</span>
            </a>
            <a class="link" title='Messages' href='message.php'>
                <img src="./assets/message.svg" alt="messages">
                <span class="hidden">Messages</span>
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
                    <p class="username"><?=$user[0]?></p>
                    <p class="user-email"><?=$user[1]?></p>
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
                        <h1><?=$job->state ?></h1>
                    </div>
                    <div class="infocard">
                        <p class="titlecard"><?=$job->name ?></p>
                        <p>
                        <h4>Price : </h4><?=$job->price?><h4> $</h4>
                        </p>
                        <p><?= $jobs->formatdesc($job->description) ?> </p>
                    </div>
                    <div class="footercard">
                        <p class="tagcard">#<?=$job->req1 ?> #<?=$job->req2 ?> #CSS </p>
                        <a href='detailjob.php?id=<?=$job->id?>'><button type="button" class="actioncard">Details
                            </button></a>
                    </div>
                </div>
            </li>
            <?php endforeach ;?>
        </ul>
    </div>
</body>

</html>