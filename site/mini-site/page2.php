<?php include 'config.php'; // cette ligne permet d'inclure le fichier config.php dans cette page. Ce fichier contient la connexion à la base de données. ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les avis</title>
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
        <h1 class="mt-5">Affichage complet des avis (requete avec jointure)</h1>
        <p class="lead">Cette page affiche des informations sur les avis des membres.</p><p> Pour chaque avis, on affiche le nom du jeu, la date et le commentaire.<br>
        On filtre les avis par membre en utilisant une liste déroulante alimentée par une requête SQL.<br>
        On utilise une requête SQL avec jointure pour récupérer les informations des jeux et des membres liées aux avis.</p>

        <!-- Récupération des id et nom des membres depuis la base de données -->
        <?php
            $requete= "SELECT idMembre, nomMembre FROM membre ORDER BY nomMembre";
            $query = $connexion->prepare($requete);
            $query->execute();
            $lesMembres = $query->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <!-- liste des membres sous forme de liste déroulante -->
        <form method="post" action="page2.php">
            <label for="membre">Membre :</label>
            <select id="membre" name="membre">
                <?php
                    foreach ($lesMembres as $unMembre) {
                        echo '<option value="' . $unMembre['idMembre'] . '">' . $unMembre['nomMembre'] . '</option>';
                    }
                ?>
            </select>
            <button type="submit">Afficher les avis du membre</button>
        </form>


        <!-- Récupération des avis dans la base de données -->
        <?php
        if (isset($_POST['membre'])) {
            $idMembre = $_POST['membre'];
            $requete= "SELECT * FROM avis INNER JOIN membre ON avis.idMembre=membre.idMembre INNER JOIN jeu ON avis.idJeu=jeu.idJeu WHERE avis.idMembre = :id ORDER BY avis.date DESC";
            $query = $connexion->prepare($requete);
            $query->bindValue(':id', $idMembre);
            $query->execute();
            $lesAvis = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            $requete= "SELECT * FROM avis INNER JOIN membre ON avis.idMembre=membre.idMembre INNER JOIN jeu ON avis.idJeu=jeu.idJeu ORDER BY avis.date DESC";
            $query = $connexion->prepare($requete);
            $query->execute();
            $lesAvis = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        <br>
        <!-- Affichage des avis sous forme d'une liste à puce -->
        <ul>
            <?php foreach ($lesAvis as $unAvis): ?>
                <li>
                    <strong><?= $unAvis['nom'] ?></strong> : <?= $unAvis['commentaire']; ?> (<?= $unAvis['date'] ?>)
                </li>
            <?php endforeach; ?>
        </ul>

        <br>
        <!-- morceau de code pour afficher les explications -->
        <?php include 'explications/explainPage2.php'; ?>

    </div>

</body>
</html>
