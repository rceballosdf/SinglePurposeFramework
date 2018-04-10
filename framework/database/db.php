<?php

if($GLOBALS['config']['environment']=="PROD"){
    if(!defined('DBHost'))
        define('DBHost', 'localhost');
    if(!defined('DBName'))
        define('DBName', 'cads');
    if(!defined('DBUser'))
    define('DBUser', 'cads');
    if(!defined('DBPassword'))
        define('DBPassword', '');
}
elseif($GLOBALS['config']['environment']=="DEV"){
    if(!defined('DBHost'))
        define('DBHost', 'localhost');
    if(!defined('DBName'))
        define('DBName', 'cads');
    if(!defined('DBUser'))
    define('DBUser', 'root');
    if(!defined('DBPassword'))
        define('DBPassword', '');
}

include "PDO.class.php";

//$DB = new Db(DBHost, DBName, DBUser, DBPassword);

?>