<?php

// Connexion BDD
function db_connect() {
    // Initialisation des variables
	$host =	"localhost";
	$username = "root";
	$password = "root";
	$bdd = "up_to_us";
	
	// Connexion au serveur MySQL et choix de la BDD
	$lien = mysqli_connect($host, $username, $password, $bdd);
	
	if (mysqli_connect_errno()) {
		return show_info("Erreur de connexion à la BDD");
		exit();
	}
    
	if ($lien) {
        mysqli_query($lien, "set names utf8");
        return $lien;
    } else {
		return show_info("Erreur de connexion à la BDD");
    }
}

// Function anti injection SQL
function antiSQL($sql){
    return(str_replace("'","\'",strip_tags($sql)));
}

// Requête SQL
function request($sql) {
    $sql = antiSQL($sql);
	$lien = db_connect();

	if (!$resultat = mysqli_query($lien,$sql)){
		if (is_admin()){
			echo("<blockquote>");
			echo mysqli_errno($lien);
			echo(" : ");
			echo mysqli_error($lien);
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
	$lien = db_connect();
	$query = mysqli_query($lien, $sql);
	$result = mysqli_fetch_assoc($query);

	if ($result) {
		return($result);
	}
}


// Requête INSERT
function insert($sql) {
	$lien = db_connect();
	$result = mysqli_query($lien,$sql);

	return $result;
}
?>