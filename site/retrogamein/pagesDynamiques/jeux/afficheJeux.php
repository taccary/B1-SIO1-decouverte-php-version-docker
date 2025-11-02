<header>
	<h1>Redécouvrez Votre Enfance dans Notre Catalogue Rétro !</h1>
	<h2>Bienvenue dans le catalogue de RetroGame'In, où chaque clic vous ramène à une époque révolue.</h2>
	<p>Parcourez notre collection soigneusement sélectionnée de jeux classiques, de consoles légendaires, et d'accessoires iconiques. Que vous soyez à la recherche de trésors rétro pour compléter votre collection ou de jeux cultes à revivre, notre catalogue est un voyage dans le temps que tout amateur de rétro se doit d'explorer.
	<br/>
	Plongez dans la nostalgie, dénichez des perles du passé, et redécouvrez votre enfance à travers les pixels et les saveurs du jeu vidéo d'antan. Votre quête commence ici, dans notre catalogue rétro.</p>
</header>

<!-- partie 1 : affichage de la liste des consoles dans un formulaire -->
	<?php
		echo '<h1 class="entry-title">Liste des jeux en fonction des consoles</h1>';
		

		$SQL = "SELECT idConsole, nomConsole FROM console ORDER BY 2 ASC";
		$stmt = $connexion->prepare($SQL);
		$stmt->execute(array()); // on passe dans le tableaux les paramètres si il y en a à fournir (aucun ici)
		$lesConsoles = $stmt->fetchAll(PDO::FETCH_ASSOC); // on met le resultat de la requete dans un tableau à 2 dimensions
		//var_dump($lesConsoles); // on affiche le contenu de la variable $lesConsoles (ici un tableau php array())
		$stmt->closeCursor(); // on ferme le curseur des résultats
	?>

	<form method="post" action="index.php?page=games" class="row g-3">
		<div class="col-md-8">
			<select name="console" class="form-select">
				<option value="">--sélectionner une console--</option>
					<?php
					foreach ($lesConsoles as $uneConsole) {
						$selected = "";
						if ((isset($_POST['console'])) && ($_POST['console']==$uneConsole['idConsole'])) {
							$selected = "selected";
						}
						echo '<option value="'.$uneConsole['idConsole'].'" '.$selected.'>'.$uneConsole['nomConsole'].'</option>';
					}
					?>
			</select>
		</div>
		<div class="col-md-4">
			<button class="btn btn-primary" type="submit">Charger les jeux</button>
		</div>
	</form>
<!-- fin partie 1 : liste des consoles -->

<!-- partie 2 : affichage de la liste des jeux -->
	<?php
		if ((isset($_POST['console'])) && ($_POST['console'] != "")) {

			$idConsole = $_POST['console']; // commentaire à ajouter

			/* première requete pour récupérer le nom de la console */
			$SQL = "SELECT * FROM console WHERE idConsole = :id "; // on prépare la requete
			$stmt = $connexion->prepare($SQL); // on prépare la requete
			$stmt->bindValue(":id", $idConsole, PDO::PARAM_INT); // on transmet le numero de console à la requete
			$stmt->execute(); // on execute la requete
			$uneConsole = $stmt->fetch(); // on met le resultat de la requete dans un tableau
			$stmt->closeCursor(); // on ferme le curseur des résultats

			/* deuxième requete pour récupérer la liste des jeux de la console */
			$SQL = "SELECT * FROM jeu WHERE console = :id ORDER BY 1 ASC "; // on prépare la requete
			$stmt = $connexion->prepare($SQL); // on prépare la requete
			$stmt->bindValue(":id", $idConsole, PDO::PARAM_INT); // on transmet le numero de console à la requete
			$stmt->execute(); // on execute la requete
			$lesJeux = $stmt->fetchAll(PDO::FETCH_ASSOC); // on met le resultat de la requete dans un tableau à 2 dimensions
			$stmt->closeCursor(); // on ferme le curseur des résultats

			// var_dump($uneConsole); // on affiche le contenu de la variable $uneConsole (ici un tableau php array()
			// var_dump($lesJeux); // on affiche le contenu de la variable $lesJeux (ici un tableau php array()

			/* affichage du titre de la console et du nombre de jeux */

			$nbJeux = "pas de jeux" ; // on initialise la variable $nbJeux
			if (count($lesJeux) != 0){
				if (count($lesJeux) == 1){
					$nbJeux = "1 jeu"; // on écrase la variable $nbJeux avec le nombre de jeux concaténé avec le mot "jeu"
				} else {
					$nbJeux = count($lesJeux)." jeux"; // on écrase la variable $nbJeux avec le nombre de jeux concaténé avec le mot "jeux"
				}
			}

			echo '<h4>Liste des jeux '.$uneConsole['nomConsole'].' ('.$nbJeux.')</h4>'; // on affiche le titre de la console et le nombre de jeux

			echo '<ul>';
			foreach ($lesJeux as $unJeu) {
				echo '<li><a href="index.php?page=games&idjeu='.$unJeu['idJeu'].'">'.$unJeu['nom'].'</a> ('.$unJeu['prixMoyen'].' euros)</li>';
			}
			echo '</ul>';

		} else {
			echo '<h4>veuillez selectionner une console</h4>';
		}
	?>
<!-- fin partie 2 : liste des jeux -->
