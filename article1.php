<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Up to us</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=GFS+Didot&display=swap" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php 
include ('./include/header.php');
?>

    <main class="container-full height-100">
        <h2 class="center">Internet le plus gros pollueur ?</h2>
        <div class="box-center row">
            <div class="text col S12 m12 l5 offset-l1">
                Si nous entendons parler assez souvent de la pollution engendrée par les transports ou bien par
                l’utilisation de plastique, nous ne parlons pas assez de celle générée par Internet.
                Alors certes, c’est une pollution invisible et inodore mais pourtant, elle est bien présente !
                <br><br>
                En effet, si internet était un pays, aujourd’hui il représenterait le 3ème plus gros consommateur
                d’électricité dans le monde et si nous n’agissons pas dès maintenant, en 2030 il deviendra le premier
                consommateur au monde.
                <br><br>
                La moindre recherche, l’envoie d’un e-mail ou le visionnage d’une vidéo engendre de la pollution. A
                chaque utilisation d’Internet, des données vont être consommées pour être stockées dans des data center.
                Il s’agit en effet de banques de données fonctionnant 24h/24 et qui correspondent à la consommation
                électrique d’une ville de 30 000 habitants !
                <br>Et selon un rapport de Greenpeace, la pollution générée par Internet peut être comparée à celle du
                transport aérien.
                <br><br>Quelques chiffres importants :
                <br>- Chaque année Facebook consomme 100 millions de KWh
                <br>- 16 millions de recherche Google représentent environ 16 kilos de CO2 émis chaque seconde
                <br>- 1 seule recherche sur Internet consomme autant qu’une ampoule pendant 1 heure

                <br> <br>Mais alors que faire pour lutter contre cette pollution Internet toujours plus croissante ?
                <br>- Éviter les publications s’adressant à plusieurs personnes sur Facebook par exemple
                <br>- Se demander si j’ai réellement besoin de faire cette recherche Google
                <br>- Éteindre ma box lorsque je suis absent
                <br>- Nettoyer régulièrement ma boite mail
                <br>- Mettre mon téléphone ainsi que mon ordinateur en mode économie d’énergie.
                <br>
                <br>Et ce ne sont que quelques exemples ! Les solutions pour remédier à cette pollution sont extrêmement
                nombreuses il suffit juste de s’y intéressées et de les appliquer.
                <br><br>Source : Brut, rlt, selectra, greenpace
            </div>
            <div class="pics row">
                <img class="col s12 l4 offset-l1 "src="./images/articles/article.png" alt="objectif plastique">
                <img class="col s12 l4  offset-l1"style="margin-top: 50px" src="./images/articles/article.png" alt="objectif réduction plastique">
            </div>
        </div>
    </main>



</body>

</html>