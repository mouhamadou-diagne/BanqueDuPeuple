<?php 
	require_once 'bd.php';
	function verifierConnexion($login, $mdp){
		$sql = "SELECT * FROM utilisateur WHERE login = '$login' and password = '$mdp'";
		global $bd;
		return $bd -> query($sql) -> fetch();
	}	
	if (isset($_POST['ajoutUser'])) {
		$photo = $_FILES['photo']['name'];
		return $photo;
	}
	function insererUtilisateur($nom, $numero, $prenom, $login, $mdp, $profil, $photo){
		$insert = "INSERT INTO utilisateur VALUES (null,'$numero','$nom','$prenom','$login','passer1','$profil','$photo')";
		global $bd;
		$bd -> exec($insert);
		return $bd ->lastInsertId();
	}
	function modifierMotDePasse($mdp,$numero){
		$sql = "UPDATE utilisateur SET password = '$mdp' WHERE numero='$numero'";
		global $bd;
		return $bd -> exec($sql);
	}
	function genererNumUser(){
		$sql = "SELECT max(id) FROM utilisateur";
		global $bd;
		$array = $bd -> query($sql) -> fetch();
		if ($array == null) {
			$id = 1;
		}else{
			$array[0]++;
			$id = $array[0];
		}
		$numero = "FSN_".date('d').date('m').date('Y')."_US_".$id;
		return $numero;
	}
	function getUserById($id){
		$sql = "SELECT * FROM utilisateur WHERE id = '$id'";
		global $bd;
		return $bd -> query($sql) -> fetch();
	}
?>