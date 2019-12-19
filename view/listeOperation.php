<?php 
	require_once '../model/modelOperation.php';
	$operations = getAllOperation();
?>
<br><br>
<div class="aligner">
	<a href="/BanqueDuPeuple/view/indexBanque.php?view=operation"><button class="btn">Nouvel Opération</button></a>
</div>

<br>
<table id="listCompte" class="tableauPlein" cellspacing="0">
	<tr>
		<th>NUMERO COMPTE</th>
		<th>DATE CREATION</th>
		<th>MONTANT</th>
		<th>TYPE</th>
		<th>Nom & Prénom Res</th>
		<th id="action">ACTION</th>
	</tr>
	<?php 
		foreach ($operations as $operation) {
			$idType = $operation['idTypeOperation'];
			$type = getTypeOpById($idType);
			echo '<tr>
					<td>'.$operation['numero'].'</td> 
					<td>'.$operation['dateOperation'].'</td> 
					<td>'.$operation['montant'].'</td>
					<td>'.$type['nom'].'</td> 
					<td>'.$operation['nom'].' '.$operation['prenom'].'</td> 
					<td><button class="supOp" idAsupprimer='.$operation['id'].'>Supprimer</button></td>
				</tr>';
		}
	 ?>
</table>
<br>