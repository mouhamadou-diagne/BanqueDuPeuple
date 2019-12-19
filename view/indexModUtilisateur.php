<?php 
	include_once '../header.php';
?>
<div class="container">
	<br><br>
	<div class="box box1" <?php if ($_SESSION['password'] == "passer1") {
			echo "hidden";
		} ?>>
		 <h2>
		 	Avant toute chose vous devez d'abord changer votre mot de passe qui est passer1.
		 </h2>
	</div>
	<div class="box box2" <?php if ($_SESSION['password'] == "passer1") {
			echo "hidden";
		} ?>>
		 <h2>
		 	Avant toute chose vous devez d'abord changer votre mot de passe qui est passer1.
		 </h2>
	</div>
	<br><br>
	<form method="post" action="/BanqueDuPeuple/controller/userController.php">
		<fieldset>
		<legend>MODIFIER MOT DE PASSE</legend>
			<table>
				<tr>
					<td>
						<input type="password" name="mdp" placeholder="VOTRE MOT DE PASSE" class="champsNewC" required>
					</td>
					<td>
						<input type="text" name="numero" <?php $numero=$_SESSION['numero'];?> value="<?=$numero?>" readonly/ class="champsNewC">	
					</td>
					<td>
						<input type="submit" name="changeMdp" value="Enregistrer" class="btn">
					</td>
				</tr>
			</table>
		</fieldset>
		<?php  
			if (isset($_GET['mdp'])) {
				echo "Le mot de passe doit être différent de passer1";
			}
		?>
	</form>
</div>