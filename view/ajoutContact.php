<?php
	include_once '../header.php';  
	require_once '../model/modelClient.php';
	require_once '../model/modelCompte.php';
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$client = getClientById($id);
	}
?>
<div class="container">
	<form method="post" action="/BanqueDuPeuple/controller/nouveauCompte.php">
		<fieldset id="formICli" class="formul">
			<input type="hidden" name="id" value="<?= $client['id']?>">
			<legend>INFOS CLIENT</legend>
			<table class="tab_complet">
				<tr>
					<td class="tdForm">
						<input name="cni" value="<?= $client['cni']?>" class="champsNewC" readonly>
					</td>
					<td class="tdForm">
						<input name="nom" value="<?= $client['nom']?>" class="champsNewC" readonly>
					</td>
				</tr>
				<tr>
					<td class="tdForm">
						<input name="prenom" value="<?= $client['prenom']?>" class="champsNewC" readonly>
					</td>
					<td class="tdForm">
						<input name="adresse" value="<?= $client['adresse']?>" class="champsNewC" readonly>
					</td>
				</tr>
				<tr>
					<td class="tdForm">
						<input name="tel" value="<?= $client['tel']?>" class="champsNewC" readonly>
					</td>
					<td class="tdForm">
						<input class="champsNewC" value="<?= $client['photo']?>" name="photo" readonly>
					</td>
				</tr>
			</table>
		</fieldset>
		<fieldset class="formul" id="formIComp">
			<legend>INFOS COMPTE</legend>
			<table class="tab_complet">
				<tr>
					<td class="tdForm">
						<input class="champsNewC" type="text" name="numero" id="numero" <?php $numero = genererNumCompte();?> value="<?= $numero?>" readonly/>
					</td>
					<td class="tdForm">
						<input type="number" name="solde" placeholder="SOLDE" class="champsNewC" min="0">
					</td>
				</tr>
			</table>
		</fieldset>
		<br><br>
	    <div class="aligner"><input class="btn" type="submit" name="ajout" value="Valider" ></div>
	</form>
</div>