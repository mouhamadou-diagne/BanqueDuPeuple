function Rechercher(){
    var num = document.getElementById("numeroCompte").value;
    //alert(num);
    if(num.trim() != ""){
        window.location.href="/finance maison.sn/controller/compteController.php?numCompte="+num;
    }
}
