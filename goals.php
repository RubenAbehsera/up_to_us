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
        <h2 class="center">Nos objectifs</h2>
        <div class="row">
            <a href="./goals1.php">
                <div class="col s12 m6 l3 left-marg center border">
                    <div class="row box-goals-img1">
                        <div class="center col l12 box-hover">
                            <p>Infos et missions</p>
                        </div>
                    </div>
                    <p>- PLASTIQUE -</p>
                </div>
            </a>
            <a href="./goals2.php">
                <div class="col s12 m6 l3  offset-l1 center border">
                    <div class="row box-goals-img2">
                        <div class="center col l12 box-hover">
                            <p>Infos et missions</p>
                        </div>
                    </div>
                    <p>- ESPACE VERT -</p>
                </div>
            </a>
            <a href="./goals3.php">
                <div class="col s12 m6 l3 offset-l1 center border">
                    <div class="row box-goals-img3">
                        <div class="center col l12 box-hover">
                            <p>Infos et missions</p>
                        </div>
                    </div>
                    <p>- ACTU CLIMAT -</p>
                </div>
            </a>
            <!-- <div class="btn col s6 offset-s3 m4 offset-m4 l2 offset-l5 center">Toutes nos actus</div> -->
        </div>
    </main>



</body>

</html>