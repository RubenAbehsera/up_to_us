<?php
    session_start();
    include '../include/function.php';
    include '../include/acces_admin.php';

    $sql = "SELECT * from article_categorie";
    $request = request($sql);

    $index = 1;
    while ($result = mysqli_fetch_assoc($request)) {
        echo('Article Catégorie numéro : '.$index.'<br>');
        echo('Article Catégorie titre : '.$result['article_categorie_nom'].'<br>');
        echo('<a class="btn btn-primary" href="./edit-categorie.php?id_article_categorie='.$result['id_article_categorie'].'">Editer le nom de la catégorie de l\'article</a>');
        echo('<a class="btn btn-secondary" onclick="confirm(\"êtes-vous sûr de vouloir supprimer la catégorie : '.$result['article_categorie_nom'].' ?\")" href="./delete-categorie.php?id_article_categorie='.$result['id_article_categorie'].'">Supprimer la catégorie</a>');
        echo('<br>');
        $index++;
    }
?>