<?php


spl_autoload_register(function ($className){
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    //$className = str_split($className);
    //$className[0] = strtolower($className[0]);
    //$className = join("",$className);
    require_once("libraries/$className.php");
});
