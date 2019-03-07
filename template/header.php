<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?= $title ?? 'Mon site' ?>
    </title>
    <link rel="stylesheet" href="./asset/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="./asset/css/bootstrap.css">
    <link rel="stylesheet" href="./asset/css/mdb.css">
    <link rel="stylesheet" href="./asset/css/style.css">
</head>

<body>

    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg scrolling-navbar fixed-top navbar-dark info-color">
        <a class="navbar-brand" href="#">Livre d'or</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <i class="fa fa-home"></i> Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-instagram"></i> Instagram</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--/.Navbar --> 