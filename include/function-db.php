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
        return $lien;
    } else {
        return 'Erreur de connexion à la BDD';
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
    $request = request($sql);
	$result = mysqli_fetch_assoc($request);

	for ($i=0;$i < mysqli_num_fields($request);$i++)
	{
		$temp = mysqli_fetch_field_direct($request,$i);
		$result[$temp->name] = $result[$temp->name];
	}

	return($result);
}

// Requête INSERT
function insert($sql) {
	$lien = db_connect();
	$result = mysqli_query($lien,$sql);

	return $result;
}

function upload_image($post_name,$name_repertoire) {
	$target_dir = "images/".$name_repertoire;
	$target_file = $target_dir . basename($_FILES[$post_name]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES[$post_name]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = true;
		} else {
			echo "File is not an image.";
			$uploadOk = false;
		}
	}

	return $uploadOk;
}
?>