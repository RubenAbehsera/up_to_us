<?php
    session_start();
    include '../include/function.php';
    include '../include/acces_admin.php';
    include '../include/head-admin.php';

    $sql = "SELECT * from article";
    $request = request($sql);

    $index = 1;
    while ($result = mysqli_fetch_assoc($request)) {
            echo('Article numéro : '.$index.'<br>');
            echo('Article titre : '.$result['article_titre'].'<br>');
            echo('Article photo : <img src="'.$result['article_photo'].'" alt="C\'est ici l\'image"><br>');
            echo('Article contenu : '.$result['article_contenu'].'<br>');
            echo('Article Catégorie : '.getCategorie($result['id_article_categorie']).'<br>');
            echo('Article date création avec reformat : '.changeDate($result['article_date'],'-').'<br>');
            echo('Article date création sans reformat : '.$result['article_date'].'<br>');
            echo('Article état de vision : '.$result['article_visible'].'<br>');
            echo('<a class="btn btn-primary" href="./edit-article.php?id_article='.$result['id_article'].'">Editer l\'article</a>');
            echo('<a class="btn btn-secondary" onclick="confirm(\"êtes-vous sûr de vouloir supprimer l\'article '.$result['article_titre'].' ?\")" href="./delete-article.php?id_article='.$result['id_article'].'">Supprimer l\'article</a>');
            echo('<br>');
        $index++;
    }
?>