<?php

// Connexion BDD
function db_connect() {
    // Initialisation des variables
	$host =	"localhost";
	$username = "root";
	$password = "";
	$bdd = "up_to_us";
	
	// Connexion au serveur MySQL et choix de la BDD
    $lien = mysqli_connect($host, $username, $password, $bdd);
    
	if ($lien) {
        mysqli_query($lien, "set names utf8");
        $_SESSION['myconnect'] = $lien;
        return(true);
    } else {
        return(false);
    }
}

// Function anti injection SQL
function antiSQL($sql){
    return(str_replace("'","\'",strip_tags($sql)));
}

// is admin ?
function is_admin(){
    if ((isset($_SESSION['is_admin'])) and ($_SESSION['is_admin'] != "")) {
        return true;
    } else {
        return false;
    }
}
// Requête SQL
function request($sql) {
    $sql = antiSQL($sql);
	
	if (!$resultat = mysqli_query($_SESSION['myconnect'],$sql)){
		if (is_admin()){
			echo("<blockquote>");
			echo mysqli_errno($_SESSION['myconnect']);
			echo(" : ");
			echo mysqli_error($_SESSION['myconnect']);
			echo("<br />");
			echo($sql);
			echo("</blockquote>");
		}
		exit;
	}

	return($resultat);
}

// Une seule requête SQL
function execute($sql) {
    $request = request($sql);

	$result = mysqli_fetch_assoc($request);

	for ($i=0;$i < mysqli_num_fields($request);$i++)
	{
		$temp = mysqli_fetch_field_direct($request,$i);
		$result[$temp->name] = $result[$temp->name];
	}

	return($result);
}


?>