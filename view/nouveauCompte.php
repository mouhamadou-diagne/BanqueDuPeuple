<br><br>
<div class="box box1">
	 <h2>
	 	Dans cette page vous pouvez ajouter de nouveaux comptes. Le solde est initialisé à 0.	 
	 </h2>
</div>
<div class="box box2">
	 <h2>
	 	Dans cette page vous pouvez ajouter de nouveaux comptes. Le solde est initialisé à 0.
	 </h2>
</div>
<br><br>
<form method="post" action="/BanqueDuPeuple/controller/compteController.php" enctype="multipart/form-data" id="nouveauCompte">
	<fieldset id="formICli" class="formul">
		<legend>INFOS CLIENT</legend>
		<table class="tab_complet">
			<tr>
				<td class="tdForm">
					<input type="text" name="cni" placeholder="NUMERO CIN" class="champsNewC" required>
				</td>
				<td class="tdForm">
					<input type="text" name="nom" placeholder="NOM" class="champsNewC" required>
				</td>
			</tr>
			<tr>
				<td class="tdForm">
					<input type="text" name="prenom" placeholder="PRENOM" class="champsNewC" required>
				</td>
				<td class="tdForm">
					<input type="text" name="adresse" placeholder="ADRESSE" class="champsNewC" required>
				</td>
			</tr>
			<tr>
				<td class="tdForm">
					<input type="text" name="tel" placeholder="TELEPHONE" class="champsNewC" required>
				</td>
				<td class="tdForm">
					<input type="file" name="photo" id="photo">
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
    <div class="aligner"><input class="btn" type="submit" name="ajoutCompte" value="Valider" ></div>
</form>
<div class="aligner">
	<a href="/finance maison.sn/view/indexFinance.php?view=listeCompte"><button class="btn">Liste des Comptes</button></a>
</div>