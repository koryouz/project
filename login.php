<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <?php include 'head.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex justify-content-end">
                    <div class="card">
                        <div class="card-header">
                            <p class="h4">Inscription</p>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" placeholder="exemple@gmail.com">
                                </div>
                                <div class="form-group col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label for="inputPassword4">Mot de passe</label>
                                    <input type="password" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Addresse</label>
                                <input type="text" class="form-control" placeholder="1 impasse de l'Eglise, Paris 75009">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label for="inputCity">Ville</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label for="inputState">Pays</label>
                                    <select class="form-control">
                                        <option selected hidden>...</option>
                                        <option>France</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Log in</button>
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
                                <label for="inputEmail3" class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" placeholder="exemple@gmail.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6 col-form-label">Mot de passe</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>

