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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

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
    <main class="container-full height-100 color-back">

        <div class="row backgroundHome">
            <!-- html,body height 100% et div 100% pour que ca prenne full page -->
            <p class="col s12 m12 l12 left-pad"><br>young & involved</p>
            <div class="center col s12 m12 l12 ">
                <img class="homePageArrow" src="./images/homePage/arrow.png" alt="flèche vers le bas">
            </div>
        </div>

        <h2 class="center">Nos actus</h2>
        <div class="row">
            <a href="./article1.php">
                <div class="col s12 m6 l3 left-marg center border">
                    <div class="row box-img1">
                        <div class="center col l12 box-hover">
                            <p>Voir l'article</p>
                        </div>
                    </div>
                    <p>Internet le plus gros pollueur</p>
                </div>
            </a>
            <a href="./article2.php">
                <div class="col s12 m6 l3  offset-l1 center border">
                    <div class="row box-img2">
                        <div class="center col l12 box-hover">
                            <p>Voir l'article</p>
                        </div>
                    </div>
                    <p>Des glaciers artificiels pour l’Himalaya</p>
                </div>
            </a>
            <a href="./article3.php">
                <div class="col s12 m6 l3 offset-l1 center border">
                    <div class="row box-img3">
                        <div class="center col l12 box-hover">
                            <p>Voir l'article</p>
                        </div>
                    </div>
                    <p>La fonte des glaces, l’ours polaire en danger ?</p>
                </div>
            </a>
            <!-- <div class="btn col s6 offset-s3 m4 offset-m4 l2 offset-l5 center">Toutes nos actus</div> -->
        </div>
        <div class="separator row">
            <div class="col s10 offset-s1 m6 offset-m3 l6 offset-l3 black"></div>
        </div>
        <h2 class="center">Mission du moment</h2>
        <div class="row">
            <div class="col s12 m6 offset-m3 l4 offset-l4 center border">
                <div class="row box-img-moment">
                    <div class="center col l12 box-hover">
                        <p>Voir la mission</p>
                    </div>
                </div>
                <p>Run & collect</p>
            </div>
        </div>
        <div class="row center">
            <p class="col  s10 offset-s1 m6 offset-m3 l4 offset-l4">La mission run & collecte vous permettra
                zebcilazehbvd oqfsbnvmiqdhbvmfvfvv</p>
        </div>
        <div class="separator row">
            <div class="col s10 offset-s1 m6 offset-m3 l6 offset-l3 black"></div>
        </div>
        <h2 class="center">Gestes du quotidien</h2>
        <div class="row">
            <div class="col s10 offset-s1  l6 offset-l3 ">
                <iframe src="https://www.youtube.com/embed/vlZB2bvTbNQ?start=68" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
        <div class="separator row">
            <div class="col s10 offset-s1 m6 offset-m3 l6 offset-l3 black"></div>
        </div>
        <h2 class="center">Qui sommes nous ?</h2>
        <div class="row">
            <p class="col s12 m6 l3 left-marg center">
                Raison 1
                Lkaznecanrchvjf
                Zckjnefhv
            </p>
            <p class="col s12 m6 l3 offset-l1 center">
                Raison 2
                Akejvnz
                Lkaejfnv aejvn
            </p>
            <p class="col s12 m6 l3 offset-l1 center">
                Raison 3
                A jebvcq q
                Ek njvsbfhjb
            </p>

        </div>

        <?php
include('./include/footer.php');
?>
    </main>



</body>

</html>