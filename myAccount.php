<?php
session_start();
require_once 'controller/myAccountCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <?php include 'head.php' ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php include 'navbar.php' ?>

        <!--MODAL UPDATE-->

        <div class="modal fade modalPosition" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Modification réussie</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 jumbotron mt-5 p-4 pl-0">
                    <h3 class="pb-2">Votre compte</h3>
                    <p>Vos informations </p>
                    <form action="myAccount.php" method="POST">
                        <label for="mail">Email : </label>
                        <input id="mail" type="mail" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['mail']) : $selectUser->mail ?>" name="mail"  required />
                        <?php if (isset($formErrors['mail'])) { ?>
                            <p><?= $formErrors['mail'] ?> </p>
                        <?php } ?>
                        <label for="passwordInput">Nouveau mot de passe : </label>
                        <input id="passwordInput" type="password" placeholder="*******" name="passwordInput"  required />
                        <?php if (isset($formErrors['password'])) { ?>
                            <p><?= $formErrors['password'] ?> </p>
                        <?php } ?>
                        <label for="lastname">Nom : </label>
                        <input id="lastname" type="text" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['lastname']) : $selectUser->lastname ?>" name="lastname" required />
                        <?php if (isset($formErrors['lastname'])) { ?>
                            <p><?= $formErrors['lastname'] ?> </p>
                        <?php } ?>
                        <label for="firstname">Prénom : </label>
                        <input id="firstname" type="text" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['firstname']) : $selectUser->firstname ?>" name="firstname"  required />
                        <?php if (isset($formErrors['firstname'])) { ?>
                            <p><?= $formErrors['firstname'] ?> </p>
                        <?php } ?>
                        <label for="phoneNumber">Téléphone : </label>
                        <input id="phoneNumber" type="text" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['phoneNumber']) : $selectUser->phoneNumber ?>" name="phoneNumber" required />
                        <?php if (isset($formErrors['phoneNumber'])) { ?>
                            <p><?= $formErrors['phoneNumber'] ?> </p>
                        <?php } ?>
                        <input type="submit" value="Valider" name="submit" />         
                    </form>
                    <form action="myAccount.php" method="POST">
                        <p class="mt-4">Suppression du compte<a class="btn btn-outline-primary mainColor ml-4" data-toggle="modal" data-target="#deleteModal"><i  class="fas fa-trash text-primary"></i></a></p>

                        <!--MODAL DELETE-->

                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Voulez vous supprimer votre compte ?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                        <button type="submit" name="delete" class="btn btn-primary mainBackGroundColor">Oui</button>
                                    </div>
                                    <div class="modal-footer"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>