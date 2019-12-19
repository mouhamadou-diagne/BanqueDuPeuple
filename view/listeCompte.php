<?php 
	require_once '../model/modelCompte.php';
	$comptes = getAllCompte();
?>
<br><br>
<div class="aligner">
	<a href="/BanqueDuPeuple/view/indexBanque.php?view=nouveauCompte"><button class="btn">Nouveau Compte</button></a>
</div>

<br>
<table id="listCompte" class="tableauPlein" cellspacing="0">
	<tr>
		<th>NUMERO</th>
		<th>DATE CREATION</th>
		<th>SOLDE</th>
		<th>Nom & Prénom Client</th>
		<th id="action" colspan="2">ACTION</th>
	</tr>
	<?php 
		foreach ($comptes as $compte) {
			echo '<tr>
					<td>'.$compte['numero'].'</td> 
					<td>'.$compte['dateCreation'].'</td> 
					<td>'.$compte['solde'].'</td>
					<td>'.$compte['nom'].' '.$compte['prenom'].'</td>
					';
					if ($compte['etat'] == "activer") {
						echo '<td>
								 <button class="btnCompte" bloquer='.$compte['id'].' style=" background: green;"> BLOQUER</button>
							</td>';
					}else{
						echo '<td>
								 <button class="btnCompte" activer='.$compte['id'].' style=" background: green;"> ACTIVER</button>
							</td>';
					}
					echo '<td>
							<button class="btnCompte" listeOp='.$compte['id'].'> Liste des opérations</button>
						</td>
					</tr>';
		}
	 ?>
</table>
