<?php
//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';

//On initialise un tableau d'erreurs vide
$formErrors = array();
/*
 * On vérifie si le tableau $_POST est vide
 * S'il est vide => le formulaire n'a pas été envoyé
 * S'il a au moins une ligne => le formulaire a été envoyé, on peut commencer les vérifications
 */
if (count($_POST) > 0) {
    /*
     * On vérifie que $_POST['lastName'] n'est pas vide
     * S'il est vide => on stocke l'erreur dans le tableau $formErrors
     * S'il n'est pas vide => on vérifie si la saisie utilisateur correspond à la regex
     */
    if (!empty($_POST['lastName'])) {
        /*
         * On vérifie si la saisie utilisateur correspond à la regex
         * Si tout va bien => on stocke dans la variable qui nous servira à afficher
         * Sinon => on stocke l'erreur dans le tableau $formErrors
         */
        if (preg_match($regexName, $_POST['lastName'])) {
            //On utilise la fonction strip_tags pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
            $lastName = strip_tags($_POST['lastName']);
        } else {
            $formErrors['lastName'] = 'Merci de renseigner un nom de famille valide';
        }
    } else {
        $formErrors['lastName'] = 'Merci de renseigner votre nom de famille';
    }

    if (!empty($_POST['firstName'])) {
        if (preg_match($regexName, $_POST['firstName'])) {
            $firstName = strip_tags($_POST['firstName']);
        } else {
            $formErrors['firstName'] = 'Merci de renseigner un prénom valide';
        }
    } else {
        $formErrors['firstName'] = 'Merci de renseigner votre prénom';
    }

    if (!empty($_POST['birthDate'])) {
        if (preg_match($regexBirthDate, $_POST['birthDate'])) {
            $birthDate = strip_tags($_POST['birthDate']);
        } else {
            $formErrors['birthDate'] = 'Merci de renseigner une date de naissance valide';
        }
    } else {
        $formErrors['birthDate'] = 'Merci de renseigner votre date de naissance';
    }

    if (!empty($_POST['birthCountry'])) {
        if (preg_match($regexCountryAndNationnality, $_POST['birthCountry'])) {
            $birthCountry = strip_tags($_POST['birthCountry']);
        } else {
            $formErrors['birthCountry'] = 'Merci de renseigner un pays de naissance valide';
        }
    } else {
        $formErrors['birthCountry'] = 'Merci de renseigner votre pays de naissance';
    }

    if (!empty($_POST['nationality'])) {
        if (preg_match($regexCountryAndNationnality, $_POST['nationality'])) {
            $nationality = strip_tags($_POST['nationality']);
        } else {
            $formErrors['nationality'] = 'Merci de renseigner une nationalité valide';
        }
    } else {
        $formErrors['nationality'] = 'Merci de renseigner votre nationalité';
    }

    if (!empty($_POST['address'])) {
        if (preg_match($regexAddress, $_POST['address'])) {
            $address = strip_tags($_POST['address']);
        } else {
            $formErrors['address'] = 'Merci de renseigner une adresse valide';
        }
    } else {
        $formErrors['address'] = 'Merci de renseigner votre adresse';
    }

    if (!empty($_POST['mail'])) {
        if (preg_match($regexMail, $_POST['mail'])) {
            $mail = strip_tags($_POST['mail']);
        } else {
            $formErrors['mail'] = 'Merci de renseigner une nationalité valide';
        }
    } else {
        $formErrors['mail'] = 'Merci de renseigner votre nationalité';
    }

    if (!empty($_POST['phoneNumber'])) {
        if (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
            $phoneNumber = strip_tags($_POST['phoneNumber']);
        } else {
            $formErrors['phoneNumber'] = 'Merci de renseigner un numéro de téléphone valide';
        }
    } else {
        $formErrors['phoneNumber'] = 'Merci de renseigner votre numéro de téléphone';
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
        <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
            <form action="login.php" method="POST">
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex justify-content-end">
                            <div class="card">
                                <div class="card-header">
                                    <p class="h4">Inscription</p>
                                </div>
                                <div class="container mb-5">
                                    <fieldset>
                                        <div class="form-group row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label for="lastName" class="mt-2">Nom de famille</label>
                                                <?php
                                                /*
                                                 * On garde dans la value, $_POST['lastName'] qui est la saisie de l'utilisateur
                                                 * Permet d'éviter à l'utilisateur de resaisir ses informations
                                                 * 
                                                 * On ajoute la classe is-invalid si $formErrors['lastName'] existe car cette variable n'existe qu'en cas d'erreur
                                                 * On ajoute la classe is-valid si $lastName existe car cette variable n'existe qu'en cas de saisie valide
                                                 * 
                                                 * En cas d'erreur on crée une div invalid-feedback pour afficher le texte de l'erreur
                                                 */
                                                ?>
                                                <input type="text" required name="lastName" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" class="form-control <?= isset($formErrors['lastName']) ? 'is-invalid' : (isset($lastName) ? 'is-valid' : '') ?>" id="lastName" placeholder="Dupont" />
                                                <?php if (isset($formErrors['lastName'])) { ?>
                                                    <div class="invalid-feedback"><?= $formErrors['lastName'] ?></div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label for="firstName" class="mt-2">Prénom</label>
                                                <input type="text" required name="firstName" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>"  class="form-control <?= isset($formErrors['firstName']) ? 'is-invalid' : (isset($firstName) ? 'is-valid' : '') ?>" id="firstName" placeholder="Jean" />
                                                <?php if (isset($formErrors['firstName'])) { ?>
                                                    <div class="invalid-feedback"><?= $formErrors['firstName'] ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label for="birthDate">Date de naissance</label>
                                                <input type="date" required name="birthDate" value="<?= isset($_POST['birthDate']) ? $_POST['birthDate'] : '' ?>" class="form-control <?= isset($formErrors['birthDate']) ? 'is-invalid' : (isset($birthDate) ? 'is-valid' : '') ?>" id="birthDate" />
                                                <?php if (isset($formErrors['birthDate'])) { ?>
                                                    <div class="invalid-feedback"><?= $formErrors['birthDate'] ?></div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label for="birthCountry">Pays de naissance</label>
                                                <input type="text" required name="birthCountry"  value="<?= isset($_POST['birthCountry']) ? $_POST['birthCountry'] : '' ?>"class="form-control <?= isset($formErrors['birthCountry']) ? 'is-invalid' : (isset($birthCountry) ? 'is-valid' : '') ?>" id="birthCountry" placeholder="France" />
                                                <?php if (isset($formErrors['birthCountry'])) { ?>
                                                    <div class="invalid-feedback"><?= $formErrors['birthCountry'] ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label for="nationality">Nationalité</label>
                                                <input type="text" required name="nationality"  value="<?= isset($_POST['nationality']) ? $_POST['nationality'] : '' ?>"class="form-control <?= isset($formErrors['nationality']) ? 'is-invalid' : (isset($nationality) ? 'is-valid' : '') ?>" id="nationality" placeholder="Française" />
                                                <?php if (isset($formErrors['nationality'])) { ?>
                                                    <div class="invalid-feedback"><?= $formErrors['nationality'] ?></div>
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
                                                <label for="mail">Mail</label>
                                                <input type="email" required name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" id="mail" placeholder="adresse@mail.com" />
                                                <?php if (isset($formErrors['mail'])) { ?>ifr
                                                    <div class="invalid-feedback"><?= $formErrors['mail'] ?></div>
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
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex justify-content-start">
                            <div class="card">
                                <div class="card-header">
                                    <p class="h4">Connexion</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" placeholder="exemple@gmail.com">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6 col-form-label">Mot de passe</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Log in</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <p>Inscription réussie</p>
            <?php } ?>
        </form>
        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>

