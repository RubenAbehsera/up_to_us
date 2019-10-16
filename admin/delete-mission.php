<?php
    session_start();
    include '../include/function.php';
    include '../include/acces_admin.php';
    include '../include/head-admin.php';
    // As-t'on envoyé des infos ?
    if (isset($_GET) and !empty($_GET)) {
        // Initialisation des variables
        $id_mission = intval(antiSQL($_GET["id_mission"]));

        // Préparation de la requête
        $sql = "DELETE FROM mission WHERE id_mission = '$id_mission'";

        $callback = execute($sql);

        if ($callback) {
            show_info("La mission a bien été supprimer");
        } else {
            show_info("La mission n'a pas bien été supprimer");
        }
    }

?>