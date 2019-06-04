<?php
session_start();
require_once 'controller/myAccountCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <?php include 'head.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 jumbotron mt-5 p-4 pl-0">
                    <h3 class="pb-2">Votre compte</h3>
                    <p>Vos informations :</p>
                    <form action="myAccount.php" method="POST">
                        <label for="mail">Email : </label>
                        <input id="mail" type="mail" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['mail']) : $selectUser->mail ?>" name="mail"  required />
                        <?php if (isset($formErrors['mail'])) { ?>
                            <p><?= $formErrors['mail'] ?> </p>
                        <?php } ?>
                        <label for="passwordInput">Nouveau mot de passe : </label>
                        <input id="passwordInput" type="password" value="*******" name="passwordInput"  required />
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
                        <input type="submit" value="Valider" />
                    </form>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>

