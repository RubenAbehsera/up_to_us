<?php
    session_start();
    include '../include/function.php';
    include '../include/acces_admin.php';
    include '../include/head-admin.php';

    // As-t'on envoyé des infos ?
    if (isset($_GET) and !empty($_GET)) {
        // Initialisation des variables
        $id_society = intval(antiSQL($_GET["id_society"]));

        // Préparation de la requête
        $sql = "DELETE FROM society WHERE id_society = '$id_society'";

        $callback = execute($sql);

        if ($callback) {
            show_info("Le partenaire a bien été supprimer");
        } else {
            show_info("Le partenaire n'a pas bien été supprimer");
        }
    }

?>