<!-- Bouton pour afficher la fenêtre modale -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#explicationModal">
    Explications du code
</button>

<!-- Modal -->
<div class="modal fade" id="explicationModal" tabindex="-1" aria-labelledby="explicationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="explicationModalLabel">Partie explication du code PHP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Cette page explique le code PHP utilisé pour récupérer les informations des jeux dans la base de données et les afficher sous forme de tableau HTML. Ouvrez en parallèle la page dans un navigateur et dans VSCode pour mieux comprendre le code.</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ligne code</th>
                            <th>Explication</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>$requete= "SELECT nom, console, prixMoyen FROM jeu ORDER BY nom";</code></td>
                            <td>Cette ligne crée une chaîne de caractères contenant la requête SQL sur la table jeu qui nous intéresse.</td>
                        </tr>
                        <tr>
                            <td><code>$query = $connexion->prepare($requete);</code></td>
                            <td>Cette ligne prépare la requête SQL pour l'exécuter. La méthode prepare de l'objet $connexion (qui représente la connexion à la base de données) est utilisée pour éviter les injections SQL.</td>
                        </tr>
                        <tr>
                            <td><code>$query->execute();</code></td>
                            <td>Cette ligne exécute la requête préparée. La méthode execute de l'objet $query (qui représente la requête préparée) est appelée pour exécuter la requête sur la base de données.</td>
                        </tr>
                        <tr>
                            <td><code>$lesJeux = $query->fetchAll(PDO::FETCH_ASSOC);</code></td>
                            <td>Cette ligne récupère tous les résultats de la requête exécutée. La méthode fetchAll de l'objet $query est utilisée pour obtenir toutes les lignes de résultats sous forme de tableau associatif (chaque ligne est un tableau associatif où les clés sont les noms des colonnes).</td>
                        </tr>
                    </tbody>
                </table>

                <p>Le tableau PHP résultat <code>$lesJeux</code> de la requête à la base de données est le suivant :</p>

                <?php
                    echo "<pre>";
                    var_dump($lesJeux);
                    echo "</pre>";
                ?>

                <p>Ensuite, il parcourt le tableau et affiche les résultats sous la forme d'un tableau HTML avec une ligne par jeu et une colonne par information :</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="w-50">Bloc de code</th>
                            <th>Explication</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="code-column"><code>foreach ($lesJeux as $unJeu) {</code></td>
                            <td>Cette ligne parcourt le tableau $lesJeux et pour chaque élément du tableau, le stocke dans la variable $jeu. Elle marque le début de la boucle foreach qui va traiter les éléments du tableau $lesJeux un par un.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>echo '&lt;tr>';</code></td>
                            <td>Cette ligne ajoute la balise de début de ligne dans le tableau.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>echo '&lt;td>' . $unJeu['nom'] . '&lt;/td>';</code><br><code>echo '&lt;td>' . $unJeu['console'] . '&lt;/td>';</code><br><code>echo '&lt;td>' . $unJeu['prixMoyen'] . '&lt;/td>';</code></td>
                            <td>Ces 3 lignes de code affichent les 3 colonnes (cellules) du tableau. Chaque ligne commence par la balise de début de ligne <code>&lt;td></code> et se termine par la balise de fin de ligne <code>&lt;/td></code>. Au milieu, on affiche les données du jeu qu'on est en train de traiter. On utilise les clés du tableau associatif $unJeu pour afficher les données de chaque colonne.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>echo '&lt;/tr>';</code></td>
                            <td>Cette ligne ajoute la balise de fin de ligne dans le tableau.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>}</code></td>
                            <td>Cette ligne marque la fin de la boucle foreach.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Inclure les scripts JavaScript de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
