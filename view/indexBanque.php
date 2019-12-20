<?php 
	session_start();
	require_once '../model/modelCompte.php';
	if ($_SESSION == NULL) {
			header('location :/BanqueDuPeuple/index.php');
		}
	else if($_SESSION['mdp'] == 'passer')
			{
				include 'indexModUtilisateur.php';
			}
	else{
		include '../topbar.php';
		echo '<div class="container">';
		echo "BONJOUR ".$_SESSION['nom'].$_SESSION['prenom'];
		echo '<br>';
		//var_dump($_SESSION);
		if (isset($_GET['view'])) {
			switch ($_GET['view']) {
				case 'compte':
					include 'indexCompte.php';
					break;
				case 'ajoutContact':
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
						header('location:/BanqueDuPeuple/view/ajoutContact.php?id='.$id);
					}
						break;
				case 'listeCompte':
					include_once 'listeCompte.php';
					break;
				case 'listeOperation':
					include_once 'listeOperation.php';
					break;
				case 'listCompteBloquer':
					include_once 'listCompteBloquer.php';
					break;
				case 'listeOpById':
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
						header('location:/BanqueDuPeuple/view/listeOpById.php?id='.$id);
					}
					break;
				case 'nouveauCompte':
					include 'nouveauCompte.php';
					if (isset($_GET['ok'])) {
						if ($_GET['ok'] == 1) {
							echo "Compte créer avec succés";
						}
						else{
							echo "Erreur lors de la creation du compte !!!";
						}
					}
					break;
				case 'compteRechercher':
					if (isset($_GET['numRechercher'])) {
						$numRech = $_GET['numRechercher'];
						header('location:/BanqueDuPeuple/view/compteRechercher.php?numRech='.$numRech.'');
					}
					break;
				case 'rechercherCompte':
						include_once 'rechercherCompte.php';
					break;
				case 'accueil':
					include 'accueil.php';
					break;
				case 'client':
					include 'indexClient.php';
					break;
				case 'listeClient':
					include_once 'listeClient.php';
					break;
				case 'rechercheClient':
					include_once 'rechercheClient.php';
					break;
				case 'clientRechercher':
					if (isset($_GET['cni'])) {
						$cni = $_GET['cni'];
						header('location:/BanqueDuPeuple/view/clientRechercher.php?cni='.$cni.'');
					}
					break;
				case 'operation':
					include 'indexOperation.php';
					if(!(isset($_GET['exist'])) || (isset($_GET['exist']) && $_GET['exist'] == 0)) {
						include_once 'indexOperation.php';
						echo "Regarder si le compte n'est pas bloqué";
					}
					else{
						if (isset($_GET['numCompte'])) {
							$numCompte = $_GET['numCompte'];
							header('location:/BanqueDuPeuple/view/indexOperation.php?numero='.$numCompte.'');
						}
					}
					if (isset($_GET['depot'])) {
						if ($_GET['depot'] == 1) {
							echo "Depot effectué avec succés";
						}else
						{
							echo "Erreur lors du depot";
						}
					}
					if (isset($_GET['retrait'])) {
						if ($_GET['retrait'] == 1) {
							echo "Retrait effectué avec succés";
						}elseif ($_GET['retrait'] == 0) {
							echo "Erreur lors du Retrait";
						}else{
							echo "Vous ne pouvez pas retirer ce montant";
						}
					}
					if (isset($_GET['emprunt'])) {
						if ($_GET['emprunt'] == 1) {
							echo "Emprunt effectué avec succés";
						}elseif ($_GET['emprunt'] == 0) {
							echo "Erreur lors de l'Emprunt";
						}else{
							echo "Vous ne pouvez pas faire un autre emprunt";
						}
					}
					if (isset($_GET['remboursement'])) {
						if ($_GET['remboursement'] == 1) {
							echo "remboursement effectué avec succés";
						}elseif ($_GET['remboursement'] == 0) {
							echo "Erreur lors du remboursement";
						}else{
							echo "Vous ne pouvez pas faire ce remboursement";
						}
					}
					break;
				case 'utilisateur':
					include 'indexUtilisateur.php';
					if (isset($_GET['ok'])) {
						if ($_GET['ok'] == 1) {
							echo "utilisateur ajouté avec succés";
						}
						else{
							echo "Erreur lors de l'ajout d'un nouveau utilisateur !!!";
						}
					}
					if (isset($_GET['mdp'])) {
						if($_GET['mdp'] == 1){
							echo "Mot de passe utilisateur modifié avec succés";
						}else{
							echo "Erreur lors de la Modification ";
						}
					}
					break;
				case 'modMdp':
						if (isset($_GET['mdp']) && $_GET['mdp'] == -1) {
							$mdp = $_GET['mdp'];
							header('location:/BanqueDuPeuple/view/indexModUtilisateur.php&mdp='.$mdp.'');
						}
					break;
				default:
					include 'erreur.php';
					break;
			}
		}else{
			include 'accueil.php';
		}
		echo "</div>";
		echo "<br>";
		include '../footer.php';
	}
	
?>