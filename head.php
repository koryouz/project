<?php
switch ($_SERVER['PHP_SELF']) {
    case '/contact.php':
        $pageTitle = 'Contact';
        break;
    case '/articles.php':
        $pageTitle = 'Articles';
        break;
    case '/index.php':
        $pageTitle = 'Entreprise';
        break;
    case '/realisations.php':
        $pageTitle = 'Realisations';
        break;
}
?>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/style.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />       
<title><?= $pageTitle ?></title>
<link rel="icon" type="image/png" href="/assets/img/projets_clip_image002.jpg"/>
