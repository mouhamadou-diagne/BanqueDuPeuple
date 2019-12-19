<br><br>
<div class="box box1"  <?php if ((isset($_GET['numRech']))) {
		echo "hidden";
	} ?>>
	 <h2>
	 	Donner le numero d'un compte pour faire une recherche.
	 </h2>
</div>
<div class="box box2"  <?php if ((isset($_GET['numRech']))) {
		echo "hidden";
	} ?>>
	 <h2>
	 	Donner le numero d'un compte pour faire une recherche.
	 </h2>
</div>
<br><br>
<form method="post" action="/BanqueDuPeuple/controller/compteController.php">
	<fieldset <?php if (isset($_GET['numero'])) echo "hidden"; ?>>
		<legend>Rechercher Compte</legend>
		<table>
			<tr>
				<td>
					<input type="text" placeholder="NUMERO COMPTE" name="recherche" onblur="RechercherNum()" id="numeroCompte" class="champsNewC" required>
				</td>
				<td>
					<input type="submit" name="rechercher" value="Rechercher" class="btn">
				</td>
			</tr>
		</table>
	</fieldset>
</form>