<?php  
	session_start(); 
	require_once '../model/modelCompte.php';
	if (isset($_POST['ajout'])) {
		extract($_POST);
		//var_dump($_POST);
		$dateCreation = date("d-m-Y");
		$idClient = $id;
		$idGestCompte = $_SESSION['idUser'];
		$idCompte = ajoutCompte($numero, $dateCreation, $solde, $idClient, $idGestCompte,$emprunt);
		if ($idCompte > 0) {
			header('location:/BanqueDuPeuple/view/indexBanque.php?view=nouveauCompte&ok=1');
		}else{
			header('location:/BanqueDuPeuple/view/indexBanque.php?view=nouveauCompte&ok=0');
		}
	}
?>