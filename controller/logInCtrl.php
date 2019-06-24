<?php

// On inclut le model utilisé, ici c'est l'utilisateur.
require_once 'models/user.php';
//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';

// INSCRIPTION
//On initialise un tableau d'erreurs vide
$formErrors = array();
/*
 * On vérifie si le tableau $_POST est vide
 * S'il est vide => le formulaire n'a pas été envoyé
 * S'il a au moins une ligne => le formulaire a été envoyé, on peut commencer les vérifications
 */
if (count($_POST) > 0) {
//On instancie un objet.
    $user = new user();
// On vérifie quel formulaire est utilisé puisqu'il y a deux formulaire dans cette page, et il peut y avoir conflit.
    if (isset($_POST['formType'])) {
        /*
         * On vérifie que $_POST['lastname'] n'est pas vide
         * S'il est vide => on stocke l'erreur dans le tableau $formErrors
         * S'il n'est pas vide => on vérifie si la saisie utilisateur correspond à la regex
         */
        if (!empty($_POST['lastname'])) {
            /*
             * On vérifie si la saisie utilisateur correspond à la regex
             * Si tout va bien => on stocke dans la variable qui nous servira à afficher
             * Sinon => on stocke l'erreur dans le tableau $formErrors
             */
            if (preg_match($regexName, $_POST['lastname'])) {
                //On utilise la fonction htmlspecialchars pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
                $user->lastname = htmlspecialchars($_POST['lastname']);
            } else {
                $formErrors['lastname'] = 'Merci de renseigner un nom de famille valide';
            }
        } else {
            $formErrors['lastname'] = 'Merci de renseigner votre nom de famille';
        }

        if (!empty($_POST['firstname'])) {
            if (preg_match($regexName, $_POST['firstname'])) {
                $user->firstname = htmlspecialchars($_POST['firstname']);
            } else {
                $formErrors['firstname'] = 'Merci de renseigner un prénom valide';
            }
        } else {
            $formErrors['firstname'] = 'Merci de renseigner votre prénom';
        }

        if (!empty($_POST['nationality'])) {
            if (preg_match($regexNationnality, $_POST['nationality'])) {
                $user->nationality = htmlspecialchars($_POST['nationality']);
            } else {
                $formErrors['nationality'] = 'Merci de renseigner une nationalité valide';
            }
        } else {
            $formErrors['nationality'] = 'Merci de renseigner votre nationalité';
        }

        if (!empty($_POST['address'])) {
            if (preg_match($regexAddress, $_POST['address'])) {
                $user->address = htmlspecialchars($_POST['address']);
            } else {
                $formErrors['address'] = 'Merci de renseigner une adresse valide';
            }
        } else {
            $formErrors['address'] = 'Merci de renseigner votre adresse';
        }

        if (!empty($_POST['mail'])) {
            if (preg_match($regexMail, $_POST['mail'])) {
                $user->mail = htmlspecialchars($_POST['mail']);
                /**
                 * Je vérifie si l'utilisateur existe dans la base de données
                 */
                $check = $user->checkUser();
                if ($check->number > 0) {
                    $formErrors['mail'] = 'Un compte avec ce mail existe déjà';
                }
            } else {
                $formErrors['mail'] = 'Merci de renseigner un mail valide';
            }
        } else {
            $formErrors['mail'] = 'Merci de renseigner votre mail';
        }

        if (!empty($_POST['phoneNumber'])) {
            if (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
                $user->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
            } else {
                $formErrors['phoneNumber'] = 'Merci de renseigner un numéro de téléphone valide';
            }
        } else {
            $formErrors['phoneNumber'] = 'Merci de renseigner votre numéro de téléphone';
        }

        if (!empty($_POST['passwordInput'])) {
            if (preg_match($regexMaxCharact, $_POST['passwordInput'])) {
                if (preg_match($regexPassword, $_POST['passwordInput'])) {
                    $user->passwordInput = password_hash($_POST['passwordInput'], PASSWORD_DEFAULT);
                } else {
                    $formErrors['passwordInput'] = 'Merci de renseigner un mot de passe valide';
                }
            } else {
                $formErrors['passwordInput'] = 'Merci de renseigner un mot de passe entre 4 et 16 charactères';
            }
        } else {
            $formErrors['passwordInput'] = 'Merci de renseigner un mot de passe';
        }
        if (count($formErrors) == 0) {
            $user->addUser();
            $_SESSION['check'] = 1;
            header('location:login.php');
            exit;
        }
    } else {

        // LOG-IN

        if (!empty($_POST['mailLog'])) {
            if (preg_match($regexMail, $_POST['mailLog'])) {
                $user->mail = htmlspecialchars($_POST['mailLog']);
            } else {
                $formErrors['mailLog'] = 'Ce mail est incorrect';
            }
        } else {
            $formErrors['mailLog'] = 'L\'adresse mail est obligatoire';
        }

        if (empty($_POST['passwordLog'])) {
            $formErrors['passwordLog'] = 'Le mot de passe est obligatoire';
        }

        if (count($formErrors) == 0) {
            //Après mes vérifications habituelles, je lance ma méthode checkUser afin de vérifier si l'utilisateur existe bien.
            $check = $user->checkUser();
            if ($check->number == 1) {
                //Si l'utilisateur existe je récupère le hash de son mot de passe pour le comparé au mot de passe tapé
                $userInfo = $user->getUserByMail();
                //On utilise la fonction password_verify pour vérifier que les mots de passe correspondent
                if (password_verify($_POST['passwordLog'], $userInfo->passwordInput)) {
                    /**
                     * Si les mots de passe correspondent, on crée une session et les variables de session qui contiendront
                     * tous les éléments que l'on souhaite conserver tout au long de la connexion
                     * Il faut appeler session_start sur toutes les pages pour que l'on ai accès aux
                     * variables de session. C'est ce qui constitue la connexion en elle-même.
                     */
                    $_SESSION['id'] = $userInfo->id;
                    $_SESSION['lastname'] = $userInfo->lastname;
                    $_SESSION['firstname'] = $userInfo->firstname;
                    $_SESSION['id_mkiu2_userGroup'] = $userInfo->id_mkiu2_userGroup;
                    $_SESSION['check'] = 2;
                    header('location:index.php');
                    exit;
                } else {
                    $formErrors['passwordLog'] = 'L\'email et/ou le mot de passe est invalide';
                }
            } else {
                $formErrors['passwordLog'] = 'L\'email et/ou le mot de passe est invalide';
            }
        }
    }
}
?>
