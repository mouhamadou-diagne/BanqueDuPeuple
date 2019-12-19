<?php  
	session_start();
	include_once '../header.php';
	require_once '../model/modelCompte.php';
	require_once '../model/modelOperation.php';
	$numero = $_GET['numRech'];
	$compte = findCompteByNumero($numero);
	$idClient = $compte['idClient'];
	$idUser = $compte['idGestCompte'];
	$client = infoClient($idClient);
	$comptes = getAllCompteByIdUser($idClient);
	$operations = listeOpByNumCompte($numero);
?>
<div class="container">

	<fieldset>
		<legend>INFOS COMPTE</legend>
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
			<tr>
				<td class="tdForm" colspan="2">
					<label>Solde Compte</label>
					<input class="champsNewC" value="<?=$compte['solde']?>" readonly>
				</td>
			</tr>		
		</table>
	</fieldset>
	<h3>INFOS OPERATION(S)</h3>
	<table id="listCompte" class="tableauPlein" cellspacing="0">
	<tr>
		<th>NUMERO COMPTE</th>
		<th>DATE OPERATION</th>
		<th>MONTANT</th>
		<th>TYPE</th>
		<th>Nom & Prénom Res</th>
	</tr>
	<?php 
		foreach ($operations as $o) {
			$idType = $o['idTypeOperation'];
			$type = getTypeOpById($idType);
			echo '<tr>
					<td>'.$o['numero'].'</td> 
					<td>'.$o['dateOperation'].'</td> 
					<td>'.$o['montant'].'</td>
					<td>'.$type['nom'].'</td> 
					<td>'.$o['nom'].' '.$o['prenom'].'</td>';
		}
	 ?>
</table>
	<a href="/BanqueDuPeuple/view/indexBanque.php?view=accueil"><button class="btn">Accueil</button></a>
	<a href="/BanqueDuPeuple/view/indexBanque.php?view=compte"><button class="btn">Gestion Comptes</button></a>
</div>