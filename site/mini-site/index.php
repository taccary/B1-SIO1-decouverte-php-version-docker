<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Mini-Site</a>
        <div id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="page1.php">Les jeux (Requête simple)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page2.php">Les avis (Requête avec jointure)</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-5">Bienvenue sur ce mini-site php avec requetes SQL</h1>
        <p class="lead">Ce mini-site ne met pas en oeuvre un modèle d'architecture à recommander (site multi-page, parties de code redondandes, ...). Il a simplement pour objectif de vous montrer comment integrer des requêtes SQL en PHP et mettre en forme les résultats obtenus dans une page web.</p>
    </div>
</body>
</html>
