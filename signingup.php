<?php
    var_dump($_POST);
    require_once('class/autoload.php');
    session_start();
    $user = new UserRep();
    $idk = $user->signup($_POST["mail"], $_POST["pwd"], $_POST["fullname"], $_POST["seeking"]);
    echo($idk);
    if($idk==-1){
        setcookie("error_sign", 'mail', time()+1000);
        header("Location:signup.php");
    }
?>