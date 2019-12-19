<br><br>
<div class="box box1"  <?php if ((isset($_GET['numRech']))) {
		echo "hidden";
	} ?>>
	 <h2>
	 	Donner le cni d'un client pour faire une recherche.
	 </h2>
</div>
<div class="box box2"  <?php if ((isset($_GET['numRech']))) {
		echo "hidden";
	} ?>>
	 <h2>
	 	Donner le cni d'un client pour faire une recherche.
	 </h2>
</div>
<br><br>
<form method="post" action="/BanqueDuPeuple/controller/clientController.php">
	<fieldset <?php if (isset($_GET['numero'])) echo "hidden"; ?>>
		<legend>Rechercher Client</legend>
		<table>
			<tr>
				<td>
					<input type="text" placeholder="CNI CLIENT" name="cniClient" id="numeroCompte" class="champsNewC" required>
				</td>
				<td>
					<input type="submit" name="rechercheClient" value="Rechercher" class="btn">
				</td>
			</tr>
		</table>
	</fieldset>
</form>