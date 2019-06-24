<?php
session_start();
require_once 'controller/contactCtrl.php';
?>   
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <?php include 'head.php' ?>
    </head>
    <body>
        <?php include 'navbar.php'  ?>
        <?php include 'loadModal.php' ?>
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
                                    <?php if (isset($formErrors['reference'])) { ?>
                                        <div class="invalid-feedback"><?= $formErrors['reference'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>               
                            <input type="submit" class="btn btn-success mainBackGroundColor" value="Envoyer" />
                        </form>


                        <!--MODAL REGISTER-->

                        <div class="modal fade modalPosition" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center">Envoi réussi</p>
                                        <p>Pour plus d'information, veuillez nous contacter directement au 03.44.76.01.67</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>