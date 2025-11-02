<?php
/* code préparé pour passer l'affichage des billets en dynamique */
    // date de début et date de fin pour la requete SQL
    $date_debut = '2021-01-01';
    $date_fin = '2021-12-31';
	// Créer des objets DateTime
	$dateDebutObj = new DateTime($date_debut);
	$dateFinObj = new DateTime($date_fin);
	// Formater les dates selon le fuseau horaire du serveur
	$formattedDateDebut = $dateDebutObj->format('Y-m-d H:i:s');
	$formattedDateFin = $dateFinObj->format('Y-m-d H:i:s');

    // En utilisant les éléments de code des requetes préparées de la page afficheUnJeu.php, écrire le code pour afficher les événements à venir entre le $formattedDateDebut et le $formattedDateFin

	// requête à trouver pour afficher les événements entre les deux dates
   
    // Préparer la requête en utilisant la connexion à la base de données

    // Définir les valeurs des paramètres en utilisant bindValue
    
    // Exécuter la requête
    
    // Récupérer tous les résultats de la requête dans un tableau associatif $lesEvenements
    
    // Fermer le curseur des résultats pour libérer les ressources

?>

<header>
    <h1>Découvrez l'Excitation des Événements à Venir !</h1>
    <h2>Bienvenue sur la page Agenda de RetroGame'In, votre source ultime pour rester informé des événements à venir dans le monde du retrogaming.</h2>
    <p> Des conventions aux tournois, des expositions aux sorties de jeux rétro, notre agenda est le point de rendez-vous pour tous les passionnés du rétro. Ne manquez plus aucune occasion de célébrer la nostalgie du jeu vidéo. Explorez, planifiez, et plongez-vous dans l'univers passionnant des événements à venir.</p>
</header>


<div class="card mb-3 article" >
	<div class="row no-gutters">
		<div class="col-md-4">
		  <img src="https://www.rom-game.fr/multimedia/agendaM/201007_robocup2021.jpg" class="card-img" alt="RoboCup 2021 Bordeaux">
		</div>
		<div class="col-md-8">
		  <div class="card-body">
			<h5 class="card-title">RoboCup 2021 Bordeaux</h5>
			<p class="card-text"><small class="text-muted"><strong> Bordeaux</strong> <time>mardi 22 juin 2021</time> au <time>lundi 28 juin 2021</time></small></p>
			<p class="card-text">
				RoboCup 2021 Bordeaux est la plus grande compétition de Robotique et d'Intelligence Artificielle du monde et ses milliers de robots viendront en France en juin 2021, accueillis en territoire aquitain au Parc des expositions de Bordeaux ! (...)
			</p>
			<a href="https://www.rom-game.fr/agenda/4457-RoboCup+2021+Bordeaux.html" target="_blank" class="btn btn-primary">Lien de l'évenement</a>
		  </div>
		</div>
	</div>
</div>
<div class="card mb-3 article" >
	<div class="row no-gutters">
	<div class="col-md-4">
		<img src="https://www.rom-game.fr/multimedia/agendaM/200525_flip2021.jpg" class="card-img" alt="FLIP 2021 - 35ème édition du Festival Ludique International de Parthenay">
	</div>
	<div class="col-md-8">
		<div class="card-body">
		<h5 class="card-title">FLIP 2021 - 35ème édition du Festival Ludique International de Parthenay</h5>
		<p class="card-text"><small class="text-muted"><strong> Parthenay</strong> <time>mercredi 7 juillet 2021</time> au <time>dimanche 18 juillet 2021</time></small></p>
		<p class="card-text">
			Le Festival Ludique International de Parthenay vous accueille en 2021 pour sa 35ème édition : sur son immense plateau de jeux, novices ou amateurs éclairés se laisseront guider par les animateurs de la Cité des Jeux dans cet incroyable parcours ludique ! (...)
		</p>
		<a href="https://www.rom-game.fr/agenda/3934-FLIP+2021+-+35eme+edition+du+Festival+Ludique+International+de+Parthenay.html" target="_blank" class="btn btn-primary">Lien de l'évenement</a>
		</div>
	</div>
	</div>
</div>
<div class="card mb-3 article" >
	<div class="row no-gutters">
	<div class="col-md-4">
		<img src="https://www.rom-game.fr/multimedia/agendaM/200523_montrealcomicon.jpg" class="card-img" alt="Comiccon de Montréal 2021">
	</div>
	<div class="col-md-8">
		<div class="card-body">
		<h5 class="card-title">Comiccon de Montréal 2021</h5>
		<p class="card-text"><small class="text-muted"><strong> Montréal</strong> <time>vendredi 9 juillet 2021</time> au <time>dimanche 11 juillet 2021</time></small></p>
		<p class="card-text">
			Le Comiccon de Montréal célèbrera sa douzième édition du 9 au 11 juillet 2021. Il prend la forme d'un salon consacré à la culture populaire, laquelle englobe notamment les comic books, les bandes dessinées, la science-fiction, l'horreur, le manga, l'anime, les jouets, le cinéma, les jeux vidéo et l'univers du divertissement (...)
		</p>
		<a href="https://www.rom-game.fr/agenda/4378-Comiccon+de+Montreal+2021.html" target="_blank" class="btn btn-primary">Lien de l'évenement</a>
		</div>
	</div>
	</div>
