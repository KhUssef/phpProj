<?php
    require_once('class/autoload.php');
    session_start();
    $user = new UserRep();
    $idk = $user->signup($_POST["mail"], $_POST["pwd"], $_POST["fullname"], $_POST["seeking"]);
    echo($idk);
    if($idk==-1){
        setcookie("error_sign", 'mail', time()+1000);
        header("Location:signup.php");
    }else{
        $_SESSION['id'] = $idk;
        setcookie("id", $idk, time()+1000);
        header("Location:home.php");
    }
?>