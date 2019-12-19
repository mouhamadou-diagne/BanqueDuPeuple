<?php
	include_once '../header.php';  
	require_once '../model/modelOperation.php';
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$operations = listeOpById($id);
	}
?>
<div class="container">
	<br><br>
	<div class="aligner">
		<a href="/BanqueDuPeuple/view/indexFinance.php?view=listeCompte"><button class="btn">LISTE COMPTES</button></a>
	</div>

	<br>
	<table id="listCompte" class="tableauPlein" cellspacing="0">
		<tr>
			<th>NUMERO COMPTE</th>
			<th>DATE CREATION</th>
			<th>MONTANT</th>
			<th>TYPE</th>
			<th>Nom & Prénom Res</th>
			
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
						</tr>';
			}
		 ?>
	</table>
	<br>
</div>