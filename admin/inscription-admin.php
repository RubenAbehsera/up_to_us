<?php
    session_start();
    include '../include/function.php';

    // As-t'on envoyé des infos ?
    if (isset($_POST) and !empty($_POST)) {
        // Initialisation des variables
        $user_mail = antiSQL($_POST["user_mail"]);
        $user_mail = strtolower($user_mail);
        $user_password = antiSQL($_POST["user_password"]);
        $user_password = password_hash($user_password, PASSWORD_DEFAULT);
        $id_user_type = 1;
        $user_valid = 0;

        $sql = "SELECT user_mail from user where user_mail='$user_mail'";
        $nbrResult = insert($sql);

        if ($nbrResult) {
            show_info("Un utilisateur avec le même mail existe déjà");
            exit;
        }

        // Préparation de la requête
        $sql = "INSERT into user(user_mail,user_password,id_user_type,user_valid)
        values ('$user_mail','$user_password','$id_user_type','$user_valid')";


        $callback = insert($sql);
        if ($callback) {
            show_info("Vous avez bien été ajouter");
        } else {
            show_info("Vous n'avez pas bien été ajouter");
        }
    }

?>
<!DOCTYPE html>
<html lang="fr">

<?php
include '../include/head-admin.php';
?>

<body>
    <form class="container mt-5" method="post" action="inscription-admin.php">
        <div class="form-group col-md-10">
            <label for="staticMail" class="col-sm-2 col-form-label">Mail</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="staticMail" placeholder="myemail" name="user_mail"
                    required>
            </div>
        </div>
        <div class="form-group col-md-10">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password"
                    name="user_password" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary col-md-10">Create my account!</button>
    </form>
</body>

</html>