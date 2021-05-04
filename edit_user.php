<?php
require './__autoload.php';
use sarassoroberto\usm\model\UserModel;

//TODO: cosa succede se id è sbagliato ?

if($_SERVER['REQUEST_METHOD']==='GET'){
    
    $getUserId = filter_input(INPUT_GET,'user_id',FILTER_SANITIZE_NUMBER_INT);
    $userModel = new UserModel();
    $user = $userModel->readOne($getUserId);
    // TODO: Gestire con un eccezione di UserModel::readOne    
    
    $firstName = $user->getFirstName();
    $firstNameClass = '';
    $firstNameClassMessage = ''; 
    $firstNameMessage = '';
  
    $lastName = $user->getLastName();
    $lastNameClass = '';
    $lastNameClassMessage = ''; 
    $lastNameMessage = '';
    
    if(is_null($user)){
        echo "non trovato";
    }

}

include 'src/view/add_user_view.php';


