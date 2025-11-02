# Debugging avec Xdebug et VS Code

Ce document explique la procédure minimale pour déboguer le projet avec Xdebug et VS Code.

## Prérequis
- Conteneurs démarrés (Apache + MySQL) via `docker compose up -d --build`.
- Extension VS Code "PHP Debug" (`xdebug.php-debug`) installée.
- `.vscode/launch.json` configuré : port 9003 et pathMappings `/var/www/html` -> `${workspaceFolder}/site`.

## Étapes rapides
1. Démarrer l'écoute dans VS Code

   - Ouvrez le panneau Run and Debug.
   - Sélectionnez la configuration "🌐 Listen for XDebug (Serveur Web)" et lancez-la. VS Code doit se mettre en écoute sur le port 9003.

2. Poser un point d'arrêt

   - Ouvrez un fichier dans `site/` (par ex. `site/index.php`) et mettez un point d'arrêt breakpoint) sur une ligne exécutée au chargement.

3. Déclencher la requête

   - Dans le navigateur, ouvrez : `http://localhost:8000`

4. VS Code doit attraper la session et s'arrêter sur le breakpoint.


## Optionnel : passer à `trigger`

Si vous préférez ne pas activer le debugger pour chaque requête, dans `xdebug.ini` mettez :

```ini
xdebug.start_with_request=trigger
```

et déclenchez le debug avec `XDEBUG_TRIGGER` ou le cookie `XDEBUG_SESSION`.


