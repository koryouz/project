<?php
session_start();
require_once 'controller/profil-userCtrl.php';
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
                <div class="col-12  col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5 p-0">
                    <div class="jumbotron">
                    <p>Nom : <?= $selectUser->lastname ?></p>
                    <p>Prénom : <?= $selectUser->firstname ?></p>
                    <p>Téléphone : <?= $selectUser->phoneNumber ?></p>
                    <p>Mail : <?= $selectUser->mail ?></p>
                    <p>Adresse : <?= $selectUser->address ?></p>
                    <p>Nationalité : <?= $selectUser->nationality ?></p>
                    </div>
                    <a href="/admin.php" class="btn btn-outline-primary mainColor ml-4 mr-4 mb-5 float-right"  type="submit" >Retour à la liste</a>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>