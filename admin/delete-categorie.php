<?php
    session_start();
    include '../include/function.php';
    include '../include/acces_admin.php';
    include '../include/head-admin.php';

    // As-t'on envoyé des infos ?
    if (isset($_GET) and !empty($_GET)) {
        // Initialisation des variables
        $id_article_categorie = intval(antiSQL($_GET["id_article_categorie"]));

        // Préparation de la requête
        $sql = "DELETE FROM article_categorie WHERE id_article_categorie = '$id_article_categorie'";

        $callback = execute($sql);

        if ($callback) {
            show_info("La catégorie a bien été supprimer");
        } else {
            show_info("La catégorie n'a pas bien été supprimer");
        }
    }

?>