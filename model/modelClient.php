<?php  
	require_once 'bd.php';
	function getClientByCni($cni){
		global $bd;
		$sql = "SELECT * FROM client WHERE cni = $cni";
		return $bd->query($sql)->fetch();
	}
	function getAllClient(){
		global $bd;
		$sql = "SELECT * FROM client";
		return $bd->query($sql)->fetchAll();
	}
	function getClientById($id){
		global $bd;
		$sql = "SELECT * FROM client WHERE id = $id";
		return $bd->query($sql)->fetch();
	}
?>