<?php
    session_start();
    include '../include/function.php';
    include '../include/acces_admin.php';

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

<?php
    include '../include/head-admin.php';
?>

<body>
    <form method="post" action="add-categorie.php" class="form-inline">
        <div class="form-group mb-2">
            <label for="staticEmail2" class="sr-only">Nom de la catégorie</label>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" placeholder="macategorie" name="article_categorie_nom" required>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Ajouter la categorie</button>
    </form>
</body>

</html>