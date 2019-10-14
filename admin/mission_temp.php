<?php
    session_start();
    include '/include/function.php';
    include '../include/acces_admin.php';

    $sql = "SELECT * from mission";
    $request = request($sql);

    $index = 1;
    while ($result = mysqli_fetch_assoc($request)) {
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
            echo('<a class="btn btn-primary" href="./edit-mission.php?id_mission='.$result['id_mission'].'">Editer l\'article</a>');
            echo('<a class="btn btn-secondary" onclick="confirm(\"êtes-vous sûr de vouloir supprimer la mission '.$result['mission_nom'].' ?\")" href="./delete-mission.php?id_mission='.$result['id_mission'].'">Supprimer la mission</a>');
            echo('<br>');
        $index++;
    }
?>