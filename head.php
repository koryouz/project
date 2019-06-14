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
    case '/privacyPolicy.php':
        $pageTitle = 'Politique de confidencialité';
        break;
    case '/legalMention.php':
        $pageTitle = 'Mentions Légales';
        break;
    case '/login.php':
        $pageTitle = 'Connexion';
        break;
    case '/myAccount.php':
        $pageTitle = 'Mon compte';
        break;
    case '/admin.php':
        $pageTitle = 'Administration';
        break;
    case '/profil-user.php':
        $pageTitle = 'Profil Utilisateur';
        break;
    case '/profil-content.php':
        $pageTitle = 'Profil Contenu';
        break;
}
?>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/style.css"/>
<link rel="stylesheet" href="assets/css/mediaQueries.css"/>
<link rel="stylesheet" href="assets/css/tarteaucitron.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />       
<title><?= $pageTitle ?></title>
<link rel="icon" type="image/png" href="/assets/img/projets_clip_image002.jpg"/>

<!--TARTE AU CITRON-->

<script type="text/javascript" src="/assets/js/tarteaucitron.js"></script>

<script type="text/javascript">
    tarteaucitron.init({
        "privacyUrl": "", /* Privacy policy url */

        "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
        "cookieName": "tarteaucitron", /* Cookie name */

        "orientation": "top", /* Banner position (top - bottom) */
        "showAlertSmall": true, /* Show the small banner on bottom right */
        "cookieslist": true, /* Show the cookie list */

        "adblocker": false, /* Show a Warning if an adblocker is detected */
        "AcceptAllCta": true, /* Show the accept all button when highPrivacy on */
        "highPrivacy": false, /* Disable auto consent */
        "handleBrowserDNTRequest": false, /* If Do Not Track == 1, disallow all */

        "removeCredit": false, /* Remove credit link */
        "moreInfoLink": true, /* Show more info link */
        "useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */

        //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */

        "readmoreLink": "/cookiespolicy" /* Change the default readmore link */
    });
</script>

<script type="text/javascript">
    tarteaucitron.user.googlemapsKey = 'API KEY';
    (tarteaucitron.job = tarteaucitron.job || []).push('googlemaps');
</script>
