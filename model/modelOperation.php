<?php  
	require_once 'bd.php';
	function getTypeOpByNom($nom){
		$sql = "SELECT * FROM typeoperation WHERE nom = '$nom'";
		global $bd;
		return $bd -> query($sql) -> fetch();
	}
	function getTypeOpById($id){
		$sql = "SELECT * FROM typeoperation WHERE id = $id";
		global $bd;
		return $bd -> query($sql) -> fetch();
	}
	function depot($numero, $dateCreation, $montant, $idCompte, $idTypeOperation, $idUser, $etat){
		$sql="INSERT INTO operation VALUES (null, '$numero', '$dateCreation', $montant, $idCompte, $idTypeOperation, $idUser, '$etat')";
		global $bd;
		if ($bd -> exec($sql) > 0){
			$sql1 = "UPDATE compte SET solde=solde+$montant WHERE id=$idCompte";
			return $bd -> exec($sql1);
		}
	}
	function genererNumeroOperation(){
		$sql = "SELECT max(id) FROM operation";
		global $bd;
		$array = $bd -> query($sql) -> fetch();
		if($array == NULL ){
			$id = 1;
		}else{
			$array[0]++;
			$id = $array[0];
		}
		$numero = "FMSN_".date('d').date('m').date('Y')."_OP_".$id;
		return $numero;
	}
	function retrait($numero, $dateCreation, $montant, $idCompte, $idTypeOperation, $idUser, $etat){
		$sql = "INSERT INTO operation VALUES (null, '$numero', '$dateCreation', $montant, $idCompte, $idTypeOperation, $idUser, '$etat')";
		global $bd;
		if ($bd -> exec($sql) > 0){
			$sql1 = "UPDATE compte SET solde=solde-$montant WHERE id=$idCompte";
			return $bd -> exec($sql1);
		}
	}
	function emprunt($numero, $dateCreation, $montant, $idCompte, $idTypeOperation, $idUser, $etat){
		$sql = "INSERT INTO operation VALUES (null, '$numero', '$dateCreation', $montant, $idCompte, $idTypeOperation, $idUser, '$etat')";
		global $bd;
		if ($bd -> exec($sql) > 0){
			$sql1 = "UPDATE compte SET emprunt=-($montant+500) WHERE id=$idCompte";
			return $bd -> exec($sql1);
		}
	}
	function remboursement($numero, $dateCreation, $montant, $idCompte, $idTypeOperation, $idUser, $etat){
		$sql = "INSERT INTO operation VALUES (null, '$numero', '$dateCreation', $montant, $idCompte, $idTypeOperation, $idUser, '$etat')";
		global $bd;
		if ($bd -> exec($sql) > 0){
			$sql1 = "UPDATE compte SET emprunt = emprunt+$montant WHERE id=$idCompte";
			return $bd -> exec($sql1);
		}
	}
	function listeOpByNumCompte($numero){
		$sql = "SELECT o.numero, o.dateOperation, o.montant, o.idTypeOperation, u.nom, u.prenom FROM operation AS o, compte AS c, utilisateur AS u WHERE c.numero = '$numero' AND c.id= idCompte AND u.id = o.idUser";
		global $bd;
		return $bd->query($sql)->fetchAll();
	}
	function listeOpById($id){
		$sql = "SELECT o.id, o.numero, o.dateOperation, o.montant, o.idTypeOperation, u.nom, u.prenom FROM operation AS o, compte AS c, utilisateur AS u WHERE c.id = $id AND c.id= idCompte AND u.id = o.idUser AND o.etat != 'supprimer'";
		global $bd;
		return $bd->query($sql)->fetchAll();
	}
	function getAllOperation(){
		global $bd;
		$sql = "SELECT o.id, o.numero, o.dateOperation, o.montant, o.idTypeOperation, t.nom, c.numero, u.nom, u.prenom FROM operation AS o, typeoperation AS t, compte AS c, utilisateur AS u WHERE o.idCompte = c.id AND o.idUser = u.id AND o.idTypeOperation = t.id AND o.etat != 'supprimer'";
		return $bd->query($sql)->fetchAll();
	}
	function Transfert($numero, $montant){
		global $bd;
		$sql = "UPDATE compte SET solde=solde-$montant AND numero='$numero'";
		return $bd->exec($sql);
	}
	function Reception($numero, $montant){
		global $bd;
		$sql = "UPDATE compte SET solde=solde+$montant AND numero='$numero'";
		return $bd->exec($sql);
	}
?>