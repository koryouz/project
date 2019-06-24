<?php

require_once 'models/comment.php';
require_once 'models/content.php';
require_once 'regex.php';
$formErrors = array();

// AFFICHAGE DU CONTENU 

$content = new content();
$contentRealisationList = $content->getContentRealisationList();

// AFFICHAGE DES COMMENTAIRES

$comment = new comment();   
$commentList = $comment->getCommentRealisationList();



// AJOUT DES COMMENTAIRES

if (count($_POST) > 0) {
    if (isset($_POST['sendComment'])) {
        /*
         * On vérifie que $_POST['content'] n'est pas vide
         * S'il est vide => on stocke l'erreur dans le tableau $formErrors
         * S'il n'est pas vide => on vérifie si la saisie utilisateur correspond à la regex
         */
        if (!empty($_POST['content'])) {
            /*
             * On vérifie si la saisie utilisateur correspond à la regex
             * Si tout va bien => on stocke dans la variable qui nous servira à afficher
             * Sinon => on stocke l'erreur dans le tableau $formErrors
             */
            if (preg_match($regexObjectMessage, $_POST['content'])) {
                //On utilise la fonction htmlspecialchars pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
                $comment->content = htmlspecialchars($_POST['content']);
            } else {
                $formErrors['content'] = 'Merci de renseigner un commentaire valide';
            }
        } else {
            $formErrors['content'] = 'Merci de renseigner votre commentaire';
        }
        // idCard est un input caché que je me sert pour faire passer le contenu
        if (!empty($_POST['idCard'])) {
            $comment->id_mkiu2_content = htmlspecialchars($_POST['idCard']);
        }
        $comment->id_mkiu2_typeOfComment = 1;
        $comment->id_mkiu2_user = $_SESSION['id'];
        $comment->addComment();
        $commentList = $comment->getCommentRealisationList();
    }
}
?>
