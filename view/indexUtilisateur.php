<?php
	require_once '../model/modelUser.php';
?>
<br><br>
<div class="box box1" <?php if ($_SESSION['password'] == "passer1") {
		echo "hidden";
	} ?>>
	 <h2>
	 	Dans cette page vous pouvez ajoutez des utilisateurs avec un mot de passe fixer à passer1 qu'ils pouront modifier dés qu'ils seront connecter
	 </h2>
</div>
<div class="box box2" <?php if ($_SESSION['password'] == "passer1") {
		echo "hidden";
	} ?>>
	 <h2>
	 	Dans cette page vous pouvez ajoutez des utilisateurs avec un mot de passe fixer à passer1 qu'ils pouront modifier dés qu'ils seront connecter
	 </h2>
</div>
<br><br>
<form method="post" action="/BanqueDuPeuple/controller/userController.php" enctype="multipart/form-data">
	<fieldset>
		<legend>INFO UTILISATEUR</legend>
		<table class="tab_complet">
			<tr>
				<td class="tdForm"> 
					<input type="text" name="nom" placeholder="NOM" class="champsNewC" required>
				</td>
				<td class="tdForm">
					<input type="text" name="numero" <?php $numero=genererNumUser();?> value="<?= $numero?>" readonly/ class="champsNewC">
				</td>
			</tr>
			<tr>
				<td class="tdForm">
					<input type="text" name="prenom" placeholder="PRENOM" class="champsNewC" required>
				</td>
				<td class="tdForm">
					<input type="text" name="login" placeholder="LOGIN" class="champsNewC" required>
				</td>
			</tr>
			<tr>
				<td class="tdForm">
					<input type="password" name="mdp" value="passer1" readonly="true" class="champsNewC" required>
				</td>
				<td class="tdForm">
					<select name="profil">
						<option id="gestCompte">Gestionnaire Compte</option>
						<option id="admin">Administrateur</option>
						<option id="caissier">Caissier</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="tdForm">
					<input type="file" name="photo">
				</td>
				<td>
					<input type="submit" name="ajoutUser" value="Valider" class="btn">
				</td>>
			</tr>
		</table>
	</fieldset>
</form>