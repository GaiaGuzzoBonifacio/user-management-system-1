<?php
namespace sarassoroberto\usm\service;

use sarassoroberto\usm\model\UserModel;


class UserSession {
    public function __construct() {
        session_start();
    }


    public function autenticate(string $email,string $password)
    {
        $um = new UserModel();
        $user = $um->autenticate($email,$password);

        if(!is_null($user)){
            $_SESSION['user_autenticated'] = $user;
            return $user;
        }else{
            unset($_SESSION['user_autenticated'])  ;
        }
    }
}