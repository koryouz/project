<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <?php include 'head.php' ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <?php include 'loadModal.php' ?>
        <!--MODAL LOG-IN-->

        <div class="modal fade modalPosition" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Bonjour, <?= $_SESSION['lastname'] . ' ' . $_SESSION['firstname']  ?></p>
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>   
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                    <h1 class="text-center">Bienvenue à bord</h1><hr/>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <h2 class="h4">Spécialiste dans l'aménagement de bateau</h2>
                    <p>(commerces, passagers, bateaux logements et voiliers)<br/><br/>
                        Nos fabrications sont faites sur mesure et avec toutes les essences de bois. Nous sommes à votre disposition pour toutes études de réalisations :
                    </p>
                    <ul>
                        <li>Travaux réalisés par du personnel qualifié dans la pure tradition artisanale</li>
                        <li>Aménagement de cale</li>
                        <li>Meubles sur mesure</li>
                        <li>Vaigrages, Isolations</li>
                        <li>Plancher Teck</li>
                        <li>Calliboutis</li>
                        <li>Décorations</li>
                        <li>Agencement de cabine</li>
                    </ul>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <img src="assets/img/peniche1.jpg" width="100%" alt="photo">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"><hr/>
                    <p>L'entreprise reconnaît que sa raison d'être est de répondre aux besoins spécifiques de sa clientèle. C'est pourquoi la Société Delhay met l'accent sur une amélioration continue de ses aménagements avec un atelier de fabrication au bord de l'Oise.</p>
                    <ul>
                        <li>Notre point fort : le détail du travail bien fait et le respect des délais.</li>
                        <li>Notre vocation : embellir des bateaux et assurer un ensemble harmonieux.</li>
                    </ul>
                    <p class="font-italic">«L'aménagement et la décoration intérieure des bateaux est notre passion : faire de la menuiserie ébénisterie sur un bateau nécessite un outillage très spécialisé. Souvent exigu, l'espace doit par conséquent être exploité au maximum tout en ménageant l'aspect esthétique et fonctionnel ainsi que les contraintes techniques»</p>
                    <p>N'oubliez pas que dans un bateau, tout est courbe et rien n'est de niveau.</p>
                </div>
            </div><hr/>
            <div class="row">
                <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <img src="assets/img/menuiserie.jpg" width="100%" alt="photo">
                </div>
                <div class="col-6  col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <h3>Longueil-Annel : haut lieu de la batellerie française</h3>
                    <p>Situé dans l'Oise, à 80 km de Paris, le village de Longueil-Annel est un haut lieu de la batellerie française.</p>
                    <p>Également localisé sur le territoire de la <a href="http://www.cc2v.fr" target="_blank">CC2V</a>, Longueil-Annel est devenu un port fluvial important avec la Révolution Industrielle. En effet, la construction du canal latéral à l'Oise entre 1826 et 1831 va radicalement changer la vie du village. De nouvelles maisons ont été construites, et surtout, de nombreux commerces ... on a compté jusqu'à 32 cafés en ville.</p>
                    <p>Pendant longtemps, les habitants de Longueil-Annel ont été des bateliers débarqués, vivant dans des maisons de briques rouges au bord de l'eau et restant ainsi en contact avec le monde attachant de la batellerie.</p>
                    <p>C’est ainsi qu’en 1989, la menuiserie marine a vu le jour. L'entreprise Delhay, derniers spécialistes de la timonerie en France s'est illustrée par la qualité de ses aménagements intérieurs et extérieurs pour les bateaux de commerce et de plaisance.</p>
                </div>
            </div>
        </div>

        <!--        TARTE AU CITRON-->

        <div class="googlemaps-canvas" zoom="10" style="width: 100%; height: 450px;">     
            <iframe class="homeRectFooter" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6167.359168623277!2d2.866991433763138!3d49.46457339048348!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1554189960952!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> 
        </div>
        <script>tarteaucitron.user.mapscallback = 'callback_function';tarteaucitron.user.googlemapsLibraries = 'LIBRARIES';</script>

        <?php include 'footer.php' ?>   
        <?php include 'script.php' ?>   
    </body>
</html>
