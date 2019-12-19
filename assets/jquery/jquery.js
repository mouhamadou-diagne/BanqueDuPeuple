$(document).ready(function(){
	$('.Ajout').click(function(event){
        var btnClin = $(event.target).closest('button');
		var ajout = $(btnClin).attr("idClient");
		if (ajout) {
			var confirmation = confirm("Voulez-vous vraiment ajouter un compte pour ce client");
			if (confirmation) {
				window.location.href="/finance maison.sn/view/indexFinance.php?view=ajoutContact&id="+ajout;
			}
		}
	})
	$('.btnCompte').click( function(event){
		var btnClin = $(event.target).closest('button');
		var bloquer = $(btnClin).attr("bloquer");
		var listeOp = $(btnClin).attr("listeOp");
		var activer = $(btnClin).attr("activer");
		if (bloquer) {
			var confirmation = confirm("Voulez-vous vraiment bloquer ce compte");
			if(confirmation){
				$.ajax({
					url : '/finance maison.sn/ajax/bloquerCompte.php',
					type : 'GET',
					data : {id : bloquer},
					success : function(data){
						if (data == 1) {
							window.location.reload();
						}
					}
				});
			}
		}
		if (listeOp) {
			window.location.href="/finance maison.sn/view/indexFinance.php?view=listeOpById&id="+listeOp;
		}
		if (activer) {
			var confirmation = confirm("Voulez-vous vraiment activer ce compte");
			if(confirmation){
				$.ajax({
					url : '/finance maison.sn/ajax/activerCompte.php',
					type : 'GET',
					data : {id : activer},
					success : function(data){
						if (data == 1) {
							window.location.reload();
						}
					}
				});
			}
		}
	})
	$('.supOp').click( function(event){
        var btnClin = $(event.target).closest('button');
		var idAsupprimer = $(btnClin).attr("idAsupprimer");
		if (idAsupprimer) {
			var suppression = confirm("Voulez-vous vraiment supprimer cette operation");
			if (suppression) {
				$.ajax({
					url : '/finance maison.sn/ajax/supprimerOp.php',
					type : 'GET',
					data : {id : idAsupprimer},
					success : function(data){
						if (data == 1) {
							window.location.reload();
						}
					}
				});
			}
		}
	})
})