<?php
	/* Détermination du nom de la page à charger après vérification de sa validité */
	if (isset($_GET['menu'])) {
		$menu = $_GET['menu'];
	}
	else {
		$menu = "membre";
	}
	/* modifier pour que le choix par défaut soit l'affichage par jeu */
	


	
	if ($menu == "jeu") {
		// Définir la requête SQL pour récupérer tous les jeux dans la table jeu par ordre alphabétique
		$SQL = "SELECT * FROM jeu ORDER BY 2 ASC";
		// Préparer la requête en utilisant la connexion à la base de données
		$stmt = $connexion->prepare($SQL);
		// Exécuter la requête
		$stmt->execute();
		// Récupérer tous les résultats de la requête sous forme d'un tableau d'objets (donc plusieurs objets)
		$lesJeux = $stmt->fetchAll(PDO::FETCH_OBJ);
		// Fermer le curseur des résultats pour libérer les ressources
		$stmt->closeCursor();

		echo '<h2>Choisir un jeu :</h2>';
		echo '<select name="jeu" class="form-select" onchange="location = this.value;">';
		// tant qu'on arrive pas à la fin du tableau $lesJeux, on charge l'objet courant dans $unJeu
		foreach($lesJeux as $unJeu) {
			$selected = "";
			if ((isset($_GET['jeu'])) && ($_GET['jeu']==$unJeu->idJeu)) {
				$selected = "selected";
			}
			echo '<option value="?page=comments&menu='.$menu.'&jeu='.$unJeu->idJeu.'" '.$selected.'>'.$unJeu->nom.'</option>';
		}
		echo '</select>';
		
	}
	else {
		// Définir la requête SQL pour récupérer tous les membres dans la table membre par ordre alphabétique
		$SQL = "SELECT * FROM membre ORDER BY 2 ASC";
		// Préparer la requête en utilisant la connexion à la base de données
		$stmt = $connexion->prepare($SQL);
		// Exécuter la requête
		$stmt->execute();
		// Récupérer tous les résultats de la requête sous forme d'un tableau d'objets (donc plusieurs objets)
		$lesMembres = $stmt->fetchAll(PDO::FETCH_OBJ);
		// Fermer le curseur des résultats pour libérer les ressources
		$stmt->closeCursor();

		echo '<h2>Choisir un membre :</h2>';
		echo '<select name="membre" class="form-select" onchange="location = this.value;">';
		// tant qu'on arrive pas à la fin du tableau $lesMembres, on charge l'objet courant dans $unMembre
		foreach($lesMembres as $unMembre) {
			$selected = "";
			if ((isset($_GET['membre'])) && ($_GET['membre']==$unMembre->idMembre)) {
				$selected = "selected";
			}
			echo '<option value="?page=comments&menu='.$menu.'&membre='.$unMembre->idMembre.'" '.$selected.'>'.$unMembre->nomMembre.'</option>';
		}
		echo '</select>';
	}
