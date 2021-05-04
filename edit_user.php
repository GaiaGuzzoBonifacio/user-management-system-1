<?php

use sarassoroberto\usm\entity\User;
use sarassoroberto\usm\model\UserModel;
use sarassoroberto\usm\validator\UserValidation;

$action = "edit_user.php?user_id=";
if($_SERVER['REQUEST_METHOD']==='GET'){
    $user_id = filter_input(INPUT_GET,'user_id',FILTER_SANITIZE_NUMBER_INT);
    $userModel = new UserModel();
    $user = $userModel->readOne($user_id);

    $firstName = $user->getFirstName();
    $firstNameClass = '';   
    $lastName = $user->getLastName();    
    $email = $user->getEmail();    
}

if ($_SERVER['REQUEST_METHOD']==='POST') {
    // passare  id in qualche modo
    // - hidden field  input type hidden
    $user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['birthday']);
    $val = new UserValidation($user);
    $firstNameValidation = $val->getError('firstName');

    list($firstName, $firstNameClass, $firstNameClassMessage, $firstNameMessage) = ValidationFormHelper::getValidationClass($firstNameValidation);

    if ($val->getIsValid()) {
        //TODO
        $userModel = new UserModel();
        $userModel->create($user);
       // header('location: ./list_users.php');
    }
}
