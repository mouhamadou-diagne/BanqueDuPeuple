<?php  
	require_once '../model/bd.php';
	$id = $_GET['id'];
	global $bd;
	$sql = "UPDATE operation SET etat = 'supprimer' WHERE id=$id";
	$bd->exec($sql);
?>