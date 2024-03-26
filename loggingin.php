
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once('class/autoload.php');
    session_start();
    $users = new UserRep();
    $idk = $users->login($_POST["mail"], $_POST["pwd"]);
    switch ($idk){
        case -1:
            setcookie('error', 'mail', time()+1000);
            header("Location:login.php");
            break;
        case -2:
            setcookie('error', 'pwd', time()+1000);
            header("Location:login.php");
            break;
        default :
            $_SESSION['id'] = $idk;
            setcookie("id", $idk, time()+1000);
            header("Location:home.php");
            break;
    }
?>
</body>
</html>