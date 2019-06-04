<?php

require_once 'models/user.php';
//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';
$formErrors = array();

$user = new user();

if (!empty($_SESSION['id'])) {
    if (preg_match($regexId, $_SESSION['id'])) {
        $user->id = htmlspecialchars($_SESSION['id']);
    }

    if (count($_POST) > 0) {
        if (!empty($_POST['lastname'])) {
            if (preg_match($regexName, $_POST['lastname'])) {
                $user->lastname = htmlspecialchars($_POST['lastname']);
            } else {
                $formErrors['lastname'] = 'La forme de votre nom est invalide';
            }
        } else {
            $formErrors['lastname'] = 'Veuillez renseigner votre nom';
        }
        if (!empty($_POST['firstname'])) {
            if (preg_match($regexName, $_POST['firstname'])) {
                $user->firstname = htmlspecialchars($_POST['firstname']);
            } else {
                $formErrors['firstname'] = 'La forme de votre prénom est invalide';
            }
        } else {
            $formErrors['firstname'] = 'Veuillez renseigner votre prénom';
        }
        if (!empty($_POST['phoneNumber'])) {
            if (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
                $user->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
            } else {
                $formErrors['phoneNumber'] = 'La forme de votre numéro est invalide';
            }
        } else {
            $formErrors['phoneNumber'] = 'Veuillez renseigner votre numéro';
        }
        if (!empty($_POST['mail'])) {
            if (preg_match($regexMail, $_POST['mail'])) {
                $user->mail = htmlspecialchars($_POST['mail']);
            } else {
                $formErrors['mail'] = 'La forme de votre mail est invalide';
            }
        } else {
            $formErrors['mail'] = 'Veuillez renseigner votre mail';
        }
        if (!empty($_POST['passwordInput'])) {
            if (preg_match($regexPassword, $_POST['passwordInput'])) {
                $user->passwordInput = htmlspecialchars($_POST['passwordInput']);
            } else {
                $formErrors['password'] = 'La forme de votre mot de passe est invalide';
            }
        } else {
            $formErrors['password'] = 'Veuillez renseigner votre mot de passe';
        }


        if (count($formErrors) == 0) {
            $user->modifyUser();
            $userInfo = $user->getUserByMail();
            $_SESSION['id'] = $userInfo->id;
            $_SESSION['lastname'] = $userInfo->lastname;
            $_SESSION['firstname'] = $userInfo->firstname;
            $_SESSION['mail'] = $userInfo->mail;
            $_SESSION['passwordInput'] = $userInfo->passwordInput;
            $_SESSION['phoneNumber'] = $userInfo->phoneNumber;
            $_SESSION['address'] = $userInfo->address;
            $_SESSION['nationality'] = $userInfo->nationality;
        }
    }
    $selectUser = $user->showSelectUser();
}
?>
