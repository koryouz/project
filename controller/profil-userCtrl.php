<?php

require_once 'models/user.php';
require_once 'regex.php';
$formErrors = array();
//On instancie un objet.
$user = new user();

    //SI l'ID est valide je montre le contenu grâce à la méthod showSelectUser
if (!empty($_GET['id'])) {
    $user->id = $_GET['id'];
    $selectUser = $user->showSelectUser();
}
?>