</div>
<div class="card mb-3 article" >
	<div class="row no-gutters">
	<div class="col-md-4">
		<img src="https://www.rom-game.fr/multimedia/agendaM/201001_japanexpo2021.jpg" class="card-img" alt="Japan Expo 2021 - 21ème édition">
	</div>
	<div class="col-md-8">
		<div class="card-body">
		<h5 class="card-title">Japan Expo 2021 - 21ème édition</h5>
		<p class="card-text"><small class="text-muted"><strong> Villepinte</strong> <time>jeudi 15 juillet 2021</time> au <time>dimanche 18 juillet 2021</time></small></p>
		<p class="card-text">
			Initialement, le 21ème festival Japan Expo 2020 devait avoir lieu en 2020 mais c'est du 15 au 18 juillet 2021, et toujours au Parc des Expositions de Paris-Nord Villepinte que Japan Expo recevra de prestigieux invités et vous offrira l'occasion de les rencontrer lors de séances de dédicace, de masterclass ou de conférences au cours desquelles ils parlent de leur travail, de leur carrière et de leurs oeuvres. (...)
		</p>
		<a href="https://www.rom-game.fr/agenda/3786-Japan+Expo+2021+-+21eme+edition.html" target="_blank" class="btn btn-primary">Lien de l'évenement</a>
		</div>
	</div>
	</div>
</div>
<div class="card mb-3 article" >
	<div class="row no-gutters">
	<div class="col-md-4">
		<img src="https://www.rom-game.fr/multimedia/agendaM/200525_brusselsgamesfestival.jpg" class="card-img" alt="Brussels Games Festival 2021">
	</div>
	<div class="col-md-8">
		<div class="card-body">
		<h5 class="card-title">Brussels Games Festival 2021</h5>
		<p class="card-text"><small class="text-muted"><strong> Bruxelles</strong> <time>vendredi 27 août 2021</time> au <time>dimanche 29 août 2021</time></small></p>
		<p class="card-text">
			La 8ème édition du Brussels Games Festival réunira au Parc du Cinquantenaire du 27 au 29 août 2021 tout ce qui se fait de mieux en matière de jeux de société (...)
		</p>
		<a href="https://www.rom-game.fr/agenda/4248-Brussels+Games+Festival+2021.html" target="_blank" class="btn btn-primary">Lien de l'évenement</a>
		</div>
	</div>
	</div>
</div>
<div class="card mb-3 article" >
	<div class="row no-gutters">
	<div class="col-md-4">
		<img src="https://www.rom-game.fr/multimedia/agendaM/200523_japanparty2021.jpg" class="card-img" alt="Japan Party 2021 - Salon Fantastique">
	</div>
	<div class="col-md-8">
		<div class="card-body">
		<h5 class="card-title">Japan Party 2021 - Salon Fantastique</h5>
		<p class="card-text"><small class="text-muted"><strong> Paris 12ème</strong> <time>samedi 28 août 2021</time> au <time>dimanche 29 août 2021</time></small></p>
		<p class="card-text">
			Japan Party revient pour une 9e édition les 28 et 29 Août 2021. Cette année, Le Salon Fantastique et Japan Party 2021 s'allient pour louer ensemble le hall de l'espace Événement du Parc Floral de Paris (bois de Vincennes) et faire un double salon. (...)
		</p>
		<a href="https://www.rom-game.fr/agenda/3995-Japan+Party+2021+-+Salon+Fantastique.html" target="_blank" class="btn btn-primary">Lien de l'évenement</a>
		</div>
	</div>
	</div>
</div>
<div class="card mb-3 article" >
	<div class="row no-gutters">
	<div class="col-md-4">
		<img src="https://www.rom-game.fr/multimedia/agendaM/200209_comicconvesoul2020.jpg" class="card-img" alt="Comic Con Vesoul 2021">
	</div>
	<div class="col-md-8">
		<div class="card-body">
		<h5 class="card-title">Comic Con Vesoul 2021</h5>
		<p class="card-text"><small class="text-muted"><strong> Vesoul</strong> <time>samedi 2 octobre 2021</time> au <time>dimanche 3 octobre 2021</time></small></p>
		<p class="card-text">
			Parc Expo Vesoul accueille la Comic Con Vesoul qui se déroulera du 2 au 3 octobre 2021 (...)
		</p>
		<a href="https://www.rom-game.fr/agenda/4220-Comic+Con+Vesoul+2021.html" target="_blank" class="btn btn-primary">Lien de l'évenement</a>
		</div>
	</div>
	</div>
</div>
