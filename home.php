<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../V2/public/assets/css/style.css">
    <title>Bdd VideoGames</title>
</head>

<body>

    <?php
    // indiqué le chemin de votre fichier JSON, il peut s'agir d'une URL
    $json = file_get_contents("public/bdd videogames.json");
    $videogames = json_decode($json);
    ?>

    <div class="principalepict">
        <!-- navabar-------------------------------------------------------------- -->
        <nav class="navbar navbar-expand-lg navbar-light colorbg mb-5 pt-2 pb-2">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">GamePassion</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Test de la semaine</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Test du mois</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Catégories </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item " href="#">Pc</a></li>
                                <li><a class="dropdown-item " href="#">Ps5</a></li>
                                <li><a class="dropdown-item " href="#">Ps4</a></li>
                                <li><a class="dropdown-item " href="#">Switch</a></li>
                                <li><a class="dropdown-item " href="#">Xbox Series X/S</a></li>
                                <li><a class="dropdown-item " href="#">Xbob 360</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- navabr -------------------------------------------------------------->


        <div class="text-center">
            <h1>Bienvenue sur GamePassion</h1>
        </div>
    </div>


    <!-- Card boucle------------------------------------------------------------------->
    <?php foreach ($videogames as $key => $value) { ?>
        <?php $plateforme = explode(",", $value->Platforme); ?>

        <div class="card text-center colorbg text-white mb-5 ms-5 me-5 mt-5">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active bg-success text-white  border border-white" aria-current="true" href="home.php"><?= $value->Jeu ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-white  border border-white" href="more.php">Synopsis</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center"><?= $value->Jeu ?></h5>
                <img src="<?= $value->Affichage ?>" height="400px" class="pt-3 pb-3" alt="image du jeu">
                <p>Note GamePassion : <?= $value->stat ?></p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $value->id ?>">
                    Plus d'infos
                </button>
            </div>
        </div>
        <!-- Modal ----------------------------------------------------------------------------->
        <div class="modal fade" id="exampleModal<?= $value->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $value->Jeu ?></h5>
                    </div>
                    <div class="modal-body">
                        <p>Mode de jeu : <?= $value->Modedejeu ?></p>
                        <p>Genre : <?= $value->Genre ?></p>
                        <p>Platforme :<?php foreach ($plateforme as $element) { ?>
                            <img src="../V2/public/console/<?= $element ?>.png" height="20px">

                        <?php } ?>
                        </p>
                        <p>Studio : <?= $value->Studio ?></p>
                        <p>Pegi : <img src="../V2/public/pegi/pegi<?= $value->PEGI ?>.png" height="30px"></p>
                        <p>Date de sortie : <?= $value->Datedepublication ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal ----------------------------------------------------------------------------->
    <?php } ?>

    <!-- Card boucle------------------------------------------------------------------->


    <div class="footer-basic bg-dark text-white">
        <footer>
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Accueil</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">A propos</a></li>
                <li class="list-inline-item"><a href="#">Cookies</a></li>
                <li class="list-inline-item"><a href="#">Plotique de confidentialité</a></li>
            </ul>
            <p class="copyright">GamePassion © 2022</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>


</html>