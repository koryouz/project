<?php
session_start();
require_once 'controller/contentRealisationCtrl.php';
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
                <div class="col-12  col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5">
                    Voici une galerie des travaux effectués par notre entreprise. Vous pouvez ainsi vous rendre compte de la qualité des aménagements intérieurs et extérieurs réalisés pour les bateaux de commerce et de plaisance.
                    Notre expérience de menuiserie nous permet de proposer une gamme complète de mobiliers pour bateaux. Quelques exemples de réalisations :
                </div>
            </div>
            <div class="row mt-4">
                <?php foreach ($contentRealisationList as $content) { ?>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb"> 

                        <form action="#thumbForm" method="POST">
                            <button  id="thumbForm" class="thumbnail btn btn-light" type="submit" name="idThumb" value="<?= $content->id ?>"> 
                                <img  class="img-thumbnail img-thumbnailResize" src="<?= $content->image; ?>"/>
                            </button>  
                            <a class="thumbnail" data-toggle="modal" data-target="#image-gallery<?= $content->id; ?>" >modal<a/>
                        </form>

                    </div>
                    <!--  MODAL -->
                    <div class="modal fade" id="image-gallery<?= $content->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" ><?= $content->title; ?><?= $content->id; ?></h4>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12  col-sm-12 col-md-12 col-lg-9 col-xl-9 pr-0 pl-0">
                                            <div class="modal-body">
                                                <img id="image-gallery-image" class="img-responsive col-md-12 pr-0 pl-0" src="<?= $content->image; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12  col-sm-12 col-md-12 col-lg-3 col-xl-3 p-0 pr-3 borderLeft">
                                            <p class="pt-3 pl-2 "><?= $content->content ?></p>
                                            <h5 class="pt-3 pl-2 ">Commentaires</h5>
                                            <div class="borderBottom"></div>
                                            <div class="w-auto pr-2 pl-2 pt-2">
                                                <?php foreach ($commentList as $comment) { ?>
                                                    <div class="col-12  col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="row commentContentSpace">
                                                            <p><?= $comment->content ?></p>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12  col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <p class="text-right"><small>le <?= $comment->date ?> par Jacquie</small></p>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <form action="" method="POST">
                                                    <textarea  name="content" id="content" class="textinput" rows="2" placeholder="Laisse un commentaire"></textarea>
                                                    <?php if (isset($formErrors['content'])) { ?>
                                                        <div class="invalid-feedback"><?= $formErrors['content'] ?></div>
                                                    <?php } ?>
                                                    <input hidden name="idCard" value="<?= $content->id ?>" />
                                                    <input name="sendComment" type="submit" class="btn btn-outline-primary my-2 mainColor float-right mr-2" value="Envoyer" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer"></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['id_mkiu2_userGroup']) && $_SESSION['id_mkiu2_userGroup'] == 1) { ?>
                    <div class = "col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class = "thumbnail" href = "admin.php#add">
                            <img class = "img-thumbnail" src = "assets/img/add.png"/>
                        </a>
                    </div>
                <?php } ?>

            </div> 
        </div>
        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>
