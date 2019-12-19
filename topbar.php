<?php 
	include_once 'header.php';
?>
<section>
	<header>
		<ul class="active">
			<li><a href="?view=accueil">ACCUEIL</a></li>
			<li><a href="?view=compte" <?php if ($_SESSION['profil'] == "caissier"){echo 'hidden';}?>>GESTION COMPTE</a></li>
			<li><a href="?view=client" <?php if ($_SESSION['profil'] == "caissier"){echo 'hidden';}?>>GESTION CLIENT</a></li>
			<li><a href="?view=operation">GESTION OPERATIONS</a></li>
			<li><a href="?view=utilisateur" <?php if ($_SESSION['profil'] == "caissier"){echo 'hidden';}?>>GESTION UTILISATEUR</a></li>
		</ul>
		<a href="../controller/userController.php?deconnexion=1" id="deconnexion"><button class="btnDeconnexion">DECONNEXION</button></a>
	</header>
</section>
