<?php
	session_start(); 
	require_once '../model/modelCompte.php';
	if (isset($_POST['ajoutCompte'])) {
		extract($_POST);
		//var_dump($_POST);
		$dateCreation = date("d-m-Y");
		$nom = securisation($nom);
		$prenom = securisation($prenom);
		$adresse = securisation($adresse);
		$tel = securisation($tel);
		$idClient = insererClient($cni, $nom, $prenom, $adresse, $tel, $photo);
		$idGestCompte = $_SESSION['idUser'];
		$etat = "activer";
		$idCompte = ajoutCompte($numero, $dateCreation, $solde, $idClient, $idGestCompte,$emprunt, $etat);
		if ($idCompte > 0) {
			header('location:/BanqueDuPeuple/view/indexBanque.php?view=nouveauCompte&ok=1');
		}else{
			header('location:/BanqueDuPeuple/view/indexBanque.php?view=nouveauCompte&ok=0');
		}
	}
	if (isset($_GET['numCompte'])) {
		$numCompte = $_GET['numCompte'];
		$compte = findCompteByNumero($numCompte);
		if ($compte > 0 && $compte['etat'] == "activer") {
			header('location:/BanqueDuPeuple/view/indexBanque.php?view=operation&exist=1&numCompte='.$numCompte.'');
		}
		else{
			header('location:/BanqueDuPeuple/view/indexBanque.php?view=operation&exist=0');
		}
	}
	if (isset($_POST['rechercher'])) {
		extract($_POST);
		var_dump($_POST);
		$numRechercher = $recherche;
		if (findCompteByNumero($numRechercher) > 0) {
			header('location:/BanqueDuPeuple/view/indexBanque.php?view=compteRechercher&numRechercher='.$numRechercher.'');
		}
		else{
			header('location:/BanqueDuPeuple/view/indexBanque.php?view=rechercherCompte');
		}
	}
?>