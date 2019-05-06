<?php include_once('./header.php'); ?>

    <div id="init">
        <div class="jumbotron bg-light">
            <div class="row">
                <div class="col col-md-12 col-sm-12 col-lg-8">
                    <h1 class="display-4">Pandora's Box Web Design</h1>
                    <p class="lead">Pandora's Box es una nueva compañia que nace de la asociación de varios
                        profesionales con vasta experiencia en el diseño y programación de paginas web, asi como
                        tambien es fruto de la pasión por un trabajo bien hecho.
                    </p>
                </div>
                <div class="col text-center mt-4">
                    <a href="#"><img src="img/pandoras-box.png" width="100" height="100" alt="pandorabox"
                                     onclick="portfolio()"><br>
                    </a><span class="lead text-center">Ver mas</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 mt-4">
                <div class="card bg-light">
                    <div class="card-header bg-primary text-uppercase text-white">
                        asesoramiento
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Gratuito</h3>
                        <p class="card-text lead">Nuestros profesionales estaran encantados de asesorarle en el
                            proceso de diseño y creacion de su pagina web siempre que encargue su proyecto con
                            nosotros.</p>
                        <a class="btn btn-primary text-uppercase text-center" href="#"
                           onclick="contact()">contactenos</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4">
                <div class="card bg-light">
                    <div class="card-header bg-primary text-uppercase text-white">
                        Presupuestos
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Precios a su medida</h3>
                        <p class="card-text lead">Nuestros precios por todo el desarollo de su pagina web cubren un
                            espectro amplio dependiendo de la complejidad de su proyecto podremos elaborar un
                            presupuesto a su medida.</p>
                        <a class="btn btn-primary text-uppercase text-center" href="#" onclick="budgets()">
                            cuentenos mas</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4">
                <div class="card bg-light">
                    <div class="card-header bg-primary text-uppercase text-white">
                        mantenimiento
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-center display-4">50€/mes</h3>
                        <p class="card-text lead">Por el precio de una pequeña suscripcion mensual nuestros tecnicos
                            mantendran al dia su web, con los cambios necesarios y la ultima configruracion en
                            cuanto a posicionamiento.</p>
                        <a class="btn btn-primary text-uppercase text-center" href="#"
                           onclick="contact()">suscribirse</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once('./footer.php'); ?>