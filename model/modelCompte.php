<?php 
	require_once 'bd.php';
	if (isset($_POST['ajoutCompte'])) {
		extract($_POST);
		$photo = $_FILES['photo']['name'];
		return $photo;
	}
	function securisation($donnees){
		$donnees = trim($donnees);
		$donnees = stripslashes($donnees);
		$donnees = strip_tags($donnees);
		return $donnees;
	}
	function insererClient($cni, $nom, $prenom, $adresse, $tel, $photo)
	{
		$insert = "INSERT INTO client(cni,nom,prenom,adresse,tel,photo) VALUES ('$cni','$nom','$prenom','$adresse',$tel,'$photo')";
		global $bd;
		$bd -> exec($insert);
		return $bd -> lastInsertId();
	}
	function ajoutCompte($numero, $dateCreation, $solde, $idClient, $idGestCompte,$emprunt, $etat)
	{
		$insert = "INSERT INTO compte VALUES (null,'$numero','$dateCreation',0, $idClient, $idGestCompte,0, '$etat')";
		global $bd;
		$bd -> exec($insert);
		return $bd -> lastInsertId();
	}
	function genererNumCompte(){
		$sql = "SELECT max(id) FROM compte";
		global $bd;
		$array = $bd -> query($sql) -> fetch();
		if ($array == NULL) {
			$id = 1;
		}else{
			$array[0];
			$id = $array[0]++;
		}
		$numero = "FSN_".date('d').date('m').date('Y')."C_".$id;
		return $numero;
	}
	function findCompteByNumero($numero){
		$sql = "SELECT * FROM compte WHERE numero = '$numero'";
		global $bd;
		return $bd -> query($sql) -> fetch();
	}
	function findCompteByIdClient($id){
		$sql = "SELECT * FROM compte WHERE idClient = $id";
		global $bd;
		return $bd -> query($sql) -> fetchAll();
	}
	function getAllCompte(){
		$sql = "SELECT compte.etat, compte.id, compte.numero, compte.dateCreation, compte.solde, client.nom, client.prenom FROM compte, client WHERE compte.idClient = client.id";
		global $bd;
		return $bd -> query($sql) -> fetchAll();
	}
	function infoClient($id){
		global $bd;
		$sql = "SELECT * FROM client WHERE id = '$id'";
		return $bd -> query($sql) -> fetch();
	}
	function getAllCompteByIdUser($id){
		$sql = "SELECT * FROM compte WHERE idClient = '$id'";
		global $bd;
		return $bd -> query($sql) -> fetchAll();
	}
	
?>