<?php
    session_start();
    include '../include/function.php';
    include '../include/acces_admin.php';

    // As-t'on envoyé des infos ?
    if (isset($_POST) and !empty($_POST)) {
        // Initialisation des variables
        $article_titre = $_POST["article_titre"];
        $article_photo = "1";
        $article_contenu = htmlentities($_POST["article_contenu"]);
        $id_article_categorie = $_POST["id_article_categorie"];
        $article_createur = 1;
        $article_date = date("YmdHis");
        $article_visible = $_POST['article_visible'];

        // Préparation de la requête
        $sql = "INSERT into article(article_titre,article_photo,article_contenu,id_article_categorie,article_createur,article_date,article_visible)
        values ('$article_titre','$article_photo','$article_contenu','$id_article_categorie','$article_createur','$article_date','$article_visible')";

        $callback = insert($sql);
        if ($callback) {
            show_info("L'article a bien été ajouter");
        } else {
            show_info("L'article n'a pas bien été ajouter");
        }
    }

?>
<!DOCTYPE html>
<html lang="fr">

<?php
include '../include/head-admin.php';
?>

<body>
    <form method="post" action="add-article.php" class="container my-5">
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" placeholder="Titre de l'article" name="article_titre"
                required>
        </div>
        <div class="form-group">
            <label for="id_article_categorie">Catégorie</label>
            <select class="form-control" id="id_article_categorie" name="id_article_categorie" required>
                <?php
                $sql = "SELECT * from article_categorie";
                $request = request($sql);
                while ($result = mysqli_fetch_assoc($request)) {
                    echo('<option value="'.$result["id_article_categorie"].'">'.$result["article_categorie_nom"].'</option>');
                }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for="article_photo">Example file input</label>
            <input type="file" class="form-control-file" id="article_photo" name="fichier" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="article_contenu">Contenu article</label>
            <textarea class="" id="article_contenu" rows="3" name="article_contenu"></textarea>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="article_visible" id="article_visible1" value="1"
                checked>
            <label class="form-check-label" for="article_visible1">
                On affiche l'article
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="article_visible" id="article_visible" value="0">
            <label class="form-check-label" for="article_visible">
                On n'affiche pas l'article
            </label>
        </div>
        <button type="submit" class="btn btn-primary col-md-10">Publier l'article</button>
    </form>
</body>

</html>