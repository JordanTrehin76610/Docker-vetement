<?php
require_once '../produit/Vetement.php'
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cebo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>


<body>
    <?php $erreur = 0 ?>
    <h1 class="text-center my-2"><a href="accueil.php" class="nav-link">Cebo</a></h1>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <a class="nav-link" href="accueil.php?type=T-shirt">T-shirt</a>
            </div>
            <div class="col">
                <a class="nav-link" href="accueil.php?type=Jean">Jean</a>
            </div>
            <div class="col">
                <a class="nav-link" href="accueil.php?type=Robe">Robe</a>
            </div>
            <div class="col">
                <a class="nav-link" href="accueil.php?type=Veste">Veste</a>
            </div>
            <div class="col">
                <a class="nav-link" href="accueil.php?type=Pull">Pull</a>
            </div>
        </div>
    </div>
    <hr>

    <?php
    if (isset($_GET['id'])) { //on regarde donc si il y a un paramètre, isset permet d'esquiver l'erreur si il n'y a rien
        $type = $_GET['id'];
        if ($type > 12 || $type < 1 ){
            $erreur = 1;
        } else {
        $trie = array_filter($Vetement, function ($item) { //On filtre pour avoir uniquement le tableau dont la clé correspond au paramètre
            return $item['id'] == $_GET['id'];
        });
    }} else {
        $trie = $Vetement; //Sinon rien ne change
    }
    ?>

    <?php if ($erreur == 0) { ?>
    <div class="w-75 mx-auto container mb-5">
        <p class="fs-2"> <?= $trie[$_GET['id']-1]['type'] ?> </p>
        <div class="row">
            <div class="col-lg-3">
                <div class="row containerGalerie mb-2">
                    <button class="bouton" onclick="replace(1)">
                        <img src="<?= $trie[$_GET['id']-1]['chemin photo'][0] ?>" alt="Photo de l'article n°1"
                            class="fillGalerie" id="Image1">
                    </button>
                </div>
                <div class="row containerGalerie">
                    <button class="bouton" onclick="replace(2)">
                        <img src="<?= $trie[$_GET['id']-1]['chemin photo'][1] ?>" alt="Photo de l'article n°2"
                            class="fillGalerie" id="Image2">
                    </button>
                </div>
            </div>
            <div class="col-lg-6 d-lg-block d-none">
                <div class="row mb-2">
                    <div class="containerMain border-end border-start">
                        <img src="<?= $trie[$_GET['id']-1]['main'] ?>" alt="Photo principal" class="fillMain" id="Main">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <p class="fs-2"> <?= $trie[$_GET['id']-1]['nom'] ?> </p>
                </div>
                <div class="row">
                    <p class="fs-4"> <?= $trie[$_GET['id']-1]['genre'] ?> </p>
                </div>
                <div class="row">
                    <p class="fs-4"> Taille: <?= $trie[$_GET['id']-1]['taille'] ?> </p>
                </div>
                <div class="row w-50 pe-5">
                    <p class="prixDetail badge fs-4 text-start"> <?= $trie[$_GET['id']-1]['prix'] ?> € </p>
                </div>
                <div class="row acheter">
                    <button type="button" class="btn btn-primary fs-4">Acheter</button>
                </div>
            </div>
        </div>
    </div>
    <?php }
    else { ?>
    <p class="text-center fs-1">Erreur 404 </p>
    <p class="text-center fs-1 mt-3">Marche po</p>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
    <script>
    function replace(i) {
        var lien = document.getElementById(`Image${i}`).src
        document.getElementById('Main').src = lien
    }
    </script>
</body>


</html>