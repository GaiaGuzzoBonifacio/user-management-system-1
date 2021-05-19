<?php
use sarassoroberto\usm\model\UserModel;
include "./__autoload.php";
// [{"id":1,"firstName":"Adamo","lastName":"ROSSI","email":"adamo.rossi@email.com","birthday":"2002-06-12","password":"Adamo"},

$userModel = new UserModel();

$user = $userModel->autenticate('adamo.rossi@email.com','Adamo');

print_r($users);


$user = $userModel->autenticate('adamo.rossi@email.com','adamo');

print_r($users);