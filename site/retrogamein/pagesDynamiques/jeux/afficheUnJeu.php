﻿<!-- partie 1 : requetes pour récupérer les informations du jeu et de la console associée et les commentaires du jeu -->
	<?php
		/* bloc de requete pour recupérer les informations du jeu et de la console associée depuis la base de données dans un tableau associatif $leJeu */
			// Récupérer l'identifiant du jeu transmis dans la barre d'adresse
			$idJeu = $_GET['idjeu'];

			// Définir la requête SQL pour récupérer les informations du jeu et de la console associée à partir de son identifiant (idJeu)
			$SQL = "SELECT * FROM jeu JOIN console ON jeu.console = console.idConsole WHERE idJeu = :unIdJeu";

			// Préparer la requête en utilisant la connexion à la base de données
			$stmt = $connexion->prepare($SQL);

			// Définir le paramètre de la requête SQL avec l'identifiant du jeu
			$stmt->bindValue(":unIdJeu", $idJeu, PDO::PARAM_INT);

			// Exécuter la requête
			$stmt->execute();

			// Récupérer les résultats de la requête dans un tableau associatif
			$leJeu = $stmt->fetch(PDO::FETCH_ASSOC);

			// Fermer le curseur des résultats pour libérer les ressources
			$stmt->closeCursor();

		/* bloc de requete pour recupérer les commentaires du jeu depuis la base de données dans un tableau associatif $commentaires */
			// Définir la requête SQL pour récupérer les commentaires du jeu
			$SQL = "SELECT * FROM avis WHERE idJeu = :unIdJeu";

			// Préparer la requête en utilisant la connexion à la base de données
			$stmt = $connexion->prepare($SQL);

			// Définir le paramètre de la requête SQL avec l'identifiant du jeu
			$stmt->bindValue(":unIdJeu", $idJeu, PDO::PARAM_INT);

			// Exécuter la requête
			$stmt->execute();

			// Récupérer tous les résultats de la requête dans un tableau associatif à 2 dimensions
			$lesCommentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

			// Fermer le curseur des résultats pour libérer les ressources
			$stmt->closeCursor();
	?>
<!-- fin partie 1 : requetes pour récupérer les informations du jeu et de la console associée et les commentaires du jeu -->


<!-- bloc d'affichage en mode console des variables contenant les informations du jeu et de la console associée -->
	<?php
		//var_dump($leJeu); // afficher le contenu de la variable $leJeu (ici un tableau php array())
		//var_dump($lesCommentaires); // afficher le contenu de la variable $lesCommentaires (ici un tableau php array())
	?>
<!-- fin bloc d'affichage en mode console des variables contenant les informations du jeu et de la console associée -->


<!-- partie 2 : génération de l'affichage HTML des informations du jeu et de la console associée et des commentaires du jeu -->
	<a href="index.php?page=games">Retourner au catalogue</a>

	<div class="card mb-3 shadow">
		<div class="row g-0">
			<div class="col-md-4">
				<!-- Si le jeu n’a pas d’image, afficher l'image pages/jeux/photos/imageNotFound.png avec un texte "pas d’image pour ce jeu" -->
				<img src="pagesDynamiques/jeux/photos/<?= $leJeu['photoJeu'] ?>" class="img-fluid rounded-start" title="screenshot du jeu <?= $leJeu['nom'] ?>" alt="jeu <?= $leJeu['nom'] ?>">
			</div>
			<div class="col-md-5">
				<div class="card-body">
					<h5 class="card-title"><?= $leJeu['nom'] ?></h5>
					<p class="card-text"><?= $leJeu['descriptionJeu'] ?></p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card-body">
					<p class="card-text">Console : <?= $leJeu['console'] ?></p> <!-- afficher le nom de la console au lieu de son identifiant -->
					<p class="card-text">Prix moyen : <?= $leJeu['prixMoyen'] ?> euros</p>
					<p class="card-text">Nb joueurs max : <?= $leJeu['nbJoueursMax'] ?></p>
				</div>
			</div>
		</div>
		<div class="card-footer text-muted">
			<!-- Si le jeu n’a aucun commentaire, afficher "aucun avis pour l’instant" et sinon, afficher le nombre de commentaires pour ce jeu en utilisant la fonction count() du langage php sur le tableau $commentaires (voir sa documentation sur internet) -->
			<h4>xx commentaires pour ce jeu</h4>

			<ul class="list-group list-group-flush">
				<?php foreach ($lesCommentaires as $unCommentaire) : ?>
					<li class="list-group-item"><!-- ajouter le code pour afficher chaque commentaire sous la forme d'une puce -->	<?php var_dump($unCommentaire); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
<!-- fin partie 2 : génération de l'affichage HTML des informations du jeu et de la console associée et des commentaires du jeu -->
