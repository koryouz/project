<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <?php include 'head.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Carousel</h1>
                        </div>
                        <div class="card-body">
                            <div id="indicatorCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#indicatorCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#indicatorCarousel" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="/assets/img/pexels-photo-853199.jpeg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="/assets/img/pexels-photo-2049422.jpeg" alt="Second slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#indicatorCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#indicatorCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6167.359168623277!2d2.866991433763138!3d49.46457339048348!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1554189960952!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> 
            <?php include 'footer.php' ?>   
            <?php include 'script.php' ?>   
    </body>
</html>
