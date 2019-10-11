<?php
    session_start();
    include '../include/function.php';

    if (!empty($_POST) and isset($_POST)) {
        $article_categorie_nom = antiSQL($_POST["article_categorie_nom"]);

        $sql = "INSERT into article_categorie(id_article_categorie, article_categorie_nom) VALUES (NULL, '$article_categorie_nom')";
        $callback = insert($sql);

        if ($callback) {
            show_info("La catégorie a bien été ajouter");
        } else {
            show_info("La catégorie n'a pas bien été ajouter");
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Up to us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
</head>

<body>
    <form method="post" action="add-categorie.php" class="form-inline">
        <div class="form-group mb-2">
            <label for="staticEmail2" class="sr-only">Nom de la catégorie</label>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" placeholder="macategorie" name="article_categorie_nom">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Ajouter la categorie</button>
    </form>
</body>

</html>