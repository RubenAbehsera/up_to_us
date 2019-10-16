<?php
    $sql = "SELECT id_user_type,user_valid from user where id_user_type = '1' and user_valid='1' and id_user='$_SESSION["id_user"]'";
    echo $sql;
    exit;
    $is_admin = insert($sql);

    if ($is_admin) {       // il est admin
        $is_admin = true;
    } else {                    // il n'est admin
        $is_admin = false;
        exit;
    }

    // S'il n'est pas admin
    if (!is_admin() and !$is_admin) {
        exit;
    }
?>