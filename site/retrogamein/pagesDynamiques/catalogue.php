<div id="contenu_jeux">
	<?php
		if (isset($_GET['idjeu'])) {
			include 'jeux/afficheUnJeu.php'; // à commenter
		}
		else {
			include 'jeux/afficheJeux.php'; // à commenter
		}
	?>
</div>
