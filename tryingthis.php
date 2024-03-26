<?php
     require_once('class/autoload.php');
     session_start();
     $user = new UserRep();
     $res = $user->test();
     var_dump($res);
?>