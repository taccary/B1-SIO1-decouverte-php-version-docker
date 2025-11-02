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
                <p>Cette page explique le code PHP utilisé pour récupérer les informations des membres afin de créer une liste déroulante et ensuite afficher les avis des membres sélectionnés. Ouvrez en parallèle la page dans un navigateur et dans VSCode pour mieux comprendre le code.</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ligne code</th>
                            <th>Explication</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>$requete= "SELECT idMembre, nomMembre FROM membre ORDER BY nomMembre";</code></td>
                            <td>Cette ligne crée une chaîne de caractères contenant la requête SQL sur la table membre.</td>
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
                            <td><code>$lesMembres = $query->fetchAll(PDO::FETCH_ASSOC);</code></td>
                            <td>Cette ligne récupère tous les résultats de la requête exécutée. La méthode fetchAll de l'objet $query est utilisée pour obtenir toutes les lignes de résultats sous forme de tableau associatif <code>$lesMembres</code> (chaque ligne est un tableau associatif où les clés sont les noms des colonnes).</td>
                        </tr>
                    </tbody>
                </table>

                <p>Le tableau PHP résultat <code>$lesMembres</code> de la requête à la base de données est le suivant :</p>

                <?php
                echo "<pre>";
                var_dump($lesMembres);
                echo "</pre>";
                ?>

                <p>Ensuite, on utilise ce tableau pour créer la liste déroulante qui servira à filtrer les avis par membre :<br>
                    Cette liste est un formulaire HTML avec une liste déroulante (<code>&lt;select></code>) qui contient une option par membre. Chaque option a une valeur égale à l'identifiant du membre et un texte égal au nom du membre :</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="w-50">Bloc de code</th>
                            <th>Explication</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="code-column"><code>&lt;form method="post" action="page2.php"&gt;</code></td>
                            <td>Cette ligne crée un formulaire HTML qui enverra les données selectionnés en utilisant la méthode POST à la page "page2.php" (même page que celle-ci).</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>&lt;label for="membre"&gt;Membre :&lt;/label&gt;</code></td>
                            <td>Cette ligne crée une étiquette pour la liste déroulante avec l'identifiant "membre".</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>&lt;select id="membre" name="membre"&gt;</code></td>
                            <td>Cette ligne crée un élément HTML liste déroulante avec l'identifiant "membre" et le nom "membre".<br>La valeur de l'attribut "name" correspondra au nom du parametre qui sera envoyé en POST.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>foreach ($lesMembres as $unMembre) {<br>echo '&lt;option value="' . $unMembre['idMembre'] . '"&gt;' . $unMembre['nomMembre'] . '&lt;/option&gt;';<br>}</code></td>
                            <td>Cette boucle parcourt le tableau $lesMembres et pour chaque membre, crée une option dans la liste déroulante avec la valeur égale à l'identifiant du membre et le texte égal au nom du membre.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>&lt;button type="submit"&gt;Afficher les avis du membre&lt;/button&gt;</code></td>
                            <td>Cette ligne crée un bouton de soumission qui déclenchera l'envoi du formulaire. Lorsque l'utilisateur clique sur le bouton, les données du formulaire sont envoyées en POST à la page "page2.php".</td>
                        </tr>
                    </tbody>
                </table>

                <p>
                    Le code qui suit est un traitement conditionnel qui récupère les avis des membres sélectionnés dans la liste déroulante. Si un membre est sélectionné, on récupère les avis de ce membre. Sinon, on récupère tous les avis.
                </p>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="w-50">Bloc
                                de code</th>
                            <th>Explication</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="code-column"><code>if (isset($_POST['membre'])) {</code></td>
                            <td>Cette ligne vérifie si la page a reçu une donnée en POST nommé "membre". Si c'est le cas, cela signifie qu'un membre a été sélectionné dans la liste déroulante.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>$idMembre = $_POST['membre'];</code></td>
                            <td>Cette ligne récupère dans la variable <code>$idMembre</code> l'identifiant du membre reçu en POST.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>$requete= "SELECT * FROM avis INNER JOIN membre ON avis.idMembre=membre.idMembre INNER JOIN jeu ON avis.idJeu=jeu.idJeu WHERE avis.idMembre = :id ORDER BY avis.date DESC";</code></td>
                            <td>Cette ligne crée une requête SQL pour récupérer les avis du membre sélectionné, en joignant les tables `avis`, `membre` et `jeu`. La clause WHERE permet de filtrer les avis par l'identifiant du membre. Cet identifiant est lié à la requête préparée avec le marqueur <code>:id</code>.
                            </td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>$query = $connexion->prepare($requete);</code></td>
                            <td>Cette ligne prépare la requête SQL pour l'exécuter.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>$query->bindValue(':id', $idMembre);</code></td>
                            <td>Cette ligne lie la valeur de la variable <code>$idMembre</code> au marqueur <code>:id</code> de la requête préparée. Cela permet de sécuriser la requête en évitant les injections SQL.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>$query->execute();</code></td>
                            <td>Cette ligne exécute la requête préparée.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>$lesAvis = $query->fetchAll(PDO::FETCH_ASSOC);</code></td>
                            <td>Cette ligne récupère tous les résultats de la requête exécutée sous forme de tableau associatif <code>$lesAvis</code>.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>} else {</code></td>
                            <td>Cette ligne commence le bloc <code>else</code> qui sera exécuté si la page n'a pas reçu de données en POST. Cela signifie que l'utilisateur n'a pas sélectionné de membre dans la liste déroulante.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>$requete= "SELECT * FROM avis INNER JOIN membre ON avis.idMembre=membre.idMembre INNER JOIN jeu ON avis.idJeu=jeu.idJeu ORDER BY avis.date DESC";</code></td>
                            <td>Cette ligne crée une requête SQL pour récupérer tous les avis, en joignant les tables `avis`, `membre` et `jeu`.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>$query = $connexion->prepare($requete);</code></td>
                            <td>Cette ligne prépare la requête SQL pour l'exécuter.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>$query->execute();</code></td>
                            <td>Cette ligne exécute la requête préparée.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>$lesAvis = $query->fetchAll(PDO::FETCH_ASSOC);</code></td>
                            <td>Cette ligne récupère tous les résultats de la requête exécutée sous forme de tableau associatif <code>$lesAvis</code>.</td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>}</code></td>
                            <td>Cette ligne marque la fin du bloc <code>else</code>.</td>
                        </tr>
                    </tbody>

                </table>

                <p>Le tableau PHP résultat <code>$lesAvis</code> de la requête à la base de données est le suivant. C'est un tableau de <?= count($lesAvis) ?> cases, contenant chacune un tableau de <?= count($lesAvis[0]) ?> cases correspondants aux différents champs renvoyés par le * de la requete SQL :</p>
                <?php
                echo "<pre>";
                var_dump($lesAvis);
                echo "</pre>";
                ?>

                <p>Enfin, le serveur parcours le tableau PHP ainsi fabriqué <code>$lesAvis</code> et génére un affichage des avis du membre sélectionnés ou de tous les membres (selon le cas du if dans lequel il est passé) sous forme d'une liste à puce :</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="w-50">Bloc
                                de code</th>
                            <th>Explication</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="code-column"><code>&lt;?php <br>foreach ($lesAvis as $unAvis) <br> ?&gt;{</code></td>
                            <td>Ce code ouvre une boucle foreach qui parcoure le tableau $lesAvis et pour chaque avis, le stocke dans la variable $unAvis. <br>
                                Cette variable est un tableau associatif de <?= count($lesAvis[0]) ?> cases contenant les informations issues de la jointure des 3 tables avis, membre et jeu (commentaire, date, nom, prixMoyen, ...).<br>Le code php est ensuite fermé par la balise de fermeture ?&gt; pour repasser en mode HTML.
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>&lt;li><br>
                                    &lt;strong><mark>&lt;?= $unAvis['nom'] ?></mark>&lt;/strong> : <mark>&lt;?= $unAvis['commentaire']; ?></mark> (<mark>&lt;?= $unAvis['date'] ?> ?></mark>)<br>
                                    &lt;/li></code></td>
                            <td>Ces 3 lignes de code affichent les informations de chaque avis. La première et la dernière ligne servent à créer un élément de liste à puce.<br> La ligne intermédiaire affiche le nom du jeu, le commentaire de l'avis et la date de l'avis (mise en forme avec des parenthèses).<br>
                                Cette partie utilise une syntaxe raccourcie pour afficher les valeurs des variables PHP dans le code HTML. Les balises <code>&lt;?=</code> sont équivalentes à <code>&lt;?php echo</code>.<br> Ce code est un mélange de HTML et de PHP (en <mark>surlignage</mark> ici).
                            </td>
                        </tr>
                        <tr>
                            <td class="code-column"><code>&lt;?php<br>}<br>&lt;?></code></td>
                            <td>Ce code marque la fin de la boucle foreach. Il ferme la balise d'ouverture <code>&lt;?php</code> et ouvre la balise de fermeture <code>&lt;?php</code> pour repasser en mode HTML.
                            </td>
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
