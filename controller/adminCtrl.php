<?php
require_once 'models/user.php';
require_once 'models/content.php';
require_once 'models/comment.php';
//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';
$formErrors = array();

$user = new user();
$content = new content();
$comment = new comment(); 
// REDIRECTION SI L'UTILISATEUR N'EST PAS ADMIN
if ($_SESSION['id_mkiu2_userGroup'] == 2) {
    header('location:index.php');
}

$contentList = $content->getContentList();
$commentList = $comment->getAllContentList();
$userList = $user->getUsersList();

//GESTION DES COMPTES

/*
 * Je vérifie qu'un paramètre d'url deleteId a bien été envoyé.
 * Je l'appelle deleteId pour éviter toute suppression accidentelle si j'effectue 
 * une autre action dans cette page qui nécessite l'id de mon patient.
 */
if (!empty($_GET['deleteId'])) {
    /*
     * Je vérifie si le paramètre est un bien un nombre pour éviter de faire planter inutilement la requête
     * Ce n'est que le minimum des sécurités à apporter, dans l'idéal, il faudrait
     * vérifier que le patient existe dans la base de donnée avant de le supprimmer.
     */
    if (preg_match($regexId, $_GET['deleteId'])) {
        //Je peux réutiliser mon objet patient ou en créer un nouveau, ici pas de problème pour la réutilisation.
        $user->id = $_GET['deleteId'];
        $content->id = $_GET['deleteId'];
        $comment->id = $_GET['deleteId'];
        /*
         * Je crée des variables qui me permettront d'indiquer que le patient a été supprimé ou que le patient n'a pas été supprimé
         * L'utilisateur de mon application ne doute pas : il sait que l'action qu'il fait a bien été faite ou qu'elle n'a pas été faite
         * J'utiliserai ces variables pour afficher une alerte / un message / un toast ... quelque chose de voyant pour indiquer l'état
         * de sa demande à l'utilisateur
         */
        if ($user->deleteUser()) {
            $deleteSuccess = 'L\'utilisateur a été supprimé';
        } else {
            $deleteError = 'L\'utilisateur n\'a pas été supprimé';
        }
        if ($content->deleteContent()) {
            $deleteSuccess = 'Le contenu a été supprimé';
            $contentList = $content->getContentList();
        } else {
            $deleteError = 'Le contenu n\'a pas été supprimé';
        }
         if ($comment->deleteComment()) {
            $deleteSuccess = 'Le commentaire a été supprimé';
            $commentList = $comment->getAllContentList();
        } else {
            $deleteError = 'Le commentaire n\'a pas été supprimé';
        }
    }
}

//GESTION DES ARTICLES ET REALISATIONS

if (count($_POST) > 0) {
    if (isset($_POST['formType'])) {
        /*
         * On vérifie que $_POST['title'] n'est pas vide
         * S'il est vide => on stocke l'erreur dans le tableau $formErrors
         * S'il n'est pas vide => on vérifie si la saisie utilisateur correspond à la regex
         */
        if (!empty($_POST['title'])) {
            /*
             * On vérifie si la saisie utilisateur correspond à la regex
             * Si tout va bien => on stocke dans la variable qui nous servira à afficher
             * Sinon => on stocke l'erreur dans le tableau $formErrors
             */
            if (preg_match($regexObjectMessage, $_POST['title'])) {
                //On utilise la fonction htmlspecialchars pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
                $content->title = htmlspecialchars($_POST['title']);
            } else {
                $formErrors['title'] = 'Merci de renseigner un titre valide';
            }
        } else {
            $formErrors['title'] = 'Merci de renseigner votre titre';
        }


        // On verifie que le fichier a bien été envoyé.
        if (!empty($_FILES['file']) && $_FILES['file']['error'] == 0) {
            // On stock dans $fileInfos les informations concernant le chemin du fichier.
            $fileInfos = pathinfo($_FILES['file']['name']);
            // On crée un tableau contenant les extensions autorisées.
            $fileExtension = ['png', 'jpg'];
            // On verifie si l'extension de notre fichier est dans le tableau des extension autorisées.
            if (in_array($fileInfos['extension'], $fileExtension)) {
                //On définit le chemin vers lequel uploader le fichier
                $path = 'uploads/';
                //On crée une date pour différencier les fichiers
                $date = date('Y-m-d_H-i-s');
                //On stocke dans une variable le chemin complet du fichier (chemin + nouveau nom + extension une fois uploadé) Attention : ne pas oublier le point
                $fileFullPath = $path . $date . '.' . $fileInfos['extension'];
                //move_uploaded_files : déplace le fichier depuis son emplacement temporaire ($_FILES['file']['tmp_name']) vers son emplacement définitif ($fileFullPath)
                if (move_uploaded_file($_FILES['file']['tmp_name'], $fileFullPath)) {
                    //On définit les droits du fichiers uploadé (Ici : écriture et lecture pour l'utilisateur apache, lecture uniquement pour le groupe et tout le monde)
                    chmod($fileFullPath, 0777);
                    $content->image = htmlspecialchars($fileFullPath);
                } else {
                    $formErrors['file'] = 'Votre fichier ne s\'est pas téléversé correctement';
                }
            } else {
                $formErrors['file'] = 'Votre fichier n\'est pas du format attendu';
            }
        } else {
            $formErrors['file'] = 'Veuillez selectionner un fichier';
        }


        // Le contenu ne neccesite pas de vérification pusiqu'il peut être vide.
        $content->content = htmlspecialchars($_POST['content']);

        if (!empty($_POST['typeOfContent'])) {
            $content->id_mkiu2_typeOfContent = htmlspecialchars($_POST['typeOfContent']);
        } else {
            $formErrors['typeOfContent'] = 'Merci de renseigner votre contenu';
        }


        if (count($formErrors) == 0) {
            $content->id_mkiu2_user = $_SESSION['id'];
            $content->addContent();
        }
    }
}
?>
