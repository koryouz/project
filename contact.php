<?php
//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';

$degrees = array('Sans', 'Bac', 'Bac +2', 'Bac +3', 'Supérieur');

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

  if (!empty($_POST['degree'])) {
    /*
     * On vérifie que le ce qui a été envoyé dans le formulaire existe dans le tableau $degrees
     * Cela permet d'éviter de sélectionner quelque chose qui n'est pas dans la liste
     */
    if (in_array($_POST['degree'], $degrees)) {
      $degree = $_POST['degree'];
    } else {
      $formErrors['degree'] = 'Merci de sélectionner un diplôme dans la liste';
    }
  } else {
    $formErrors['degree'] = 'Merci de sélectionner un diplôme';
  }

  if (!empty($_POST['poleEmploiNumber'])) {
    if (preg_match($regexPoleEmploiNumber, $_POST['poleEmploiNumber'])) {
      $poleEmploiNumber = strip_tags($_POST['poleEmploiNumber']);
    } else {
      $formErrors['poleEmploiNumber'] = 'Merci de renseigner un numéro Pôle Emploi valide';
    }
  } else {
    $formErrors['poleEmploiNumber'] = 'Merci de renseigner votre numéro Pôle Emploi';
  }

  if (!empty($_POST['badgesNumber'])) {
    if (preg_match($regexBadgesNumber, $_POST['badgesNumber'])) {
      $badgesNumber = strip_tags($_POST['badgesNumber']);
    } else {
      $formErrors['badgesNumber'] = 'Merci de renseigner un nombre de badge valide';
    }
  } else {
    $formErrors['badgesNumber'] = 'Merci de renseigner votre nombre de badge';
  }

  if (!empty($_POST['codecademyLink'])) {
    if (preg_match($regexCodecademyLink, $_POST['codecademyLink'])) {
      $codecademyLink = strip_tags($_POST['codecademyLink']);
    } else {
      $formErrors['codecademyLink'] = 'Merci de renseigner un lien Codecademy valide';
    }
  } else {
    $formErrors['codecademyLink'] = 'Merci de renseigner votre lien Codecademy';
  }

  if (!empty($_POST['superHero'])) {
    $superHero = strip_tags($_POST['superHero']);
  } else {
    $formErrors['superHero'] = 'Merci de répondre à cette question';
  }

  if (!empty($_POST['hacks'])) {
    //Ici on utilise htmlspecialchars car on veut garder MAIS désactiver les éventuelles balises html (attention : différent de strip_tags)
    $hacks = htmlspecialchars($_POST['hacks']);
  } else {
    $formErrors['hacks'] = 'Merci de répondre à cette question';
  }

  if (!empty($_POST['experience'])) {
    if ($_POST['experience'] === 'oui' || $_POST['experience'] === 'non') {
      $experience = $_POST['experience'];
    } else {
      $formErrors['experience'] = 'Merci de sélectionner une réponse';
    }
  } else {
    $formErrors['experience'] = 'Merci de répondre à cette question';
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
        <div class="container">
            <div class="row">
                <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <p>Envoyer votre courrier à l'adresse suivante : </p>
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
                <div class="col-12  col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="container mt-5 mb-5">
                        <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
                            <form action="index.php" method="POST">
                                <fieldset>
                                    <legend>Identité</legend>
                                    <hr />
                                    <div class="form-group row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="lastName">Nom de famille</label>
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
                                            <label for="firstName">Prénom</label>
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
                                </fieldset>
                                <fieldset>
                                    <legend>Adresse et contact</legend>
                                    <hr />
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
                                            <label for="mail">Adresse mail</label>
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
                                <input type="submit" class="btn btn-success" value="S'inscrire" />
                            </form>
                        <?php } else { ?>
                            <div class="card border-secondary mb-3">
                                <div class="card-header"><?= strtoupper($lastName) . ' ' . $firstName ?></div>
                                <div class="card-body">
                                    <p class="card-text">
                                    <p>
                                        <span class="font-weight-bold">Date de naissance :</span></span> <?= $birthDate ?><br />
                                        <span class="font-weight-bold">Pays de naissance :</span> <?= $birthCountry ?><br />
                                        <span class="font-weight-bold">Nationalité :</span> <?= $nationality ?><br />
                                        <span class="font-weight-bold">Adresse :</span> <?= $address ?><br />
                                        <span class="font-weight-bold">Email :</span> <?= $mail ?><br />
                                        <span class="font-weight-bold">Numéro de téléphone :</span> <?= $phoneNumber ?><br />
                                    </p> 
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>





