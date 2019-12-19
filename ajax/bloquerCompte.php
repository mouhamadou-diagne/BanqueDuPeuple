<?php  
	require_once '../model/bd.php';
	$id = $_GET['id'];
	global $bd;
	$sql = "UPDATE compte SET etat = 'bloquer' WHERE id=$id";
	$bd->exec($sql);
?>