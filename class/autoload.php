<?php 

function autoloader($className) {
    require_once "$className.php";
}
spl_autoload_register('autoloader');