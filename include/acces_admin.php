<?php
    // S'il n'est pas admin
    if (!is_admin()) {
        show_info("Vous n'ètes pas admin >:( !");
        exit;
    }

    // Affiche un pop up pour se déco
    loggout();
?>