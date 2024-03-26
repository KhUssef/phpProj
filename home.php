<?php
    /*require_once('class/autoload.php');
    session_start();

    if(!isset($_SESSION['id'])){
        header('Location:login.php');
    }
    $users = new UserRep();
    $user = $users->getuser($_SESSION['id']);*/
    $user = array('idk', 'idk');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="cssobjs/home.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/logo.svg">
    <title>tanit</title>
    <script src="./home.js" defer></script>
</head>

<body>
    <header>
        <div id="dropdown">
            <button class="dropdown-toggle">
                <span>Menu</span>
                <i class="fa-solid fa-caret-down"></i>
            </button>

            <ul class="menu">
                <li class="menu-item"><a href="#">Italian</a></li>
                <li class="menu-item"><a href="#">Chinese</a></li>
                <li class="menu-item dropdown">
                    <a href="#" class="submenu-toggle">
                        <span>Healthy Options</span>
                        <i class="fa-solid fa-caret-right"></i>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item"><a href="#">Vegetarian</a></li>
                        <li class="submenu-item"><a href="#">Vegan</a></li>
                        <li class="submenu-item"><a href="#">Gluten-Free</a></li>
                    </ul>
                </li>
                <li class="menu-item"><a href="#">Mexican</a></li>
                <li class="menu-item dropdown">
                    <a href="#" class="submenu-toggle">
                        <span>Specials</span>
                        <i class="fa-solid fa-caret-right"></i>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item"><a href="#">Deals of the Day</a></li>
                        <li class="submenu-item"><a href="#">Seasonal Offers</a></li>
                        <li class="submenu-item"><a href="#">Holiday Packages</a></li>
                    </ul>
                </li>
            </ul>
        </div>
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
            <a class="link active">
                <img src="./assets/home.svg" alt="">
                <span class="hidden">Home</span>
            </a>
            <a class="link">
                <img src="./assets/projects.svg" alt="">
                <span class="hidden">history</span>
            </a>
            <a class="link">
                <img src="./assets/dashboard.svg" alt="">
                <span class="hidden">messages</span>
            </a>
            </li>
        </div>
        <div class="sidebar-bottom">
            <div class="sidebar-links">
                <a class="link">
                    <img src="./assets/settings.svg" alt="">
                    <span class="hidden">Settings</span>
                </a>
            </div>

            <div class="user-profile">
                <div class="user-avatar">
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
      $i = 0;
        for($i = 0; $i < 5; $i++){
      ?>
            <li>
                <div class="card">
                    <div class="headercard">
                        <h1>idktbh</h1>
                    </div>
                    <div class="infocard">
                        <p class="titlecard">How to make this material card ?</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                            molestiae quas vel sint commodi. </p>
                    </div>
                    <div class="footercard">
                        <p class="tagcard">#HTML #CSS </p>
                        <button type="button" class="actioncard">Get started </button>
                    </div>
                </div>
            </li>
            <?php ;}?>
        </ul>
    </div>
</body>

</html>