<?php
    session_start();
    include '/include/function.php';
    include '/include/head-site.php';

    $sql = "SELECT * from mission";
    $request = request($sql);

    $index = 1;
    while ($result = mysqli_fetch_assoc($request)) {
        // Condition pour n'afficher que les missions en état visible
        if ($result['mission_visible'] == 1) {
            echo('Mission numéro : '.$index.'<br>');
            echo('Mission nom : '.$result['mission_nom'].'<br>');
            echo('Mission description : '.$result['mission_description'].'<br>');
            echo('Mission photo : <img src="'.$result['mission_photo'].'" alt="C\'est ici l\'image"><br>');
            echo('Mission lieu : '.$result['mission_lieu'].'<br>');
            echo('Mission date avec reformat : '.changeDate($result['mission_date'],'-').'<br>');
            echo('Mission date sans reformat : '.$result['mission_date'].'<br>');
            echo('Mission heure avec reformat : '.changeTime($result['mission_heure'],':').'<br>');
            echo('Mission heure sans reformat : '.changeTime($result['mission_heure'],':').'<br>');
            echo('Mission état de vision : '.$result['mission_visible'].'<br>');
            echo('<br>');
        }
        $index++;
    }
?>