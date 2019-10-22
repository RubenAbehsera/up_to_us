<?php
session_start();
require '../includes-front/entete.php';

if (!empty($_POST)) {
    # L'identifiant que le visiteur met            
    $post_mail = htmlentities($_POST['user_mail'], ENT_QUOTES, "ISO-8859-1");           # On vérifie qu'il n'y a pas d'injection SQL
    $post_mail = strtolower($post_mail);
    # Le mot de passe que le visiteur met
    $post_password =  htmlentities($_POST['user_password'], ENT_QUOTES, "ISO-8859-1");
    # On vérifie si le nom d'utilisateur est dans la base de données
    $mysqli = db_connect(); # On se connecte à la base de données
    $sqlUSER = execute("SELECT COUNT(user_mail) FROM user WHERE user_mail='.$post_mail.'");
    echo $sqlUSER['user_mail'];
    exit;
    # S'il y a un résultat correspondant à la requête (Le nom d'utilisateur existe)  alors on récupère le mot de passe associé
    if ($sqlUSER == 1) {
        # On fait une requête pour récuperer le mot de passe en base de données
        $sqlPASSWORD = execute("SELECT * FROM user WHERE user_mail='.$post_mail.'");
        # On associe la valeur du mot de passe hasher à une variable
        $user_password = $sqlPASSWORD["user_password"];
        $user_id = $sqlPASSWORD["id_user"];
        # On compare le mot de passe en base de données avec le mot de passe renseigné dans le formulaire
        $truepassword = password_verify($post_password,$user_password);

        # Si c'est le bon mot de passe
        if ($truepassword) {
            $_SESSION['logged'] = true;
            $_SESSION['id_user'] = $user_id;
            $sql = execute("SELECT id_user_type FROM user WHERE id_user='.$user_id.'");
            if ($sql['id_user_type'] == 1) { $_SESSION['is_admin'] = 'oui'; }
            setcookie('logged','true',time()+36000);
            redirect('index.php');
        }
        # Sinon
        else{
            redirect('connexion.php?badid');
        }
    }
}

else {
    session_destroy();
    setcookie('logged','',time()-36000);
    header("Location: ?error&error_info=badid");
    exit;
}


?>