<?php 
	require_once 'bd.php';
	function verifierConnexion($login, $mdp){
		$sql = "SELECT * FROM userameth WHERE login = '$login' and mdp = '$mdp'";
		global $bd;
		return $bd -> query($sql) -> fetch();
	}	
	function insererUtilisateur($nom, $prenom, $login, $mdp){
		$insert = "INSERT INTO userameth VALUES (null,'$numero','$nom','$prenom','$login')";
		global $bd;
		$bd -> exec($insert);
		return $bd ->lastInsertId();
	}

	function genererNumUser(){
		$sql = "SELECT max(id) FROM userameth";
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
		$sql = "SELECT * FROM userameth WHERE id = '$id'";
		global $bd;
		return $bd -> query($sql) -> fetch();
	}
?>