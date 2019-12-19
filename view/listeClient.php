<?php
	include_once '../header.php';  
	require_once '../model/modelClient.php';
	$clients = getAllClient();
?>
<br><br>
<div class="box box1">
	 <h2>
	 	Dans cette page vous avez la liste de tous les clients. Appuyer sur Ajout Compte pour ajouter un autre compte à un client!!!
	 </h2>
</div>
<div class="box box2">
	 <h2>
	 	Dans cette page vous avez la liste de tous les clients. Appuyer sur Ajout Compte pour ajouter un autre compte à un client!!!
	 </h2>
</div>
<br><br>
<table class="tableauClient" cellspacing="0">
	<tr>
		<th>CIN</th>
		<th>NOM</th>
		<th>PRENOM</th>
		<th>ADRESSE</th>
		<th>TELEPHONE</th>
		<th>PHOTO</th>
		<th>ACTION</th>
	</tr>
<?php  
	foreach ($clients as $client ) {
		echo '<tr> 
				<td>'.$client['cni'].'</td> 
				<td>'.$client['nom'].'</td> <td>'.$client['prenom'].'</td> 
				<td>'.$client['adresse'].'</td> <td>'.$client['tel'].'</td> 
				<td><img class="image" src="/finance maison.sn/assets/css/images/'.$client['photo'].'"></td>
				<td><button class="Ajout" idClient='.$client['id'].'>Ajout Compte</button></td> 
		</tr>';
	}
?>
</table>

	<a href="/BanqueDuPeuple/view/indexBanque.php?view=client"><button class="btn">Gestion Clients</button></a>