<?php
    session_start();
    require 'include/function.php';

    echo $_SESSION['myconnect'];
    
    // Contrôle pour voir s'il est connecter
    if (!empty($_POST)) {
        # L'identifiant que le visiteur met            
        $post_username = htmlentities($_POST['user_username'], ENT_QUOTES, "ISO-8859-1");           # On vérifie qu'il n'y a pas d'injection SQL
        $post_username = strtolower($post_username);
        # Le mot de passe que le visiteur met
        $post_password =  htmlentities($_POST['user_password'], ENT_QUOTES, "ISO-8859-1");
        # On vérifie si le nom d'utilisateur est dans la base de données
        $mysqli = db_connect(); # On se connecte à la base de données
        $sqlUSER = execute("SELECT COUNT(user_username) FROM user WHERE user_username='.$post_username.'");

        # S'il y a un résultat correspondant à la requête (Le nom d'utilisateur existe)  alors on récupère le mot de passe associé
        if ($sqlUSER == 1) {
            # On fait une requête pour récuperer le mot de passe en base de données
            $sqlPASSWORD = execute("SELECT * FROM user WHERE user_username='.$post_username.'");
            # On associe la valeur du mot de passe hasher à une variable
            $user_password = $sqlPASSWORD["user_password"];
            $user_id = $sqlPASSWORD["id_user"];
            # On compare le mot de passe en base de données avec le mot de passe renseigné dans le formulaire
            $truepassword = password_verify($post_password,$user_password);
    
            # Si c'est le bon mot de passe
            if ($truepassword) {
                // Initialisation des variables sessions
                $_SESSION['logged'] = true;
                $_SESSION['id_user'] = $user_id;
                // On regarde s'il est admin
                $sql = execute("SELECT id_user_type FROM user WHERE id_user='.$user_id.'");
                if ($sql['id_user_type'] == 1) { $_SESSION['is_admin'] = 'oui'; }
                // On l'ajoute dans l'historique de connexion
                $date = date("Ymd H:i:s");
                $sql = "INSERT into historyconnexion(id_user,historyconnexion_date) values('".$id_user."','".$date."')";
                $sql = execute($sql);
                // On met un cookie
                setcookie('logged','true',time()+36000);
                echo 'Connecté';
                // redirect('espace-connecte.php'); Mettre l'url de redirection
            }
            # Sinon
            else{
                // redirect('connexion.php?badid');
                echo 'Mauvais mdp';
            }
        }
    }

    if ($_GET['disconnected']) {
        session_destroy();
        setcookie('logged','',time()-36000);
        redirect('connexion.php?badid');
        // exit;
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Up to us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>
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

    <form class="container mt-5" method="post" action="connexion.php">
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