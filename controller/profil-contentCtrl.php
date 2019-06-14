<?php

require_once 'models/content.php';
require_once 'regex.php';
$formErrors = array();


$content = new content();

if (!empty($_GET['id'])) {
    if (preg_match($regexId, $_GET['id'])) {
        $content->id = $_GET['id'];
    }

    if (count($_POST) > 0) {
        if (!empty($_POST['title'])) {
            if (preg_match($regexObjectMessage, $_POST['title'])) {
                $content->title = htmlspecialchars($_POST['title']);
            } else {
                $formErrors['title'] = 'La forme de votre titre est invalide';
            }
        } else {
            $formErrors['title'] = 'Veuillez renseigner votre titre';
        }
        if (!empty($_POST['date'])) {
            if (preg_match($regexDate, $_POST['date'])) {
                $content->date = htmlspecialchars($_POST['date']);
            } else {
                $formErrors['date'] = 'La forme de votre date est invalide';
            }
        } else {
            $formErrors['date'] = 'Veuillez renseigner votre date';
        }

        $content->content = htmlspecialchars($_POST['content']);

        if (!empty($_POST['type'])) {
            if (preg_match($regexType, $_POST['type'])) {
                $content->id_mkiu2_typeOfContent = htmlspecialchars($_POST['type']);
            } else {
                $formErrors['type'] = 'La forme de votre type est invalide';
            }
        } else {
            $formErrors['type'] = 'Veuillez renseigner votre type';
        }
        if (count($formErrors) == 0 && isset($_POST['submit'])) {
            $content->modifyContent();
        }
    }
    $selectContent = $content->showSelectContent();
} else {
    header('Location: /admin.php');
}
?>