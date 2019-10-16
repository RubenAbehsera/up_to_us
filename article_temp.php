<?php
    session_start();
    include './include/function.php';
    include './include/head-site.php';

    $sql = "SELECT * from article";
    $request = request($sql);

    $index = 1;
    while ($result = mysqli_fetch_assoc($request)) {
        // Condition pour n'afficher que les articles en état visible
        if ($result['article_visible'] == 1) {
            echo('Article numéro : '.$index.'<br>');
            echo('Article titre : '.$result['article_titre'].'<br>');
            echo('Article photo : <img src="'.$result['article_photo'].'" alt="C\'est ici l\'image"><br>');
            echo('Article contenu : '.$result['article_contenu'].'<br>');
            echo('Article Catégorie : '.getCategorie($result['id_article_categorie']).'<br>');
            echo('Article date création avec reformat : '.changeDate($result['article_date'],'-').'<br>');
            echo('Article date création sans reformat : '.$result['article_date'].'<br>');
            echo('Article état de vision : '.$result['article_visible'].'<br>');
            echo('<br>');
        }
        $index++;
    }
?>