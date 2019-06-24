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
                    <div class="card">
                        <div class="card-header">
                            <h4>Votre compte (informations)</h4>
                        </div>
                        <form action="profil-content.php?&id=<?= $content->id ?>" method="POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="title">Titre : </label>
                                            <input id="title" class="form-control" type="title" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['title']) : $selectContent->title ?>" name="title"  required />
                                            <?php if (isset($formErrors['title'])) { ?>
                                                <p><?= $formErrors['title'] ?> </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="date">Date de création : </label>
                                            <input id="date" class="form-control" type="text" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['date']) : $selectContent->date ?>" name="date" required />
                                            <?php if (isset($formErrors['date'])) { ?>
                                                <p><?= $formErrors['date'] ?> </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="content">Contenu : </label>
                                    <input id="content" class="form-control" type="text" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['content']) : $selectContent->content ?>" name="content"  />
                                    <?php if (isset($formErrors['content'])) { ?>
                                        <p><?= $formErrors['content'] ?> </p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type : </label>
                                    <select id="type" class="form-control" name="type" required >
                                        <option value="1" <?= ($selectContent->id_mkiu2_typeOfContent == 1) ? 'selected' : ''; ?>>Article</option>
                                        <option value="2" <?= ($selectContent->id_mkiu2_typeOfContent == 2) ? 'selected' : ''; ?>>Réalisation</option>
                                    </select> 
                                    <?php if (isset($formErrors['type'])) { ?>
                                        <p><?= $formErrors['type'] ?> </p>
                                    <?php } ?>
                                </div>  
                            <input type="submit" value="Valider" name="submit" class="btn btn-primary mainBackGroundColor"/>         
                            </div>
                        </form>
                    </div>
                    <a href="/admin.php" class="btn btn-outline-primary mainColor ml-4 mr-4 mt-5 float-right"  type="submit" >Retour à la liste</a>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>