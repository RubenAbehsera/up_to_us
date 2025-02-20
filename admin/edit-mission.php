<?php
    session_start();
    include '../include/function.php';
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

<?php
    if (isset($_GET['id_mission'])) {
        $sql = antiSQL($_GET['id_mission']);
        $sql = "SELECT * from mission where id_mission='$sql'";

        $result = execute($sql);
        ?>

        <body>
            <form method="post" action="edit-mission.php" class="container my-5">
                <div class="form-group">
                    <input type="text" class="form-control" id="nom" value="<?php echo $result['mission_nom'] ?>"
                        name="mission_nom" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="mission_description" rows="3" name="mission_description"
                        value="<?php echo $result['mission_description'] ?>"
                        placeholder="<?php echo $result['mission_description'] ?>"
                        required><?php echo $result['mission_description'] ?></textarea>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" id="mission_photo" name="fichier"
                        value="<?php echo $result['mission_photo'] ?>" placeholder="<?php echo $result['mission_photo'] ?>"
                        accept="image/*" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="lieu" placeholder="<?php echo $result['mission_lieu'] ?>" name="mission_lieu" value="<?php echo $result['mission_lieu'] ?>"
                        required>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" id="date" placeholder="<?php echo changeDateInput($result['mission_date'],'-') ?>" name="mission_date"
                        min="2019-01-01" max="2021-12-31" required value="<?php echo changeDateInput($result['mission_date'],'-') ?>">
                </div>
                <div class="form-group">
                    <input type="time" class="form-control" id="heure" placeholder="<?php echo changeTime($result['mission_heure'],':') ?>" name="mission_heure" value="<?php echo changeTime($result['mission_heure'],':') ?>"
                        required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mission_visible" id="mission_visible1" value="1" checked>
                    <label class="form-check-label" for="mission_visible1">
                        On affiche l'mission
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mission_visible" id="mission_visible" value="0">
                    <label class="form-check-label" for="mission_visible">
                        On n'affiche pas l'mission
                    </label>
                </div>
                <input class="d-none" name="id_mission" value="<?php echo antiSQL($_GET['id_mission']) ?>">
                <button type="submit" class="btn btn-primary col-md-10">Editer la mission</button>
            </form>
        </body>
        </html>
    <?php
    }

    if (!isset($_GET['id_mission']) and !empty($_POST)) {
        // Initialisation des variables
        $mission_nom = $_POST["mission_nom"];
        $mission_description = $_POST["mission_description"];
        $mission_photo = "1";
        $mission_lieu = $_POST["mission_lieu"];
        $mission_date = $_POST["mission_date"];
        $mission_date = dateFormat($mission_date);
        $mission_heure = $_POST["mission_heure"];
        $mission_heure = timeFormat($mission_heure);
        $mission_visible = $_POST['mission_visible'];
        $id_mission = $_POST['id_mission'];

        $sql = "UPDATE mission SET mission_nom = '$mission_nom',
        mission_description = '$mission_description',
        mission_photo = '$mission_photo',
        mission_lieu = '$mission_lieu',
        mission_date = '$mission_date',
        mission_heure = '$mission_heure',
        mission_visible = '$mission_visible'
        where id_mission = '$id_mission'";

        $callback = insert($sql);
        if ($callback) {
            show_info("La mission a bien été modifié");
        } else {
            show_info("La mission n'a pas bien été modifié");
        }
    }
?>