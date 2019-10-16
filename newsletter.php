<?php
    session_start();
    include './include/function.php';

    if (isset($_POST) and !empty($_POST)) {
        $newsletter_subscription_mail = $_POST["user_mail"];
        if (!filter_var($newsletter_subscription_mail, FILTER_VALIDATE_EMAIL)) {
            show_info("L'adresse e-mail n'est pas valide !");
            exit;
        }

        $sql = "SELECT newsletter_subscription_mail from newsletter_subscription where newsletter_subscription_mail ='$newsletter_subscription_mail'";

        $callback = insert($sql);

        if ($callback) {
            show_info("Tu es déjà inscrit à la newsletters");
            exit;
        }

        $newsletters_subscription_date = date("YmdHis");
        // Préparation de la requête
        $sql = "INSERT into newsletters_subscription(newsletters_subscription_date,newsletter_subscription_mail)
        values('$newsletters_subscription_date','$newsletter_subscription_mail')";

        $callback = insert($sql);
        if ($callback) {
            show_info("Vous avez bien été inscrit à la Newsletters");
        } else {
            show_info("Vous n'avez pas bien été inscrit à la Newsletters");
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<?php
    include './include/head-site.php';
?>

<body>
    <form class="container mt-5" action="?" method="post">
        <div class="form-group col-md-10">
            <label for="staticMail" class="col-sm-2 col-form-label">Mail</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="staticMail" placeholder="myemail" name="user_mail"
                    required="">
            </div>
        </div>
    </form>
</body>

</html>