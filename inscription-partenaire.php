<?php
    session_start();
    include './include/function.php';

    // As-t'on envoyé des infos ?
    if (isset($_POST) and !empty($_POST)) {
        // Initialisation des variables
        $society_name = antiSQL($_POST["society_name"]);
        $society_mail = antiSQL($_POST["society_mail"]);
        $society_mail = strtolower($society_mail);
        $society_telephone = antiSQL($_POST["society_telephone"]);
        $society_telephone = strtolower($society_telephone);
        $society_commentaire = antiSQL($_POST["society_commentaire"]);

        if (filter_var($_POST["E-mail"], FILTER_VALIDATE_EMAIL)) {
            show_info("L'adresse e-mail n'est pas valide");
            exit;
        }

        $sql = "SELECT society_mail from society where society_mail='$society_mail'";
        $nbrResult = insert($sql);
        $nbrResult = mysqli_num_rows($nbrResult);

        if ($nbrResult > 1) {
            show_info("Un partenaire avec le même mail existe déjà");
            exit;
        }

        // Préparation de la requête
        $sql = "INSERT into society(society_name,society_mail,society_telephone,society_commentaire)
        values('$society_name','$society_mail','$society_telephone','$society_commentaire')";

        $callback = insert($sql);
        if ($callback) {
            show_info("Vous avez bien été ajouter dans notre liste de partenaire !");
        } else {
            show_info("Vous n'avez pas bien été ajouter dans notre liste de partenaire :(");
        }
    }

?>
<!DOCTYPE html>
<html lang="fr">

<?php
include './include/head-site.php';
?>

<body>
    <form class="container mt-5" method="post" action="inscription-partenaire.php">
        <div class="form-group col-md-10">
            <label for="titre">Nom de la société</label>
            <input type="text" class="form-control" id="titre" placeholder="Nom de la société" name="society_name"
                required>
        </div>
        <div class="form-group col-md-10">
            <label for="staticMail" class="col-sm-2 col-form-label">Mail</label>
            <input type="email" class="form-control" id="staticMail" placeholder="myemail" name="society_mail"
                    required>
        </div>
        <div class="form-group col-md-10">
            <label for="telephone" class="col-sm-2 col-form-label">Téléphone</label>
            <input type="tel" name="society_telephone" id="telephone" pattern="[0-9]{10}" maxlength="10"
                    placeholder="Entrez votre numéro de tel" class="form-control" required>
        </div>
        <div class="form-group col-md-10">
            <label for="society_commentaire">Commentary</label>
            <textarea class="form-control" id="society_commentaire" name="society_commentaire" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary col-md-10">Be a partner !</button>
    </form>
</body>

</html>