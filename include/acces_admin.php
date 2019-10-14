<?php
    include 'function.php';

    // S'il n'est pas admin
    if (!is_admin()) {
        die("Vous n'êtes pas admin !");
    }

?>