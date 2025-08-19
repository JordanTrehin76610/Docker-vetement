<?php
require_once '../produit/Vetement.php'
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Vêtement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>


<body>
    <h1 class="text-center my-2"><a href="accueil.php" class="nav-link">Coucou</a></h1>
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
    if (isset($_GET['type'])) { //on regarde donc si il y a un paramètre, isset permet d'esquiver l'erreur si il n'y a rien
        $trie = array_filter($Vetement, function ($item) { //On filtre pour avoir uniquement le tableau dont la clé correspond au paramètre
            return $item['type'] == $_GET['type'];
        }); ?>
    <p class="w-75 mx-auto container fs-2 categorie"> <?= $_GET['type'] ?> </p>
    <?php } else {
        $trie = $Vetement; //Sinon rien ne change 
        shuffle($trie); ?>
    <p class="w-75 mx-auto container fs-2 categorie">Tous les articles</p>
    <?php } ?>

    <div class="contenue mx-auto container mb-5">
        <div class="row">
            <?php foreach ($trie as $article) { ?>
            <div class="col-lg-3 mb-4">
                <a href="details.php?id=<?= $article['id'] ?>" class="nav-link">
                    <p class="fs-5 text-center mt-2"><?= $article['nom']?></p>
                    <div class="containerImg mx-auto">
                        <img src="<?= $article['main'] ?>" alt="Photo de l'article" class="fillImg border">
                    </div>
                    <div class="row w-75 mx-auto mt-4">
                        <div class="col-6">
                            <p><?= $article['type']?></p>
                        </div>
                        <div class="col-6">
                            <p class="text-end"><?= $article['genre']?></p>
                        </div>
                    </div>
                    <div class="text-end">
                        <p class="prix badge"><?= $article['prix']?> €</p>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>


</html>