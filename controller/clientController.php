<?php  
	session_start();
	require_once '../model/modelClient.php';
	if (isset($_POST['rechercheClient'])) {
		extract($_POST);
		$cni = $cniClient;
		$client = getClientByCni($cni);
		if ($client > 0) {
			header('location: /finance maison.sn/view/indexFinance.php?view=clientRechercher&cni='.$cni);
		}else{
			header('location: /finance maison.sn/view/indexFinance.php?view=rechercheClient');
		}
	}
?>