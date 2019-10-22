<?php
    session_start();
    include '../include/function.php';

    $sql = "SELECT * from article_categorie";
    $request = request($sql);

    $index = 1;
    while ($result = mysqli_fetch_assoc($request)) {
        echo('Article Catégorie numéro : '.$index.'<br>');
        echo('Article Catégorie titre : '.$result['article_categorie_nom'].'<br>');
        echo('<a class="btn btn-primary" href="./edit-categorie.php?id_article_categorie='.$result['id_article_categorie'].'">Editer le nom de la catégorie de l\'article</a>');
        echo('<br>');
        $index++;
    }
?>