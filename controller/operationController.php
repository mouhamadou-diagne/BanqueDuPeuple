<?php
	session_start();
	require_once '../model/modelOperation.php';  
	require_once '../model/modelCompte.php';  
	if (isset($_POST['valider'])) {
		extract($_POST);
		//var_dump($_POST);
		$montant = securisation($montant);
		$numero = $_POST['numero'];
		$typeOp = $_POST['type'];
		$typeOperation = getTypeOpByNom($typeOp);
		$idTypeOperation = $typeOperation['id'];
		$idUser = $_SESSION['idUser'];
		$compte = findCompteByNumero($numero);
		$idCompte = $compte['id'];
		$dateCreation = date("d-m-Y");
		$montantActuel = $compte['solde'];
		$montantEmprunt = $compte['emprunt'];
		$etat = "activer";
		/*echo 'montant : '.$montant.'<br> numero : '.$numero.'<br> idTypeOperation : '.$idTypeOperation;
		echo '<br> idUser : '.$idUser.'<br> idCompte : '.$idCompte.'<br> dateCreation :'.$dateCreation;*/
		if ($typeOp == "Depot") {
			$depot = depot($numero, $dateCreation, $montant, $idCompte, $idTypeOperation, $idUser, $etat);
			if ($depot > 0) {
				header('location: /BanqueDuPeuple/view/indexBanque.php?view=operation&depot=1');
			}else{
				header('location: /BanqueDuPeuple/view/indexBanque.php?view=operation&depot=0');
			}
		}
		if ($typeOp == "Retrait") {
			if (($montantActuel - $montant) < 500) {
				header('location: /BanqueDuPeuple/view/indexBanque.php?view=operation&retrait=-1');
			}else{
				$retrait = retrait($numero, $dateCreation, $montant, $idCompte, $idTypeOperation, $idUser, $etat);
				if ($retrait > 0) {
					header('location: /finance maison.sn/view/indexFinance.php?view=operation&retrait=1');
				}else{
					header('location: /finance maison.sn/view/indexFinance.php?view=operation&retrait=0');
				}
			}
		}
		if ($typeOp == "Remboursement"){
			if (($montantEmprunt+$montant) <= 0) {
				$remboursement = remboursement($numero, $dateCreation, $montant, $idCompte, $idTypeOperation, $idUser, $etat);
				if($remboursement > 0){
					header('location: /finance maison.sn/view/indexFinance.php?view=operation&remboursement=1');
				}else{
					header('location: /finance maison.sn/view/indexFinance.php?view=operation&remboursement=0');
				}
			}
			else{
				header('location: /finance maison.sn/view/indexFinance.php?view=operation&remboursement=-1');
			}
		}
		if ($typeOp == "Emprunt"){
			if ($montantEmprunt < 0) {
				header('location: /finance maison.sn/view/indexFinance.php?view=operation&emprunt=-1');
			}else{
				$emprunt = emprunt($numero, $dateCreation, $montant, $idCompte, $idTypeOperation, $idUser, $etat);
				if($emprunt > 0){
					header('location: /finance maison.sn/view/indexFinance.php?view=operation&emprunt=1');
				}else{
					header('location: /finance maison.sn/view/indexFinance.php?view=operation&emprunt=0');
				}
			}
		}
	}
	if (isset($_POST['transfert'])) {
		extract($_POST);
		//var_dump($_POST);
		$numCompteExp = $_POST['numCompteExp'];
		$numCompteDes = $_POST['numCompteDes'];
		$montant = $_POST['montant'];
		//echo 'montant : '.$montant.' numCompteExp: '.$numCompteExp.' numCompteDes'.$numCompteDes;
		$compteExp = findCompteByNumero($numCompteExp);
		$compteDes = findCompteByNumero($numCompteDes);
		if ($compteExp > 0 && $compteDes > 0 && $compteExp!=$compteDes) {
			if ($compteExp['etat'] == "activer" && $compteDes['etat'] == "activer") {
				if($montant < $compteExp['solde']){
					$transfert = Transfert($numCompteExp, $montant);
					$reception = Reception($numCompteDes, $montant);
					if ($transfert > 0 && $reception > 0) {
						header('location:/finance maison.sn/view/indexFinance.php?view=transfert&ok=1');
					}
				}else{
					header('location:/finance maison.sn/view/indexFinance.php?view=transfert&ok=0');
				}
			}else{
				header('location:/finance maison.sn/view/indexFinance.php?view=transfert&ok=-1');
			}
		}
	}
?>
