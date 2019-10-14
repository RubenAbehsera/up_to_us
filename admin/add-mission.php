<?php
    session_start();
    include '../include/function.php';
    include '../include/acces_admin.php';

    // As-t'on envoyé des infos ?
    if (isset($_POST) and !empty($_POST)) {
        // Initialisation des variables
        $mission_nom = $_POST["mission_nom"];
        $mission_description = $_POST["mission_description"];
        $mission_photo = "1";
        $mission_lieu = $_POST["mission_lieu"];
        $mission_date = $_POST["mission_date"];
        $mission_date = dateFormat($mission_date);
        $mission_heure = $_POST["mission_heure"];
        $mission_heure = timeFormat($mission_heure);
        $mission_createur = 1;
        $mission_visible = $_POST['mission_visible'];

        // Préparation de la requête
        $sql = "INSERT into mission(mission_nom,mission_description,mission_photo,mission_lieu,mission_date,mission_heure,mission_createur,mission_visible)
        values ('$mission_nom','$mission_description','$mission_photo','$mission_lieu','$mission_date','$mission_heure','$mission_createur','$mission_visible')";

        $callback = insert($sql);
        if ($callback) {
            show_info("La mission a bien été ajouter");
        } else {
            show_info("La mission n'a pas bien été ajouter");
        }
    }

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Up to us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
</head>

<body>
    <form method="post" action="add-mission.php" class="container my-5">
        <div class="form-group">
            <label for="titre">Nom</label>
            <input type="text" class="form-control" id="titre" placeholder="Titre de La mission" name="mission_nom"
                required>
        </div>
        <div class="form-group">
            <label for="mission_contenu">description mission</label>
            <textarea class="form-control" id="mission_contenu" rows="3" name="mission_description" required></textarea>
        </div>
        <div class="form-group">
            <label for="mission_photo">Image</label>
            <input type="file" class="form-control-file" id="mission_photo" name="fichier" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="lieu">Misison lieu</label>
            <input type="text" class="form-control" id="lieu" placeholder="Lieu de la mission" name="mission_lieu"
                required>
        </div>
        <div class="form-group">
            <label for="date">Mission date</label>
            <input type="date" class="form-control" id="date" placeholder="date de la mission" name="mission_date"
            min="2019-01-01" max="2021-12-31" required>
        </div>
        <div class="form-group">
            <label for="heure">Mission heure</label>
            <input type="time" class="form-control" id="heure" placeholder="heure de la mission" name="mission_heure"
            required>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="mission_visible" id="mission_visible1" value="1"
                checked>
            <label class="form-check-label" for="mission_visible1">
                On affiche La mission
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="mission_visible" id="mission_visible" value="0">
            <label class="form-check-label" for="mission_visible">
                On n'affiche pas La mission
            </label>
        </div>
        <button type="submit" class="btn btn-primary col-md-10">Publier La mission</button>
    </form>
</body>

</html>