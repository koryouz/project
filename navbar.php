<img  width="100%" src="/assets/img/outdoor_<?= rand(1, 4) ?>.jpg" alt="backgroundNavbarHeadBand" />
<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light sticky-top borderTop borderBottom mb-2 mt-0">
    <a class="navbar-brand p-0" href="#"><img width="50rem" height="50rem" src="/assets/img/projets_clip_image002.jpg" alt="logo"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= (htmlentities($_SERVER['PHP_SELF']) == '/index.php') ? 'active' : ''; ?>" >         
                <a class="nav-link mr-4 ml-4 font-weight-bold text-uppercase" href="http://projet/">Accueil</a>
            </li>
            <li class="nav-item <?= (htmlentities($_SERVER['PHP_SELF']) == '/realisations.php') ? 'active' : ''; ?>">
                <a class="nav-link mr-4 ml-4 font-weight-bold text-uppercase" href="realisations.php">Réalisations</a>
            </li>
            <li class="nav-item <?= (htmlentities($_SERVER['PHP_SELF']) == '/articles.php') ? 'active' : ''; ?>">
                <a class="nav-link mr-4 ml-4 font-weight-bold text-uppercase" href="articles.php">Articles</a>
            </li>
            <li class="nav-item <?= (htmlentities($_SERVER['PHP_SELF']) == '/contact.php') ? 'active' : ''; ?>">
                <a class="nav-link ml-4 font-weight-bold text-uppercase" href="contact.php">Contact</a>
            </li>
        </ul>
        <?php if (isset($_SESSION['id'])) { ?>
        <div class="dropdown">
            <button class="nav-link ml-4 btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog fa-2x mt-1 mainColor"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/myAccount.php">Mon compte</a>
                <a class="dropdown-item" href="controller/logoutCtrl.php">Se déconnecter</a>
            </div>
        </div>
        <?php }  ?>
        <a class="nav-link ml-4" href="/login.php"><i class="fas fa-user-circle fa-2x mt-1 mainColor"></i></a>
    </div>      
</nav>