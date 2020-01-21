<?php

define("BASE_PATH",dirname(__FILE__)."/");

define("LIBRARY_PATH",BASE_PATH."Library/");
define("UPLOAD_PATH",BASE_PATH."public/uploads/");
define ("BASE_URL","http://localhost/GadgetCommerce/");
define ("UPLOAD_URL",BASE_URL."public/uploads/");
define("HOSTNAME",'localhost');
define("DBNAME",'GadgetCommerce');
define("DBUSER",'admin');
define("DBPASSWORD",'65403');


function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = BASE_PATH.'src/';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    require $fileName;
}
spl_autoload_register('autoload');
