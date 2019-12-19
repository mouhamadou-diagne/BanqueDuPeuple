<?php  
	include_once '../header.php';
	require_once '../model/modelClient.php';
	require_once '../model/modelCompte.php';
	require_once '../model/modelUser.php';
	if (isset($_GET['cni'])) {
		$cni = $_GET['cni'];
		$client = getClientByCni($cni);
		$idClient = $client['id'];
		$comptes = findCompteByIdClient($idClient);
	}
?>
<div class="container">
	<fieldset>
		<legend>INFOS CLIENT</legend>
		<table class="tab_complet">
			<tr>
				<td class="tdForm">
					<label>Nom : </label>
					<input class="champsNewC" value="<?=$client['nom']?>" readonly>
				</td>
				<td class="tdForm">
					<label>Prenom : </label>
					<input  class="champsNewC" value="<?=$client['prenom']?>" readonly>
				</td>
			</tr>
			<tr>
				<td class="tdForm">
					<label>Adresse : </label>
					<input class="champsNewC" value="<?=$client['adresse']?>" readonly>
				</td>
				<td class="tdForm">
					<label>Telephone : </label>
					<input  class="champsNewC" value="<?=$client['tel']?>" readonly>
				</td>
			</tr>		
		</table>
	</fieldset>
	<h3>LISTE DES COMPTES</h3>
	<table class="tableauPlein" cellspacing="0">
		<tr>
			<th>Numero</th>
			<th>Date</th>
			<th>Solde</th>
			<th>Nom & Prenom Res</th>
		</tr>
		<?php 
		foreach ($comptes as $c) {
			$idUser = $c['idGestCompte'];
			$user = getUserById($idUser);
			echo '<tr>
					<td>'.$c['numero'].'</td> 
					<td>'.$c['dateCreation'].'</td> 
					<td>'.$c['solde'].'</td>
					<td>'.$user['nom'].' '.$user['prenom'].'</td>'; 
		}
	 ?>
	</table>
	<br><br>
	<a href="/BanqueDuPeuple/view/indexBanque.php?view=accueil"><button class="btn">Accueil</button></a>
	<a href="/BanqueDuPeuple/view/indexBanque.php?view=client"><button class="btn">Gestion Clients</button></a>
</div>