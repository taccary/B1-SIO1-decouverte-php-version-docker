# Debugging avec Xdebug et VS Code

Ce document explique la procédure minimale pour déboguer le projet avec Xdebug et VS Code.

## Prérequis
- Conteneurs démarrés (Apache + MySQL) via `docker compose up -d --build`.
- Extension VS Code "PHP Debug" (`felixfbecker.php-debug`) installée.
- `xdebug.ini` présent et configuré (port 9003, client_host=host.docker.internal).
- `.vscode/launch.json` configuré : port 9003 et pathMappings `/var/www/html` -> `${workspaceFolder}/site`.

## Étapes rapides
1. Démarrer l'écoute dans VS Code

   - Ouvrez le panneau Run and Debug.
   - Sélectionnez la configuration "🌐 Listen for XDebug (Serveur Web)" et lancez-la. VS Code doit se mettre en écoute sur le port 9003.

2. Poser un breakpoint

   - Ouvrez un fichier dans `site/` (par ex. `site/index.php`) et mettez un point d'arrêt sur une ligne exécutée au chargement.

3. Déclencher la requête

   - Dans le navigateur, ouvrez : `http://localhost:8000`
   - Ou via curl (exemples) :

```bash
# Si Xdebug est configuré pour démarrer à chaque requête
curl -v -H "XDEBUG_SESSION: 1" http://localhost:8000

# Si Xdebug est en mode trigger (start_with_request=trigger)
curl -v -H "XDEBUG_TRIGGER: VSCODE" http://localhost:8000
```

4. VS Code doit attraper la session et s'arrêter sur le breakpoint.

## Commandes de diagnostic

- Vérifier que Xdebug est activé dans le conteneur Apache :

```bash
docker compose exec apache php -v
docker compose exec apache php -m | grep xdebug || true
```

- Voir le log Xdebug (après une requête) :

```bash
docker compose exec apache tail -n 200 /tmp/xdebug.log
```

- Vérifier que `host.docker.internal` est résolu (nécessaire sur Linux) :

```bash
# Le conteneur Apache doit résoudre host.docker.internal vers le gateway hôte
docker compose exec apache ping -c1 host.docker.internal || true
```

## Points fréquents de problème

- EADDRINUSE sur 9003 : ne mappez pas `9003:9003` dans `docker-compose.yml`. Laisser VS Code binder 9003 sur l'hôte et Xdebug initiera la connexion vers l'hôte.

- Xdebug ne joint pas l'IDE : ajouter dans `docker-compose.yml` sous le service `apache` :

```yaml
extra_hosts:
  - "host.docker.internal:host-gateway"
```

- Path mappings incorrects : assurez-vous que `.vscode/launch.json` contient le mapping exact entre `/var/www/html` (chemin du conteneur) et `${workspaceFolder}/site` (chemin local remote). Sinon les breakpoints ne correspondent pas.

## Optionnel : passer à `trigger`

Si vous préférez ne pas activer le debugger pour chaque requête, dans `xdebug.ini` mettez :

```ini
xdebug.start_with_request=trigger
```

et déclenchez le debug avec `XDEBUG_TRIGGER` ou le cookie `XDEBUG_SESSION`.

---

Si tu veux, je peux :
- ajouter ces vérifications comme `healthcheck` pour `mysql` dans `docker-compose.yml`,
- ou basculer `xdebug.ini` vers `trigger` et commit les changements. Indique ton choix.
