<?php

//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';

//On initialise un tableau d'erreurs vide
$formErrors = array();

if (count($_POST) > 0) {

    if (!empty($_POST['title'])) {

        if (preg_match($regexObjectMessage, $_POST['title'])) {
            //On utilise la fonction strip_tags pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
            $title = strip_tags($_POST['title']);
        } else {
            $formErrors['title'] = 'Merci de renseigner un objet valide';
        }
    } else {
        $formErrors['title'] = 'Merci de renseigner un objet';
    }

    if (!empty($_POST['subject'])) {
        if (preg_match($regexObjectMessage, $_POST['subject'])) {
            $subject = strip_tags($_POST['subject']);
        } else {
            $formErrors['subject'] = 'Merci de renseigner un message valide';
        }
    } else {
        $formErrors['subject'] = 'Merci de renseigner votre message';
    }
    
    if (empty($_SESSION['id'])) {
        $formErrors['reference'] = 'Merci de vous inscrire et de vous connecter';
    }
    
    if (count($formErrors) == 0) {
        $_SESSION['check'] = 3;
        header('location:contact.php');
        exit;
    }
}
?>