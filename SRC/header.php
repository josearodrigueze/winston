<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <link href="//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css"
          rel="stylesheet">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
          integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous"/>

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"
          integrity="sha256-EH/CzgoJbNED+gZgymswsIOrM9XhIbdSJ6Hwro09WE4=" crossorigin="anonymous"/>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="scripts/dist/photoswipe.css">
    <!--favicon-->
    <link rel="icon" href="img/pandoras-box.png" sizes="32x32" type="image/png">

    <title>Project Pandora</title>
</head>

<body class="bg-secondary" id="inicio" onload="noticias()">
<div class="row">
    <!--barra de navegacion-->
    <div class="col-lg-9 col-md-9 col-sm-12 ml-auto mr-2">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky">
            <!--Logo empresa y nombre-->
            <a class="navbar-brand ml-2" href="_index.html">
                <img src="img/pandoras-box1.png" width="30" height="30" class="d-inline-block align-top mr-2"
                     alt="logo">
                Pandora's Box</a>
            <!--boton responsive-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsupportedcontent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--elementos de la barra-->
            <div class="collapse navbar-collapse" id="navbarsupportedcontent">
                <ul class="navbar-nav ml-auto">
                    <!-- Home -->
                    <li class="nav-item active">
                        <a class="nav-link" href="_index.html">
                            <img src="img/home1.png" width="30" height="30" alt="Home"/>
                        </a>
                    </li>

                    <!-- Portafolio -->
                    <li class="nav-item dropdown" id="dropdown">
                        <a class="nav-link" href="project-customer-list.php">Portafolio</a>
                        <!--
                        <a class="nav-link dropdown-toggle" href="#" id="navbar-dropdown"
                           data-toggle="dropdown">Portafolio </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" onclick="portfolio()">GALERIA</a>
                            <a class="dropdown-item" href="maqueta1.html" target="_blank">BREADCRUMBS</a>
                            <a class="dropdown-item" href="maqueta2.html" target="_blank">NAVBAR</a>
                            <a class="dropdown-item" href="maqueta3.html" target="_blank">SIDEBAR</a>
                        </div>
                        -->
                    </li>

                    <!-- Presupuestos -->
                    <li class="nav-item" id="budget">
                        <a class="nav-link" href="#">Presupuestos</a>
                    </li>

                    <!-- Contacto -->
                    <li class="nav-item" id="contact">
                        <a class="nav-link" href="#" id="contacto">Contacto</a>
                    </li>


                    <li class="nav-item dropdown ml-auto">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="./project-list.php">Proyectos</a>
                            <a class="dropdown-item" href="./news-list.php">Noticias</a>
                            <a class="dropdown-item" href="./citas.php">Usuarios</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./users-profile.php">Perfil</a>
                            <a href="#" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="contenedor">