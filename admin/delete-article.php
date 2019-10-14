<?php
    session_start();
    include '../include/function.php';
    include '../include/acces_admin.php';

    // As-t'on envoyé des infos ?
    if (isset($_GET) and !empty($_GET)) {
        // Initialisation des variables
        $id_article = intval(antiSQL($_GET["id_article"]));

        // Préparation de la requête
        $sql = "DELETE FROM article WHERE id_article = '$id_article'";

        $callback = execute($sql);

        if ($callback) {
            show_info("L'article a bien été supprimer");
        } else {
            show_info("L'article n'a pas bien été supprimer");
        }
    }

?>