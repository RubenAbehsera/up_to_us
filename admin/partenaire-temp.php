<?php
    session_start();
    include '../include/function.php';
    include '../include/acces_admin.php';
    include '../include/head-admin.php';

    $sql = "SELECT * from society";
    $request = request($sql);

    $index = 1;
    while ($result = mysqli_fetch_assoc($request)) {
            echo('Partenaire numéro : '.$index.'<br>');
            echo('Partenaire nom : '.ucfirst($result['society_name']).'<br>');
            echo('Partenaire mail : '.$result['society_mail'].'<br>');
            echo('Partenaire telephone : 0'.$result['society_telephone'].'<br>');
            echo('Partenaire commentaire : '.$result['society_commentaire'].'<br>');
            echo('<a class="btn btn-secondary" onclick="confirm(\'êtes-vous sûr de vouloir supprimer le partenaire '.$result['society_name'].' ?\')" href="./delete-partenaire.php?id_society='.$result['id_society'].'">Supprimer le partenaire</a>');
            echo('<br>');
        $index++;
    }
?>