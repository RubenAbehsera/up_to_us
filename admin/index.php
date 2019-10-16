<?php
    session_start();
    include '/include/function.php';

    if (!empty($_POST)) {
        # L'identifiant que le visiteur met            
        $post_mail = htmlentities($_POST['user_mail'], ENT_QUOTES, "ISO-8859-1");           # On vérifie qu'il n'y a pas d'injection SQL
        $post_mail = strtolower($post_mail);
        # Le mot de passe que le visiteur met
        $post_password =  htmlentities($_POST['user_password'], ENT_QUOTES, "ISO-8859-1");
        # On écrit la requête pour voir si l'mail existe
        $sqlUSER = "SELECT count(user_mail) FROM user WHERE user_mail = '$post_mail'";

        $Nbrresult = execute($sqlUSER);
        
        # S'il y a un résultat correspondant à la requête (Le nom d'utilisateur existe)  alors on récupère le mot de passe associé
        if ($Nbrresult["count(user_mail)"] == 1) {
            # On fait une requête pour récuperer le mot de passe en base de données
            # On écrit la requête pour récupérer le mdp et l'mail
            $sql_PASSWORD = "SELECT id_user,user_password FROM user WHERE user_password = '$post_password'";
            # On interroge la BDD
            $user_password = execute($sql_PASSWORD);
            # On associe la valeur du mot de passe hasher à une variable
            $user_password = $user_password['user_password'];
            $user_id = $user_password['id_user'];
            # On compare le mot de passe en base de données avec le mot de passe renseigné dans le formulaire
            $truepassword = password_verify($post_password,$user_password);
    
            # Si c'est le bon mot de passe
            if ($truepassword) {
                $_SESSION['id_user'] = $user_id;
                $_SESSION['is_admin'] = "true";
                setcookie('logged','true',time()+306000);
                show_info("Vous avez bien été connecter");
            }
            # Sinon
            else{
                show_info("Mauvais mot de passe ou mauvais identifiant");
            }
        }
    }
    
    if (!empty($_GET) and $_GET["loggout"] != "") {
        session_destroy();
        setcookie('logged','',time()-306000);
        show_info("Vous avez bien été déconnecter");
        exit;
    }

?>
<!DOCTYPE html>
<html lang="fr">
<?php
    include '../include/head-admin.php';
?>
<body>

    <nav id="nav" class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand text-hide" style="background: url('https://logos.textgiraffe.com/logos/logo-name/Abd-designstyle-i-love-m.png')" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto container center">
                <li class="nav-item active">
                    <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Qui suis-je?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#product">je vend quoi?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <form class="container mt-5" method="post" action="index.php">
        <div class="form-group col-md-10">
            <label for="staticMail" class="col-sm-2 col-form-label">Mail</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="staticMail" placeholder="myemail" name="user_mail" required>
            </div>
        </div>
        <div class="form-group col-md-10">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="user_password" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary col-md-10">Sign in</button>
    </form>

    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase">Footer Content</h5>
                    <p>Here you can use rows and columns to organize your footer content.</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

</body>
</html>