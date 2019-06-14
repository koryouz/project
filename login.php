<?php
session_start();
require_once 'controller/logInCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <?php include 'head.php' ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <?php include 'loadModal.php' ?>

        <!--MODAL REGISTER-->

        <div class="modal fade modalPosition" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Inscription réussi</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>


        <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex justify-content-end">
                        <form action="login.php" method="POST">
                            <div class="card">
                                <div class="card-header">
                                    <p class="h4">Inscription</p>
                                </div>
                                <div class="container mb-5">
                                    <fieldset>
                                        <div class="form-group row mt-4">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label for="mail">Email</label>
                                                <input type="email" required name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" id="mail" placeholder="exemple@gmail.com" />
                                                <?php if (isset($formErrors['mail'])) { ?>
                                                    <div class="invalid-feedback"><?= $formErrors['mail'] ?></div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label for="passwordInput">Password</label>
                                                <input type="password" required name="passwordInput"  class="form-control <?= isset($formErrors['passwordInput']) ? 'is-invalid' : (isset($passwordInput) ? 'is-valid' : '') ?>" id="passwordInput" placeholder="*********" />
                                                <?php if (isset($formErrors['passwordInput'])) { ?>
                                                    <div class="invalid-feedback"><?= $formErrors['passwordInput'] ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label for="lastname">Nom de famille</label>
                                                <?php
                                                /*
                                                 * On garde dans la value, $_POST['lastname'] qui est la saisie de l'utilisateur
                                                 * Permet d'éviter à l'utilisateur de resaisir ses informations
                                                 * 
                                                 * On ajoute la classe is-invalid si $formErrors['lastname'] existe car cette variable n'existe qu'en cas d'erreur
                                                 * On ajoute la classe is-valid si $lastname existe car cette variable n'existe qu'en cas de saisie valide
                                                 * 
                                                 * En cas d'erreur on crée une div invalid-feedback pour afficher le texte de l'erreur
                                                 */
                                                ?>
                                                <input type="text" required name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" class="form-control <?= isset($formErrors['lastname']) ? 'is-invalid' : (isset($lastname) ? 'is-valid' : '') ?>" id="lastname" placeholder="Dupont" />
                                                <?php if (isset($formErrors['lastname'])) { ?>
                                                    <div class="invalid-feedback"><?= $formErrors['lastname'] ?></div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label for="firstname">Prénom</label>
                                                <input type="text" required name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>"  class="form-control <?= isset($formErrors['firstname']) ? 'is-invalid' : (isset($firstname) ? 'is-valid' : '') ?>" id="firstname" placeholder="Jean" />
                                                <?php if (isset($formErrors['firstname'])) { ?>
                                                    <div class="invalid-feedback"><?= $formErrors['firstname'] ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="address">Adresse</label>
                                                <?php
                                                /*
                                                 * Pour afficher ce qu'a saisi l'utilisateur, on le place entre les balises ouvrantes et fermantes du textarea
                                                 * Le textarea n'a pas d'attribut value
                                                 */
                                                ?>
                                                <textarea required name="address"  class="form-control <?= isset($formErrors['address']) ? 'is-invalid' : (isset($address) ? 'is-valid' : '') ?>" id="address" rows="2" placeholder="1435, boulevard Cambronne 60400 NOYON"><?= isset($_POST['address']) ? $_POST['address'] : '' ?></textarea>
                                                <?php if (isset($formErrors['address'])) { ?>
                                                    <div class="invalid-feedback"><?= $formErrors['address'] ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label for="nationality">Nationalité</label>
                                                 <?php include 'selected.php' ?>
                                                <?php if (isset($formErrors['nationality'])) { ?>
                                                    <div class="invalid-feedback"><?= $formErrors['nationality'] ?></div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label for="phoneNumber">Numéro de téléphone</label>
                                                <input type="text" required name="phoneNumber" value="<?= isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>" class="form-control <?= isset($formErrors['phoneNumber']) ? 'is-invalid' : (isset($phoneNumber) ? 'is-valid' : '') ?>" id="phoneNumber" placeholder="01 02 03 04 05" />
                                                <?php if (isset($formErrors['phoneNumber'])) { ?>
                                                    <div class="invalid-feedback"><?= $formErrors['phoneNumber'] ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary mainBackGroundColor" name="formType" value="Sign in" />
                                </div>
                            </div>
                        <?php } ?>
                    </form>
                </div>
                <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
                    <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <form action="login.php" method="POST">
                            <div class="card">
                                <div class="card-header">
                                    <p class="h4 sizeFormGroup">Connexion</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-group <?= isset($_POST['mailLog']) ? (isset($formErrors['mailLog']) ? 'has-danger' : 'has-success') : '' ?>">
                                        <label for="mailLog">Email</label>
                                        <input required type="mail" name="mailLog" id="mailLog" class="form-control <?= isset($_POST['mailLog']) ? (isset($formErrors['mailLog']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['mailLog']) ? 'value="' . $_POST['mailLog'] . '"' : '' ?> placeholder="mail@exemple.fr" />
                                        <?php if (isset($_POST['mailLog']) && isset($formErrors['mailLog'])) { ?>
                                            <div class="invalid-feedback"><?= $formErrors['mailLog'] ?></div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group <?= isset($_POST['passwordLog']) ? (isset($formErrors['passwordLog']) ? 'has-danger' : 'has-success') : '' ?>">
                                        <label for="passwordLog">Mot de passe</label>
                                        <input required type="password" name="passwordLog" id="passwordLog" class="form-control <?= isset($_POST['passwordLog']) ? (isset($formErrors['passwordLog']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['passwordLog']) ? 'value="' . $_POST['passwordLog'] . '"' : '' ?> placeholder="********" />
                                        <?php if (isset($_POST['passwordLog']) && isset($formErrors['passwordLog'])) { ?>
                                            <div class="invalid-feedback"><?= $formErrors['passwordLog'] ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" value="Log In" class="btn btn-primary mainBackGroundColor"  />
                                </div>
                            </div>
                        </form> 
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>

