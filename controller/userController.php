<?php
    session_start();
    require_once '../model/modelUser.php';
    if (isset($_POST['connexion']))
    {
        extract($_POST);
        $user = verifierConnexion($login,$mdp);
        if($user != null)
        {
            /*if($_SESSION['ok'] == 0 || $_SESSION['password'] == "passer1"){
                header('location:/finance maison.sn/view/indexFinance.php?view=indexUtilisateur.php&ok=0');
            }else{
               
            }*/
                $_SESSION['id'] = $user['id'];
                $_SESSION['nom'] = $user['nom'];
                $_SESSION['prenom'] = $user['prenom'];;
                $_SESSION['mdp'] = $user['mdp'];
                header('location:/BanqueDuPeuple/view/indexBanque.php');
        }
        else
        {
            header('location:/BanqueDuPeuple/index.php?connexion=0');
        }

    }
    if (isset($_POST['ajoutUser'])) {
        extract($_POST);
        $login = $login;
        $nom = $nom;
        $prenom = $prenom;
        $mdp = $mdp;
        $user = insererUtilisateur($login, $mdp,$nom, $numero, $prenom,);
        if($user > 0){
            header('location:/BanqueDuPeuple/view/indexBanque.php?view=utilisateur&ok=1');
        }else{
            header('location:/BanqueDuPeuple/view/indexBanque.php?view=utilisateur&ok=0');
        }
    }
    if (isset($_GET['deconnexion']))
    {
        session_unset();
        $_SESSION = array();
        header('location:/BanqueDuPeuple/index.php');
    }
?>