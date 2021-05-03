<?php

use sarassoroberto\usm\model\UserModel;

require './__autoload.php';

// isset($_GET['user_id'])
// $user_id = filter_var($_GET['user_id'],FILTER_SANITIZE_NUMBER_INT);
// $user_id = filter_input(INPUT_POST,'user_id',FILTER_SANITIZE_NUMBER_INT);
$user_id = filter_input(INPUT_GET,'user_id',FILTER_SANITIZE_NUMBER_INT);

var_dump($user_id);
echo "<h1>$user_id</h1>";

$userModel = new UserModel();
if($userModel->delete($user_id) === true){
    echo "cancellato";
}else{
    echo "utente non esiste o gia elminato";
};



// header("location: list_users.php");
