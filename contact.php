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
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <?php include 'head.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6 jumbotron">
                    <ul class="p-3">
                        <li>Envoyer votre courrier à l'adresse suivante : </li>
                    </ul>
                    <p>SARL DELHAY <br />
                        61, Avenue de la Canonnière - 60150 LONGUEIL-ANNEL  <br />
                        Courriel : info@delhay.fr  <br />
                        Tél : 03.44.76.01.67  <br />
                        Fax : 03.44.76.11.10 </p>
                </div>
                <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <iframe class="border" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6167.359168623277!2d2.866991433763138!3d49.46457339048348!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1554189960952!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> 
                </div>
            </div>
            <div class="row">
                <div class="col-12  col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 pl-0">
                    <div class="container mb-5 jumbotron">
                        <ul class="p-3">
                            <li>Utiliser le formulaire suivant : (inscription nécessaire)</li>
                        </ul>
                        <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
                            <form action="contact.php" method="POST">
                                <div class="form-group row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="title">Objet</label>
                                        <input type="text" required name="title" value="<?= isset($_POST['title']) ? $_POST['title'] : '' ?>" class="form-control <?= isset($formErrors['title']) ? 'is-invalid' : (isset($title) ? 'is-valid' : '') ?>" id="title" placeholder="Demande devis pour timonerie" />
                                        <?php if (isset($formErrors['title'])) { ?>
                                            <div class="invalid-feedback"><?= $formErrors['title'] ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="subject">Message</label>
                                        <textarea required name="subject"  class="form-control <?= isset($formErrors['subject']) ? 'is-invalid' : (isset($subject) ? 'is-valid' : '') ?>" id="subject" rows="4"><?= isset($_POST['subject']) ? $_POST['subject'] : '' ?></textarea>
                                        <?php if (isset($formErrors['subject'])) { ?>
                                            <div class="invalid-feedback"><?= $formErrors['subject'] ?></div>
                                        <?php } ?>
                                    </div>
                                </div>               
                                <input type="submit" class="btn btn-success mainBackGroundColor" value="Envoyer" />
                            </form>
                        <?php } else { ?>
                            <p>Envoie réussie</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>