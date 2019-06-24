<?php
session_start();
require_once 'controller/adminCtrl.php';
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
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <h3 class="pb-2 mt-5">Tous les comptes</h3>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <h3 class="pb-2 mt-5">Toutes les réalisations et articles</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6  mt-2 p-4 pl-0">
                    <form action="admin.php" method="GET">
                        <table>
                            <tr>
                                <th class="pb-2 pr-2 pl-2 text-center">Nom</th>
                                <th class="pb-2 pr-2 pl-2 text-center">Prenom</th>
                                <th class="pb-2 pr-2 pl-2 text-center">Téléphone</th>
                                <th class="pb-2 pr-2 pl-2 text-center">Mail</th>
                                <th class="pb-2 pr-2 pl-2 text-center">Action</th>
                            </tr>
                            <?php foreach ($userList as $user) { ?>
                                <tr>
                                    <td class="pb-3 pr-2 pl-2 pt-3"><?= $user->lastname ?></td>
                                    <td class="pb-3 pr-2 pl-2 pt-3"><?= $user->firstname ?></td>
                                    <td class="pb-3 pr-2 pl-2 pt-3"><?= $user->phoneNumber ?></td>
                                    <td class="pb-3 pr-2 pl-2 pt-3"><?= $user->mail ?></td>
                                    <td class="pl-2 pr-2"><a href="profil-user.php?&id=<?= $user->id ?>"><i class="fas fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <i data-toggle="modal" data-target="#deleteModal" data-id="<?= $user->id ?>" data-lastname="<?= $user->lastname ?>" data-firstname="<?= $user->firstname ?>" class="fas fa-trash text-primary"></i></td>
                                </tr>
                            <?php } ?>
                        </table>       
                        <!--  DELETE MODAL USER-->
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body"></div>
                                    <div class="modal-footer"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6  mt-2 p-4 pl-0">
                    <form action="admin.php" method="GET">
                        <table>
                            <tr>
                                <th class="pb-2 pr-2 pl-2 text-center">Titre</th>
                                <th class="pb-2 pr-2 pl-2 text-center">Date</th>
                                <th class="pb-2 pr-2 pl-2 text-center">Contenu</th>
                                <th class="pb-2 pr-2 pl-2 text-center">Type</th>
                                <th class="pb-2 pr-2 pl-2 text-center">Action</th>
                            </tr>
                            <?php foreach ($contentList as $content) { ?>
                                <tr>
                                    <td class="pb-2 pr-2 pl-2"><?= $content->title ?></td>
                                    <td class="pb-2 pr-2 pl-2"><?= $content->date ?></td>
                                    <td class="pb-2 pr-2 pl-2"><?= $content->content ?></td>
                                    <td class="pb-2 pr-2 pl-2"><?= ($content->id_mkiu2_typeOfContent == 1) ? 'Articles' : 'Réalisations' ?></td>
                                    <td align="center"><a href="profil-content.php?&id=<?= $content->id ?>"><i class="fas fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <i data-toggle="modal" data-target="#deleteModalContent" data-id="<?= $content->id ?>" data-title="<?= $content->title ?>" class="fas fa-trash text-primary"></i></td>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>  
                        <!--  DELETE MODAL CONTENT-->
                        <div class="modal fade" id="deleteModalContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body"></div>
                                    <div class="modal-footer"></div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div><hr/>
            <div class="row">
                <div class="col-12  col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                    <h3 class="pb-2">Tous les commentaires</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <form action="admin.php" method="GET">
                        <table>
                            <tr>
                                <th class="pb-2 pr-2 pl-2 text-center">Date</th>
                                <th class="pb-2 pr-2 pl-2 text-center">Contenu</th>
                                <th class="pb-2 pr-2 pl-2 text-center">Action</th>
                            </tr>
                            <?php foreach ($commentList as $comment) { ?>
                                <tr>
                                    <td class="pb-2 pr-2 pl-2"><?= $comment->date ?></td>
                                    <td class="pb-2 pr-2 pl-2"><?= $comment->content ?></td>
                                    <td align="center">
                                        <i data-toggle="modal" data-target="#deleteModalComment" data-id="<?= $comment->id ?>" data-content="<?= $comment->content ?>" class="fas fa-trash text-primary"></i></td>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>    
                        <!--  DELETE MODAL CONTENT-->
                        <div class="modal fade" id="deleteModalComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body"></div>
                                    <div class="modal-footer"></div>
                                </div>
                            </div>
                        </div>                
                    </form>
                </div>
            </div><hr/>
            <form  action="admin.php" method="POST" enctype="multipart/form-data">            
                <h3 class="pb-2">Création d'articles et de réalisations</h3>
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <label for="file">Image </label>
                        <input class="form-control" type="file" name="file" id="file" />
                        <?php if (isset($formErrors['file'])) { ?>
                            <div class="invalid-feedback d-block"><?= $formErrors['file'] ?></div>
                        <?php } ?>
                    </div>
                    <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <label for="typeOfContent">Type du contenu</label>
                        <select class="form-control" name="typeOfContent" value="<?= isset($_POST['typeOfContent']) ? $_POST['typeOfContent'] : '' ?>"class="form-control <?= isset($formErrors['typeOfContent']) ? 'is-invalid' : (isset($typeOfContent) ? 'is-valid' : '') ?>" id="typeOfContent" required>
                            <option disabled selected hidden>Sélectionner un type</option>  
                            <option value="2">Réalisations</option>
                            <option value="1">Articles</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <label for="title">Titre</label>
                        <input type="text" required name="title" value="<?= isset($_POST['title']) ? $_POST['title'] : '' ?>" class="form-control <?= isset($formErrors['title']) ? 'is-invalid' : (isset($title) ? 'is-valid' : '') ?>" id="title" placeholder="Timonerie à paris" />
                        <?php if (isset($formErrors['title'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['title'] ?></div>
                        <?php } ?>
                    </div>
                    <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <label for="content">Contenu</label>
                        <input type="text" name="content" value="<?= isset($_POST['content']) ? $_POST['content'] : '' ?>" class="form-control <?= isset($formErrors['content']) ? 'is-invalid' : (isset($title) ? 'is-valid' : '') ?>" id="content" placeholder="Installation du plancher dans l'espace habitable." />
                        <?php if (isset($formErrors['content'])) { ?>
                            <div class="invalid-feedback"><?= $formErrors['content'] ?></div>
                        <?php } ?>
                    </div>
                    <input type="submit" class="btn btn-primary mainBackGroundColor d-flex ml-auto mt-2 mb-4 mr-3" name="formType" value="Créer"/>
                </div>
            </form>
        </div>
        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>