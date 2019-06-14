<?php
session_start();
require_once 'controller/profil-contentCtrl.php';
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
                <div class="col-12  col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5 mb-5">
                    <form action="profil-content.php?&id=<?= $content->id ?>" method="POST">
                        <label for="title">Titre : </label>
                        <input id="title" type="title" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['title']) : $selectContent->title ?>" name="title"  required />
                        <?php if (isset($formErrors['title'])) { ?>
                            <p><?= $formErrors['title'] ?> </p>
                        <?php } ?>
                        <label for="date">Date de création : </label>
                        <input id="date" type="text" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['date']) : $selectContent->date ?>" name="date" required />
                        <?php if (isset($formErrors['date'])) { ?>
                            <p><?= $formErrors['date'] ?> </p>
                        <?php } ?>
                        <label for="content">Contenu : </label>
                        <input id="content" type="text" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['content']) : $selectContent->content ?>" name="content"  />
                        <?php if (isset($formErrors['content'])) { ?>
                            <p><?= $formErrors['content'] ?> </p>
                        <?php } ?>
                        <label for="type">Type : </label>
                        <select id="type" name="type" required >
                            <option value="1" <?= ($selectContent->id_mkiu2_typeOfContent == 1)? 'selected' : ''; ?>>Article</option>
                            <option value="2" <?= ($selectContent->id_mkiu2_typeOfContent == 2)? 'selected' : ''; ?>>Réalisation</option>
                        </select> 
                        <?php if (isset($formErrors['type'])) { ?>
                            <p><?= $formErrors['type'] ?> </p>
                        <?php } ?>
                        <input type="submit" value="Valider" name="submit" class="btn btn-primary mainBackGroundColor"/>         
                    </form>
                    <a href="/admin.php" class="btn btn-outline-primary mainColor ml-4 mr-4 float-right"  type="submit" >Retour à la liste</a>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>