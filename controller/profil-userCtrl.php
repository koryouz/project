<?php

require_once 'models/user.php';
require_once 'regex.php';
$formErrors = array();


$user = new user();

if (!empty($_GET['id'])) {
    $user->id = $_GET['id'];
    $selectUser = $user->showSelectUser();
}
?>