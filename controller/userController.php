<?php
    session_start();
    require_once '../model/modelUser.php';
    if (isset($_POST['connexion']))
    {
        extract($_POST);
        $user = verifierConnexion($login, $mdp);
        if($user != null)
        {
            /*if($_SESSION['ok'] == 0 || $_SESSION['password'] == "passer1"){
                header('location:/finance maison.sn/view/indexFinance.php?view=indexUtilisateur.php&ok=0');
            }else{
               
            }*/
             $_SESSION['profil'] = $user['profil'];
                $_SESSION['nomComplet'] = $user['nom'].' '.$user['prenom'];
                $_SESSION['idUser'] = $user['id'];
                $_SESSION['password'] = $user['password'];
                $_SESSION['numero'] = $user['numero'];
                $_SESSION['photo'] = $user['photo'];
                $_SESSION['id'] = $user['id'];
                header('location:/BanqueDuPeuple/view/IndexBanque.php');
        }
        else
        {
            header('location:/BanqueDuPeuple/index.php?connexion=0');
        }

    }
    if (isset($_POST['ajoutUser'])) {
        extract($_POST);
        $nom = $nom;
        $prenom = $prenom;
        $login = $login;
        $mdp = $mdp;
        $user = insererUtilisateur($nom, $numero, $prenom, $login, $mdp, $profil, $photo);
        if($user > 0){
            header('location:/BanqueDuPeuple/view/indexBanque.php?view=utilisateur&ok=1');
        }else{
            header('location:/BanqueDuPeuple/view/indexBanque.php?view=utilisateur&ok=0');
        }
    }
    if (isset($_POST['changeMdp'])) {
        extract($_POST);
        if ($_POST['mdp'] != 'passer1') {
            $mdUser = modifierMotDePasse($mdp,$numero);
            //var_dump($mdUser);
            if ($mdUser > 0 && $mdUser != "passer1") {
                $_SESSION['password'] = $mdUser;
                header('location:/BanqueDuPeuple/view/indexBanque.php');
            }
            else {
                header('location:/BanqueDuPeuple/view/indexBanque.php?view=utilisateur&mdp=0');
            }
        }else{
            header('location:/BanqueDuPeuple/view/indexBanque.php?view=modMdp&mdp=-1');
        }
    }
    if (isset($_GET['deconnexion']))
    {
        session_unset();
        $_SESSION = array();
        header('location:/BanqueDuPeuple/index.php');
    }
?>