<?php
error_reporting(E_ALL);

use sarassoroberto\usm\model\UserModel;

require './__autoload.php';

try {
    $userModel = new UserModel();
    // logica controller per ottenere elenco degli utenti
    $users = $userModel->readAll();


} catch (\Throwable $th) {
    //throw $th;
    echo $th->getMessage();
}







include './src/view/list_users_view.php'
?>
