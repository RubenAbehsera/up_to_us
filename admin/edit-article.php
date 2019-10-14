<?php
    session_start();
    include '../include/function.php';
    include '../include/acces_admin.php';
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

<?php
    if (isset($_GET['id_article'])) {
        $sql = antiSQL($_GET['id_article']);
        $sql = "SELECT * from article where id_article='$sql'";

        $result = execute($sql);

        ?>
        <body>
            <form method="post" action="edit-article.php" class="container my-5">
                <div class="form-group">
                    <input type="text" class="form-control" id="titre" value="<?php echo $result['article_titre'] ?>" name="article_titre"
                        required>
                </div>
                <div class="form-group">
                    <select class="form-control" id="id_article_categorie" name="id_article_categorie" required>
                        <?php
                            $sql = "SELECT * from article_categorie";
                            $request = request($sql);
                            $id_article_categorie = intval($result['id_article_categorie']);
                            while ($resultBis = mysqli_fetch_assoc($request)) {
                                if ($resultBis['id_article_categorie'] == $id_article_categorie) {
                                    echo('<option value="'.$resultBis["id_article_categorie"].'" selected>'.$resultBis["article_categorie_nom"].'</option>');
                                } else {
                                    echo('<option value="'.$resultBis["id_article_categorie"].'">'.$resultBis["article_categorie_nom"].'</option>');
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" id="article_photo" name="fichier" value="<?php echo $result['article_photo'] ?>" placeholder="<?php echo $result['article_photo'] ?>" accept="image/*" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="article_contenu" rows="3" name="article_contenu" value="<?php echo $result['article_contenu'] ?>" placeholder="<?php echo $result['article_contenu'] ?>" required><?php echo $result['article_contenu'] ?></textarea>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="article_visible" id="article_visible1" value="1" checked>
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
                <input class="d-none" name="id_article" value="<?php echo antiSQL($_GET['id_article']) ?>">
                <button type="submit" class="btn btn-primary col-md-10">Editer l'article</button>
            </form>
        </body>
        </html>
        <?php
    }

    if (!isset($_GET['id_article']) and !empty($_POST)) {
        // Initialisation des variables
        $article_titre = $_POST["article_titre"];
        $article_photo = "1";
        $article_contenu = $_POST["article_contenu"];
        $id_article_categorie = $_POST["id_article_categorie"];
        $article_visible = $_POST["article_visible"];
        $id_article = $_POST["id_article"];

        $sql = "UPDATE article SET article_titre = '$article_titre', article_photo = '$article_photo', article_contenu = '$article_contenu', id_article_categorie = '$id_article_categorie', article_visible = '$article_visible' where id_article = '$id_article'";

        $callback = insert($sql);
        if ($callback) {
            show_info("L'article a bien été modifié");
        } else {
            show_info("L'article n'a pas bien été modifié");
        }
    }
?>