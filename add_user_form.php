<?php 
//require "autoload.php";
//require __DIR__."/vendor/testTools/testTool.php";

use sarassoroberto\usm\entity\User;
use sarassoroberto\usm\model\UserModel;
use sarassoroberto\usm\validator\bootstrap\ValidationFormHelper;
use sarassoroberto\usm\validator\UserValidation;

require "./__autoload.php";

// require __DIR__."/src/validator/fondation/ValidationFormHelper.php"
// print_r($_POST);
if($_SERVER['REQUEST_METHOD']==='GET'){
    list($firstName,$firstNameClass,$firstNameClassMessage,$firstNameMessage) = ValidationFormHelper::getDefault();
    
}

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['birthday']);
    $val = new UserValidation($user);
    $firstNameValidation = $val->getError('firstName');
    $lastNameValidation = $val->getError('lastName');

    print_r($val);
    list($firstName, $firstNameClass, $firstNameClassMessage, $firstNameMessage) = ValidationFormHelper::getValidationClass($firstNameValidation);
    list($lastName, $lastNameClass, $lastNameClassMessage, $lastNameMessage) = ValidationFormHelper::getValidationClass($lastNameValidation);

    if ($val->getIsValid()) {
        //TODO
        $userModel = new UserModel();
        $userModel->create($user);
       // header('location: ./list_users.php');
    }
}

include 'src/view/add_user_view.php';
?>
