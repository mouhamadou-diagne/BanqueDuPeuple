<br><br>
<div class="box box1" <?php if (isset($_GET['numero'])) echo "hidden"; ?> >
	 <h2>
	 	Donner le numero d'un client pour effectuer une operation.
	 </h2>
</div>
<div class="box box2" <?php if (isset($_GET['numero'])) echo "hidden"; ?>>
	 <h2>
	 	Donner le numero d'un client pour effectuer une operation.
	 </h2>
</div>
<br><br>
<form>
	<fieldset <?php if (isset($_GET['numero'])) echo "hidden"; ?>>
		<legend>OPERATION</legend>
		<table>
			<tr>
				<td colspan="2">
					<input type="text" placeholder="NUMERO COMPTE" name="numeroCompte" onblur="Rechercher()" id="numeroCompte" class="champsNewC" required>
				</td>
			</tr>
		</table>
	</fieldset>
</form>
<form method="post" action="/finance maison.sn/controller/operationController.php">
	<fieldset class="fOp" <?php require_once '../header.php'; 
					if (!(isset($_GET['numero']))) {
						echo "hidden";
					} 
				?>
	>
		<legend></legend>
		<table class="tabOp">	
			<tr>
				<td>
					<input type="text" name="numero" class="tdOp"<?php $numero = $_GET['numero'];?> value="<?=$numero?>" readonly/>
				</td>
				<td>
					<input type="number" name="montant" placeholder="MONTANT" min="1" class="tdOp">
				</td>
			</tr>
			<tr>
				<td>
					<select name="type">
						<option>Retrait</option>
						<option>Depot</option>
						<option>Emprunt</option>
						<option>Remboursement</option>
					</select>
				</td>
				<td>
					<input type="submit" name="valider" value="ENREGISTER" class="btn">
				</td>
			</tr>
		</table>
	</fieldset>
</form>
<div class="aligner"   <?php if ((isset($_GET['numero']))) {
		echo "hidden";
	} ?>>
	<a href="/finance maison.sn/view/indexFinance.php?view=listeOperation"><button class="btn">Liste des opérations</button></a>
	<a href="/finance maison.sn/view/indexFinance.php?view=transfert"><button class="btn">Transfert</button></a>
</div>