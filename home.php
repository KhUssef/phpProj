<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cssobjs/home.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tanit</title>
</head>
<header class="site-header">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">Popular</a></li>
                <li><a href="#">Account</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>