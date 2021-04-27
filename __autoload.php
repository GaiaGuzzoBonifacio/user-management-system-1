<?php

// sarassoroberto\usm\entity\User;
// src/entity/User.php

// 1. sarassoroberto\usm --> src
// 2. \ --> DIRECTORY_SEPARATOR (\,/)

//C:\laragon\www\user-management-system-con-database

// sarassoroberto\usm\validator\bootstrap\ValidationFormHelper;
// src/validator/bootstrap/ValidationFormHelper.php;

use sarassoroberto\usm\entity\User;

spl_autoload_register(function($className){
    $classPath = str_replace("sarassoroberto\usm",__DIR__."\src",$className);
    $classPath = str_replace("\\",DIRECTORY_SEPARATOR,$classPath).".php";
    // echo $classPath;
    require $classPath;
    
});

// $u =  new User('a','b','c','d');
// print_r($u);

