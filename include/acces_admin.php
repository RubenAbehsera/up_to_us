<?php

    $sql = "SELECT id_user_type,user_valid from user where id_user_type = '1' and user_valid='1' and id_user='$_SESSION["id_user"]'";
    $is_admin = nbrSQL($sql);

    if ($is_admin == 1) {       // il est admin
        $is_admin = true;
    } else {                    // il n'est admin
        $is_admin = false;
    }

    // S'il n'est pas admin
    if (is_admin() and !$is_admin) {
        die("Vous n'êtes pas admin !");
    }
?>